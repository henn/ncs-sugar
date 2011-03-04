package lib::ZerionDbHelper;

use strict;
use warnings;
use DBI;
use Data::Dumper;
use lib::Const;
###########################################
#
# Data Collection System DB Helper package
#
###########################################
#
# Methods:
#  get_completed_hh_enum_records()
#  get_hh_enum_address_details()
#  get_hh_enum_start_time()
#  get_hh_enum_end_time()
#  get_hh_enum_respondent_person_details()
#  get_hh_enum_telephone_details()
#  get_hh_enum_pregnant_women()
#  get_hh_enum_age_elig_non_pregnant_women()
#  get_hh_enum_hidden_dwelling_units()
#  get_hh_enum_dwelling_unit_eligible()
#  get_hh_enum_age_eligible_women()
#  set_hh_enum_status()
#  complete_hh_enum_record()
# 
###############################

#
# database constants
#
use constant SUGAR_DNS			=> 'DBI:mysql:exzactmobiledb:mysql.sdsc.edu:3312';
#use constant SUGAR_DNS			=> 'DBI:mysql:exzactmobiledb:localhost';
use constant SUGAR_USERNAME		=> '';	# insert a user!!
use constant SUGAR_PASSWD		=> '';	# insert the user password!!

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

	return $self;
}

###############################################################################
#
# get_completed_hh_enum_records()
#
# A method to retrieve the id of the zerion household enumeration records that 
# have completed the questionnaire and have not been post processed.
#
###############################################################################
sub get_completed_hh_enum_records
{
	my $self = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "select a.data_id as DATA_ID from" .
				" sdsc_household_enumeration a, _data10406_household_enumeration b" .
				" where a.data_id = b.id" .
				" and b.form_complete is not null" .
				" and a.processed_status = " . lib::Const::PENDING;
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare completed hh enum records statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute() or return undef;
	
	#
	# fetch results and put into array
	#
	my @ids;
	while(my $row = $sth->fetchrow_hashref())
	{
		push(@ids, $row->{DATA_ID});
	}	

	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return result array
	#	
	return \@ids;
}

###############################################################################
#
# get_hh_enum_address_details()
#
# A method to retrieve the address information of a given zerion record.
#
###############################################################################
sub get_hh_enum_address_details
{
	my $self = shift;
	my $hh_enum_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "select trim(a.address_1) as ADDRESS_1, trim(a.address_2) as ADDRESS_2," .
				" trim(a.unit) as UNIT, trim(a.city) as CITY, trim(a.state_1) as STATE_1," .
				" trim(a.zip) as ZIP, trim(a.zip4) as ZIP4, a.ge001 as GE001, b.address_id as ADDRESS_ID," .
				" b.du_id as DU_ID" .
				" from _data10406_household_enumeration_sub_gen_elig a, sdsc_household_enumeration b" .
				" where a.PARENT_RECORD_ID = b.data_id" .
				" and a.PARENT_RECORD_ID = ? LIMIT 1";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare hh enum address retrieval statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute($hh_enum_id) or return undef;
	
	#
	# fetch results and put into array
	#
	my $row = $sth->fetchrow_hashref() or return undef;

	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return address
	#	
	return $row;
}

###############################################################################
#
# get_hh_enum_start_time()
#
# A method to retrieve the start time of a given zerion record.
#
###############################################################################
sub get_hh_enum_start_time
{
	my $self = shift;
	my $hh_enum_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "select TIME_STAMP_1" .
				" from _data10406_household_enumeration" .
				" where ID = ? LIMIT 1";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare hh enum get start time statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute($hh_enum_id) or return undef;
	
	#
	# fetch results and put into array
	#
	my $row = $sth->fetchrow_hashref() or return undef;
	my $start_time = $row->{TIME_STAMP_1};

	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return start time
	#	
	return $start_time;
}

