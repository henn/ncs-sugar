#!/usr/bin/perl

use strict;
use warnings;
use SOAP::Lite;
use Data::Dumper;

my $soap_domain = 'http://www.sugarcrm.com/sugarcrm';
my $soap_url = 'http://ncs2.sdsc.edu/sugar/soap.php';

my $sugarcrm_username = 'lpepyat';
# MD5 of the password
my $sugarcrm_md5_password = 'ec8c6b522e054c5ab5882bb5c3e69230';

# Instantiate SOAP
my $soap = SOAP::Lite->uri($soap_domain)->proxy($soap_url);

# Hash with credentials
my $user_auth = {'user_name' => $sugarcrm_username, 'password' => $sugarcrm_md5_password};

# Execute the login
my $result = $soap->login(SOAP::Data->value($user_auth));

# print out result
#print(Dumper($result->result));

# Get the session id
my $session_id = $result->result->{'id'};

#print "Session ID:$session_id\n";

###################################################################################
#
# Get the available modules
#
$result = $soap->get_available_modules($session_id);

# print out available modules
# print(Dumper($result->result->{modules}));
#
####################################################################################


###################################################################################
#
# Get the a modules fields
#
#$result = $soap->get_module_fields($session_id, 'PLT_LINK_PERSON_PARTICIPANT');

# print module fields
# print(Dumper($result->result->{module_fields}));
#
###################################################################################


###################################################################################
#
# TEST RETRIEVING FIELD VALUE FROM PERSON TABLE
#
# Retrieve field values (need to know id)
#
$result = $soap->get_entries(
	SOAP::Data->value($session_id),
	SOAP::Data->value('PLT_PERSON'),
	SOAP::Data->value( ['e472ff2a-616e-5dec-307a-4ccaf3490662'] )
);

# print the id result, it returns all fields, so you need to 
# know where the field you want is (ie, what element of the arrays et).
# print(Dumper($result->result->{entry_list}[0]->{name_value_list}[3]));
# printf("**Id:%s\n", $result->result->{entry_list}[0]->{name_value_list}[3]->{value});
#
###################################################################################


###################################################################################
#
# TEST RETRIEVING FIELD VALUE FROM PARTICIPANT TABLE
#
# Try to retrieve a specific field value (need to know id)
#
$result = $soap->get_entry(
	SOAP::Data->value($session_id),
	SOAP::Data->value('PLT_PARTICIPANT'),
	SOAP::Data->value( '54c00f6b-e816-fb74-2fcb-4ccb094555d2' ),
	SOAP::Data->value( ['name'] )
);

# print the name
# print(Dumper($result->result->{entry_list}[0]->{name_value_list}));
# printf("**Name:%s\n", $result->result->{entry_list}[0]->{name_value_list}[0]->{value});
#
###################################################################################


###################################################################################
#
# PARTICIPANT -> PERSON RELATION TEST
#
# Try to retrieve a specific relationship id
#
$result = $soap->get_relationships(
	SOAP::Data->value($session_id),
#	SOAP::Data->value('PLT_PERSON'),
	SOAP::Data->value('PLT_PARTICIPANT'),
#	SOAP::Data->value( 'be2d3ed7-a906-2639-2485-4cd0ba9769e2' ),
	SOAP::Data->value( '863de654-9a04-54b1-e3f9-4cd0ba05d415' ),
#	SOAP::Data->value('PLT_PARTICIPANT')
	SOAP::Data->value('PLT_PERSON')
);

# print the relationship id
# print(Dumper($result->result));
# printf("**Relationship id:%s\n", $result->result->{ids}[0]->{id});

# use the relationship id to get the related person name
$result = $soap->get_entry(
	SOAP::Data->value($session_id),
	SOAP::Data->value('PLT_PERSON'),
	SOAP::Data->value( $result->result->{ids}[0]->{id} ),
	SOAP::Data->value( ['name'] )
);

# printf("**Related Person's Name:%s\n", $result->result->{entry_list}[0]->{name_value_list}[0]->{value});
#
###################################################################################


