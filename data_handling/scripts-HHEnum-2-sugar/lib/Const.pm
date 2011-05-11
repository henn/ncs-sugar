package lib::Const;

use strict;

###############################################
# Constants package
#
###############################################

# hh_enum ipad questionnaire answer, refused or don't know response values
use constant ANSWER			=> '0';		# !!! check these values, will they be numeric or text values? !!!
use constant REFUSED		=> '1';		# !!! some appear to be text !!!
use constant DONT_KNOW		=> '2';

# hh enum record processed status
use constant PENDING		=> 0;
use constant PROCESSED		=> 1;
use constant ERROR			=> 2;

# hh enum disposition code
use constant INTERVIEW_COMPLETE		=> '540';

# hh enum disposition category code
use constant HH_DISPOSITION_CAT		=> '1';

# hh enum contact type
use constant IN_PERSON		=> '1';

# hh enum contact language
use constant ENGLISH		=> '1';

# hh enum translation method
use constant NO_TRANSLATION	=> '1';

# hh enum contact location
use constant PERS_HOME		=> '1';

# hh enum who contacted
use constant HH_MEMBER		=> '5';

# hh enum NIR other reason
use constant NIR_OTHER		=> 'Respondent refused address confirmation.';

# NIR who refused
use constant NIR_HH_MEMBER	=> '5';

# hh enum person info source
use constant SOURCE_SELF 	=> '1';

# hh enum person-participant relationship
use constant PERS_PART_LINK_RELATE	=> '1';

# hh enum particpant type 
use constant PART_TYPE_AGE_ELIG_WOMAN	=> '1';
use constant PART_TYPE_PREG_WOMAN		=> '3';

# hh enum ipad sex values
use constant IPAD_MALE			=> 'male';
use constant IPAD_FEMALE		=> 'female';
use constant IPAD_SEX_BOTH 		=> 'both';
use constant IPAD_SEX_UNKNOWN	=> '-2';

# hh enum sugar sex values
use constant MALE				=> '1';
use constant FEMALE				=> '2';
use constant SEX_BOTH 			=> '3';

# hh enum 
use constant PH_SOURCE_SELF 	=> '1';
use constant PH_RANK_PRIMARY 	=> '1';
use constant PH_RANK_SECONDARY 	=> '2';

# hh enum IPAD telephone details
use constant IPAD_PH_TYPE_HOME	=> '1';
use constant IPAD_PH_TYPE_WORK	=> '2';
use constant IPAD_PH_TYPE_CELL	=> '3';
use constant IPAD_PH_TYPE_FAX	=> '4';
use constant IPAD_PH_TYPE_FREIND => '5';
use constant IPAD_PH_TYPE_OTHER => '-5';
use constant IPAD_PH_TYPE_REFUSED => '-4';
use constant IPAD_PH_TYPE_UNKOWN => '-6';

# hh enum sugar telephone details
use constant PH_TYPE_HOME		=> '1';
use constant PH_TYPE_WORK		=> '2';
use constant PH_TYPE_CELL		=> '3';
use constant PH_TYPE_FAX		=> '4';
use constant PH_TYPE_FREIND		=> '5';
use constant PH_TYPE_OTHER => 	'_5';
use constant PH_TYPE_REFUSED => '_4';
use constant PH_TYPE_UNKOWN => 	'_6';

# hh enum relate IPAD values
use constant IPAD_RELATE_SELF	=> 'self';
use constant IPAD_RELATE_WIFE	=> 'wife';
use constant IPAD_RELATE_DAUGHTER	=> 'daughter';
use constant IPAD_RELATE_GRAND_DAUGHTER	=> 'granddaughter';
use constant IPAD_RELATE_MOTHER => 'mother';
use constant IPAD_RELATE_GRAND_MOTHER => 'grandmother';
use constant IPAD_RELATE_SISTER => 'sister';
use constant IPAD_RELATE_PARTNER => 'patner';
use constant IPAD_RELATE_ROOMMATE => 'roommate';
use constant IPAD_RELATE_OTHER_RELATIVE => 'other_relative';
use constant IPAD_RELATE_OTHER_NON_RELATIVE => 'other_nonrelative';
use constant IPAD_RELATE_REFUSED => 'refused';
use constant IPAD_RELATE_DONT_KNOW => "dont_know";

# hh enum relate SUGAR values
use constant SUGAR_RELATE_SELF	=> '1';
use constant SUGAR_RELATE_WIFE	=> '2';
use constant SUGAR_RELATE_DAUGHTER	=> '3';
use constant SUGAR_RELATE_GRAND_DAUGHTER	=> '4';
use constant SUGAR_RELATE_MOTHER => '5';
use constant SUGAR_RELATE_GRAND_MOTHER => '6';
use constant SUGAR_RELATE_SISTER => '7';
use constant SUGAR_RELATE_PARTNER => '8';
use constant SUGAR_RELATE_ROOMMATE => '9';
use constant SUGAR_RELATE_OTHER_RELATIVE => '10';
use constant SUGAR_RELATE_OTHER_NON_RELATIVE => '11';
use constant SUGAR_RELATE_REFUSED => '_1';
use constant SUGAR_RELATE_DONT_KNOW => "_2";

# hh enum particpant type
use constant P_TYPE				=> '_5';

# hh enum participant info source 
use constant P_SOURCE			=> '1';

# hh enum participant source mode 
use constant P_MODE				=> '1';

# hh enum participant entry 
use constant PID_ENTRY			=> '2';

# hh enum event name
use constant EVENT_NAME 		=> 'Household Enumeration';

# hh enum contact name
use constant CONTACT_LINK_NAME 		=> 'Household Enumeration';

# hh enum event type
use constant EVENT_TYPE 		=> '1';

# hh enum event incentive type
use constant INCENTIVE_NONE 	=> '4';

# hh enum instrument name
use constant INSTRUMENT_NAME 	=> 'Household Enumeration Questionnaire';

# hh enum instrument type
use constant HH_INSTRUMENT_TYPE => '1';

# hh enum instrument status
use constant HH_INSTR_STATUS	=> '4';

# hh enum instrument mode
use constant HH_INSTR_MODE		=> '1';

# hh enum pregnant woman relation
use constant PREG_WOMAN_RELATE_SELF	=> '1';
use constant AGE_ELIG_WOMAN_RELATE_SELF	=> '1';

# hh enum dwelling unit not eligiable
use constant DU_INELIGIBLE		=> '2';

# hh enum hh du link rank
use constant RANK_PRIMARY		=> '1';

# hh enum age majority
use constant AGE_MAJORITY		=> 18;

# hh enum case status
use constant CASE_STATUS		=> 'New';

# hh enum person converted
use constant PERSON_NOT_CONVERTED	=> 0;
use constant PERSON_CONVERTED		=> 1;

# hh enum case status
use constant HH_PARTICIPANT_STATUS	=> 'Household Enumeration Completed';

# generic codes
use constant NA					=> '_7';
use constant UNKNOWN			=> '_6';
use constant OTHER				=> '_5';
use constant LEGIT_SKIP			=> '_3';
use constant YES				=> '1';
use constant NO					=> '2';

1;
