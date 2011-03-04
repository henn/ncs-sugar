package lib::SugarDbHelper;

use strict;
use warnings;
use DBI;
use Data::Dumper;
use lib::Const;

###############################
#
# SugarCRM DB Helper package
#
###############################
#
# Methods:
#  get_sugar_relation_details()
#  get_study_center_id()
#  get_psu_id()
#  get_ssu_id()
#  insert_ssu()
#  insert_ssu_relationships()
#  insert_listing_unit()
#  insert_listing_relationships()
#  insert_dwelling_unit()
#  insert_dwelling_relationships()
#  insert_address()
#  insert_address_relationships()
#  get_guid()
#  get_sequence_id()
#  update_address_details()
#  insert_contact()
#  insert_contact_relationships()
#  get_dwelling_unit_sugar_id()
#  insert_non_interview_report()
#  insert_non_interview_report_relationships()
#  get_address_sugar_id()
#  insert_person()
#  insert_person_relationships()
#  insert_telephone()
#  insert_telephone_relationships()
#  insert_participant()
#  insert_participant_relationships()
#  insert_case()
#  insert_case_relationships()
#  insert_event()
#  insert_event_relationships()
#  insert_instrument()
#  insert_instrument_relationships()
#  insert_contact_link()
#  insert_person_participant_link()
#  insert_person_participant_link_relationships()
#  insert_household_unit()
#  insert_link_household_dwelling()
#  insert_link_household_dwelling_relationships()
#  insert_link_person_household()
#  insert_link_person_household_relationships()
#  get_address_id_from_view();
#  update_participant_type()
#  update_person_age()
#  trim()
# 
###############################

#
# database constants
#
use constant SUGAR_DNS						=> 'DBI:mysql:sugarCRM:mysql.sdsc.edu:3312';
#use constant SUGAR_DNS						=> 'DBI:mysql:sugarCRM:localhost';
use constant SUGAR_USERNAME					=> '';	# insert a user!!
use constant SUGAR_PASSWD					=> '';	# insert the user password!!

# relationship name constants
use constant SC_to_SSU 						=> 'geo_studycenter_geo_secondarysu';
use constant PSU_to_SSU 					=> 'geo_primarysu_geo_secondarysu';
use constant PSU_to_LISTING_UNIT	 		=> 'geo_primarysu_geo_listingunit';
use constant PSU_to_DWELLING_UNIT 			=> 'geo_primarysu_geo_dwellingunit';
use constant SSU_to_LISTING_UNIT 			=> 'geo_secondarysu_geo_listingunit';
use constant PSU_to_ADDRESS 				=> 'geo_primarysu_ltt_address';
## below comment out due to psu links not being implemented
##use constant PSU_to_CONTACT 				=> 'geo_primarysu_ncsdc_contact';
##use constant PSU_to_NIR 					=> 'geo_primarysu_ncsdc_non_interview_reprt';
##use constant PSU_to_PERSON 				=> 'geo_primarysu_plt_person';
##use constant PSU_to_TELEPHONE 			=> 'geo_primarysu_ltt_telephone';
##use constant PSU_to_PARTICIPANT 			=> 'geo_primarysu_plt_participant';
##use constant PSU_to_EVENT 				=> 'geo_primarysu_ncsdc_event';
##use constant PSU_to_INSTRUMENT 			=> 'geo_primarysu_ncsdc_instrumen';
##use constant PSU_to_CONTACT_LINK 			=> 'geo_primarysu_ncsdc_link_cont';
##use constant PSU_to_PERS_PART_LINK 		=> 'geo_primarysu_plt_link_person_participant';
##use constant PSU_to_HOUSEHOLD				=> 'geo_primarysu_geo_householdu';
##use constant PSU_to_HH_DU_LINK			=> 'geo_primarysu_geo_du_hh_link';
##use constant PSU_to_PERS_HH_LINK			=> 'geo_primarysu_plt_link_person_household';
use constant DWELLING_UNIT_to_LISTING_UNIT 	=> 'geo_dwellingunit_geo_listingunit';
use constant DWELLING_UNIT_to_ADDRESS 		=> 'geo_dwellingunit_ltt_address';
use constant DWELLING_UNIT_to_NIR			=> 'geo_dwellingunit_ncsdc_nir';
use constant DWELLING_to_HH_DU_LINK 		=> 'geo_dwellingunit_geo_du_hh_link';
use constant PERSON_to_ADDRESS				=> 'plt_person_ltt_address';
use constant PERSON_to_TELEPHONE			=> 'plt_person_ltt_telephone';
use constant PERSON_to_CONTACT_LINK			=> 'plt_person_ncsdc_link_contact';
use constant PERSON_to_PERS_PART_LINK 		=> 'plt_person_plt_lnkperspart';
use constant PERSON_to_PERS_HH_LINK 		=> 'plt_person_plt_lnkpershous';
use constant PARTICIPANT_to_PERS_PART_LINK 	=> 'plt_participant_plt_lnkperspart';
use constant PARTICIPANT_to_EVENT			=> 'plt_participant_ncsdc_event';
use constant EVENT_to_INSTRUMENT			=> 'ncsdc_event_ncsdc_instrument';
use constant EVENT_to_CONTACT_LINK			=> 'ncsdc_event_ncsdc_link_contact';
use constant INSTRUMENT_to_CONTACT_LINK 	=> 'ncsdc_instrument_ncsdc_link_contact';
use constant CONTACT_to_CONTACT_LINK 		=> 'ncsdc_contact_ncsdc_link_contact';
use constant CONTACT_to_NIR 				=> 'ncsdc_contact_ncsdc_nir';
use constant HOUSEHOLD_to_HH_DU_LINK 		=> 'geo_householdu_geo_du_hh_link';
use constant HOUSEHOLD_to_PERS_HH_LINK 		=> 'geo_householdu_plt_lnkpershous';
use constant CASE_to_PERSON 				=> 'cases_plt_person';
use constant CASE_to_PARTICIPANT			=> 'plt_participant_cases';
use constant CASE_to_HOUSEHOLD				=> 'geo_householdu_cases';

# sequence ID prefix
use constant LISTING_PREFIX 				=> 'LU';
use constant DWELLING_PREFIX				=> 'DU';
use constant ADDRESS_PREFIX					=> 'AD';
use constant CONTACT_PREFIX					=> 'CT';
use constant NIR_PREFIX						=> 'NI';
use constant PERSON_PREFIX					=> 'PG';
use constant PARTICIPANT_PREFIX				=> 'SP';
use constant TELEPHONE_PREFIX				=> 'TE';
use constant EVENT_PREFIX					=> 'ET';
use constant INSTRUMENT_PREFIX				=> 'IT';
use constant HOUSEHOLD_PREFIX				=> 'HU';
use constant DU_HH_LINK_PREFIX				=> 'DH';
use constant PERS_HH_LINK_PREFIX			=> 'PH';
use constant CONTACT_LINK_PREFIX 			=> 'CL';
use constant PERS_PART_LINK_PREFIX			=> 'PP';

sub new
{
	my ($class, $args) = @_;

	# If database connection details have been supplied, use them.  
	# Otherwise, use defaults.
	my $self = bless
	{
		_dns			=> (defined($args->{dbInfo})) ? $args->{dbInfo}->{dns} : SUGAR_DNS,
		_username		=> (defined($args->{dbInfo})) ? $args->{dbInfo}->{dbUsername} : SUGAR_USERNAME,
		_passwd			=> (defined($args->{dbInfo})) ? $args->{dbInfo}->{dbPassword} : SUGAR_PASSWD,
		_debug			=> $args->{debug},
		_relations		=> {}
	}, $class;

	$self->init();
	
	return $self;
}