###############################################################################
#
# get_hh_enum_end_time()
#
# A method to retrieve the end time of a given zerion record.
#
###############################################################################
sub get_hh_enum_end_time
{
	my $self = shift;
	my $hh_enum_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "select TIME_STAMP_12" .
				" from _data10406_household_enumeration_sub_inter_comp" .
				" where PARENT_RECORD_ID = ? LIMIT 1";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare hh enum get end time statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute($hh_enum_id) or return undef;
	
	#
	# fetch results and put into array
	#
	my $row = $sth->fetchrow_hashref() or return undef;
	my $end_time = $row->{TIME_STAMP_12};

	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return end time
	#	
	return $end_time;
}

###############################################################################
#
# get_hh_enum_respondent_person_details()
#
# A method to retrieve the hh enum respondent person details for a given zerion 
# record.
#
###############################################################################
sub get_hh_enum_respondent_person_details
{
	my $self = shift;
	my $hh_enum_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "select trim(a.r_fname) as FNAME, trim(a.r_lname) as LNAME, b.r_gender as SEX" .
				" from _data10406_household_enumeration_sub_tracing_questions a, _data10406_household_enumeration_sub_house_roster b" .
				" where a.PARENT_RECORD_ID = b.PARENT_RECORD_ID" .
				" and a.PARENT_RECORD_ID = ? LIMIT 1";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare hh enum get respondent person details statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute($hh_enum_id) or return undef;
	
	#
	# fetch results
	#
	my $row = $sth->fetchrow_hashref() or return undef;
	my $fname = $row->{FNAME} || '';
	my $lname = $row->{LNAME} || '';
	my $sex = $row->{SEX} || lib::Const::UNKNOWN;

	#
	# perform a conversion on sex (may or may not be needed)
	#
	if ($sex eq lib::Const::IPAD_MALE) {
		$sex = lib::Const::MALE;
	} elsif ($sex eq lib::Const::IPAD_FEMALE) {
		$sex = lib::Const::FEMALE;
	} elsif ($sex eq lib::Const::IPAD_SEX_BOTH) {
		$sex = lib::Const::SEX_BOTH;
	} else {
		$sex = lib::Const::UNKNOWN;
	}
	
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return details
	#	
	return ($fname, $lname, $sex);
}

