package Ncs::Xml::IncidentMedia;

use strict;
use warnings;
use Ncs::Op;

use constant INCLOSS_MEDIA_MIN		=> 1;
use constant INCLOSS_MEDIA_MAX		=> 3;
use constant INSSEV_MIN				=> 1;
use constant INSSEV_MAX				=> 4;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_incident_media_id			=> undef,
		_incident_id				=> undef,
		_incloss_media				=> undef,
		_incloss_media_oth			=> undef,
		_inssev						=> undef,
		_create_date				=> undef,
		_table_spec_version			=> Ncs::Op::INCIDENT_MEDIA_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap					=> $soap,
		_table						=> Ncs::Db::DbDefs::INCIDENT_MEDIA_TABLE,
		_sql						=> 'select ID, INCIDENT_MEDIA_ID, INCLOSS_MEDIA, ' .
										'INCLOSS_MEDIA_OTH, INSSEV, DATE_FORMAT(date_entered, \'%Y-%m-%d\') ' .
										'AS CREATE_DATE from ' . Ncs::Db::DbDefs::INCIDENT_MEDIA_TABLE . 
										' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve incident media record id
	my $incident_media_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INCIDENT_MEDIA_SUGAR_MODULE, 
									id => $incident_media_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve incident_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::INCIDENT_MEDIA_SUGAR_MODULE, 
									id => $incident_media_sugar_id, 
									module2 => Ncs::Db::DbDefs::INCIDENT_SUGAR_MODULE});
	# retrieve field (incident_id) value
	my $incident_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::INCIDENT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'incident_id'});

	$self->{_psu_id}					= $psu_id_field_value;
	$self->{_incident_media_id}			= $values->{INCIDENT_MEDIA_ID} || Ncs::Op::UNKNOWN;
	$self->{_incident_id}				= $incident_id_field_value;
	$self->{_incloss_media}				= Ncs::Op::atoi($values->{INCLOSS_MEDIA}) || Ncs::Op::UNKNOWN;
	$self->{_incloss_media_oth}			= $values->{INCLOSS_MEDIA_OTH} || Ncs::Op::UNKNOWN;
	$self->{_inssev}					= Ncs::Op::atoi($values->{INSSEV}) || Ncs::Op::UNKNOWN;
	$self->{_create_date}				= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "INCIDENT_MEDIA_ID column exceeds allowed character length" unless ( length($self->{_incident_media_id}) <= 36 );
	return "INCIDENT_ID column exceeds allowed character length" unless ( length($self->{_incident_id}) <= 36 );
	return "INCLOSS_MEDIA column contains an invalid numeric value" unless ( ($self->{_incloss_media} >= INCLOSS_MEDIA_MIN && 
																			$self->{_incloss_media} <= INCLOSS_MEDIA_MAX) ||
																			$self->{_incloss_media} == Ncs::Op::OTHER ||
																			$self->{_incloss_media} == Ncs::Op::UNKNOWN );
	if ($self->{_incloss_media} != Ncs::Op::OTHER) { $self->{_incloss_media_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "INCLOSS_MEDIA_OTH column exceeds allowed character length" unless ( length($self->{_incloss_media_oth}) <= 255 );
	return "INSSEV column contains an invalid numeric value" unless ( ($self->{_inssev} >= INSSEV_MIN && 
																		$self->{_inssev} <= INSSEV_MAX) ||
																		$self->{_inssev} == Ncs::Op::UNKNOWN );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<incident_media>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<incident_media_id>%s</incident_media_id>\n", $self->{_incident_media_id});
	$out .= sprintf("\t\t\t<incident_id>%s</incident_id>\n", $self->{_incident_id});
	$out .= sprintf("\t\t\t<incloss_media>%d</incloss_media>\n", $self->{_incloss_media});
	$out .= sprintf("\t\t\t<incloss_media_oth>%s</incloss_media_oth>\n", $self->{_incloss_media_oth});
	$out .= sprintf("\t\t\t<inssev>%s</inssev>\n", $self->{_inssev});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</incident_media>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getIncidentMediaId				{ my $self = shift; return $self->{_incident_media_id} || ''; }
sub getIncidentId					{ my $self = shift; return $self->{_incident_id} || ''; }
sub getInclossMedia					{ my $self = shift; return $self->{_incloss_media} || ''; }
sub getInclossMediaOth				{ my $self = shift; return $self->{_incloss_media_oth} || ''; }
sub getInssev						{ my $self = shift; return $self->{_inssev} || ''; }
sub getCreateDate					{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