###############################################################################
#
# init()
#
# A method to initialize required data.
#
# In particular, the sugar database relation details are retreived and stored.
#
###############################################################################
sub init
{
	my $self = shift;
	
	##
	## initialize all the relationships we are going to need
	##
	
	###
	# SC_to_SSU relation
	###
	my $rel_data = $self->get_sugar_relation_details(SC_to_SSU);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . SC_to_SSU . '. Does the relation exist?';
	}
	$self->{_relations}->{SC_to_SSU}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{SC_to_SSU}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{SC_to_SSU}->{'join_key_rhs'} = $rel_data->{join_key_rhs};
	
	###
	# PSU_to_SSU relation
	###
	$rel_data = $self->get_sugar_relation_details(PSU_to_SSU);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . PSU_to_SSU . '. Does the relation exist?';
	}
	$self->{_relations}->{PSU_to_SSU}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{PSU_to_SSU}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{PSU_to_SSU}->{'join_key_rhs'} = $rel_data->{join_key_rhs};
	
	###
	# PSU_to_LISTING_UNIT relation
	###
	$rel_data = $self->get_sugar_relation_details(PSU_to_LISTING_UNIT);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . PSU_to_LISTING_UNIT . '. Does the relation exist?';
	}
	$self->{_relations}->{PSU_to_LISTING_UNIT}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{PSU_to_LISTING_UNIT}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{PSU_to_LISTING_UNIT}->{'join_key_rhs'} = $rel_data->{join_key_rhs};
	
	###
	# SSU_to_LISTING_UNIT relation
	###
	$rel_data = $self->get_sugar_relation_details(SSU_to_LISTING_UNIT);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . SSU_to_LISTING_UNIT . '. Does the relation exist?';
	}
	$self->{_relations}->{SSU_to_LISTING_UNIT}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{SSU_to_LISTING_UNIT}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{SSU_to_LISTING_UNIT}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PSU_to_DWELLING_UNIT relation
	###
	$rel_data = $self->get_sugar_relation_details(PSU_to_DWELLING_UNIT);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . PSU_to_DWELLING_UNIT . '. Does the relation exist?';
	}
	$self->{_relations}->{PSU_to_DWELLING_UNIT}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{PSU_to_DWELLING_UNIT}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{PSU_to_DWELLING_UNIT}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# DWELLING_UNIT_to_LISTING_UNIT relation
	###
	$rel_data = $self->get_sugar_relation_details(DWELLING_UNIT_to_LISTING_UNIT);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . DWELLING_UNIT_to_LISTING_UNIT . '. Does the relation exist?';
	}
	$self->{_relations}->{DWELLING_UNIT_to_LISTING_UNIT}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{DWELLING_UNIT_to_LISTING_UNIT}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{DWELLING_UNIT_to_LISTING_UNIT}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PSU_to_ADDRESS relation
	###
	$rel_data = $self->get_sugar_relation_details(PSU_to_ADDRESS);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . PSU_to_ADDRESS . '. Does the relation exist?';
	}
	$self->{_relations}->{PSU_to_ADDRESS}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{PSU_to_ADDRESS}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{PSU_to_ADDRESS}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# DWELLING_UNIT_to_ADDRESS relation
	###
	$rel_data = $self->get_sugar_relation_details(DWELLING_UNIT_to_ADDRESS);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . DWELLING_UNIT_to_ADDRESS . '. Does the relation exist?';
	}
	$self->{_relations}->{DWELLING_UNIT_to_ADDRESS}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{DWELLING_UNIT_to_ADDRESS}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{DWELLING_UNIT_to_ADDRESS}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PSU_to_CONTACT relation
	###
	##$rel_data = $self->get_sugar_relation_details(PSU_to_CONTACT);
	##if ( !defined($rel_data) )
	##{
	##	die 'There was an error retrieving the relationship details ' .
	##	'for relation ' . PSU_to_CONTACT . '. Does the relation exist?';
	##}
	##$self->{_relations}->{PSU_to_CONTACT}->{'join_table'} = $rel_data->{join_table};
	##$self->{_relations}->{PSU_to_CONTACT}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	##$self->{_relations}->{PSU_to_CONTACT}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PSU_to_NIR relation
	###
	##$rel_data = $self->get_sugar_relation_details(PSU_to_NIR);
	##if ( !defined($rel_data) )
	##{
	##	die 'There was an error retrieving the relationship details ' .
	##	'for relation ' . PSU_to_NIR . '. Does the relation exist?';
	##}
	##self->{_relations}->{PSU_to_NIR}->{'join_table'} = $rel_data->{join_table};
	##$self->{_relations}->{PSU_to_NIR}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	##$self->{_relations}->{PSU_to_NIR}->{'join_key_rhs'} = $rel_data->{join_key_rhs};
	
	###
	# PSU_to_PERSON relation
	###
	##$rel_data = $self->get_sugar_relation_details(PSU_to_PERSON);
	##if ( !defined($rel_data) )
	##{
	##	die 'There was an error retrieving the relationship details ' .
	##	'for relation ' . PSU_to_PERSON . '. Does the relation exist?';
	##}
	##$self->{_relations}->{PSU_to_PERSON}->{'join_table'} = $rel_data->{join_table};
	##$self->{_relations}->{PSU_to_PERSON}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	##$self->{_relations}->{PSU_to_PERSON}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PSU_to_TELEPHONE relation
	###
	##$rel_data = $self->get_sugar_relation_details(PSU_to_TELEPHONE);
	##if ( !defined($rel_data) )
	##{
	##	die 'There was an error retrieving the relationship details ' .
	##	'for relation ' . PSU_to_TELEPHONE . '. Does the relation exist?';
	##}
	##$self->{_relations}->{PSU_to_TELEPHONE}->{'join_table'} = $rel_data->{join_table};
	##$self->{_relations}->{PSU_to_TELEPHONE}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	##$self->{_relations}->{PSU_to_TELEPHONE}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PSU_to_PARTICIPANT relation
	###
	##$rel_data = $self->get_sugar_relation_details(PSU_to_PARTICIPANT);
	##if ( !defined($rel_data) )
	##{
	##	die 'There was an error retrieving the relationship details ' .
	##	'for relation ' . PSU_to_PARTICIPANT . '. Does the relation exist?';
	##}
	##$self->{_relations}->{PSU_to_PARTICIPANT}->{'join_table'} = $rel_data->{join_table};
	##$self->{_relations}->{PSU_to_PARTICIPANT}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	##$self->{_relations}->{PSU_to_PARTICIPANT}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PSU_to_EVENT relation
	###
	##$rel_data = $self->get_sugar_relation_details(PSU_to_EVENT);
	##if ( !defined($rel_data) )
	##{
	##	die 'There was an error retrieving the relationship details ' .
	##	'for relation ' . PSU_to_EVENT . '. Does the relation exist?';
	##}
	##$self->{_relations}->{PSU_to_EVENT}->{'join_table'} = $rel_data->{join_table};
	##$self->{_relations}->{PSU_to_EVENT}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	##$self->{_relations}->{PSU_to_EVENT}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PSU_to_INSTRUMENT relation
	###
	##$rel_data = $self->get_sugar_relation_details(PSU_to_INSTRUMENT);
	##if ( !defined($rel_data) )
	##{
	##	die 'There was an error retrieving the relationship details ' .
	##	'for relation ' . PSU_to_INSTRUMENT . '. Does the relation exist?';
	##}
	##$self->{_relations}->{PSU_to_INSTRUMENT}->{'join_table'} = $rel_data->{join_table};
	##$self->{_relations}->{PSU_to_INSTRUMENT}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	##$self->{_relations}->{PSU_to_INSTRUMENT}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PSU_to_CONTACT_LINK relation
	###
	##$rel_data = $self->get_sugar_relation_details(PSU_to_CONTACT_LINK);
	##if ( !defined($rel_data) )
	##{
	##	die 'There was an error retrieving the relationship details ' .
	##	'for relation ' . PSU_to_CONTACT_LINK . '. Does the relation exist?';
	##}
	##$self->{_relations}->{PSU_to_CONTACT_LINK}->{'join_table'} = $rel_data->{join_table};
	##$self->{_relations}->{PSU_to_CONTACT_LINK}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	##$self->{_relations}->{PSU_to_CONTACT_LINK}->{'join_key_rhs'} = $rel_data->{join_key_rhs};
	
	###
	# PSU_to_PERS_PART_LINK relation
	###
	##$rel_data = $self->get_sugar_relation_details(PSU_to_PERS_PART_LINK);
	##if ( !defined($rel_data) )
	##{
	##	die 'There was an error retrieving the relationship details ' .
	##	'for relation ' . PSU_to_PERS_PART_LINK . '. Does the relation exist?';
	##}
	##$self->{_relations}->{PSU_to_PERS_PART_LINK}->{'join_table'} = $rel_data->{join_table};
	##$self->{_relations}->{PSU_to_PERS_PART_LINK}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	##$self->{_relations}->{PSU_to_PERS_PART_LINK}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PSU_to_HOUSEHOLD relation
	###
	##$rel_data = $self->get_sugar_relation_details(PSU_to_HOUSEHOLD);
	##if ( !defined($rel_data) )
	##{
	##	die 'There was an error retrieving the relationship details ' .
	##	'for relation ' . PSU_to_HOUSEHOLD . '. Does the relation exist?';
	##}
	##$self->{_relations}->{PSU_to_HOUSEHOLD}->{'join_table'} = $rel_data->{join_table};
	##$self->{_relations}->{PSU_to_HOUSEHOLD}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	##$self->{_relations}->{PSU_to_HOUSEHOLD}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# DWELLING_UNIT_to_NIR relation
	###
	$rel_data = $self->get_sugar_relation_details(DWELLING_UNIT_to_NIR);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . DWELLING_UNIT_to_NIR . '. Does the relation exist?';
	}
	$self->{_relations}->{DWELLING_UNIT_to_NIR}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{DWELLING_UNIT_to_NIR}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{DWELLING_UNIT_to_NIR}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PERSON_to_ADDRESS relation
	###
	$rel_data = $self->get_sugar_relation_details(PERSON_to_ADDRESS);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . PERSON_to_ADDRESS . '. Does the relation exist?';
	}
	$self->{_relations}->{PERSON_to_ADDRESS}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{PERSON_to_ADDRESS}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{PERSON_to_ADDRESS}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PERSON_to_TELEPHONE relation
	###
	$rel_data = $self->get_sugar_relation_details(PERSON_to_TELEPHONE);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . PERSON_to_TELEPHONE . '. Does the relation exist?';
	}
	$self->{_relations}->{PERSON_to_TELEPHONE}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{PERSON_to_TELEPHONE}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{PERSON_to_TELEPHONE}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PERSON_to_CONTACT_LINK relation
	###
	$rel_data = $self->get_sugar_relation_details(PERSON_to_CONTACT_LINK);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . PERSON_to_CONTACT_LINK . '. Does the relation exist?';
	}
	$self->{_relations}->{PERSON_to_CONTACT_LINK}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{PERSON_to_CONTACT_LINK}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{PERSON_to_CONTACT_LINK}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PERSON_to_PERS_PART_LINK relation
	###
	$rel_data = $self->get_sugar_relation_details(PERSON_to_PERS_PART_LINK);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . PERSON_to_PERS_PART_LINK . '. Does the relation exist?';
	}
	$self->{_relations}->{PERSON_to_PERS_PART_LINK}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{PERSON_to_PERS_PART_LINK}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{PERSON_to_PERS_PART_LINK}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PARTICIPANT_to_PERS_PART_LINK relation
	###
	$rel_data = $self->get_sugar_relation_details(PARTICIPANT_to_PERS_PART_LINK);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . PARTICIPANT_to_PERS_PART_LINK . '. Does the relation exist?';
	}
	$self->{_relations}->{PARTICIPANT_to_PERS_PART_LINK}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{PARTICIPANT_to_PERS_PART_LINK}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{PARTICIPANT_to_PERS_PART_LINK}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PARTICIPANT_to_EVENT relation
	###
	$rel_data = $self->get_sugar_relation_details(PARTICIPANT_to_EVENT);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . PARTICIPANT_to_EVENT . '. Does the relation exist?';
	}
	$self->{_relations}->{PARTICIPANT_to_EVENT}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{PARTICIPANT_to_EVENT}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{PARTICIPANT_to_EVENT}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# EVENT_to_INSTRUMENT relation
	###
	$rel_data = $self->get_sugar_relation_details(EVENT_to_INSTRUMENT);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . EVENT_to_INSTRUMENT . '. Does the relation exist?';
	}
	$self->{_relations}->{EVENT_to_INSTRUMENT}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{EVENT_to_INSTRUMENT}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{EVENT_to_INSTRUMENT}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# EVENT_to_CONTACT_LINK relation
	###
	$rel_data = $self->get_sugar_relation_details(EVENT_to_CONTACT_LINK);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . EVENT_to_CONTACT_LINK . '. Does the relation exist?';
	}
	$self->{_relations}->{EVENT_to_CONTACT_LINK}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{EVENT_to_CONTACT_LINK}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{EVENT_to_CONTACT_LINK}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# INSTRUMENT_to_CONTACT_LINK relation
	###
	$rel_data = $self->get_sugar_relation_details(INSTRUMENT_to_CONTACT_LINK);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . INSTRUMENT_to_CONTACT_LINK . '. Does the relation exist?';
	}
	$self->{_relations}->{INSTRUMENT_to_CONTACT_LINK}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{INSTRUMENT_to_CONTACT_LINK}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{INSTRUMENT_to_CONTACT_LINK}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# CONTACT_to_CONTACT_LINK relation
	###
	$rel_data = $self->get_sugar_relation_details(CONTACT_to_CONTACT_LINK);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . CONTACT_to_CONTACT_LINK . '. Does the relation exist?';
	}
	$self->{_relations}->{CONTACT_to_CONTACT_LINK}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{CONTACT_to_CONTACT_LINK}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{CONTACT_to_CONTACT_LINK}->{'join_key_rhs'} = $rel_data->{join_key_rhs};
		
	###
	# CONTACT_to_NIR relation
	###
	$rel_data = $self->get_sugar_relation_details(CONTACT_to_NIR);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . CONTACT_to_NIR . '. Does the relation exist?';
	}
	$self->{_relations}->{CONTACT_to_NIR}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{CONTACT_to_NIR}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{CONTACT_to_NIR}->{'join_key_rhs'} = $rel_data->{join_key_rhs};
	
	###
	# PSU_to_HH_DU_LINK relation
	###
	##$rel_data = $self->get_sugar_relation_details(PSU_to_HH_DU_LINK);
	##if ( !defined($rel_data) )
	##{
	##	die 'There was an error retrieving the relationship details ' .
	##	'for relation ' . PSU_to_HH_DU_LINK . '. Does the relation exist?';
	##}
	##$self->{_relations}->{PSU_to_HH_DU_LINK}->{'join_table'} = $rel_data->{join_table};
	##$self->{_relations}->{PSU_to_HH_DU_LINK}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	##$self->{_relations}->{PSU_to_HH_DU_LINK}->{'join_key_rhs'} = $rel_data->{join_key_rhs};
	
	###
	# HOUSEHOLD_to_HH_DU_LINK relation
	###
	$rel_data = $self->get_sugar_relation_details(HOUSEHOLD_to_HH_DU_LINK);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . HOUSEHOLD_to_HH_DU_LINK . '. Does the relation exist?';
	}
	$self->{_relations}->{HOUSEHOLD_to_HH_DU_LINK}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{HOUSEHOLD_to_HH_DU_LINK}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{HOUSEHOLD_to_HH_DU_LINK}->{'join_key_rhs'} = $rel_data->{join_key_rhs};
	
	###
	# DWELLING_to_HH_DU_LINK relation
	###
	$rel_data = $self->get_sugar_relation_details(DWELLING_to_HH_DU_LINK);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . DWELLING_to_HH_DU_LINK . '. Does the relation exist?';
	}
	$self->{_relations}->{DWELLING_to_HH_DU_LINK}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{DWELLING_to_HH_DU_LINK}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{DWELLING_to_HH_DU_LINK}->{'join_key_rhs'} = $rel_data->{join_key_rhs};

	###
	# PSU_to_PERS_HH_LINK relation
	###
	##$rel_data = $self->get_sugar_relation_details(PSU_to_PERS_HH_LINK);
	##if ( !defined($rel_data) )
	##{
	##	die 'There was an error retrieving the relationship details ' .
	##	'for relation ' . PSU_to_PERS_HH_LINK . '. Does the relation exist?';
	##}
	##$self->{_relations}->{PSU_to_PERS_HH_LINK}->{'join_table'} = $rel_data->{join_table};
	##$self->{_relations}->{PSU_to_PERS_HH_LINK}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	##$self->{_relations}->{PSU_to_PERS_HH_LINK}->{'join_key_rhs'} = $rel_data->{join_key_rhs};
	
	###
	# PERSON_to_PERS_HH_LINK relation
	###
	$rel_data = $self->get_sugar_relation_details(PERSON_to_PERS_HH_LINK);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . PERSON_to_PERS_HH_LINK . '. Does the relation exist?';
	}
	$self->{_relations}->{PERSON_to_PERS_HH_LINK}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{PERSON_to_PERS_HH_LINK}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{PERSON_to_PERS_HH_LINK}->{'join_key_rhs'} = $rel_data->{join_key_rhs};
	
	###
	# HOUSEHOLD_to_PERS_HH_LINK relation
	###
	$rel_data = $self->get_sugar_relation_details(HOUSEHOLD_to_PERS_HH_LINK);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . HOUSEHOLD_to_PERS_HH_LINK . '. Does the relation exist?';
	}
	$self->{_relations}->{HOUSEHOLD_to_PERS_HH_LINK}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{HOUSEHOLD_to_PERS_HH_LINK}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{HOUSEHOLD_to_PERS_HH_LINK}->{'join_key_rhs'} = $rel_data->{join_key_rhs};
	
	###
	# CASE_to_PERSON relation
	###
	$rel_data = $self->get_sugar_relation_details(CASE_to_PERSON);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . CASE_to_PERSON . '. Does the relation exist?';
	}
	$self->{_relations}->{CASE_to_PERSON}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{CASE_to_PERSON}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{CASE_to_PERSON}->{'join_key_rhs'} = $rel_data->{join_key_rhs};
		
	###
	# CASE_to_PARTICIPANT relation
	###
	$rel_data = $self->get_sugar_relation_details(CASE_to_PARTICIPANT);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . CASE_to_PARTICIPANT . '. Does the relation exist?';
	}
	$self->{_relations}->{CASE_to_PARTICIPANT}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{CASE_to_PARTICIPANT}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{CASE_to_PARTICIPANT}->{'join_key_rhs'} = $rel_data->{join_key_rhs};
	
	###
	# CASE_to_HOUSEHOLD relation
	###
	$rel_data = $self->get_sugar_relation_details(CASE_to_HOUSEHOLD);
	if ( !defined($rel_data) )
	{
		die 'There was an error retrieving the relationship details ' .
		'for relation ' . CASE_to_HOUSEHOLD . '. Does the relation exist?';
	}
	$self->{_relations}->{CASE_to_HOUSEHOLD}->{'join_table'} = $rel_data->{join_table};
	$self->{_relations}->{CASE_to_HOUSEHOLD}->{'join_key_lhs'} = $rel_data->{join_key_lhs};
	$self->{_relations}->{CASE_to_HOUSEHOLD}->{'join_key_rhs'} = $rel_data->{join_key_rhs};
	
	###
	print(Dumper($self->{_relations})) if($self->{_debug});
}

