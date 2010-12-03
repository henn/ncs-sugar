package Ncs::Soap::SoapDefs;

###########################################################################
#
# NCS Data Transmission File Generator
#
# This module contains SugarCRM SOAP type constant values used by the NCS 
# application(s).
#
###########################################################################

use strict;

###
#
# SOAP details
#
###
use constant SUGAR_SOAP_DOMAIN 		=> 'http://www.sugarcrm.com/sugarcrm';
use constant SUGAR_SOAP_URL			=> 'http://ncs2.sdsc.edu/sugar/soap.php';

use constant SUGAR_SOAP_USERNAME 	=> 'sugaruser';								### Update with valid SugarCRM login username.
# Note, the password is in MD5 encrypted form (the plain text must be encrypted in MD5)
use constant SUGAR_SOAP_MD5PASSWD 	=> 'user_md5_encryted_passwd';				### Update with valid password.

1;