###################################################################################
#
# PARTICIPANT_CONSENT -> PERSON RELATION TEST
#
# Try to retrieve a specific relationship id
#
$result = $soap->get_relationships(
	SOAP::Data->value($session_id),
	SOAP::Data->value('PLT_Participant_Consent'),
	SOAP::Data->value( '54ba7581-0d94-3b2d-5262-4cd42966274d' ),
#	SOAP::Data->value( '54ba7581-0d94-3b2d-5262-4cd4296d' ),	# dummy id
	SOAP::Data->value('PLT_PERSON')
);

# check error message
if ( $result->result->{error}->{number} != 0 ) {
	printf("Error Nbr:%d, Error Message:%s\n", $result->result->{error}->{number},
											$result->result->{error}->{description});
}

# print the relationship id
# print(Dumper($result->result));

if( ! $result->result->{ids}[0]->{id} ) {
	print "No ID returned!\n";
} else {
	printf("**Relationship id:%s\n", $result->result->{ids}[0]->{id});

	# use the relationship id to get the related person name
	$result = $soap->get_entry(
		SOAP::Data->value($session_id),
		SOAP::Data->value('PLT_PERSON'),
		SOAP::Data->value( $result->result->{ids}[0]->{id} ),
		SOAP::Data->value( ['name'] )
	);
	printf("**Related Person's Name:%s\n", $result->result->{entry_list}[0]->{name_value_list}[0]->{value});
}
#
###################################################################################



###################################################################################
#
# PARTICIPANT_CONSENT -> PERSON RELATION TEST
#
# *TESTING* USING RELATIONSHIP NAME AS PART OF CALL
#
# Try to retrieve a specific relationship id
#
$result = $soap->get_relationships(
	SOAP::Data->value($session_id),
	SOAP::Data->value('PLT_Participant_Consent'),
	SOAP::Data->value( '54ba7581-0d94-3b2d-5262-4cd42966274d' ),
	SOAP::Data->value('PLT_PERSON'),
	SOAP::Data->value(''),
	SOAP::Data->value(0),
	SOAP::Data->value('plt_person_plt_participant_consent')
);

# check error message
if ( $result->result->{error}->{number} != 0 ) {
	printf("Error Nbr:%d, Error Message:%s\n", $result->result->{error}->{number},
											$result->result->{error}->{description});
}

# print the relationship id
# print(Dumper($result->result));

if( ! $result->result->{ids}[0]->{id} ) {
	print "No ID returned!\n";
} else {
	printf("**Relationship id:%s\n", $result->result->{ids}[0]->{id});

	# use the relationship id to get the related person name
	$result = $soap->get_entry(
		SOAP::Data->value($session_id),
		SOAP::Data->value('PLT_PERSON'),
		SOAP::Data->value( $result->result->{ids}[0]->{id} ),
		SOAP::Data->value( ['name'] )
	);
	printf("**Related Person's Name:%s\n", $result->result->{entry_list}[0]->{name_value_list}[0]->{value});
}
#
###################################################################################



###################################################################################
#
# PARTICIPANT_CONSENT -> PERSON RELATION TEST
#
# *TESTING* USING RELATIONSHIP NAME AS PART OF CALL
#
# Try to retrieve a specific relationship id
#
$result = $soap->get_relationships(
	SOAP::Data->value($session_id),
	SOAP::Data->value('PLT_Participant_Consent'),
	SOAP::Data->value( '54ba7581-0d94-3b2d-5262-4cd42966274d' ),
	SOAP::Data->value('PLT_PERSON'),
	SOAP::Data->value(''),
	SOAP::Data->value(0),
	SOAP::Data->value('plt_person_plt_participant_consent_1')
);

# check error message
if ( $result->result->{error}->{number} != 0 ) {
	printf("Error Nbr:%d, Error Message:%s\n", $result->result->{error}->{number},
											$result->result->{error}->{description});
}

# print the relationship id
# print(Dumper($result->result));

if( ! $result->result->{ids}[0]->{id} ) {
	print "No ID returned!\n";
} else {
	printf("**Relationship id:%s\n", $result->result->{ids}[0]->{id});

	# use the relationship id to get the related person name
	$result = $soap->get_entry(
		SOAP::Data->value($session_id),
		SOAP::Data->value('PLT_PERSON'),
		SOAP::Data->value( $result->result->{ids}[0]->{id} ),
		SOAP::Data->value( ['name'] )
	);
	printf("**Related Person's Name:%s\n", $result->result->{entry_list}[0]->{name_value_list}[0]->{value});
}
#
###################################################################################