###############################################################################
#
# get_hh_enum_telephone_details()
#
# A method to retrieve the hh enum respondent telephone details for a given zerion 
# record.
#
###############################################################################
sub get_hh_enum_telephone_details
{
	my $self = shift;
	my $hh_enum_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "select trim(a.phone_nbr) as PHONE_NBR, a.phone_type as PHONE_TYPE," .
				" a.phone_type_oth as PHONE_TYPE_OTH, trim(a.phone_alt) as PHONE_ALT," .
				" a.phone_alt_type as PHONE_ALT_TYPE, a.phone_alt_type_oth as PHONE_ALT_TYPE_OTH" .
				" from _data10406_household_enumeration_sub_tracing_questions a" .
				" where a.PARENT_RECORD_ID = ? LIMIT 1";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare hh enum get respondent telephone details statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute($hh_enum_id) or return undef;
	
	#
	# fetch results
	#
	my $row = $sth->fetchrow_hashref() or return undef;

	#
	# perform a conversion on phone_type (may or may not be needed)
	#
	if ($row->{PHONE_TYPE} eq lib::Const::IPAD_PH_TYPE_HOME) {
		$row->{PHONE_TYPE} = lib::Const::PH_TYPE_HOME;
	} elsif ($row->{PHONE_TYPE} eq lib::Const::IPAD_PH_TYPE_WORK) {
		$row->{PHONE_TYPE} = lib::Const::PH_TYPE_WORK;
	} elsif ($row->{PHONE_TYPE} eq lib::Const::IPAD_PH_TYPE_CELL) {
		$row->{PHONE_TYPE} = lib::Const::PH_TYPE_CELL;
	} elsif ($row->{PHONE_TYPE} eq lib::Const::IPAD_PH_TYPE_FAX) {
		$row->{PHONE_TYPE} = lib::Const::PH_TYPE_FAX;
	} elsif ($row->{PHONE_TYPE} eq lib::Const::IPAD_PH_TYPE_FREIND) {
		$row->{PHONE_TYPE} = lib::Const::PH_TYPE_FREIND;
	} elsif ($row->{PHONE_TYPE} eq lib::Const::IPAD_PH_TYPE_OTHER) {
		$row->{PHONE_TYPE} = lib::Const::PH_TYPE_OTHER;
	} elsif ($row->{PHONE_TYPE} eq lib::Const::IPAD_PH_TYPE_REFUSED) {
		$row->{PHONE_TYPE} = lib::Const::PH_TYPE_REFUSED;
	} elsif ($row->{PHONE_TYPE} eq lib::Const::IPAD_PH_TYPE_UNKOWN) {
		$row->{PHONE_TYPE} = lib::Const::IPAD_PH_TYPE_UNKOWN;
	}
	
	#
	# perform a conversion on phone_alt_type (may or may not be needed)
	#
	if ($row->{PHONE_ALT_TYPE} eq lib::Const::IPAD_PH_TYPE_HOME) {
		$row->{PHONE_ALT_TYPE} = lib::Const::PH_TYPE_HOME;
	} elsif ($row->{PHONE_ALT_TYPE} eq lib::Const::IPAD_PH_TYPE_WORK) {
		$row->{PHONE_ALT_TYPE} = lib::Const::PH_TYPE_WORK;
	} elsif ($row->{PHONE_ALT_TYPE} eq lib::Const::IPAD_PH_TYPE_CELL) {
		$row->{PHONE_ALT_TYPE} = lib::Const::PH_TYPE_CELL;
	} elsif ($row->{PHONE_ALT_TYPE} eq lib::Const::IPAD_PH_TYPE_FAX) {
		$row->{PHONE_ALT_TYPE} = lib::Const::PH_TYPE_FAX;
	} elsif ($row->{PHONE_ALT_TYPE} eq lib::Const::IPAD_PH_TYPE_FREIND) {
		$row->{PHONE_ALT_TYPE} = lib::Const::PH_TYPE_FREIND;
	} elsif ($row->{PHONE_ALT_TYPE} eq lib::Const::IPAD_PH_TYPE_OTHER) {
		$row->{PHONE_ALT_TYPE} = lib::Const::PH_TYPE_OTHER;
	} elsif ($row->{PHONE_ALT_TYPE} eq lib::Const::IPAD_PH_TYPE_REFUSED) {
		$row->{PHONE_ALT_TYPE} = lib::Const::PH_TYPE_REFUSED;
	} elsif ($row->{PHONE_ALT_TYPE} eq lib::Const::IPAD_PH_TYPE_UNKOWN) {
		$row->{PHONE_ALT_TYPE} = lib::Const::IPAD_PH_TYPE_UNKOWN;
	}

	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return details
	#	
	return $row;
}


