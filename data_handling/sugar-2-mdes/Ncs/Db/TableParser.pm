package Ncs::Db::TableParser;

use strict;
use warnings;
use DBI;
use Log::Log4perl qw(:levels get_logger);
use Ncs::Db::DbDefs;

sub new
{
	my ($class, $args) = @_;

	# If database connection details have been supplied, use them.  
	# Otherwise, use defaults.
	my $self = bless
	{
		_dns			=> (defined($args->{dbInfo})) ? $args->{dbInfo}->{dns} : Ncs::Db::DbDefs::SUGAR_DNS,
		_username		=> (defined($args->{dbInfo})) ? $args->{dbInfo}->{dbUsername} : Ncs::Db::DbDefs::SUGAR_USERNAME,
		_passwd			=> (defined($args->{dbInfo})) ? $args->{dbInfo}->{dbPassword} : Ncs::Db::DbDefs::SUGAR_PASSWD,
		_is_snapshot	=> $args->{is_snapshot}
	}, $class;

	return $self;
}

###############################################################################
#
# get_header()
#
# A method to return the xml header data in a hash reference.
#
###############################################################################
sub get_header
{
	my $self = shift;

	my $logger = get_logger("");

	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or $logger->error("Unable to connect to database: $DBI::errstr");
	return undef unless ($dbh);

	#
	# get the xml header info from the appropriate table
	#
	my $sth = $dbh->prepare('SELECT * FROM ' . Ncs::Db::DbDefs::PSU_TABLE . ' LIMIT 1');

	#
	# return the header info
	#
	if (defined($sth)) 
	{
		$sth->execute() or return undef;
		my $row = $sth->fetchrow_hashref();
		$sth->finish();
		$dbh->disconnect();

		return $row;
	}
	else
	{
		$logger->error("Failed to prepare header statement.");
		$dbh->disconnect();

		return undef;
	}	
}

###############################################################################
#
# process_table()
#
# A generic method that is called to process each of the tables.
# 
# This method does not care which table it is processing, all it 
# knows is to use predefined method calls in the xml object 
# passed into the method.
#
###############################################################################
sub process_table
{
	my ($self, $args) = @_;

	my $element = $args->{element};
	my $logger = get_logger("");

	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or return "Unable to connect to database: $DBI::errstr";

	#
	# open xml file for appending
	#
    my $fh = IO::File->new($args->{file}, "a") 
		or return "Failed to open file for writing - $args->{file}: $!";
	return undef unless($fh);

	#
	# prepare the sql statement that exists in the passed in xml object (element)
	#
	my $sth = $dbh->prepare($element->getSql());

	if (!defined($sth)) 
	{
		$dbh->disconnect();
		$fh->close();

		return "Failed to prepare statement for table " . $element->getTable();
	}	

	#
	# execute the xml object's query
	#
	$sth->execute() or return "Failed to execute sql statement on table "  . $element->getTable();

	#
	# for each returned row, populate the xml object, call xml object's validate method, then 
	# call the xml object's print_tag method.
	#
	while(my $row = $sth->fetchrow_hashref())
	{
		$element->populate($row);
		my $error = $element->validate();
		if ($error)
		{
			$dbh->disconnect();
			$fh->close();
			return "Table " . $element->getTable() . " failed validation: $error";
		}
		$fh->printf("%s\n", $element->print_tag());
	}

	#
	# finished, now clean up
	#
	$sth->finish();
	$dbh->disconnect();
	$fh->close();

	return undef;
}

sub getDns			{ my $self = shift; return $self->{_dns} || ''; }
sub getUsername		{ my $self = shift; return $self->{_username} || ''; }
sub getPasswd		{ my $self = shift; return $self->{_passwd} || ''; }
sub getIsSnapShot	{ my $self = shift; return $self->{_is_snapshot} || ''; }

1;
