package Ncs::Xml::OutreachEval;

use strict;
use warnings;
use Ncs::Op;

use constant OUTREACH_EVAL_MIN 	=> 1;
use constant OUTREACH_EVAL_MAX 	=> 4;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id							=> undef,
		_outreach_event_eval_id			=> undef,
		_outreach_event_id				=> undef,
		_outreach_eval					=> undef,
		_outreach_eval_oth				=> undef,
		_create_date					=> undef,
		_table_spec_version				=> Ncs::Op::OUTREACH_EVAL_VERSION,
		_transaction_type				=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap						=> $soap,
		_table							=> Ncs::Db::DbDefs::OUTREACH_EVAL_TABLE,
		_sql							=> 'select ID, OUTREACH_EVENT_EVAL_ID, ' .
											'OUTREACH_EVAL, OUTREACH_EVAL_OTH, ' . 
											'DATE_FORMAT(CREATE_DATE, \'%Y-%m-%d\') AS CREATE_DATE ' .
											'from ' . Ncs::Db::DbDefs::OUTREACH_EVAL_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve sugar outreach eval id
	my $outreach_eval_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::OUTREACH_EVAL_SUGAR_MODULE, 
									id => $outreach_eval_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve outreach event id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::OUTREACH_EVAL_SUGAR_MODULE, 
									id => $outreach_eval_sugar_id, 
									module2 => Ncs::Db::DbDefs::OUTREACH_SUGAR_MODULE});
	# retrieve field (outreach_event_id) value
	my $outreach_event_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::OUTREACH_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'outreach_event_id'});

	$self->{_psu_id}						= $psu_id_field_value;
	$self->{_outreach_event_eval_id}		= $values->{OUTREACH_EVENT_EVAL_ID} || Ncs::Op::UNKNOWN;
	$self->{_outreach_event_id}				= $outreach_event_id_field_value;
	$self->{_outreach_eval}					= Ncs::Op::atoi($values->{OUTREACH_EVAL}) || Ncs::Op::UNKNOWN;
	$self->{_outreach_eval_oth}				= $values->{OUTREACH_EVAL_OTH} || Ncs::Op::UNKNOWN;
	$self->{_create_date}					= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "OUTREACH_EVENT_EVAL_ID column exceeds allowed character length" unless ( length($self->{_outreach_event_eval_id}) <= 36 );
	return "OUTREACH_EVENT_ID column exceeds allowed character length" unless ( length($self->{_outreach_event_id}) <= 36 );
	return "OUTREACH_EVAL column contains an invalid numeric value" unless ( ($self->{_outreach_eval} >= OUTREACH_EVAL_MIN && 
																			$self->{_outreach_eval} <= OUTREACH_EVAL_MAX) ||
																			$self->{_outreach_eval} == Ncs::Op::OTHER ||
																			$self->{_outreach_eval} == Ncs::Op::UNKNOWN );
	if ($self->{_outreach_eval} != Ncs::Op::OTHER) { $self->{_outreach_eval_oth} = "". Ncs::Op::NOT_APPLICABLE; }
	return "OUTREACH_EVAL_OTH column exceeds allowed character length" unless ( length($self->{_outreach_eval_oth}) <= 255 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<outreach_eval>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<outreach_event_eval_id>%s</outreach_event_eval_id>\n", $self->{_outreach_event_eval_id});
	$out .= sprintf("\t\t\t<outreach_event_id>%s</outreach_event_id>\n", $self->{_outreach_event_id});
	$out .= sprintf("\t\t\t<outreach_eval>%d</outreach_eval>\n", $self->{_outreach_eval});
	$out .= sprintf("\t\t\t<outreach_eval_oth>%s</outreach_eval_oth>\n", $self->{_outreach_eval_oth});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</outreach_eval>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getOutreachEventEvalId			{ my $self = shift; return $self->{_outreach_event_eval_id} || ''; }
sub getOutreachEventId				{ my $self = shift; return $self->{_outreach_event_id} || ''; }
sub getOutreachEval					{ my $self = shift; return $self->{_outreach_eval} || ''; }
sub getOutreachEvalOth				{ my $self = shift; return $self->{_outreach_eval_oth} || ''; }
sub getCreateDate					{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