###############################################################################
#
# get_hh_enum_pregnant_women()
#
# A method to retrieve the records of pregnant women enumerated in the 
# household enumeraiton questionnaire.
#
###############################################################################
sub get_hh_enum_pregnant_women
{
	my $self = shift;
	my $hh_enum_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "select p_age as P_AGE, p_fname as P_FNAME, p_relate as P_RELATE" .
				" from _data10406_household_enumeration_sub_house_rost_sub_1_preg" .
				" where PARENT_RECORD_ID = ?";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare hh enum pregnant women statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute($hh_enum_id) or return undef;
	
	#
	# fetch results and put into array
	#
	my @preg_woman;
	while(my $row = $sth->fetchrow_hashref())
	{
		#
		# perform a conversion on pregnant relation (may or may not be needed)
		#
		if ($row->{P_RELATE} eq lib::Const::IPAD_RELATE_SELF) {
			$row->{P_RELATE} = lib::Const::SUGAR_RELATE_SELF;
		} elsif ($row->{P_RELATE} eq lib::Const::IPAD_RELATE_WIFE) {
			$row->{P_RELATE} = lib::Const::SUGAR_RELATE_WIFE;
		} elsif ($row->{P_RELATE} eq lib::Const::IPAD_RELATE_DAUGHTER) {
			$row->{P_RELATE} = lib::Const::SUGAR_RELATE_DAUGHTER;
		} elsif ($row->{P_RELATE} eq lib::Const::IPAD_RELATE_GRAND_DAUGHTER) {
			$row->{P_RELATE} = lib::Const::SUGAR_RELATE_GRAND_DAUGHTER;
		} elsif ($row->{P_RELATE} eq lib::Const::IPAD_RELATE_MOTHER) {
			$row->{P_RELATE} = lib::Const::SUGAR_RELATE_MOTHER;
		} elsif ($row->{P_RELATE} eq lib::Const::IPAD_RELATE_GRAND_MOTHER) {
			$row->{P_RELATE} = lib::Const::SUGAR_RELATE_GRAND_MOTHER;
		} elsif ($row->{P_RELATE} eq lib::Const::IPAD_RELATE_SISTER) {
			$row->{P_RELATE} = lib::Const::SUGAR_RELATE_SISTER;
		} elsif ($row->{P_RELATE} eq lib::Const::IPAD_RELATE_PARTNER) {
			$row->{P_RELATE} = lib::Const::SUGAR_RELATE_PARTNER;
		} elsif ($row->{P_RELATE} eq lib::Const::IPAD_RELATE_ROOMMATE) {
			$row->{P_RELATE} = lib::Const::SUGAR_RELATE_ROOMMATE;
		} elsif ($row->{P_RELATE} eq lib::Const::IPAD_RELATE_OTHER_RELATIVE) {
			$row->{P_RELATE} = lib::Const::SUGAR_RELATE_OTHER_RELATIVE;
		} elsif ($row->{P_RELATE} eq lib::Const::IPAD_RELATE_OTHER_NON_RELATIVE) {
			$row->{P_RELATE} = lib::Const::SUGAR_RELATE_OTHER_NON_RELATIVE;
		} elsif ($row->{P_RELATE} eq lib::Const::IPAD_RELATE_REFUSED) {
			$row->{P_RELATE} = lib::Const::SUGAR_RELATE_REFUSED;
		} elsif ($row->{P_RELATE} eq lib::Const::IPAD_RELATE_DONT_KNOW) {
			$row->{P_RELATE} = lib::Const::SUGAR_RELATE_DONT_KNOW;
		}
				
		push(@preg_woman, $row);
	}	

	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return array of hash ref pregnant women
	#	
	return \@preg_woman;
}


