package Ncs::Instr;

###########################################################################
#
# NCS Data Transmission File Generator
#
# This module contains 'instrument' type constant values used by the NCS 
# application(s).
#
###########################################################################

use strict;

###########################
#
# Instrument field values
#
###########################
use constant YES							=> 1;
use constant NO								=> 2;
use constant REFUSED 						=> -1;
use constant DONT_KNOWN 					=> -2;
use constant LEGITIMATE_SKIP 				=> -3;
use constant MISSING_IN_ERROR 				=> -4;
use constant OTHER 							=> -5;

# Date #
use constant REFUSED_DATE 					=> '9111-91-91';
use constant DONT_KNOW_DATE 				=> '9222-92-92';
use constant LEGITIMATE_SKIP_DATE 			=> '9333-93-93';
use constant REFUSED_YEAR_MONTH 			=> '9111-91';
use constant DONT_KNOW_YEAR_MONTH 			=> '9222-92';
use constant LEGITIMATE_SKIP_YEAR_MONTH 	=> '9333-93';

###########################
#
# Instrument Data Element Table Version Numbers.
#
# Table version numbers; it was deemed not necessary to create the 
# 'table_spec_version' field inside the database tables.  Therefore, we
# handle the table version numbers from within the transmission
# script.
#
###########################
use constant PREGNANCY_SCREENER_VERSION					=> '1.0';
use constant PREGNANCY_SCREENER_RACE_VERSION			=> '1.0';
use constant PREGNANCY_SCREENER_HOW_KNOW_NCS_VERSION	=> '1.0';
use constant HOUSEHOLD_ENUMERATION_VERSION 				=> '1.0';
use constant HOUSEHOLD_ENUMERATION_PREGNANT_VERSION 	=> '1.0';
use constant HOUSEHOLD_ENUMERATION_AGE_ELIG_VERSION 	=> '1.0';

1;
