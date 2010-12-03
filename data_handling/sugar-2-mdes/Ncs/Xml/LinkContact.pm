package Ncs::Xml::LinkContact;

use strict;
use warnings;
use Ncs::Op;

sub new
{
	my ($class, $soap, $is_snapshot) = @_;

	my $self = bless
	{
		_psu_id						=> undef,
		_contact_link_id			=> undef,
		_contact_id					=> undef,
		_event_id					=> undef,
		_instrument_id				=> undef,
		_staff_id					=> undef,
		_specimen_id				=> undef,
		_person_id					=> undef,
		_create_date				=> undef,
		_table_spec_version			=> Ncs::Op::LINK_CONTACT_VERSION,
		_transaction_type			=> (($is_snapshot eq "true") ? 'NA' : 'UP'),
		_sugar_soap					=> $soap,
		_table						=> Ncs::Db::DbDefs::LINK_CONTACT_TABLE,
		_sql						=> 'select ID, CONTACT_LINK_ID, ' . 
										'DATE_FORMAT(create_date, \'%Y-%m-%d\') ' .
										'AS CREATE_DATE from ' . 
										Ncs::Db::DbDefs::LINK_CONTACT_TABLE
	}, $class;

	return $self;
}

sub populate
{
	my ($self, $values) = @_;

	# retrieve link contact record id
	my $link_contact_sugar_id = $values->{ID} || '';

	# retrieve psu_id relationship id
	my $rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LINK_CONTACT_SUGAR_MODULE, 
									id => $link_contact_sugar_id, 
									module2 => Ncs::Db::DbDefs::PSU_SUGAR_MODULE});
	# retrieve field (psu_id) value
	my $psu_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PSU_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'psu_id'});

	# retrieve contact_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LINK_CONTACT_SUGAR_MODULE, 
									id => $link_contact_sugar_id, 
									module2 => Ncs::Db::DbDefs::CONTACT_SUGAR_MODULE});
	# retrieve field (contact_id) value
	my $contact_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::CONTACT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'contact_id'});

	# retrieve event_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LINK_CONTACT_SUGAR_MODULE, 
									id => $link_contact_sugar_id, 
									module2 => Ncs::Db::DbDefs::EVENT_SUGAR_MODULE});
	# retrieve field (event_id) value
	my $event_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::EVENT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'event_id'});

	# retrieve instrument_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LINK_CONTACT_SUGAR_MODULE, 
									id => $link_contact_sugar_id, 
									module2 => Ncs::Db::DbDefs::INSTRUMENT_SUGAR_MODULE});
	# retrieve field (instrument_id) value
	my $instrument_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::INSTRUMENT_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'instrument_id'});

	# retrieve staff_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LINK_CONTACT_SUGAR_MODULE, 
									id => $link_contact_sugar_id, 
									module2 => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE});
	# retrieve field (staff_id) value
	my $staff_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::STAFF_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'staff_id'});

	# retrieve speciment_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LINK_CONTACT_SUGAR_MODULE, 
									id => $link_contact_sugar_id, 
									module2 => Ncs::Db::DbDefs::SPECIMEN_SUGAR_MODULE});
	# retrieve field (specimen_id) value
	my $speciment_id_field_value;
	if(defined($rel_id))
	{
		$speciment_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::SPECIMEN_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'specimen_id'});
	}
	else
	{
		# if no specimen collected
		$speciment_id_field_value = Ncs::Op::NOT_APPLICABLE;
	}

	# retrieve person_id relationship id
	$rel_id = $self->{_sugar_soap}->get_sugar_relationship_id({module1 => Ncs::Db::DbDefs::LINK_CONTACT_SUGAR_MODULE, 
									id => $link_contact_sugar_id, 
									module2 => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE});
	# retrieve field (person_id) value
	my $person_id_field_value = $self->{_sugar_soap}->get_field_value({module => Ncs::Db::DbDefs::PERSON_SUGAR_MODULE, 
									id => $rel_id, 
									field => 'person_id'});

	$self->{_psu_id}				= $psu_id_field_value;
	$self->{_contact_link_id}		= $values->{CONTACT_LINK_ID} || Ncs::Op::UNKNOWN;
	$self->{_contact_id}			= $contact_id_field_value;
	$self->{_event_id}				= $event_id_field_value;
	$self->{_instrument_id}			= $instrument_id_field_value;
	$self->{_staff_id}				= $staff_id_field_value;
	$self->{_specimen_id}			= $speciment_id_field_value;
	$self->{_person_id}				= $person_id_field_value;
	$self->{_create_date}			= $values->{CREATE_DATE} || Ncs::Op::UNKNOWN_DATE;
}