###############################################################################
#
# get_hh_enum_age_elig_non_pregnant_women()
#
# A method to retrieve the records of age eligible non-pregnant women enumerated 
# in the household enumeraiton questionnaire.
#
###############################################################################
sub get_hh_enum_age_elig_non_pregnant_women
{
	my $self = shift;
	my $hh_enum_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "select age_elig_age as AGE_ELIG_AGE, age_elig_fname as AGE_ELIG_FNAME," .
				" age_elig_relate as AGE_ELIG_RELATE" .
				" from _data10406_household_enumeration_house_rost_sub_women_other" .
				" where PARENT_RECORD_ID = ?";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare hh enum age eligible non-pregnant women statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute($hh_enum_id) or return undef;
	
	#
	# fetch results and put into array
	#
	my @age_elig_woman;
	while(my $row = $sth->fetchrow_hashref())
	{
	
		#
		# perform a conversion on non-pregnant age eligible relation (may or may not be needed)
		#
		if ($row->{AGE_ELIG_RELATE} eq lib::Const::IPAD_RELATE_SELF) {
			$row->{AGE_ELIG_RELATE} = lib::Const::SUGAR_RELATE_SELF;
		} elsif ($row->{AGE_ELIG_RELATE} eq lib::Const::IPAD_RELATE_WIFE) {
			$row->{AGE_ELIG_RELATE} = lib::Const::SUGAR_RELATE_WIFE;
		} elsif ($row->{AGE_ELIG_RELATE} eq lib::Const::IPAD_RELATE_DAUGHTER) {
			$row->{AGE_ELIG_RELATE} = lib::Const::SUGAR_RELATE_DAUGHTER;
		} elsif ($row->{AGE_ELIG_RELATE} eq lib::Const::IPAD_RELATE_GRAND_DAUGHTER) {
			$row->{AGE_ELIG_RELATE} = lib::Const::SUGAR_RELATE_GRAND_DAUGHTER;
		} elsif ($row->{AGE_ELIG_RELATE} eq lib::Const::IPAD_RELATE_MOTHER) {
			$row->{AGE_ELIG_RELATE} = lib::Const::SUGAR_RELATE_MOTHER;
		} elsif ($row->{AGE_ELIG_RELATE} eq lib::Const::IPAD_RELATE_GRAND_MOTHER) {
			$row->{AGE_ELIG_RELATE} = lib::Const::SUGAR_RELATE_GRAND_MOTHER;
		} elsif ($row->{AGE_ELIG_RELATE} eq lib::Const::IPAD_RELATE_SISTER) {
			$row->{AGE_ELIG_RELATE} = lib::Const::SUGAR_RELATE_SISTER;
		} elsif ($row->{AGE_ELIG_RELATE} eq lib::Const::IPAD_RELATE_PARTNER) {
			$row->{AGE_ELIG_RELATE} = lib::Const::SUGAR_RELATE_PARTNER;
		} elsif ($row->{AGE_ELIG_RELATE} eq lib::Const::IPAD_RELATE_ROOMMATE) {
			$row->{AGE_ELIG_RELATE} = lib::Const::SUGAR_RELATE_ROOMMATE;
		} elsif ($row->{AGE_ELIG_RELATE} eq lib::Const::IPAD_RELATE_OTHER_RELATIVE) {
			$row->{AGE_ELIG_RELATE} = lib::Const::SUGAR_RELATE_OTHER_RELATIVE;
		} elsif ($row->{AGE_ELIG_RELATE} eq lib::Const::IPAD_RELATE_OTHER_NON_RELATIVE) {
			$row->{AGE_ELIG_RELATE} = lib::Const::SUGAR_RELATE_OTHER_NON_RELATIVE;
		} elsif ($row->{AGE_ELIG_RELATE} eq lib::Const::IPAD_RELATE_REFUSED) {
			$row->{AGE_ELIG_RELATE} = lib::Const::SUGAR_RELATE_REFUSED;
		} elsif ($row->{AGE_ELIG_RELATE} eq lib::Const::IPAD_RELATE_DONT_KNOW) {
			$row->{AGE_ELIG_RELATE} = lib::Const::SUGAR_RELATE_DONT_KNOW;
		}
			
		push(@age_elig_woman, $row);
	}	

	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return array of hash ref age elig non-pregnant women
	#	
	return \@age_elig_woman;
}

###############################################################################
#
# get_hh_enum_hidden_dwelling_units()
#
# A method to retrieve the records of hidden dwelling units in the 
# household enumeraiton questionnaire.
#
###############################################################################
sub get_hh_enum_hidden_dwelling_units
{
	my $self = shift;
	my $hh_enum_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "select HDU_ADDRESS_1 as HDU_ADDRESS_1, HDU_ADDRESS_2 as HDU_ADDRESS_2," .
				" HDU_UNIT as HDU_UNIT, HDU_CITY as HDU_CITY, HDU_STATE as HDU_STATE," . 
				" HDU_ZIP as HDU_ZIP" .
				" from _data10406_household_enumeration_sub_hid_dwell_sub_hid" .
				" where PARENT_RECORD_ID = ?";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare hh enum hidden dwelling unit statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute($hh_enum_id) or return undef;
	
	#
	# fetch results and put into array
	#
	my @hidden_dus;
	while(my $row = $sth->fetchrow_hashref())
	{
		push(@hidden_dus, $row);
	}	

	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return array of hash ref pregnant women
	#	
	return \@hidden_dus;
}