###############################################################################
#
# get_sugar_relation_details()
#
# A method to retrieve sugar database relationship details given a 
# relationship name.
#
###############################################################################
sub get_sugar_relation_details
{
	my $self = shift;
	my $relationship_name = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "SELECT join_table, join_key_lhs, join_key_rhs" .
				" FROM relationships where relationship_name =" . 
				" '${relationship_name}' and deleted = 0 LIMIT 1";

	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare header statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute() or return undef;
	
	#
	# fetch result
	#	
	my $row = $sth->fetchrow_hashref() or return undef;
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return result
	#	
	return $row;
}

###############################################################################
#
# get_study_center_id()
#
# A method to retrieve the sugar id for the supplied study center id.
#
###############################################################################
sub get_study_center_id
{
	my $self = shift;
	my $sc_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "SELECT id FROM geo_studycenter where sc_id = '${sc_id}'" .
				" and deleted = 0 LIMIT 1";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare study center statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute() or return undef;
	
	#
	# fetch result
	#	
	my $row = $sth->fetchrow_hashref();
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return result
	#	
	return $row->{id};
}

###############################################################################
#
# get_psu_id()
#
# A method to retrieve the sugar id for the supplied PSU id.
#
###############################################################################
sub get_psu_id
{
	my $self = shift;
	my $psu_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "SELECT id, name, recruit_type FROM geo_primarysu where psu_id = '${psu_id}'" . 
				" and deleted = 0 LIMIT 1";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare PSU statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute() or return undef;
	
	#
	# fetch result
	#	
	my $row = $sth->fetchrow_hashref();
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return result
	#	
	return ($row->{id}, $row->{name}, $row->{recruit_type});
}

###############################################################################
#
# get_ssu_id()
#
# A method to retrieve the sugar id for the supplied SSU id.
#
###############################################################################
sub get_ssu_id
{
	my $self = shift;
	my $ssu_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "SELECT id FROM geo_secondarysu where ssu_id = '${ssu_id}'" .
				" and deleted = 0 LIMIT 1";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare SSU statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute() or return undef;
	
	#
	# fetch result
	#	
	my $row = $sth->fetchrow_hashref();
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return result
	#	
	return $row->{id};
}

###############################################################################
#
# insert_ssu()
#
# A method to insert a new ssu record and return the sugar id of new record.
#
###############################################################################
sub insert_ssu
{
	my $self = shift;
	my $ssu_id = shift;
	my $ssu_name = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return undef;
	
	#
	# create ssu insert sql with guid
	#
	my $insert_sql = "insert into geo_secondarysu(id, name, date_entered," .
						" date_modified, deleted, ssu_id)" .
						" values(?, ?, utc_timestamp(), utc_timestamp(), 0, ?)";
						
	print "insert ssu sql:$insert_sql\n" if($self->{_debug});
	
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($insert_sql);

	if (! defined($sth)) {
		print "Failed to prepare ssu insert statement.\n";
		$dbh->disconnect();
		return (undef, undef);
	}
	
	#
	# execute query
	#	
	$sth->execute($guid, $ssu_name, $ssu_id) or return undef;
		
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return ssu sugar id
	#
	return $guid;
}

###############################################################################
#
# insert_ssu_relationships()
#
# A method to insert the SSU relationships.
#
###############################################################################
sub insert_ssu_relationships
{
	my $self = shift;
	my $ssu_id = shift;
	my $sc_id = shift;
	my $psu_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for SC to SSU relation
	#
	my $guid = $self->get_guid() || return undef;

	#
	# create SC to SSU relation
	#
	my $sql = 'insert into ' . $self->{_relations}->{SC_to_SSU}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{SC_to_SSU}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{SC_to_SSU}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${sc_id}', '${ssu_id}')";
						 
	print "insert ssu relation sql:$sql\n" if($self->{_debug});
				
	#
	# execute sql to insert SC to SSU relation
	#
	$dbh->do($sql) or die "****Error: There was an error inserting SC to SSU relation\n";
	
	#
	# retrieve guid for PSU to SSU relation
	#
	$guid = $self->get_guid() || return undef;

	#
	# create PSU to SSU relation
	#
	$sql = 'insert into ' . $self->{_relations}->{PSU_to_SSU}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{PSU_to_SSU}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{PSU_to_SSU}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${psu_id}', '${ssu_id}')";
						 
	print "insert ssu relation sql:$sql\n" if($self->{_debug});
				
	#
	# execute sql to insert PSU to SSU relation
	#
	$dbh->do($sql) or die "****Error: There was an error inserting PSU to SSU relation\n";

	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}

###############################################################################
#
# insert_listing_unit()
#
# A method to insert a new listing unit record and return the sugar id of new 
# record and also the generated listing id.
#
###############################################################################
sub insert_listing_unit
{
	my $self = shift;
	my $line_nbr = shift;
	my $comment = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve listing unit id
	#
	my $listing_id = $self->get_sequence_id(LISTING_PREFIX) || return (undef, undef);
	
	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return (undef, undef);
	
	#
	# create listing unit insert sql
	#
	my $insert_sql = "insert into geo_listingunit(id, name, date_entered," .
						" date_modified, deleted, list_id, list_line, list_source," .
						" list_comment)" .
						" values(?, ?, utc_timestamp(), utc_timestamp(), 0, ?, ?, '2', ?)";
				
	print "insert listing unit sql:$insert_sql\n" if($self->{_debug});

	#
	# prepare query
	#					
	my $sth = $dbh->prepare($insert_sql);

	if (! defined($sth)) {
		print "Failed to prepare listing unit statement.\n";
		$dbh->disconnect();
		return (undef, undef);
	}
	
	#
	# execute query
	#	
	$sth->execute($guid, $listing_id, $listing_id, $line_nbr, $comment) 
		or return (undef, undef);
		
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return ssu sugar id
	#
	return ($guid, $listing_id);
}

###############################################################################
#
# insert_listing_relationships()
#
# A method to insert the listing units relationships.
#
###############################################################################
sub insert_listing_relationships
{
	my $self = shift;
	my $listing_sugar_id = shift;
	my $psu_sugar_id = shift;
	my $ssu_sugar_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for PSU to LISTING_UNIT relation
	#
	my $guid = $self->get_guid() || return undef;

	#
	# create PSU to LISTING_UNIT relation sql
	#
	my $sql = 'insert into ' . $self->{_relations}->{PSU_to_LISTING_UNIT}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{PSU_to_LISTING_UNIT}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{PSU_to_LISTING_UNIT}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${psu_sugar_id}', '${listing_sugar_id}')";
						 
	print "insert listing unit relation sql:$sql\n" if($self->{_debug});
				
	#
	# execute sql to insert PSU to LISTING_UNIT relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting PSU_to_LISTING_UNIT " .
							"relation for listing unit sugar id ${listing_sugar_id}\n";
	
	#
	# retrieve guid for SSU_to_LISTING_UNIT relation
	#
	$guid = $self->get_guid() || return undef;

	#
	# create SSU_to_LISTING_UNIT relation sql
	#
	$sql = 'insert into ' . $self->{_relations}->{SSU_to_LISTING_UNIT}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{SSU_to_LISTING_UNIT}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{SSU_to_LISTING_UNIT}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${ssu_sugar_id}', '${listing_sugar_id}')";
						 
	print "insert listing unit relation sql:$sql\n" if($self->{_debug});
				
	#
	# execute sql to insert SSU_to_LISTING_UNIT relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting SSU_to_LISTING_UNIT " .
							"relation for listing unit sugar id ${listing_sugar_id}\n";

	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}

###############################################################################
#
# insert_dwelling_unit()
#
# A method to insert a new dwelling unit record and return the sugar id of new 
# record and also the generated dwelling id.
#
###############################################################################
sub insert_dwelling_unit
{
	my $self = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve dwellimg unit id
	#
	my $dwelling_id = $self->get_sequence_id(DWELLING_PREFIX) || return (undef, undef);
	
	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return (undef, undef);
	
	#
	# create dwelling unit insert sql
	#
	my $insert_sql = "insert into geo_dwellingunit(id, name, date_entered, date_modified," .
						" deleted, du_id, duplicate_du, missed_du, du_ineligible, du_access)" .
						" values('${guid}', '${dwelling_id}', utc_timestamp(), utc_timestamp(), 0, '${dwelling_id}'," .
						" '2', '2', '2', '2')";
				
	#
	# execute sql to insert ssu record
	#
	$dbh->do($insert_sql) or return (undef, undef);
	
	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return ssu sugar id
	#
	return ($guid, $dwelling_id);
}

