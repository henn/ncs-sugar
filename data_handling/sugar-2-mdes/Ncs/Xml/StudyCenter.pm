package Ncs::Xml::StudyCenter;

use strict;
use warnings;
use Ncs::Db::DbDefs;
use Ncs::Op;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_sc_id				=> undef,
		_sc_name			=> undef,
		_comments			=> undef,
		_create_date		=> undef,
		_table_spec_version	=> Ncs::Op::STUDY_CENTER_VERSION,
		_transaction_type	=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap			=> $soap,
		_table				=> Ncs::Db::DbDefs::STUDY_CENTER_TABLE,
		_sql				=> 'select SC_ID, SC_NAME, COMMENTS, DATE_FORMAT(date_entered, ' .
								'\'%Y-%m-%dT%H-%i-%s\') AS CREATE_DATE from ' .
								Ncs::Db::DbDefs::STUDY_CENTER_TABLE . 
								' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	$self->{_sc_id}					= $values->{SC_ID} || Ncs::Op::UNKNOWN;
	$self->{_sc_name}				= $values->{SC_NAME} || Ncs::Op::UNKNOWN;
	$self->{_comments}				= $values->{COMMENTS} || '';
	$self->{_create_date}			= $values->{CREATE_DATE}  || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "SC_ID column exceeds allowed character length" unless ( length($self->{_sc_id}) <= 36 );
	return "SC_NAME column exceeds allowed character length" unless ( length($self->{_sc_name}) <= 100 );
	return "COMMENTS column exceeds allowed character length" unless ( length($self->{_comments}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}T\d{2}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<study_center>\n");
	$out .= sprintf("\t\t\t<sc_id>%s</sc_id>\n", $self->{_sc_id});
	$out .= sprintf("\t\t\t<sc_name>%s</sc_name>\n", $self->{_sc_name});
	$out .= sprintf("\t\t\t<comment>%s</comment>\n", $self->{_comments});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</study_center>");

	return $out;
}

sub getScId				{ my $self = shift; return $self->{_sc_id} || ''; }
sub getScName			{ my $self = shift; return $self->{_sc_name} || ''; }
sub getComments			{ my $self = shift; return $self->{_comments} || ''; }
sub getCreateDate		{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion	{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType	{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql				{ my $self = shift; return $self->{_sql} || ''; }
sub getTable			{ my $self = shift; return $self->{_table} || ''; }

1;