###############################################################################
#
# get_hh_enum_dwelling_unit_eligible()
#
# A method to retrieve the du_elig_confirm field of a given zerion record.
#
###############################################################################
sub get_hh_enum_dwelling_unit_eligible
{
	my $self = shift;
	my $hh_enum_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "select DU_ELIG_CONFIRM" .
				" from _data10406_household_enumeration_sub_gen_elig" .
				" where PARENT_RECORD_ID = ? LIMIT 1";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare hh enum get DU_ELIG_CONFIRM statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute($hh_enum_id) or return undef;
	
	#
	# fetch results and put into array
	#
	my $row = $sth->fetchrow_hashref() or return undef;
	my $du_elig_confirm = $row->{DU_ELIG_CONFIRM};

	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return DU_ELIG_CONFIRM value
	#	
	return $du_elig_confirm;
}

###############################################################################
#
# get_hh_enum_age_eligible_women()
#
# A method to retrieve the number of age eligible women field for a given 
# zerion record.
#
###############################################################################
sub get_hh_enum_age_eligible_women
{
	my $self = shift;
	my $hh_enum_id = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "select HH_AGE_ELIG" .
				" from _data10406_household_enumeration_sub_house_roster" .
				" where PARENT_RECORD_ID = ? LIMIT 1";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare hh enum get hh_age_eligible statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute($hh_enum_id) or return undef;
	
	#
	# fetch results and put into array
	#
	my $row = $sth->fetchrow_hashref() or return undef;
	my $hh_age_eligible = $row->{HH_AGE_ELIG};

	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return hh_age_eligible value
	#	
	return $hh_age_eligible;
}

###############################################################################
#
# set_hh_enum_status()
#
# A method to update the processed status of a given hh enum record.
#
###############################################################################
sub set_hh_enum_status
{
	my $self = shift;
	my $hh_enum_id = shift;
	my $status = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "update sdsc_household_enumeration set processed_status = ?" .
				" where data_id = ?";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare hh enum set processed status statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute($status, $hh_enum_id) or return undef;
	
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return success
	#	
	return 1;
}

###############################################################################
#
# complete_hh_enum_record()
#
# A method to update the supplied hh enum records lookup table informatio.  This
# is all the extra information required by the xml extract.
#
###############################################################################
sub complete_hh_enum_record
{
	my $self = shift;
	my $hh_enum_id  = shift;
	my $psu_id  = shift;
	my $psu_name  = shift; 
	my $age_majority = shift;
	my $recruit_type = shift; 
	my $du_id  = shift;
	my $household_unit_id = shift;
	my $participant_id = shift;
	my $event_id  = shift;
	my $event_type  = shift; 
	my $instrument_id  = shift;
	my $instrument_type = shift;
	
	#
	# login to db
	#
	my $dbh = DBI->connect($self->{_dns}, $self->{_username}, $self->{_passwd})
		or die("Unable to connect to database: $DBI::errstr");
	die("Unable to connect to database: $DBI::errstr") unless ($dbh);

	#
	# construct query
	#
	my $sql = "update sdsc_household_enumeration set psu_id = ?, psu_name = ?, hhenum_id = ?," .
				" age_majority = ?, recruit_type = ?, du_id = ?, hh_id = ?, p_id = ?, event_id = ?," .
				" event_type = ?, event_repeat_key = ?, instrument_id = ?, instrument_type = ?," .
				" instrument_repeat_key = ?" .
				" where data_id = ?";
				
	#
	# prepare query
	#					
	my $sth = $dbh->prepare($sql);

	if (! defined($sth)) {
		print "Failed to prepare hh enum set processed status statement.\n";
		$dbh->disconnect();
		return undef;
	}
	
	#
	# execute query
	#	
	$sth->execute($psu_id, $psu_name, $hh_enum_id, $age_majority, $recruit_type, $du_id, 
					$household_unit_id, $participant_id, $event_id, $event_type, 0, 
					$instrument_id, $instrument_type, 0, $hh_enum_id) or return undef;
	
	#
	# clean up
	#
	$sth->finish();
	$dbh->disconnect();
	
	#
	# return success
	#	
	return 1;
}

sub getDns		{ my $self = shift; return $self->{_dns} || ''; }
sub getUsername		{ my $self = shift; return $self->{_username} || ''; }
sub getPasswd		{ my $self = shift; return $self->{_passwd} || ''; }

1;
