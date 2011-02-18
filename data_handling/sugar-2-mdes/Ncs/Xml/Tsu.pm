package Ncs::Xml::Tsu;

use strict;
use warnings;
use Ncs::Soap::SoapNcs;
use Ncs::Db::DbDefs;
use Ncs::Op;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_sc_id				=> undef,
		_psu_id				=> undef,
		_ssu_id				=> undef,
		_tsu_id				=> undef,
		_tsu_name			=> undef,
		_create_date		=> undef,
		_table_spec_version	=> Ncs::Op::TSU_VERSION,
		_transaction_type	=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap			=> $soap,
		_table				=> Ncs::Db::DbDefs::TSU_TABLE,
		_sql				=> 'select ID, TSU_ID, TSU_NAME, DATE_FORMAT(date_entered, ' .
								'\'%Y-%m-%d\') AS CREATE_DATE from ' .
								Ncs::Db::DbDefs::TSU_TABLE . 
								' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar tsu id
	my $tsu_sugar_id = $values->{ID} || '';

	# retrieve sc_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::TSU_SUGAR_MODULE, 
									id => $tsu_sugar_id, 
									module2 => Ncs::Db::DbDefs::STUDY_CENTER_SUGAR_MODULE});
	# retrieve field (sc_id) value
	my $sc_id_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::STUDY_CENTER_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'sc_id'});
	# retrieve psu_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::TSU_SUGAR_MODULE, 
									id => $tsu_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});
	# retrieve ssu_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::TSU_SUGAR_MODULE, 
									id => $tsu_sugar_id, 
									module2 => Ncs::Db::DbDefs::SSU_SUGAR_MODULE});
	# retrieve field (ssu_id) value
	my $ssu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::SSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'ssu_id'});

	$self->{_sc_id}					= $sc_id_value;
	$self->{_psu_id}				= $psu_id_field_value;
	$self->{_ssu_id}				= $ssu_id_field_value;
	$self->{_tsu_id}				= $values->{TSU_ID} || Ncs::Op::UNKNOWN;
	$self->{_tsu_name}				= $values->{TSU_NAME} || Ncs::Op::UNKNOWN;
	$self->{_create_date}			= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "SC_ID column exceeds allowed character length" unless ( length($self->{_sc_id}) <= 36 );
	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "SSU_ID column exceeds allowed character length" unless ( length($self->{_ssu_id}) <= 36 );
	return "TSU_ID column exceeds allowed character length" unless ( length($self->{_tsu_id}) <= 36 );
	return "TSU_NAME column exceeds allowed character length" unless ( length($self->{_tsu_name}) <= 100 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<tsu>\n");
	$out .= sprintf("\t\t\t<sc_id>%s</sc_id>\n", $self->{_sc_id});
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<ssu_id>%s</ssu_id>\n", $self->{_ssu_id});
	$out .= sprintf("\t\t\t<tsu_id>%s</tsu_id>\n", $self->{_tsu_id});
	$out .= sprintf("\t\t\t<tsu_name>%s</tsu_name>\n", $self->{_tsu_name});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</tsu>");

	return $out;
}

sub getScId				{ my $self = shift; return $self->{_sc_id} || ''; }
sub getPsuId			{ my $self = shift; return $self->{_psu_id} || ''; }
sub getSsuId			{ my $self = shift; return $self->{_ssu_id} || ''; }
sub getTsuId			{ my $self = shift; return $self->{_tsu_id} || ''; }
sub getTsuName			{ my $self = shift; return $self->{_tsu_name} || ''; }
sub getCreateDate		{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion	{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType	{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql				{ my $self = shift; return $self->{_sql} || ''; }
sub getTable			{ my $self = shift; return $self->{_table} || ''; }

1;