sub validate
{
	my $self = shift;

	return "PSU_ID column exceeds allowed character length" unless ( length($self->{_psu_id}) <= 36 );
	return "CONTACT_LINK_ID column exceeds allowed character length" unless ( length($self->{_contact_link_id}) <= 36 );
	return "CONTACT_ID column exceeds allowed character length" unless ( length($self->{_contact_id}) <= 36 );
	return "EVENT_ID column exceeds allowed character length" unless ( length($self->{_event_id}) <= 36 );
	return "INSTRUMENT_ID column exceeds allowed character length" unless ( length($self->{_instrument_id}) <= 36 );
	return "STAFF_ID column exceeds allowed character length" unless ( length($self->{_staff_id}) <= 36 );
	return "SPECIMEN_ID column exceeds allowed character length" unless ( length($self->{_specimen_id}) <= 36 );
	return "PERSON_ID column exceeds allowed character length" unless ( length($self->{_person_id}) <= 36 );
	return "CREATE_DATE column contains an invalid date format" unless ( $self->{_create_date} =~ /^\d{4}-\d{2}-\d{2}$/ );
	return "TABLE_SPEC_VERSION column exceeds allowed character length" unless ( length($self->{_table_spec_version}) <= 14 );

	return undef;
}

sub print_tag
{
	my $self = shift;

	my $out = sprintf("\t\t<link_contact>\n");
	$out .= sprintf("\t\t\t<psu_id>%s</psu_id>\n", $self->{_psu_id});
	$out .= sprintf("\t\t\t<contact_link_id>%s</contact_link_id>\n", $self->{_contact_link_id});
	$out .= sprintf("\t\t\t<contact_id>%s</contact_id>\n", $self->{_contact_id});
	$out .= sprintf("\t\t\t<event_id>%s</event_id>\n", $self->{_event_id});
	$out .= sprintf("\t\t\t<instrument_id>%s</instrument_id>\n", $self->{_instrument_id});
	$out .= sprintf("\t\t\t<staff_id>%s</staff_id>\n", $self->{_staff_id});
	$out .= sprintf("\t\t\t<speciment_id>%s</speciment_id>\n", $self->{_specimen_id});
	$out .= sprintf("\t\t\t<person_id>%s</person_id>\n", $self->{_person_id});
	$out .= sprintf("\t\t\t<create_date>%s</create_date>\n", $self->{_create_date});
	$out .= sprintf("\t\t\t<table_spec_version>%s</table_spec_version>\n", $self->{_table_spec_version});
	$out .= sprintf("\t\t\t<transactionType>%s</transactionType>\n", $self->{_transaction_type});
	$out .= sprintf("\t\t</link_contact>");

	return $out;
}

sub getPsuId						{ my $self = shift; return $self->{_psu_id} || ''; }
sub getContactLinkId				{ my $self = shift; return $self->{_contact_link_id} || ''; }
sub getContactId					{ my $self = shift; return $self->{_contact_id} || ''; }
sub getEventId						{ my $self = shift; return $self->{_event_id} || ''; }
sub getInstrumentId					{ my $self = shift; return $self->{_instrument_id} || ''; }
sub getStaffId						{ my $self = shift; return $self->{_staff_id} || ''; }
sub getSpecimenId					{ my $self = shift; return $self->{_specimen_id} || ''; }
sub getPersonId						{ my $self = shift; return $self->{_person_id} || ''; }
sub getCreateDate					{ my $self = shift; return $self->{_create_date} || ''; }
sub getTableSpecVersion				{ my $self = shift; return $self->{_table_spec_version} || ''; }
sub getTransactionType				{ my $self = shift; return $self->{_transaction_type} || ''; }
sub getSql							{ my $self = shift; return $self->{_sql} || ''; }
sub getTable						{ my $self = shift; return $self->{_table} || ''; }

1;