###############################################################################
#
# insert_dwelling_relationships()
#
# A method to insert the dwelling units relationships.
#
###############################################################################
sub insert_dwelling_relationships
{
	my $self = shift;
	my $dwelling_sugar_id = shift;
	my $psu_sugar_id = shift;
	my $listing_sugar_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for PSU_to_DWELLING_UNIT relation
	#
	my $guid = $self->get_guid() || return undef;

	#
	# create PSU_to_DWELLING_UNIT relation sql
	#
	my $sql = 'insert into ' . $self->{_relations}->{PSU_to_DWELLING_UNIT}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{PSU_to_DWELLING_UNIT}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{PSU_to_DWELLING_UNIT}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${psu_sugar_id}', '${dwelling_sugar_id}')";

	#
	# execute sql to insert PSU_to_DWELLING_UNIT relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting PSU_to_DWELLING_UNIT " .
							"relation for dwelling unit sugar id ${dwelling_sugar_id}\n";
	
	# listing unit may not have been supplied
	if ( defined($listing_sugar_id) ) {
	
		#
		# retrieve guid for DWELLING_UNIT_to_LISTING_UNIT relation
		#
		$guid = $self->get_guid() || return undef;

		#
		# create DWELLING_UNIT_to_LISTING_UNIT relation sql
		#
		$sql = 'insert into ' . $self->{_relations}->{DWELLING_UNIT_to_LISTING_UNIT}->{'join_table'} . 
					'(id, date_modified, deleted, ' .
					$self->{_relations}->{DWELLING_UNIT_to_LISTING_UNIT}->{'join_key_lhs'} . ', ' . 
					$self->{_relations}->{DWELLING_UNIT_to_LISTING_UNIT}->{'join_key_rhs'} . ') ' .
					"values('${guid}', utc_timestamp(), 0, '${dwelling_sugar_id}', '${listing_sugar_id}')";
							 
		#
		# execute sql to insert DWELLING_UNIT_to_LISTING_UNIT relation
		#
		$dbh->do($sql) or warn "****Error: There was an error inserting DWELLING_UNIT_to_LISTING_UNIT " .
								"relation for listing unit sugar id ${listing_sugar_id}\n";
	}
	
	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}

###############################################################################
#
# insert_address()
#
# A method to insert a new address record and return the sugar id of new 
# record and also the generated address id.
#
###############################################################################
sub insert_address
{
	my $self = shift;
	my $block_nbr = shift; 
	my $addr_1 = shift;
	my $addr_2 = shift;
	my $unit_nbr = shift;
	my $comment = shift;
	my $city = shift;
	my $state = shift;
	my $zip = shift;
	my $zip4 = shift;
	my $prefix = shift;
	my $postfix = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve address id
	#
	my $address_id = $self->get_sequence_id(ADDRESS_PREFIX) || return (undef, undef);
	
	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return (undef, undef);
	
	#
	# create address insert sql
	#
	my $insert_sql = "insert into ltt_address(id, name, date_entered, date_modified," .
						" deleted, address_id, address_rank, address_info_source, address_info_mode," .
						" address_info_date, address_info_update, address_start_date," .
						" address_end_date, address_1, address_2, unit, city, state, zip," .
						" zip4, address_comment, block, prefix, postfix)" .
						" values(?, ?, utc_timestamp(), utc_timestamp(), 0, ?, '1', '8', '1', utc_timestamp(), utc_timestamp()," .
						" '9666-96-96', '9666-96-96', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

	#
	# prepare query
	#					
	my $sth = $dbh->prepare($insert_sql);

	if (! defined($sth)) {
		print "Failed to prepare dwelling unit statement.\n";
		$dbh->disconnect();
		return (undef, undef);
	}
	
	#
	# execute query
	#	
	$sth->execute($guid, $addr_1, $address_id, $addr_1, $addr_2, $unit_nbr, $city, 
					$state, $zip, $zip4, $comment, $block_nbr, $prefix, $postfix) 
		or return (undef, undef);
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return ssu sugar id
	#
	return ($guid, $address_id);
}

###############################################################################
#
# insert_address_relationships()
#
# A method to insert the address relationships.
#
###############################################################################
sub insert_address_relationships
{
	my $self = shift;
	my $address_sugar_id = shift;
	my $psu_sugar_id = shift;
	my $dwelling_sugar_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for PSU_to_ADDRESS relation
	#
	my $guid = $self->get_guid() || return undef;

	#
	# create PSU_to_ADDRESS relation sql
	#
	my $sql = 'insert into ' . $self->{_relations}->{PSU_to_ADDRESS}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{PSU_to_ADDRESS}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{PSU_to_ADDRESS}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${psu_sugar_id}', '${address_sugar_id}')";

	#
	# execute sql to insert PSU_to_ADDRESS relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting PSU_to_ADDRESS " .
							"relation for address sugar id ${address_sugar_id}\n";
	
	#
	# retrieve guid for DWELLING_UNIT_to_ADDRESS relation
	#
	$guid = $self->get_guid() || return undef;

	#
	# create DWELLING_UNIT_to_ADDRESS relation sql
	#
	$sql = 'insert into ' . $self->{_relations}->{DWELLING_UNIT_to_ADDRESS}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{DWELLING_UNIT_to_ADDRESS}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{DWELLING_UNIT_to_ADDRESS}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${dwelling_sugar_id}', '${address_sugar_id}')";
						 
	#
	# execute sql to insert DWELLING_UNIT_to_ADDRESS relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting DWELLING_UNIT_to_ADDRESS " .
							"relation for address sugar id ${address_sugar_id}\n";

	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}

