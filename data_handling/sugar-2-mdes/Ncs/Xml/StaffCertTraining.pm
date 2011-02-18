package Ncs::Xml::StaffCertTraining;

use strict;
use warnings;
use Ncs::Op;

use constant CERT_TRAIN_TYPE_MIN		=> 1;
use constant CERT_TRAIN_TYPE_MAX		=> 13;
use constant STAFF_BGCHECK_LVL_MIN		=> 1;
use constant STAFF_BGCHECK_LVL_MAX		=> 4;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id							=> undef,
		_staff_cert_list_id				=> undef,
		_staff_id						=> undef,
		_cert_train_type				=> undef,		
		_cert_completed					=> undef,		
		_cert_date						=> undef,
		_staff_bgcheck_lvl				=> undef,
		_cert_type_frequency			=> undef,
		_cert_type_exp_date				=> undef,
		_cert_comment					=> undef,
		_create_date					=> undef,
		_table_spec_version				=> Ncs::Op::STAFF_CERT_TRAINING_VERSION,
		_transaction_type				=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap						=> $soap,
		_table							=> Ncs::Db::DbDefs::STAFF_CERT_TRAINING_TABLE,
		_sql							=> 'select ID, STAFF_CERT_LIST_ID, CERT_TRAIN_TYPE, ' .
											'CERT_COMPLETED, DATE_FORMAT(cert_date, \'%Y-%m-%d\') AS CERT_DATE, ' .
											'STAFF_BGCHECK_LVL, CERT_TYPE_FREQUENCY, DATE_FORMAT(cert_type_exp_date, ' .
											'\'%Y-%m-%d\') AS CERT_TYPE_EXP_DATE, CERT_COMMENT, ' .
											'DATE_FORMAT(date_entered, \'%Y-%m-%d\') AS CREATE_DATE from ' .
											Ncs::Db::DbDefs::STAFF_CERT_TRAINING_TABLE . 
											' where deleted = 0'
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar staff cert training id
	my $staff_cert_training_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::STAFF_CERT_TRAINING_SUGAR_MODULE, 
									id => $staff_cert_training_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve staff id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::STAFF_CERT_TRAINING_SUGAR_MODULE, 
									id => $staff_cert_training_sugar_id, 
									module2 => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE});
	# retrieve field (staff_id) value
	my $staff_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'staff_id'});

	$self->{_psu_id}					= $psu_id_field_value;
	$self->{_staff_cert_list_id}		= $values->{STAFF_CERT_LIST_ID} || Ncs::Op::UNKNOWN;
	$self->{_staff_id}					= $staff_id_field_value;
	$self->{_cert_train_type}			= $values->{CERT_TRAIN_TYPE} || Ncs::Op::UNKNOWN;
	$self->{_cert_completed}			= $values->{CERT_COMPLETED} || Ncs::Op::UNKNOWN;
	$self->{_cert_date}					= $values->{CERT_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_staff_bgcheck_lvl}			= $values->{STAFF_BGCHECK_LVL} || Ncs::Op::UNKNOWN;
	$self->{_cert_type_frequency}		= $values->{CERT_TYPE_FREQUENCY} || Ncs::Op::UNKNOWN;
	$self->{_cert_type_exp_date}		= $values->{CERT_TYPE_EXP_DATE} || Ncs::Op::UNKNOWN_DATE;
	$self->{_cert_comment}				= $values->{CERT_COMMENT} || '';
	$self->{_create_date}				= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "STAFF_CERT_LIST_ID column exceeds allowed character length" unless ( length($self->{_staff_cert_list_id}) <= 36 );
	return "STAFF_ID column exceeds allowed character length" unless ( length($self->{_staff_id}) <= 36 );
	return "CERT_TRAIN_TYPE column contains an invalid numeric value" unless ( ($self->{_cert_train_type} >= CERT_TRAIN_TYPE_MIN && 
																				$self->{_cert_train_type} <= CERT_TRAIN_TYPE_MAX) ||
																				$self->{_cert_train_type} == Ncs::Op::UNKNOWN );
	return "CERT_COMPLETED column exceeds allowed character length" unless ( $self->{_cert_completed} == Ncs::Op::YES || 
																				$self->{_cert_completed} == Ncs::Op::NO ||
																				$self->{_cert_completed} == Ncs::Op::UNKNOWN );
	return "CERT_DATE column contains an invalid date format" unless ( $self->{_cert_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "STAFF_BGHCHECK_LVL column contains an invalid numeric value" unless ( ($self->{_staff_bgcheck_lvl} >= STAFF_BGCHECK_LVL_MIN && 
																					$self->{_staff_bgcheck_lvl} <= STAFF_BGCHECK_LVL_MAX) ||
																					$self->{_staff_bgcheck_lvl} == Ncs::Op::UNKNOWN );
	return "CERT_TYPE_FREQUENCY column exceeds allowed character length" unless ( length($self->{_cert_type_frequency}) <= 10 );
	return "CERT_TYPE_EXP_DATE column contains an invalid date format" unless ( $self->{_cert_type_exp_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "CERT_COMMENT column exceeds allowed character length" unless ( length($self->{_cert_comment}) <= 8000 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<staff_cert_training>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<staff_cert_list_id>%s</staff_cert_list_id>\n", $self->{_staff_cert_list_id});
	$out .= sprintf("\t\t\t<staff_id>%s</staff_id>\n", $self->{_staff_id});
	$out .= sprintf("\t\t\t<cert_train_type>%d</cert_train_type>\n", $self->{_cert_train_type});
	$out .= sprintf("\t\t\t<cert_completed>%d</cert_completed>\n", $self->{_cert_completed});
	$out .= sprintf("\t\t\t<cert_date>%s</cert_date>\n", $self->{_cert_date});
	$out .= sprintf("\t\t\t<staff_bgcheck_lvl>%d</staff_bgcheck_lvl>\n", $self->{_staff_bgcheck_lvl});
	$out .= sprintf("\t\t\t<cert_type_frequency>%s</cert_type_frequency>\n", $self->{_cert_type_frequency});
	$out .= sprintf("\t\t\t<cert_type_exp_date>%s</cert_type_exp_date>\n", $self->{_cert_type_exp_date});
	$out .= sprintf("\t\t\t<cert_comment>%s</cert_comment>\n", $self->{_cert_comment});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</staff_cert_training>");

	return $out;
}

sub getPsuId				{ my $self = shift; return $self->{_psu_id} || ''; }
sub getStaffCertListId		{ my $self = shift; return $self->{_staff_cert_list_id} || ''; }
sub getStaffId				{ my $self = shift; return $self->{_staff_id} || ''; }
sub getCertTrainType		{ my $self = shift; return $self->{_cert_train_type} || ''; }
sub getCertCompleted		{ my $self = shift; return $self->{_cert_completed} || ''; }
sub getCertDate				{ my $self = shift; return $self->{_cert_date} || ''; }
sub getStaffBgcheckLvl		{ my $self = shift; return $self->{_staff_bgcheck_lvl} || ''; }
sub getCertTypeFrequency	{ my $self = shift; return $self->{_cert_type_frequency} || ''; }
sub getCertTypeExpDate		{ my $self = shift; return $self->{_cert_type_exp_date} || ''; }
sub getCertComment			{ my $self = shift; return $self->{_cert_comment} || ''; }
sub getCreateDate			{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion		{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType		{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql					{ my $self = shift; return $self->{_sql} || ''; }
sub getTable				{ my $self = shift; return $self->{_table} || ''; }

1;