###############################################################################
#
# get_guid()
#
# A method to create and return a guid.
#
###############################################################################
sub get_guid
{
	my $self = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query to retrieve guid
	#
	my $uuid_sql = "select uuid() as 'GUID' from dual LIMIT 1";
				
	#
	# prepare guid query
	#					
	my $sth = $dbh->prepare($uuid_sql);

	if (! defined($sth)) {
		print "Failed to prepare guid statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute guid query
	#	
	$sth->execute() or return undef;
	
	#
	# fetch guid
	#	
	my $row = $sth->fetchrow_hashref();
	my $guid = $row->{GUID} || return undef;

	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	return $guid;
}

###############################################################################
#
# get_sequence_id()
#
# A method to create and return a sequence id.
#
###############################################################################
sub get_sequence_id
{
	my $self = shift;
	my $prefix = shift;
	my $name;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# define the sequence name
	#
	if ($prefix eq LISTING_PREFIX) {
		$name = 'listing_unit_id';
	} elsif ($prefix eq DWELLING_PREFIX) {
		$name = 'dwelling_unit_id';
	} elsif ($prefix eq ADDRESS_PREFIX) {
		$name = 'address_id';
	} elsif ($prefix eq CONTACT_PREFIX) {
		$name = 'contact_id';	
	} elsif ($prefix eq NIR_PREFIX) {
		$name = 'non_interview_report_id';
	} elsif ($prefix eq PERSON_PREFIX) {
		$name = 'person_id';
	} elsif ($prefix eq PARTICIPANT_PREFIX) {
		$name = 'participant_id';
	} elsif ($prefix eq TELEPHONE_PREFIX) {
		$name = 'telephone_id';
	} elsif ($prefix eq EVENT_PREFIX) {
		$name = 'event_id';
	} elsif ($prefix eq HOUSEHOLD_PREFIX) {
		$name = 'household_unit_id';
	} elsif ($prefix eq INSTRUMENT_PREFIX) {
		$name = 'instrument_id';
	} elsif ($prefix eq CONTACT_LINK_PREFIX) {
		$name = 'contact_linkage_id';
	} elsif ($prefix eq PERS_PART_LINK_PREFIX) {
		$name = 'person_participant_linkage_id';
	} elsif ($prefix eq DU_HH_LINK_PREFIX) {
		$name = 'dwelling_household_linkage_id';
	} elsif ($prefix eq PERS_HH_LINK_PREFIX) {
		$name = 'person_household_linkage_id';
	} else {
		$name = '';
	}

	#
	# construct query to retrieve sequence
	#
	my $uuid_sql = "select sugarCRM.get_next_value('${name}') as SEQUENCE_ID";
				
	#
	# prepare sequence query
	#					
	my $sth = $dbh->prepare($uuid_sql);

	if (! defined($sth)) {
		print "Failed to prepare sequence statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute sequence query
	#	
	$sth->execute() or return undef;
	
	#
	# fetch sequence
	#	
	my $row = $sth->fetchrow_hashref();
	my $sequence = $row->{SEQUENCE_ID} || return undef;

	#
	# format and return sequence as an id
	#
	$sequence = $prefix . sprintf("%06d", $sequence);
	
	print "Returning sequence id:$sequence\n" if($self->{_debug});
	
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	return $sequence;
}

###############################################################################
#
# update_address_details()
#
# A method to update the address details for a sugar record.
#
###############################################################################
sub update_address_details
{
	my $self = shift;
	my $address = shift;

	# strip spaces
	$address->{ADDRESS_1} = $self->trim($address->{ADDRESS_1});
	$address->{ADDRESS_2} = $self->trim($address->{ADDRESS_2});
	$address->{UNIT} = $self->trim($address->{UNIT});
	$address->{CITY} = $self->trim($address->{CITY});
	$address->{ZIP} = $self->trim($address->{ZIP});
	$address->{ZIP4} = $self->trim($address->{ZIP4});
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# execute updates (do not update state, it will all be CA)
	#
	my $sql = "update ltt_address set name = '" . $address->{ADDRESS_1} . "' where name <> '" . 
				$address->{ADDRESS_1} . "' and address_id = '" . $address->{ADDRESS_ID} . "' and deleted = 0" . 
				" LIMIT 1";
	$dbh->do($sql);
	
	$sql = "update ltt_address set address_1 = '" . $address->{ADDRESS_1} . "' where address_1 <> '" . 
				$address->{ADDRESS_1} . "' and address_id = '" . $address->{ADDRESS_ID} . "' and deleted = 0" . 
				" LIMIT 1";
	$dbh->do($sql);
	
	$sql = "update ltt_address set address_2 = '" . $address->{ADDRESS_2} . "' where address_2 <> '" . 
				$address->{ADDRESS_2} . "' and address_id = '" . $address->{ADDRESS_ID} . "' and deleted = 0" .
				" LIMIT 1";
	$dbh->do($sql);
	
	$sql = "update ltt_address set unit = '" . $address->{UNIT} . "' where unit <> '" . 
				$address->{UNIT} . "' and address_id = '" . $address->{ADDRESS_ID} . "' and deleted = 0" .
				" LIMIT 1";
	$dbh->do($sql);
	
	$sql = "update ltt_address set city = '" . $address->{CITY} . "' where city <> '" . 
				$address->{CITY} . "' and address_id = '" . $address->{ADDRESS_ID} . "' and deleted = 0" .
				" LIMIT 1";
	$dbh->do($sql);
	
	$sql = "update ltt_address set zip = '" . $address->{ZIP} . "' where zip <> '" . 
				$address->{ZIP} . "' and address_id = '" . $address->{ADDRESS_ID} . "' and deleted = 0" .
				" LIMIT 1";
	$dbh->do($sql);
	
	$sql = "update ltt_address set zip4 = '" . $address->{ZIP4} . "' where zip4 <> '" . 
				$address->{ZIP4} . "' and address_id = '" . $address->{ADDRESS_ID} . "' and deleted = 0" .
				" LIMIT 1";
	$dbh->do($sql);
	
	print "Address details updated for " . $address->{ADDRESS_ID} . "\n" if($self->{_debug});
	
	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return ssu sugar id
	#
	return;
}

###############################################################################
#
# insert_contact()
#
# A method to insert a new contact record and return the sugar id of new 
# record and also the generated contact id.
#
###############################################################################
sub insert_contact
{
	my $self = shift;
	my $contact_start_time = shift;
	my $contact_end_time = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve contact id
	#
	my $contact_id = $self->get_sequence_id(CONTACT_PREFIX) || return (undef, undef);
	
	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return (undef, undef);
	
	#
	# create contact insert sql
	#
	my $insert_sql = "insert into ncsdc_contact(id, name, contact_id, contact_disp, contact_type," .
						" contact_date, contact_start_time, contact_end_time," .
						" contact_lang, contact_interpret," .
						" contact_location, contact_private, who_contacted," .
						" date_entered, date_modified)" .
						" values(?, ?, ?, ?, ?, DATE(?), ?, ?, ?, ?, ?, ?, ?, utc_timestamp(), utc_timestamp())";
						
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($insert_sql);

	if (! defined($sth)) {
		print "Failed to prepare contact statement.\n";
		$dbh->disconnect();
		return (undef, undef);
	}
	
	#
	# execute query
	#	
	$sth->execute($guid, $contact_id, $contact_id, lib::Const::INTERVIEW_COMPLETE, lib::Const::IN_PERSON,
					$contact_start_time, $contact_start_time, $contact_end_time, 
					lib::Const::ENGLISH, lib::Const::NO_TRANSLATION,
					lib::Const::PERS_HOME, lib::Const::NO, lib::Const::HH_MEMBER) 
		or return (undef, undef);
		
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return contact ids
	#
	return ($guid, $contact_id);
}

###############################################################################
#
# insert_contact_relationships()
#
# A method to insert the contact relationships.
#
###############################################################################
sub insert_contact_relationships
{
	my $self = shift;
	my $contact_sugar_id = shift;
	my $psu_sugar_id = shift;
	
	#
	# login to db
	#
	##my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
	##	or die("Unable to connect to database: $DBI::errstr");
	##die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for PSU_to_CONTACT relation
	#
	##my $guid = $self->get_guid() || return undef;

	#
	# create PSU_to_CONTACT relation sql
	#
	##my $sql = 'insert into ' . $self->{_relations}->{PSU_to_CONTACT}->{'join_table'} . 
	##			'(id, date_modified, deleted, ' .
	##			$self->{_relations}->{PSU_to_CONTACT}->{'join_key_lhs'} . ', ' . 
	##			$self->{_relations}->{PSU_to_CONTACT}->{'join_key_rhs'} . ') ' .
	##			"values('${guid}', utc_timestamp(), 0, '${psu_sugar_id}', '${contact_sugar_id}')";

	#
	# execute sql to insert PSU_to_CONTACT relation
	#
	##$dbh->do($sql) or warn "****Error: There was an error inserting PSU_to_CONTACT " .
	##						"relation for contact sugar id ${contact_sugar_id}\n";
	
	#
	# clean up
	#
	##$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}

###############################################################################
#
# get_dwelling_unit_sugar_id()
#
# A method to retrieve the sugar id for the supplied DU ID.
#
###############################################################################
sub get_dwelling_unit_sugar_id
{
	my $self = shift;
	my $du_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "SELECT id FROM geo_dwellingunit where du_id = ?" .
				" and deleted = 0 LIMIT 1";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare get du sugar id statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute($du_id) or return undef;
	
	#
	# fetch result
	#	
	my $row = $sth->fetchrow_hashref();
	my $du_sugar_id = $row->{id} or undef;
	
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return result
	#	
	return $du_sugar_id;
}

###############################################################################
#
# insert_non_interview_report()
#
# A method to insert a non-interview report record and return the sugar id of new 
# record and also the generated NIR id.
#
###############################################################################
sub insert_non_interview_report
{
	my $self = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve NIR id
	#
	my $nir_id = $self->get_sequence_id(NIR_PREFIX) || return (undef, undef);
	
	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return (undef, undef);
	
	#
	# create nir insert sql
	#
	my $insert_sql = "insert into ncsdc_nir(id, name, nir_id, who_refused," .
						" nir_other, date_entered, date_modified)" .
						" values(?, ?, ?, ?, ?, utc_timestamp(), utc_timestamp())";

	#
	# prepare query
	#					
	my $sth = $dbh->prepare($insert_sql);

	if (! defined($sth)) {
		print "Failed to prepare non interview report statement.\n";
		$dbh->disconnect();
		return (undef, undef);
	}
	
	#
	# execute query
	#	
	$sth->execute($guid, $nir_id, $nir_id, lib::Const::NIR_HH_MEMBER, lib::Const::NIR_OTHER)
		or return (undef, undef);
		
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return NIR ids
	#
	return ($guid, $nir_id);
}

###############################################################################
#
# insert_non_interview_report_relationships()
#
# A method to insert the non-interview report relationships.
#
###############################################################################
sub insert_non_interview_report_relationships
{
	my $self = shift;
	my $nir_sugar_id = shift;
	my $psu_sugar_id = shift;
	my $contact_sugar_id = shift;
	my $du_sugar_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for PSU_to_NIR relation
	#
	##my $guid = $self->get_guid() || return undef;

	#
	# create PSU_to_NIR relation sql
	#
	##my $sql = 'insert into ' . $self->{_relations}->{PSU_to_NIR}->{'join_table'} . 
	##			'(id, date_modified, deleted, ' .
	##			$self->{_relations}->{PSU_to_NIR}->{'join_key_lhs'} . ', ' . 
	##			$self->{_relations}->{PSU_to_NIR}->{'join_key_rhs'} . ') ' .
	##			"values('${guid}', utc_timestamp(), 0, '${psu_sugar_id}', '${nir_sugar_id}')";

	#
	# execute sql to insert PSU_to_NIR relation
	#
	##$dbh->do($sql) or warn "****Error: There was an error inserting PSU_to_NIR " .
	##						"relation for NIR sugar id ${nir_sugar_id}\n";
	
	#
	# retrieve guid for CONTACT_to_NIR relation
	#
	my $guid = $self->get_guid() || return undef;

	#
	# create CONTACT_to_NIR relation sql
	#
	my $sql = 'insert into ' . $self->{_relations}->{CONTACT_to_NIR}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{CONTACT_to_NIR}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{CONTACT_to_NIR}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${contact_sugar_id}', '${nir_sugar_id}')";

	#
	# execute sql to insert CONTACT_to_NIR relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting CONTACT_to_NIR " .
							"relation for NIR sugar id ${contact_sugar_id}\n";
							
	#
	# retrieve guid for DWELLING_UNIT_to_NIR relation
	#
	$guid = $self->get_guid() || return undef;

	#
	# create DWELLING_UNIT_to_NIR relation sql
	#
	$sql = 'insert into ' . $self->{_relations}->{DWELLING_UNIT_to_NIR}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{DWELLING_UNIT_to_NIR}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{DWELLING_UNIT_to_NIR}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${du_sugar_id}', '${nir_sugar_id}')";

	#
	# execute sql to insert DWELLING_UNIT_to_NIR relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting DWELLING_UNIT_to_NIR " .
							"relation for NIR sugar id ${contact_sugar_id}\n";

	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}

###############################################################################
#
# get_address_sugar_id()
#
# A method to retrieve the sugar id for the supplied ADDRESS ID.
#
###############################################################################
sub get_address_sugar_id
{
	my $self = shift;
	my $address_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "SELECT id FROM ltt_address where address_id = ?" .
				" and deleted = 0 LIMIT 1";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare get address sugar id statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute($address_id) or return undef;
	
	#
	# fetch result
	#	
	my $row = $sth->fetchrow_hashref();
	my $address_sugar_id = $row->{id};
	
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return result
	#	
	return $address_sugar_id;
}

###############################################################################
#
# insert_person()
#
# A method to insert a new person record and return the sugar id of new 
# record and also the generated person id.
#
###############################################################################
sub insert_person
{
	my $self = shift;
	my $info_date = shift;
	my $fname = shift;
	my $lname = shift;
	my $sex = shift;
	my $age = shift;
	my $person_converted_status = shift;

	if (!defined($age)) {
		$age = 'null'
	} else {
		$age = scalar($age);
	}
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve person id
	#
	my $person_id = $self->get_sequence_id(PERSON_PREFIX) || return (undef, undef);
	
	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return (undef, undef);
	
	#
	# create person insert sql
	#
	my $insert_sql = "insert into plt_person(id, name, person_id, first_name, last_name, sex, age," .
						" age_range, deceased, ethnic_group, person_lang, maristat, plan_move," .
						" p_tracing, p_info_source, p_info_date, p_info_update, date_entered," . 
						" date_modified, converted)" .
						" values(?, ?, ?, ?, ?, ?, $age, ?, ?, ?, ?, ?, ?, ?, ?, DATE(?), DATE(?)," .
						" utc_timestamp(), utc_timestamp(), ?)";
						
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($insert_sql);

	if (! defined($sth)) {
		print "Failed to prepare person statement.\n";
		$dbh->disconnect();
		return (undef, undef);
	}
	
	#
	# execute query
	#
	$sth->execute($guid, $fname . " " . $lname, $person_id, $fname, $lname, $sex, 
					lib::Const::UNKNOWN, lib::Const::NO, lib::Const::UNKNOWN, lib::Const::UNKNOWN,
					lib::Const::UNKNOWN, lib::Const::UNKNOWN, lib::Const::NO, lib::Const::SOURCE_SELF,
					$info_date, $info_date, $person_converted_status) 
		or return (undef, undef);
		
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return person ids
	#
	return ($guid, $person_id);
}

###############################################################################
#
# insert_person_relationships()
#
# A method to insert the person relationships.
#
###############################################################################
sub insert_person_relationships
{
	my $self = shift;
	my $person_sugar_id = shift;
	my $psu_sugar_id = shift;
	my $address_sugar_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for PSU_to_PERSON relation
	#
	##my $guid = $self->get_guid() || return undef;

	#
	# create PSU_to_PERSON relation sql
	#
	##my $sql = 'insert into ' . $self->{_relations}->{PSU_to_PERSON}->{'join_table'} . 
	##			'(id, date_modified, deleted, ' .
	##			$self->{_relations}->{PSU_to_PERSON}->{'join_key_lhs'} . ', ' . 
	##			$self->{_relations}->{PSU_to_PERSON}->{'join_key_rhs'} . ') ' .
	##			"values('${guid}', utc_timestamp(), 0, '${psu_sugar_id}', '${person_sugar_id}')";

	#
	# execute sql to insert PSU_to_PERSON relation
	#
	##$dbh->do($sql) or warn "****Error: There was an error inserting PSU_to_PERSON " .
	##						"relation for person sugar id ${person_sugar_id}\n";
	
	#
	# retrieve guid for PERSON_to_ADDRESS relation
	#
	my $guid = $self->get_guid() || return undef;

	#
	# create PERSON_to_ADDRESS relation sql
	#
	my $sql = 'insert into ' . $self->{_relations}->{PERSON_to_ADDRESS}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{PERSON_to_ADDRESS}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{PERSON_to_ADDRESS}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${person_sugar_id}', '${address_sugar_id}')";

	#
	# execute sql to insert PERSON_to_ADDRESS relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting PERSON_to_ADDRESS " .
							"relation for person sugar id ${person_sugar_id}\n";

	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}

###############################################################################
#
# insert_telephone()
#
# A method to insert a new telephone record and return the sugar id of new 
# record and also the generated telephone id.
#
###############################################################################
sub insert_telephone
{
	my $self = shift;
	my $ph_date = shift;
	my $phone_nbr = shift;
	my $phone_type = shift;
	my $phone_type_oth = shift;
	my $phone_rank = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve telephone id
	#
	my $ph_id = $self->get_sequence_id(TELEPHONE_PREFIX) || return (undef, undef);
	
	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return (undef, undef);
	
	#
	# create telephone insert sql
	#
	my $insert_sql = "insert into ltt_telephone(id, name, phone_id, phone_info_source, phone_nbr," .
						" phone_type, phone_type_oth, phone_rank, date_entered, date_modified)" .
						" values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
						
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($insert_sql);

	if (! defined($sth)) {
		print "Failed to prepare telephone statement.\n";
		$dbh->disconnect();
		return (undef, undef);
	}
	
	#
	# execute query
	#	
	$sth->execute($guid, $ph_id, $ph_id, lib::Const::PH_SOURCE_SELF, $phone_nbr, $phone_type,
					$phone_type_oth, $phone_rank, $ph_date, $ph_date) 
		or return (undef, undef);
		
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return telephone ids
	#
	return ($guid, $ph_id);
}

###############################################################################
#
# insert_telephone_relationships()
#
# A method to insert the telephone relationships.
#
###############################################################################
sub insert_telephone_relationships
{
	my $self = shift;
	my $ph_sugar_id = shift;
	my $psu_sugar_id = shift;
	my $person_sugar_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for PSU_to_TELEPHONE relation
	#
	##my $guid = $self->get_guid() || return undef;

	#
	# create PSU_to_TELEPHONE relation sql
	#
	##my $sql = 'insert into ' . $self->{_relations}->{PSU_to_TELEPHONE}->{'join_table'} . 
	##			'(id, date_modified, deleted, ' .
	##			$self->{_relations}->{PSU_to_TELEPHONE}->{'join_key_lhs'} . ', ' . 
	##			$self->{_relations}->{PSU_to_TELEPHONE}->{'join_key_rhs'} . ') ' .
	##			"values('${guid}', utc_timestamp(), 0, '${psu_sugar_id}', '${ph_sugar_id}')";

	#
	# execute sql to insert PSU_to_TELEPHONE relation
	#
	##$dbh->do($sql) or warn "****Error: There was an error inserting PSU_to_TELEPHONE " .
	##						"relation for telephone sugar id ${ph_sugar_id}\n";
	
	#
	# retrieve guid for PERSON_to_TELEPHONE relation
	#
	my $guid = $self->get_guid() || return undef;

	#
	# create PERSON_to_TELEPHONE relation sql
	#
	my $sql = 'insert into ' . $self->{_relations}->{PERSON_to_TELEPHONE}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{PERSON_to_TELEPHONE}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{PERSON_to_TELEPHONE}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${person_sugar_id}', '${ph_sugar_id}')";

	#
	# execute sql to insert PERSON_to_TELEPHONE relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting PERSON_to_TELEPHONE " .
							"relation for telephone sugar id ${ph_sugar_id}\n";

	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}

###############################################################################
#
# insert_participant()
#
# A method to insert a new participant record and return the sugar id of new 
# record and also the generated participant id.
#
###############################################################################
sub insert_participant
{
	my $self = shift;
	my $sugar_name = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve participant id
	#
	my $participant_id = $self->get_sequence_id(PARTICIPANT_PREFIX) || return (undef, undef);
	
	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return (undef, undef);
	
	#
	# create participant insert sql
	#
	my $insert_sql = "insert into plt_participant(id, name, p_id, p_type, status_info_source," .
						" status_info_mode, status_info_date, pid_entry, pid_age_elig," .
						" date_entered, date_modified, current_status, current_status_date)" .
						" values(?, ?, ?, ?, ?, ?, utc_timestamp(), ?, ?, utc_timestamp()," .
						" utc_timestamp(), ?, utc_timestamp())";
						
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($insert_sql);

	if (! defined($sth)) {
		print "Failed to prepare participant statement.\n";
		$dbh->disconnect();
		return (undef, undef);
	}
	
	#
	# execute query
	#	
	$sth->execute($guid, $sugar_name, $participant_id, lib::Const::P_TYPE, lib::Const::P_SOURCE, 
					lib::Const::P_MODE, lib::Const::PID_ENTRY, lib::Const::LEGIT_SKIP, 
					lib::Const::HH_PARTICIPANT_STATUS)
		or return (undef, undef);
		
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return participant ids
	#
	return ($guid, $participant_id);
}

###############################################################################
#
# insert_participant_relationships()
#
# A method to insert the participant relationships.
#
###############################################################################
sub insert_participant_relationships
{
	my $self = shift;
	my $participant_sugar_id = shift;
	my $psu_sugar_id = shift;
	
	#
	# login to db
	#
	##my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
	##	or die("Unable to connect to database: $DBI::errstr");
	##die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for PSU_to_PARTICIPANT relation
	#
	##my $guid = $self->get_guid() || return undef;

	#
	# create PSU_to_PARTICIPANT relation sql
	#
	##my $sql = 'insert into ' . $self->{_relations}->{PSU_to_PARTICIPANT}->{'join_table'} . 
	##			'(id, date_modified, deleted, ' .
	##			$self->{_relations}->{PSU_to_PARTICIPANT}->{'join_key_lhs'} . ', ' . 
	##			$self->{_relations}->{PSU_to_PARTICIPANT}->{'join_key_rhs'} . ') ' .
	##			"values('${guid}', utc_timestamp(), 0, '${psu_sugar_id}', '${participant_sugar_id}')";

	#
	# execute sql to insert PSU_to_PARTICIPANT relation
	#
	##$dbh->do($sql) or warn "****Error: There was an error inserting PSU_to_PARTICIPANT " .
	##						"relation for participant sugar id ${participant_sugar_id}\n";
	
	#
	# clean up
	#
	##$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}

###############################################################################
#
# insert_case()
#
# A method to insert a new case record and return the sugar id of new 
# record.
#
###############################################################################
sub insert_case
{
	my $self = shift;
	my $person_name = shift;
	my $person_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return (undef, undef);
	
	#
	# create case insert sql
	#
	my $insert_sql = "insert into cases(id, name, status, person_id, date_entered, date_modified) " .
						" values(?, ?, ?, ?, utc_timestamp(), utc_timestamp())";
						
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($insert_sql);

	if (! defined($sth)) {
		print "Failed to prepare case statement.\n";
		$dbh->disconnect();
		return (undef, undef);
	}
	
	#
	# execute query
	#	
	$sth->execute($guid, $person_name, lib::Const::CASE_STATUS, $person_id)
		or return (undef, undef);
		
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return case id
	#
	return $guid;
}

###############################################################################
#
# insert_case_relationships()
#
# A method to insert the case relationships.
#
###############################################################################
sub insert_case_relationships
{
	my $self = shift;
	my $case_sugar_id = shift;
	my $person_sugar_id = shift;
	my $participant_sugar_id = shift;
	my $household_unit_sugar_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for CASE_to_PERSON relation
	#
	my $guid = $self->get_guid() || return undef;

	#
	# create CASE_to_PERSON relation sql
	#
	my $sql = 'insert into ' . $self->{_relations}->{CASE_to_PERSON}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{CASE_to_PERSON}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{CASE_to_PERSON}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${case_sugar_id}', '${person_sugar_id}')";

	#
	# execute sql to insert CASE_to_PERSON relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting CASE_to_PERSON " .
							"relation for case sugar id ${case_sugar_id}\n";

	#
	# retrieve guid for CASE_to_PARTICIPANT relation
	#
	$guid = $self->get_guid() || return undef;

	#
	# create CASE_to_PARTICIPANT relation sql
	#
	$sql = 'insert into ' . $self->{_relations}->{CASE_to_PARTICIPANT}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{CASE_to_PARTICIPANT}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{CASE_to_PARTICIPANT}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${case_sugar_id}', '${participant_sugar_id}')";

	#
	# execute sql to insert CASE_to_PARTICIPANT relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting CASE_to_PARTICIPANT " .
							"relation for case sugar id ${case_sugar_id}\n";

	#
	# retrieve guid for CASE_to_HOUSEHOLD relation
	#
	$guid = $self->get_guid() || return undef;

	#
	# create CASE_to_HOUSEHOLD relation sql
	#
	$sql = 'insert into ' . $self->{_relations}->{CASE_to_HOUSEHOLD}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{CASE_to_HOUSEHOLD}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{CASE_to_HOUSEHOLD}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${case_sugar_id}', '${household_unit_sugar_id}')";

	#
	# execute sql to insert CASE_to_HOUSEHOLD relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting CASE_to_HOUSEHOLD " .
							"relation for case sugar id ${case_sugar_id}\n";

	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}

###############################################################################
#
# insert_event()
#
# A method to insert a new event record and return the sugar id of new 
# record and also the generated event id.
#
###############################################################################
sub insert_event
{
	my $self = shift;
	my $start_time = shift;
	my $end_time = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve event id
	#
	my $event_id = $self->get_sequence_id(EVENT_PREFIX) || return (undef, undef);
	
	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return (undef, undef);
	
	#
	# create event insert sql
	#
	my $insert_sql = "insert into ncsdc_event(id, name, event_id, event_type, event_repeat_key," .
						" event_disp, event_disp_cat, event_start_date, event_start_time," .
						" event_end_date, event_end_time, event_breakoff, event_incentive_type," .
						" event_incent_cash, date_entered, date_modified) " .
						" values(?, ?, ?, ?, ?, ?, ?, DATE(?), ?, DATE(?), ?, ?, ?, ?, utc_timestamp(), utc_timestamp())";
						
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($insert_sql);

	if (! defined($sth)) {
		print "Failed to prepare event statement.\n";
		$dbh->disconnect();
		return (undef, undef);
	}
	
	#
	# execute query
	#	
	$sth->execute($guid, lib::Const::EVENT_NAME, $event_id, lib::Const::EVENT_TYPE, 
					0, lib::Const::INTERVIEW_COMPLETE, lib::Const::HH_DISPOSITION_CAT,
					$start_time, $start_time, $end_time, $end_time, lib::Const::NO,
					lib::Const::INCENTIVE_NONE, 0)
		or return (undef, undef);
		
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return event ids
	#
	return ($guid, $event_id);
}

###############################################################################
#
# insert_event_relationships()
#
# A method to insert the event relationships.
#
###############################################################################
sub insert_event_relationships
{
	my $self = shift;
	my $event_sugar_id = shift;
	my $psu_sugar_id = shift;
	my $participant_sugar_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for PSU_to_EVENT relation
	#
	##my $guid = $self->get_guid() || return undef;

	#
	# create PSU_to_EVENT relation sql
	#
	##my $sql = 'insert into ' . $self->{_relations}->{PSU_to_EVENT}->{'join_table'} . 
	##			'(id, date_modified, deleted, ' .
	##			$self->{_relations}->{PSU_to_EVENT}->{'join_key_lhs'} . ', ' . 
	##			$self->{_relations}->{PSU_to_EVENT}->{'join_key_rhs'} . ') ' .
	##			"values('${guid}', utc_timestamp(), 0, '${psu_sugar_id}', '${event_sugar_id}')";

	#
	# execute sql to insert PSU_to_EVENT relation
	#
	##$dbh->do($sql) or warn "****Error: There was an error inserting PSU_to_EVENT " .
	##						"relation for event sugar id ${event_sugar_id}\n";
	
	#
	# retrieve guid for PARTICIPANT_to_EVENT relation
	#
	my $guid = $self->get_guid() || return undef;

	#
	# create PARTICIPANT_to_EVENT relation sql
	#
	my $sql = 'insert into ' . $self->{_relations}->{PARTICIPANT_to_EVENT}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{PARTICIPANT_to_EVENT}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{PARTICIPANT_to_EVENT}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${participant_sugar_id}', '${event_sugar_id}')";

	#
	# execute sql to insert PARTICIPANT_to_EVENT relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting PARTICIPANT_to_EVENT " .
							"relation for event sugar id ${event_sugar_id}\n";

	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}

###############################################################################
#
# insert_instrument()
#
# A method to insert a new instrument record and return the sugar id of new 
# record and also the generated instrument id.
#
###############################################################################
sub insert_instrument
{
	my $self = shift;
	my $start_time = shift;
	my $end_time = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve instrument id
	#
	my $instrument_id = $self->get_sequence_id(INSTRUMENT_PREFIX) || return (undef, undef);
	
	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return (undef, undef);
	
	#
	# create instrument insert sql
	#
	my $insert_sql = "insert into ncsdc_instrument(id, name, instrument_id, instrument_type, instrument_repeat_key," .
						" ins_start_time, ins_end_time, ins_date_start, ins_date_end, ins_breakoff," .
						" ins_status, ins_mode, data_problem, date_entered, date_modified) " .
						" values(?, ?, ?, ?, ?, ?, ?," .
						" DATE(?), DATE(?), ?, ?, ?, ?, utc_timestamp(), utc_timestamp())";
						
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($insert_sql);

	if (! defined($sth)) {
		print "Failed to prepare instrument statement.\n";
		$dbh->disconnect();
		return (undef, undef);
	}
	
	#
	# execute query
	#	
	$sth->execute($guid, lib::Const::INSTRUMENT_NAME, $instrument_id, lib::Const::HH_INSTRUMENT_TYPE,
					0, $start_time, $end_time, $start_time, $end_time, lib::Const::NO, 
					lib::Const::HH_INSTR_STATUS, lib::Const::HH_INSTR_MODE, '2')
		or return (undef, undef);
		
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return instrument ids
	#
	return ($guid, $instrument_id);
}


###############################################################################
#
# insert_instrument_relationships()
#
# A method to insert the instrument relationships.
#
###############################################################################
sub insert_instrument_relationships
{
	my $self = shift;
	my $instrument_sugar_id = shift;
	my $psu_sugar_id = shift;
	my $event_sugar_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for PSU_to_INSTRUMENT relation
	#
	##my $guid = $self->get_guid() || return undef;

	#
	# create PSU_to_INSTRUMENT relation sql
	#
	##my $sql = 'insert into ' . $self->{_relations}->{PSU_to_INSTRUMENT}->{'join_table'} . 
	##			'(id, date_modified, deleted, ' .
	##			$self->{_relations}->{PSU_to_INSTRUMENT}->{'join_key_lhs'} . ', ' . 
	##			$self->{_relations}->{PSU_to_INSTRUMENT}->{'join_key_rhs'} . ') ' .
	##			"values('${guid}', utc_timestamp(), 0, '${psu_sugar_id}', '${instrument_sugar_id}')";

	#
	# execute sql to insert PSU_to_INSTRUMENT relation
	#
	##$dbh->do($sql) or warn "****Error: There was an error inserting PSU_to_INSTRUMENT " .
	##						"relation for instrument sugar id ${instrument_sugar_id}\n";
	
	#
	# retrieve guid for EVENT_to_INSTRUMENT relation
	#
	my $guid = $self->get_guid() || return undef;

	#
	# create EVENT_to_INSTRUMENT relation sql
	#
	my $sql = 'insert into ' . $self->{_relations}->{EVENT_to_INSTRUMENT}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{EVENT_to_INSTRUMENT}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{EVENT_to_INSTRUMENT}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${event_sugar_id}', '${instrument_sugar_id}')";

	#
	# execute sql to insert EVENT_to_INSTRUMENT relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting EVENT_to_INSTRUMENT " .
							"relation for instrument sugar id ${instrument_sugar_id}\n";

	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}


###############################################################################
#
# insert_contact_link()
#
# A method to insert a new contact linking record and return the sugar id of new 
# record and also the generated contact linking id.
#
###############################################################################
sub insert_contact_link
{
	my $self = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve contact link id
	#
	my $contact_link_id = $self->get_sequence_id(CONTACT_LINK_PREFIX) || return (undef, undef);
	
	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return (undef, undef);
	
	#
	# create contact link insert sql
	#
	my $insert_sql = "insert into ncsdc_link_contact(id, name, contact_link_id, date_entered, date_modified)" .
						" values(?, ?, ?, utc_timestamp(), utc_timestamp())";
						
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($insert_sql);

	if (! defined($sth)) {
		print "Failed to prepare contact link statement.\n";
		$dbh->disconnect();
		return (undef, undef);
	}
	
	#
	# execute query
	#	
	$sth->execute($guid, lib::Const::CONTACT_LINK_NAME, $contact_link_id)
		or return (undef, undef);
		
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return contact link ids
	#
	return ($guid, $contact_link_id);
}


###############################################################################
#
# insert_contact_link_relationships()
#
# A method to insert the contact link relationships.
#
###############################################################################
sub insert_contact_link_relationships
{
	my $self = shift;
	my $contact_link_sugar_id = shift;
	my $psu_sugar_id = shift;
	my $contact_sugar_id = shift;
	my $event_sugar_id = shift;
	my $instrument_sugar_id = shift;
	my $person_sugar_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for PSU_to_CONTACT_LINK relation
	#
	##my $guid = $self->get_guid() || return undef;

	#
	# create PSU_to_CONTACT_LINK relation sql
	#
	##my $sql = 'insert into ' . $self->{_relations}->{PSU_to_CONTACT_LINK}->{'join_table'} . 
	##			'(id, date_modified, deleted, ' .
	##			$self->{_relations}->{PSU_to_CONTACT_LINK}->{'join_key_lhs'} . ', ' . 
	##			$self->{_relations}->{PSU_to_CONTACT_LINK}->{'join_key_rhs'} . ') ' .
	##			"values('${guid}', utc_timestamp(), 0, '${psu_sugar_id}', '${contact_link_sugar_id}')";

	#
	# execute sql to insert PSU_to_CONTACT_LINK relation
	#
	##$dbh->do($sql) or warn "****Error: There was an error inserting PSU_to_CONTACT_LINK " .
	##						"relation for contact link sugar id ${contact_link_sugar_id}\n";
	
	#
	# retrieve guid for CONTACT_to_CONTACT_LINK relation
	#
	my $guid = $self->get_guid() || return undef;

	#
	# create CONTACT_to_CONTACT_LINK relation sql
	#
	my $sql = 'insert into ' . $self->{_relations}->{CONTACT_to_CONTACT_LINK}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{CONTACT_to_CONTACT_LINK}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{CONTACT_to_CONTACT_LINK}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${contact_sugar_id}', '${contact_link_sugar_id}')";

	#
	# execute sql to insert CONTACT_to_CONTACT_LINK relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting CONTACT_to_CONTACT_LINK " .
							"relation for contact link sugar id ${contact_link_sugar_id}\n";

	#
	# retrieve guid for EVENT_to_CONTACT_LINK relation
	#
	$guid = $self->get_guid() || return undef;

	#
	# create EVENT_to_CONTACT_LINK relation sql
	#
	$sql = 'insert into ' . $self->{_relations}->{EVENT_to_CONTACT_LINK}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{EVENT_to_CONTACT_LINK}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{EVENT_to_CONTACT_LINK}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${event_sugar_id}', '${contact_link_sugar_id}')";

	#
	# execute sql to insert EVENT_to_CONTACT_LINK relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting EVENT_to_CONTACT_LINK " .
							"relation for contact link sugar id ${contact_link_sugar_id}\n";

	#
	# retrieve guid for INSTRUMENT_to_CONTACT_LINK relation
	#
	$guid = $self->get_guid() || return undef;

	#
	# create INSTRUMENT_to_CONTACT_LINK relation sql
	#
	$sql = 'insert into ' . $self->{_relations}->{INSTRUMENT_to_CONTACT_LINK}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{INSTRUMENT_to_CONTACT_LINK}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{INSTRUMENT_to_CONTACT_LINK}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${instrument_sugar_id}', '${contact_link_sugar_id}')";

	#
	# execute sql to insert INSTRUMENT_to_CONTACT_LINK relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting INSTRUMENT_to_CONTACT_LINK " .
							"relation for contact link sugar id ${contact_link_sugar_id}\n";

	#
	# retrieve guid for PERSON_to_CONTACT_LINK relation
	#
	$guid = $self->get_guid() || return undef;

	#
	# create PERSON_to_CONTACT_LINK relation sql
	#
	$sql = 'insert into ' . $self->{_relations}->{PERSON_to_CONTACT_LINK}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{PERSON_to_CONTACT_LINK}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{PERSON_to_CONTACT_LINK}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${person_sugar_id}', '${contact_link_sugar_id}')";

	#
	# execute sql to insert PERSON_to_CONTACT_LINK relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting PERSON_to_CONTACT_LINK " .
							"relation for contact link sugar id ${contact_link_sugar_id}\n";

	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}

###############################################################################
#
# insert_person_participant_link()
#
# A method to insert a new person-participant link record and return the sugar id of new 
# record and also the generated person-participant link id.
#
###############################################################################
sub insert_person_participant_link
{
	my $self = shift;
	my $participant_name = shift;
	my $person_id = shift;  #hjaime - pass in person id
	my $participant_id = shift;  #hjaime - pass in pid
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve person-participant link id
	#
	#hjaime remove generated sequence (replaced with concatenated person_pid per Data Elements spec)
	#my $person_participant_link_id = $self->get_sequence_id(PERS_PART_LINK_PREFIX) || return (undef, undef);
	my $person_participant_link_id = $person_id.$participant_id;
	
	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return (undef, undef);
	
	#
	# create person-participant linnk insert sql
	#
	my $insert_sql = "insert into plt_lnkperspart(id, name, person_pid_id, relation," .
						" is_active, date_entered, date_modified)" .
						" values(?, ?, ?, ?, ?, utc_timestamp(), utc_timestamp())";
						
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($insert_sql);

	if (! defined($sth)) {
		print "Failed to prepare person-participant link statement.\n";
		$dbh->disconnect();
		return (undef, undef);
	}
	
	#
	# execute query
	#	
	$sth->execute($guid, $participant_name, $person_participant_link_id, lib::Const::PERS_PART_LINK_RELATE,
					lib::Const::YES)
		or return (undef, undef);
		
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return person-participant link ids
	#
	return ($guid, $person_participant_link_id);
}


###############################################################################
#
# insert_person_participant_link_relationships()
#
# A method to insert the person-participant link relationships.
#
###############################################################################
sub insert_person_participant_link_relationships
{
	my $self = shift;
	my $pers_part_link_sugar_id = shift;
	my $psu_sugar_id = shift;
	my $person_sugar_id = shift;
	my $participant_sugar_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for PSU_to_PERS_PART_LINK relation
	#
	##my $guid = $self->get_guid() || return undef;

	#
	# create PSU_to_PERS_PART_LINK relation sql
	#
	##my $sql = 'insert into ' . $self->{_relations}->{PSU_to_PERS_PART_LINK}->{'join_table'} . 
	##			'(id, date_modified, deleted, ' .
	##			$self->{_relations}->{PSU_to_PERS_PART_LINK}->{'join_key_lhs'} . ', ' . 
	##			$self->{_relations}->{PSU_to_PERS_PART_LINK}->{'join_key_rhs'} . ') ' .
	##			"values('${guid}', utc_timestamp(), 0, '${psu_sugar_id}', '${pers_part_link_sugar_id}')";

	#
	# execute sql to insert PSU_to_PERS_PART_LINK relation
	#
	##$dbh->do($sql) or warn "****Error: There was an error inserting PSU_to_PERS_PART_LINK " .
	##						"relation for person-participant link sugar id ${pers_part_link_sugar_id}\n";
	
	#
	# retrieve guid for PERSON_to_PERS_PART_LINK relation
	#
	my $guid = $self->get_guid() || return undef;

	#
	# create PERSON_to_PERS_PART_LINK relation sql
	#
	my $sql = 'insert into ' . $self->{_relations}->{PERSON_to_PERS_PART_LINK}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{PERSON_to_PERS_PART_LINK}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{PERSON_to_PERS_PART_LINK}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${person_sugar_id}', '${pers_part_link_sugar_id}')";

	#
	# execute sql to insert PERSON_to_PERS_PART_LINK relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting PERSON_to_PERS_PART_LINK " .
							"relation for person-participant link sugar id ${pers_part_link_sugar_id}\n";

	#
	# retrieve guid for PARTICIPANT_to_PERS_PART_LINK relation
	#
	$guid = $self->get_guid() || return undef;

	#
	# create PARTICIPANT_to_PERS_PART_LINK relation sql
	#
	$sql = 'insert into ' . $self->{_relations}->{PARTICIPANT_to_PERS_PART_LINK}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{PARTICIPANT_to_PERS_PART_LINK}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{PARTICIPANT_to_PERS_PART_LINK}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${participant_sugar_id}', '${pers_part_link_sugar_id}')";

	#
	# execute sql to insert PARTICIPANT_to_PERS_PART_LINK relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting PARTICIPANT_to_PERS_PART_LINK " .
							"relation for person-participant link sugar id ${pers_part_link_sugar_id}\n";

	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}

###############################################################################
#
# insert_household_unit()
#
# A method to insert a new household unit record and return the sugar id of new 
# record and also the generated household unit id.
#
###############################################################################
sub insert_household_unit
{
	my $self = shift;
	my $du_elig_confirm = shift;
	my $hh_age_eligible = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve household unit id
	#
	my $household_unit_id = $self->get_sequence_id(HOUSEHOLD_PREFIX) || return (undef, undef);
	
	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return (undef, undef);
	
	#
	# create household unit insert sql
	#
	my $insert_sql = "insert into geo_householdu(id, name, hh_id, hh_status, hh_elig, hh_structure," .
						" date_entered, date_modified)" .
						" values(?, ?, ?, ?, ?, ?, utc_timestamp(), utc_timestamp())";
						
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($insert_sql);

	if (! defined($sth)) {
		print "Failed to prepare household unit statement.\n";
		$dbh->disconnect();
		return (undef, undef);
	}
	
	my $hh_elig;
	if ( $du_elig_confirm eq lib::Const::DU_INELIGIBLE ) {
		# du not eligible
		$hh_elig = '4';
	} elsif ( scalar($hh_age_eligible) == 0 ) {
		# no hh member currently eligible
		$hh_elig = '3';
	} else {
		# one or more hh members eligible
		$hh_elig = '2';
	}
	
	#
	# execute query
	#
	$sth->execute($guid, $household_unit_id, $household_unit_id, lib::Const::YES, $hh_elig, 
					lib::Const::UNKNOWN) 
		or return (undef, undef);
		
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return household unit ids
	#
	return ($guid, $household_unit_id);
}

###############################################################################
#
# insert_household_unit_relationships()
#
# A method to insert the household unit relationships.
#
###############################################################################
sub insert_household_unit_relationships
{
	my $self = shift;
	my $household_unit_sugar_id = shift;
	my $psu_sugar_id = shift;
	
	#
	# login to db
	#
	##my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
	##	or die("Unable to connect to database: $DBI::errstr");
	##die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for PSU_to_HOUSEHOLD relation
	#
	##my $guid = $self->get_guid() || return undef;

	#
	# create PSU_to_HOUSEHOLD relation sql
	#
	##my $sql = 'insert into ' . $self->{_relations}->{PSU_to_HOUSEHOLD}->{'join_table'} . 
	##			'(id, date_modified, deleted, ' .
	##			$self->{_relations}->{PSU_to_HOUSEHOLD}->{'join_key_lhs'} . ', ' . 
	##			$self->{_relations}->{PSU_to_HOUSEHOLD}->{'join_key_rhs'} . ') ' .
	##			"values('${guid}', utc_timestamp(), 0, '${psu_sugar_id}', '${household_unit_sugar_id}')";

	#
	# execute sql to insert PSU_to_HOUSEHOLD relation
	#
	##$dbh->do($sql) or warn "****Error: There was an error inserting PSU_to_HOUSEHOLD " .
	##						"relation for household unit sugar id ${household_unit_sugar_id}\n";
	
	#
	# clean up
	#
	##$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}

###############################################################################
#
# insert_link_household_dwelling()
#
# A method to insert a new link household dwelling record and return the sugar id of new 
# record and also the generated link household dwelling id.
#
###############################################################################
sub insert_link_household_dwelling
{
	my $self = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve link household dwelling id
	#
	my $link_household_dwelling_id = $self->get_sequence_id(DU_HH_LINK_PREFIX) || return (undef, undef);
	
	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return (undef, undef);
	
	#
	# create link household dwelling insert sql
	#
	my $insert_sql = "insert into geo_du_hh_link(id, name, hh_du_id, is_active, du_rank," .
						" date_entered, date_modified)" .
						" values(?, ?, ?, ?, ?, utc_timestamp(), utc_timestamp())";
						
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($insert_sql);

	if (! defined($sth)) {
		print "Failed to prepare link household dwelling statement.\n";
		$dbh->disconnect();
		return (undef, undef);
	}
	
	#
	# execute query
	#
	$sth->execute($guid, $link_household_dwelling_id, $link_household_dwelling_id, lib::Const::YES, 
					lib::Const::RANK_PRIMARY) 
		or return (undef, undef);
		
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return link household dwelling ids
	#
	return ($guid, $link_household_dwelling_id);
}

###############################################################################
#
# insert_link_household_dwelling_relationships()
#
# A method to insert the household dwelling relationships.
#
###############################################################################
sub insert_link_household_dwelling_relationships
{
	my $self = shift;
	my $link_household_dwelling_sugar_id = shift;
	my $psu_sugar_id = shift;
	my $household_unit_sugar_id = shift;
	my $du_sugar_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for PSU_to_HH_DU_LINK relation
	#
	##my $guid = $self->get_guid() || return undef;

	#
	# create PSU_to_HH_DU_LINK relation sql
	#
	##my $sql = 'insert into ' . $self->{_relations}->{PSU_to_HH_DU_LINK}->{'join_table'} . 
	##			'(id, date_modified, deleted, ' .
	##			$self->{_relations}->{PSU_to_HH_DU_LINK}->{'join_key_lhs'} . ', ' . 
	##			$self->{_relations}->{PSU_to_HH_DU_LINK}->{'join_key_rhs'} . ') ' .
	##			"values('${guid}', utc_timestamp(), 0, '${psu_sugar_id}', '${link_household_dwelling_sugar_id}')";

	#
	# execute sql to insert PSU_to_HH_DU_LINK relation
	#
	##$dbh->do($sql) or warn "****Error: There was an error inserting PSU_to_HH_DU_LINK " .
	##						"relation for link household dwelling sugar id ${link_household_dwelling_sugar_id}\n";
	
	#
	# retrieve guid for HOUSEHOLD_to_HH_DU_LINK relation
	#
	my $guid = $self->get_guid() || return undef;

	#
	# create HOUSEHOLD_to_HH_DU_LINK relation sql
	#
	my $sql = 'insert into ' . $self->{_relations}->{HOUSEHOLD_to_HH_DU_LINK}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{HOUSEHOLD_to_HH_DU_LINK}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{HOUSEHOLD_to_HH_DU_LINK}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${household_unit_sugar_id}', '${link_household_dwelling_sugar_id}')";

	#
	# execute sql to insert HOUSEHOLD_to_HH_DU_LINK relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting HOUSEHOLD_to_HH_DU_LINK " .
							"relation for link household dwelling sugar id ${link_household_dwelling_sugar_id}\n";

	#
	# retrieve guid for DWELLING_to_HH_DU_LINK relation
	#
	$guid = $self->get_guid() || return undef;

	#
	# create DWELLING_to_HH_DU_LINK relation sql
	#
	$sql = 'insert into ' . $self->{_relations}->{DWELLING_to_HH_DU_LINK}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{DWELLING_to_HH_DU_LINK}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{DWELLING_to_HH_DU_LINK}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${du_sugar_id}', '${link_household_dwelling_sugar_id}')";

	#
	# execute sql to insert DWELLING_to_HH_DU_LINK relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting DWELLING_to_HH_DU_LINK " .
							"relation for link household dwelling sugar id ${link_household_dwelling_sugar_id}\n";
							
	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}

###############################################################################
#
# insert_link_person_household()
#
# A method to insert a new link person household record and return the sugar id of new 
# record and also the generated link person household id.
#
###############################################################################
sub insert_link_person_household
{
	my $self = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# retrieve link person household id
	#
	my $link_person_household_id = $self->get_sequence_id(PERS_HH_LINK_PREFIX) || return (undef, undef);
	
	#
	# retrieve guid
	#
	my $guid = $self->get_guid() || return (undef, undef);
	
	#
	# create link person household insert sql
	#
	my $insert_sql = "insert into plt_lnkpershous(id, name, person_hh_id, is_active, hh_rank," .
						" date_entered, date_modified)" .
						" values(?, ?, ?, ?, ?, utc_timestamp(), utc_timestamp())";
						
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($insert_sql);

	if (! defined($sth)) {
		print "Failed to prepare link person household statement.\n";
		$dbh->disconnect();
		return (undef, undef);
	}
	
	#
	# execute query
	#
	$sth->execute($guid, $link_person_household_id, $link_person_household_id, lib::Const::YES, 
					lib::Const::RANK_PRIMARY) 
		or return (undef, undef);
		
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return link person household ids
	#
	return ($guid, $link_person_household_id);
}

###############################################################################
#
# insert_link_person_household_relationships()
#
# A method to insert the person household relationships.
#
###############################################################################
sub insert_link_person_household_relationships
{
	my $self = shift;
	my $link_person_household_sugar_id = shift;
	my $psu_sugar_id = shift;
	my $household_unit_sugar_id = shift;
	my $person_sugar_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);
	
	#
	# retrieve guid for PSU_to_PERS_HH_LINK relation
	#
	##my $guid = $self->get_guid() || return undef;

	#
	# create PSU_to_PERS_HH_LINK relation sql
	#
	##my $sql = 'insert into ' . $self->{_relations}->{PSU_to_PERS_HH_LINK}->{'join_table'} . 
	##			'(id, date_modified, deleted, ' .
	##			$self->{_relations}->{PSU_to_PERS_HH_LINK}->{'join_key_lhs'} . ', ' . 
	##			$self->{_relations}->{PSU_to_PERS_HH_LINK}->{'join_key_rhs'} . ') ' .
	##			"values('${guid}', utc_timestamp(), 0, '${psu_sugar_id}', '${link_person_household_sugar_id}')";

	#
	# execute sql to insert PSU_to_PERS_HH_LINK relation
	#
	##$dbh->do($sql) or warn "****Error: There was an error inserting PSU_to_PERS_HH_LINK " .
	##						"relation for link person household sugar id ${link_person_household_sugar_id}\n";
	
	#
	# retrieve guid for HOUSEHOLD_to_PERS_HH_LINK relation
	#
	my $guid = $self->get_guid() || return undef;

	#
	# create HOUSEHOLD_to_PERS_HH_LINK relation sql
	#
	my $sql = 'insert into ' . $self->{_relations}->{HOUSEHOLD_to_PERS_HH_LINK}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{HOUSEHOLD_to_PERS_HH_LINK}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{HOUSEHOLD_to_PERS_HH_LINK}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${household_unit_sugar_id}', '${link_person_household_sugar_id}')";

	#
	# execute sql to insert HOUSEHOLD_to_PERS_HH_LINK relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting HOUSEHOLD_to_PERS_HH_LINK " .
							"relation for link person household sugar id ${link_person_household_sugar_id}\n";
							
	#
	# retrieve guid for PERSON_to_PERS_HH_LINK relation
	#
	$guid = $self->get_guid() || return undef;

	#
	# create PERSON_to_PERS_HH_LINK relation sql
	#
	$sql = 'insert into ' . $self->{_relations}->{PERSON_to_PERS_HH_LINK}->{'join_table'} . 
				'(id, date_modified, deleted, ' .
				$self->{_relations}->{PERSON_to_PERS_HH_LINK}->{'join_key_lhs'} . ', ' . 
				$self->{_relations}->{PERSON_to_PERS_HH_LINK}->{'join_key_rhs'} . ') ' .
				"values('${guid}', utc_timestamp(), 0, '${person_sugar_id}', '${link_person_household_sugar_id}')";

	#
	# execute sql to insert PERSON_to_PERS_HH_LINK relation
	#
	$dbh->do($sql) or warn "****Error: There was an error inserting PERSON_to_PERS_HH_LINK " .
							"relation for link person household sugar id ${link_person_household_sugar_id}\n";

	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return ok 
	#
	return 1;
}

###############################################################################
#
# get_address_id_from_view()
#
# A method to retrieve the address_id from the address view (given the du id).
#
###############################################################################
sub get_address_id_from_view
{
	my $self = shift;
	my $du_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "SELECT address_id FROM sdsc_address_details_v WHERE du_id = ? LIMIT 1";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare get address id statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute($du_id) or return undef;
	
	#
	# fetch result
	#	
	my $row = $sth->fetchrow_hashref();
	my $address_id = $row->{address_id};
	
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return result
	#	
	return $address_id;
}

###############################################################################
#
# update_participant_type()
#
# A method to update the particpant type field of a particpant record.
#
###############################################################################
sub update_participant_type
{
	my $self = shift;
	my $participant_sugar_id = shift;
	my $participant_type = shift;

	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# execute update
	#
	my $sql = "update plt_participant set p_type = '${participant_type}' where id = '${participant_sugar_id}'";
	$dbh->do($sql);
	
	print "Participant type updated.\n" if($self->{_debug});
	
	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return nothing
	#
	return;
}

###############################################################################
#
# update_person_age()
#
# A method to update the age field of a person record.
#
###############################################################################
sub update_person_age
{
	my $self = shift;
	my $person_sugar_id = shift;
	my $age = shift;

	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# execute update
	#
	my $sql = "update plt_person set age = $age where id = '${person_sugar_id}'";
	$dbh->do($sql);
	
	print "Person age updated.\n" if($self->{_debug});
	
	#
	# clean up
	#
	$dbh->disconnect();
	
	#
	# return nothing
	#
	return;
}

###############################################################################
#
# trim()
#
# A simple method to strip leading and trailing spaces from a string.
#
###############################################################################
sub trim($)
{
	my $self = shift;
	my $string = shift;
	
	$string =~ s/^\s+//;
	$string =~ s/\s+$//;
	
	return $string;
}

###############################################################################

sub getDns			{ my $self = shift; return $self->{_dns} || ''; }
sub getUsername		{ my $self = shift; return $self->{_username} || ''; }
sub getPasswd		{ my $self = shift; return $self->{_passwd} || ''; }

1;
