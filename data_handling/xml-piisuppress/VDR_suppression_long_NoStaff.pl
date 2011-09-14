#!/usr/bin/perl

use strict;
use warnings;

#Before running the script the XML document that needs to be suppressed needs to be saved as a multiline document. This can be done in Notepad++ if you have XML Tools already installed. If not please keep reading.
#	1.	Go to Plugins -> Plugins Manager -> Show Plugins Manager
#	2.	When the Plugins Managers pops up scroll down and find XML Tools. Check its box and click install. Notepad++ will restart.
#	3.	After it starts again under the Plugins tab there should be a new filed XML Tools.
#Now that the XML Tools are installed open the desired document. Click on the Plugins Tab, then XML Tools and choose Pretty Print (XML only with line breaks). The transformation may take a while depending on the size of the XML file. When the file has been transformed save it again. 
#Run the script on top of the transformed file. 

###Update the filename and path if needed

#If the file is in the smae folder as the script then there is no need to write the whole path to the file
open(inputFile,'input1.xml');
#If you do not write the path to the output file, it will be created in the same folder as the script
open(OUTFILE, '>supressed.xml');

#array to hold the staff and all its attributes
my %staff =( "Bryan.Name", "12AB3456",
		"Jenny.False", "56BA3412");
		
#array to hold the staff ID linked to staff type values
my %staff_if_type = ( "12AB3456", 9,
		"56BA3412", 10,);

my($id,$type,$person);

while (<inputFile>) {
#Some of the fields are commented out because they are already suppressed in previous tables,
#due to duplicated field names they do not need to be suppressed again.
#The fields are left in just for reference. 

#Logical ckeck to insert the staff table after the dweling unit table ends
if ($_=~/<\/dwelling_unit>/){
	print OUTFILE $_;
	while(<inputFile>){
		if($_=~/<person>/){
			while(($id,$type) = each(%staff_if_type)){
				print OUTFILE 	"\t\t<staff>\n";
				print OUTFILE   "\t\t\t<psu_id>20000032</psu_id>\n";
				print OUTFILE   "\t\t\t<staff_id>$id</staff_id>\n";#populate the next staff ID
				print OUTFILE   "\t\t\t<staff_type>$type</staff_type>\n";
				print OUTFILE   "\t\t\t<staff_type_oth>-7</staff_type_oth>\n";
				print OUTFILE   "\t\t\t<subcontractor>-4</subcontractor>\n";
				print OUTFILE   "\t\t\t<staff_yob></staff_yob>\n";
				print OUTFILE   "\t\t\t<staff_age_range>-6</staff_age_range>\n";
				print OUTFILE   "\t\t\t<staff_gender>-6</staff_gender>\n";
				print OUTFILE   "\t\t\t<staff_race>-6</staff_race>\n";
				print OUTFILE   "\t\t\t<staff_race_oth>-7</staff_race_oth>\n";
				print OUTFILE   "\t\t\t<staff_ethnicity>-6</staff_ethnicity>\n";
				print OUTFILE   "\t\t\t<staff_exp>-7</staff_exp>\n";
				print OUTFILE   "\t\t\t<staff_comment></staff_comment>\n";
				print OUTFILE   "\t\t\t<transaction_type></transaction_type>\n";
				print OUTFILE	"\t\t</staff>\n";
			}
			print OUTFILE	"\t\t<person>\n"; #The table tag that follows the staff table #Update if needed
		}
		else{
			last;
		}	
	}
}

#If the staff_id contains a name of any of the staffmembers exchange it with his/hers id number
elsif($_=~ /<staff_id>.+<\/staff_id>/){
	while(($person,$id) = each(%staff)){
		if($_=~ m/$person/i){
		$_=~ s/<staff_id>.+<\/staff_id>/<staff_id>$id<\/staff_id>/g;
		}
	}
}

#The elsif statement makes sure that the address table is filled with the correct state value
#since the state in address table has to be -6, unlike any other state
elsif($_=~/<address>/){
	print OUTFILE $_;
	while (<inputFile>){
	if($_=~/<\/address>/){
	print OUTFILE $_;
	last;
	}
	 $_ =~ s/(<address_1>)(.+)(<\/address_1>)/<address_1>-3<\/address_1>/g;
	 $_ =~ s/(<address_2>)(.+)(<\/address_2>)/<address_2>-3<\/address_2>/g;
	 $_ =~ s/(<unit>)(.+)(<\/unit>)/<unit>-6<\/unit>/g;
	 $_ =~ s/(<city>)(.+)(<\/city>)/<city>-3<\/city>/g;
	 $_ =~ s/(<state>)(.+)(<\/state>)/<state>-6<\/state>/g;
	 $_ =~ s/(<address_comment>)(.+)(<\/address_comment>)/<address_comment>-3<\/address_comment>/g;
	 print OUTFILE $_;
	 }
 }
 
#Change the psu_id to the correct psu_id
elsif( $_ =~/<psu_id>.+<\/psu_id>/){
	$_ =~ s/(<psu_id>)(.+)(<\/psu_id>)/<psu_id>20000032<\/psu_id>/g;
}

else {
#PERSON table
	$_ =~ s/(<first_name>)(.+)(<\/first_name>)/<first_name>-3<\/first_name>/g;
	$_ =~ s/(<last_name>)(.+)(<\/last_name>)/<last_name>-3<\/last_name>/g;
	#$_ =~ s/(<middle_name>)(.+)(<\/middle_name>)/<middle_name>-3<\/middle_name>/g;
	#$_ =~ s/(<maiden_name>)(.+)(<\/maiden_name>)/<maiden_name>-3<\/maiden_name>/g;
#ADDRESS table
	$_ =~ s/(<address_1>)(.+)(<\/address_1>)/<address_1>-3<\/address_1>/g;
	$_ =~ s/(<address_2>)(.+)(<\/address_2>)/<address_2>-3<\/address_2>/g;
	$_ =~ s/(<unit>)(.+)(<\/unit>)/<unit>-6<\/unit>/g;
	$_ =~ s/(<city>)(.+)(<\/city>)/<city>-3<\/city>/g;
	$_ =~ s/(<state>)(.+)(<\/state>)/<state>-3<\/state>/g;
	$_ =~ s/(<address_comment>)(.+)(<\/address_comment>)/<address_comment>-3<\/address_comment>/g;
#TELEPHONE table	
	$_ =~ s/(<phone_nbr>)(.+)(<\/phone_nbr>)/<phone_nbr>-3<\/phone_nbr>/g;
	$_ =~ s/(<phone_ext>)(.+)(<\/phone_ext>)/<phone_ext>-3<\/phone_ext>/g;
	$_ =~ s/(<phone_comment>)(.+)(<\/phone_comment>)/<phone_comment>-3<\/phone_comment>/g;
#EMAIL table	
	$_ =~ s/(<email>)(.+)(<\/email>)/<email>-3<\/email>/g;
#NON_INTERVIEW_RPT table	
	$_ =~ s/(<state_death>)(.+)(<\/state_death>)/<state_death>-6<\/state_death>/g;
#BIRTH_VISIT table	
	$_ =~ s/(<r_fname>)(.+)(<\/r_fname>)/<r_fname>-3<\/r_fname>/g;
	$_ =~ s/(<r_lname>)(.+)(<\/r_lname>)/<r_lname>-3<\/r_lname>/g;
	#$_ =~ s/(<phone_nbr>)(.+)(<\/phone_nbr>)/<phone_nbr>-3<\/phone_nbr>/g;
	$_ =~ s/(<friend_phone_oth>)(.+)(<\/friend_phone_oth>)/<friend_phone_oth>-3<\/friend_phone_oth>/g;
	$_ =~ s/(<home_phone>)(.+)(<\/home_phone>)/<home_phone>-3<\/home_phone>/g;	
	$_ =~ s/(<cell_phone>)(.+)(<\/cell_phone>)/<cell_phone>-3<\/cell_phone>/g;
	$_ =~ s/(<new_address_1>)(.+)(<\/new_address_1>)/<new_address_1>-3<\/new_address_1>/g;
	$_ =~ s/(<new_address_2>)(.+)(<\/new_address_2>)/<new_address_2>-3<\/new_address_2>/g;
	$_ =~ s/(<new_unit>)(.+)(<\/new_unit>)/<new_unit>-3<\/new_unit>/g;
	$_ =~ s/(<new_city>)(.+)(<\/new_city>)/<new_city>-3<\/new_city>/g;
	$_ =~ s/(<new_state>)(.+)(<\/new_state>)/<new_state>-3<\/new_state>/g;
	$_ =~ s/(<mail_address1>)(.+)(<\/mail_address1>)/<mail_address1>-3<\/mail_address1>/g;
	$_ =~ s/(<mail_address2>)(.+)(<\/mail_address2>)/<mail_address2>-3<\/mail_address2>/g;
	$_ =~ s/(<mail_unit>)(.+)(<\/mail_unit>)/<mail_unit>-3<\/mail_unit>/g;
	$_ =~ s/(<mail_city>)(.+)(<\/mail_city>)/<mail_city>-3<\/mail_city>/g;
	$_ =~ s/(<mail_state>)(.+)(<\/mail_state>)/<mail_state>-3<\/mail_state>/g;
	#$_ =~ s/(<email>)(.+)(<\/email>)/<email>-3<\/email>/g;
	$_ =~ s/(<new_address1_b>)(.+)(<\/new_address1_b>)/<new_address1_b>-3<\/new_address1_b>/g;
	$_ =~ s/(<new_address2_b>)(.+)(<\/new_address2_b>)/<new_address2_b>-3<\/new_address2_b>/g;
	$_ =~ s/(<new_unit_b>)(.+)(<\/new_unit_b>)/<new_unit_b>-3<\/new_unit_b>/g;
	$_ =~ s/(<new_city_b>)(.+)(<\/new_city_b>)/<new_city_b>-3<\/new_city_b>/g;
	$_ =~ s/(<new_state_b>)(.+)(<\/new_state_b>)/<new_state_b>-3<\/new_state_b>/g;
#BABY_VISIT_BABY_NAME table	
	$_ =~ s/(<baby_fname>)(.+)(<\/baby_fname>)/<baby_fname>-3<\/baby_fname>/g;
	$_ =~ s/(<baby_mname>)(.+)(<\/baby_mname>)/<baby_mname>-3<\/baby_mname>/g;
	$_ =~ s/(<baby_lname>)(.+)(<\/baby_lname>)/<baby_lname>-3<\/baby_lname>/g;
#HOUSEHOLD_ENUMERATION table
	#$_ =~ s/(<address_1>)(.+)(<\/address_1>)/<address_1>-3<\/address_1>/g;
	#$_ =~ s/(<address_2>)(.+)(<\/address_2>)/<address_2>-3<\/address_2>/g;
	#$_ =~ s/(<unit>)(.+)(<\/unit>)/<unit>-6<\/unit>/g;
	#$_ =~ s/(<city>)(.+)(<\/city>)/<city>-3<\/city>/g;
	#$_ =~ s/(<state>)(.+)(<\/state>)/<state>-3<\/state>/g;
	#$_ =~ s/(<r_fname>)(.+)(<\/r_fname>)/<r_fname>-3<\/r_fname>/g;
	#$_ =~ s/(<r_lname>)(.+)(<\/r_lname>)/<r_lname>-3<\/r_lname>/g;
	#$_ =~ s/(<phone_nbr>)(.+)(<\/phone_nbr>)/<phone_nbr>-3<\/phone_nbr>/g;
	$_ =~ s/(<phone_alt>)(.+)(<\/phone_alt>)/<phone_alt>-3<\/phone_alt>/g;
#HOUSEHOLD_ENUMERATION_AGE_ELIG table
	$_ =~ s/(<age_elig_fname>)(.+)(<\/age_elig_fname>)/<age_elig_fname>-3<\/age_elig_fname>/g;
	$_ =~ s/(<hdu_address_1>)(.+)(<\/hdu_address_1>)/<hdu_address_1>-3<\/hdu_address_1>/g;
	$_ =~ s/(<hdu_address_2>)(.+)(<\/hdu_address_2>)/<hdu_address_2>-3<\/hdu_address_2>/g;
	$_ =~ s/(<hdu_unit>)(.+)(<\/hdu_unit>)/<hdu_unit>-3<\/hdu_unit>/g;
	$_ =~ s/(<hdu_city>)(.+)(<\/hdu_city>)/<hdu_city>-3<\/hdu_city>/g;
	$_ =~ s/(<hdu_state>)(.+)(<\/hdu_state>)/<hdu_state>-3<\/hdu_state>/g;
	$_ =~ s/(<p_fname>)(.+)(<\/p_fname>)/<p_fname>-3<\/p_fname>/g;
	$_ =~ s/(<c_fname>)(.+)(<\/c_fname>)/<c_fname>-3<\/c_fname>/g;
	$_ =~ s/(<c_lname>)(.+)(<\/c_lname>)/<c_lname>-3<\/c_lname>/g;
#PB_RECRUITMENT table	
	#$_ =~ s/(<address_1>)(.+)(<\/address_1>)/<address_1>-3<\/address_1>/g;
	#$_ =~ s/(<address_2>)(.+)(<\/address_2>)/<address_2>-3<\/address_2>/g;
	#$_ =~ s/(<unit>)(.+)(<\/unit>)/<unit>-6<\/unit>/g;
	#$_ =~ s/(<city>)(.+)(<\/city>)/<city>-3<\/city>/g;
#PPG_CATI table
	#$_ =~ s/(<phone_nbr>)(.+)(<\/phone_nbr>)/<phone_nbr>-3<\/phone_nbr>/g;
#PPG_SAQ	
	$_ =~ s/(<contact>)(.+)(<\/contact>)/<contact>-3<\/contact>/g;
	$_ =~ s/(<home_address>)(.+)(<\/home_address>)/<home_address>-3<\/home_address>/g;
	$_ =~ s/(<mail_address>)(.+)(<\/mail_address>)/<mail_address>-3<\/mail_address>/g;
	$_ =~ s/(<phone>)(.+)(<\/phone>)/<phone>-3<\/phone>/g;
	#$_ =~ s/(<home_phone>)(.+)(<\/home_phone>)/<home_phone>-3<\/home_phone>/g;
	$_ =~ s/(<work_phone>)(.+)(<\/work_phone>)/<work_phone>-3<\/work_phone>/g;
	#$_ =~ s/(<cell_phone>)(.+)(<\/cell_phone>)/<cell_phone>-3<\/cell_phone>/g;
	$_ =~ s/(<other_phone>)(.+)(<\/other_phone>)/<other_phone>-3<\/other_phone>/g;
	#$_ =~ s/(<email>)(.+)(<\/email>)/<email>-3<\/email>/g;
#PRE_PREG table
	#$_ =~ s/(<r_fname>)(.+)(<\/r_fname>)/<r_fname>-3<\/r_fname>/g;
	#$_ =~ s/(<r_lname>)(.+)(<\/r_lname>)/<r_lname>-3<\/r_lname>/g;
	#$_ =~ s/(<email>)(.+)(<\/email>)/<email>-3<\/email>/g;
	#$_ =~ s/(<cell_phone>)(.+)(<\/cell_phone>)/<cell_phone>-3<\/cell_phone>/g;
	$_ =~ s/(<contact_fname_1>)(.+)(<\/contact_fname_1>)/<contact_fname_1>-3<\/contact_fname_1>/g;
	$_ =~ s/(<contact_lname_1>)(.+)(<\/contact_lname_1>)/<contact_lname_1>-3<\/contact_lname_1>/g;
	$_ =~ s/(<contact_addr_1>)(.+)(<\/contact_addr_1>)/<contact_addr_1>-3<\/contact_addr_1>/g;
	$_ =~ s/(<c_addr1_1>)(.+)(<\/c_addr1_1>)/<c_addr1_1>-3<\/c_addr1_1>/g;	
	$_ =~ s/(<c_addr_2_1>)(.+)(<\/c_addr_2_1>)/<c_addr_2_1>-3<\/c_addr_2_1>/g;
	$_ =~ s/(<c_unit_1>)(.+)(<\/c_unit_1>)/<c_unit_1>-3<\/c_unit_1>/g;
	$_ =~ s/(<c_city_1>)(.+)(<\/c_city_1>)/<c_city_1>-3<\/c_city_1>/g;
	$_ =~ s/(<c_state_1>)(.+)(<\/c_state_1>)/<c_state_1>-3<\/c_state_1>/g;
	$_ =~ s/(<contact_phone_1>)(.+)(<\/contact_phone_1>)/<contact_phone_1>-3<\/contact_phone_1>/g;
	$_ =~ s/(<contact_2>)(.+)(<\/contact_2>)/<contact_2>-3<\/contact_2>/g;
	$_ =~ s/(<contact_fname_2>)(.+)(<\/contact_fname_2>)/<contact_fname_2>-3<\/contact_fname_2>/g;
	$_ =~ s/(<contact_lname_2>)(.+)(<\/contact_lname_2>)/<contact_lname_2>-3<\/contact_lname_2>/g;
	$_ =~ s/(<contact_addr_2>)(.+)(<\/contact_addr_2>)/<contact_addr_2>-3<\/contact_addr_2>/g;
	$_ =~ s/(<c_addr1_2>)(.+)(<\/c_addr1_2>)/<c_addr1_2>-3<\/c_addr1_2>/g;
	$_ =~ s/(<c_addr_2_2>)(.+)(<\/c_addr_2_2>)/<c_addr_2_2>-3<\/c_addr_2_2>/g;
	$_ =~ s/(<c_unit_2 >)(.+)(<\/c_unit_2 >)/<c_unit_2 >-3<\/c_unit_2 >/g;
	$_ =~ s/(<c_city_2>)(.+)(<\/c_city_2>)/<c_city_2>-3<\/c_city_2>/g;
	$_ =~ s/(<c_state_2>)(.+)(<\/c_state_2>)/<c_state_2>-3<\/c_state_2>/g;
	$_ =~ s/(<contact_phone_2>)(.+)(<\/contact_phone_2>)/<contact_phone_2>-3<\/contact_phone_2>/g;
#PREG_SCREEN_EH
	#$_ =~ s/(<address_1>)(.+)(<\/address_1>)/<address_1>-3<\/address_1>/g;
	#$_ =~ s/(<address_2>)(.+)(<\/address_2>)/<address_2>-3<\/address_2>/g;
	#$_ =~ s/(<unit>)(.+)(<\/unit>)/<unit>-6<\/unit>/g;
	#$_ =~ s/(<city>)(.+)(<\/city>)/<city>-3<\/city>/g;
	#$_ =~ s/(<state>)(.+)(<\/state>)/<state>-3<\/state>/g;
	#$_ =~ s/(<r_fname>)(.+)(<\/r_fname>)/<r_fname>-3<\/r_fname>/g;
	#$_ =~ s/(<r_lname>)(.+)(<\/r_lname>)/<r_lname>-3<\/r_lname>/g;
	#$_ =~ s/(<phone_nbr>)(.+)(<\/phone_nbr>)/<phone_nbr>-3<\/phone_nbr>/g;
	$_ =~ s/(<phone_nbr_oth>)(.+)(<\/phone_nbr_oth>)/<phone_nbr_oth>-3<\/phone_nbr_oth>/g;
	#$_ =~ s/(<home_phone>)(.+)(<\/home_phone>)/<home_phone>-3<\/home_phone>/g;
	#$_ =~ s/(<cell_phone>)(.+)(<\/cell_phone>)/<cell_phone>-3<\/cell_phone>/g;
	$_ =~ s/(<mail_address_1>)(.+)(<\/mail_address_1>)/<mail_address_1>-3<\/mail_address_1>/g;
	$_ =~ s/(<mail_address_2>)(.+)(<\/mail_address_2>)/<mail_address_2>-3<\/mail_address_2>/g;
	#$_ =~ s/(<mail_unit>)(.+)(<\/mail_unit>)/<mail_unit>-3<\/mail_unit>/g;
	#$_ =~ s/(<mail_city>)(.+)(<\/mail_city>)/<mail_city>-3<\/mail_city>/g;
	#$_ =~ s/(<mail_state>)(.+)(<\/mail_state>)/<mail_state>-3<\/mail_state>/g;
	#$_ =~ s/(<email>)(.+)(<\/email>)/<email>-3<\/email>/g;
	#$_ =~ s/(<new_address_1>)(.+)(<\/new_address1_b>)/<new_address1_b>-3<\/new_address1_b>/g;
	#$_ =~ s/(<new_address_2>)(.+)(<\/new_address2_b>)/<new_address2_b>-3<\/new_address2_b>/g;
	#$_ =~ s/(<new_unit>)(.+)(<\/new_unit>)/<new_unit>-3<\/new_unit>/g;
	#$_ =~ s/(<new_city>)(.+)(<\/new_city>)/<new_city>-3<\/new_city>/g;
	#$_ =~ s/(<new_state>)(.+)(<\/new_state>)/<new_state>-3<\/new_state>/g;
#PREG_SCREEN_HI table	
	$_ =~ s/(<incoming>)(.+)(<\/incoming>)/<incoming>-3<\/incoming>/g;
	#$_ =~ s/(<first_name>)(.+)(<\/first_name>)/<first_name>-3<\/first_name>/g;
	$_ =~ s/(<r_phone_1>)(.+)(<\/r_phone_1>)/<r_phone_1>-3<\/r_phone_1>/g;
	#$_ =~ s/(<r_fname>)(.+)(<\/r_fname>)/<r_fname>-3<\/r_fname>/g;
	#$_ =~ s/(<r_lname>)(.+)(<\/r_lname>)/<r_lname>-3<\/r_lname>/g;
	#$_ =~ s/(<address_1>)(.+)(<\/address_1>)/<address_1>-3<\/address_1>/g;
	#$_ =~ s/(<address_2>)(.+)(<\/address_2>)/<address_2>-3<\/address_2>/g;
	#$_ =~ s/(<unit>)(.+)(<\/unit>)/<unit>-6<\/unit>/g;
	#$_ =~ s/(<city>)(.+)(<\/city>)/<city>-3<\/city>/g;
	#$_ =~ s/(<state>)(.+)(<\/state>)/<state>-3<\/state>/g;
	#$_ =~ s/(<phone_nbr>)(.+)(<\/phone_nbr>)/<phone_nbr>-3<\/phone_nbr>/g;
	#$_ =~ s/(<phone_nbr_oth>)(.+)(<\/phone_nbr_oth>)/<phone_nbr_oth>-3<\/phone_nbr_oth>/g;
	#$_ =~ s/(<home_phone>)(.+)(<\/home_phone>)/<home_phone>-3<\/home_phone>/g;
	#$_ =~ s/(<cell_phone>)(.+)(<\/cell_phone>)/<cell_phone>-3<\/cell_phone>/g;
	#$_ =~ s/(<mail_address_1>)(.+)(<\/mail_address_1>)/<mail_address_1>-3<\/mail_address_1>/g;
	#$_ =~ s/(<mail_address_2>)(.+)(<\/mail_address_2>)/<mail_address_2>-3<\/mail_address_2>/g;
	#$_ =~ s/(<mail_unit>)(.+)(<\/mail_unit>)/<mail_unit>-3<\/mail_unit>/g;
	#$_ =~ s/(<mail_city>)(.+)(<\/mail_city>)/<mail_city>-3<\/mail_city>/g;
	#$_ =~ s/(<mail_state>)(.+)(<\/mail_state>)/<mail_state>-3<\/mail_state>/g;
	#$_ =~ s/(<email>)(.+)(<\/email>)/<email>-3<\/email>/g;
	#$_ =~ s/(<new_address_1>)(.+)(<\/new_address1_b>)/<new_address1_b>-3<\/new_address1_b>/g;
	#$_ =~ s/(<new_address_2>)(.+)(<\/new_address2_b>)/<new_address2_b>-3<\/new_address2_b>/g;
	#$_ =~ s/(<new_unit>)(.+)(<\/new_unit>)/<new_unit>-3<\/new_unit>/g;
	#$_ =~ s/(<new_city>)(.+)(<\/new_city>)/<new_city>-3<\/new_city>/g;
	#$_ =~ s/(<new_state>)(.+)(<\/new_state>)/<new_state>-3<\/new_state>/g;
#PREG_SCREEN_PB table	
	#$_ =~ s/(<r_phone_1>)(.+)(<\/r_phone_1>)/<r_phone_1>-3<\/r_phone_1>/g;
	#$_ =~ s/(<r_fname>)(.+)(<\/r_fname>)/<r_fname>-3<\/r_fname>/g;
	#$_ =~ s/(<r_lname>)(.+)(<\/r_lname>)/<r_lname>-3<\/r_lname>/g;
	#$_ =~ s/(<address_1>)(.+)(<\/address_1>)/<address_1>-3<\/address_1>/g;
	#$_ =~ s/(<address_2>)(.+)(<\/address_2>)/<address_2>-3<\/address_2>/g;
	#$_ =~ s/(<unit>)(.+)(<\/unit>)/<unit>-6<\/unit>/g;
	#$_ =~ s/(<city>)(.+)(<\/city>)/<city>-3<\/city>/g;
	#$_ =~ s/(<state>)(.+)(<\/state>)/<state>-3<\/state>/g;
	#$_ =~ s/(<phone_nbr_oth>)(.+)(<\/phone_nbr_oth>)/<phone_nbr_oth>-3<\/phone_nbr_oth>/g;
	#$_ =~ s/(<home_phone>)(.+)(<\/home_phone>)/<home_phone>-3<\/home_phone>/g;
	#$_ =~ s/(<cell_phone>)(.+)(<\/cell_phone>)/<cell_phone>-3<\/cell_phone>/g;
	#$_ =~ s/(<mail_address_1>)(.+)(<\/mail_address_1>)/<mail_address_1>-3<\/mail_address_1>/g;
	#$_ =~ s/(<mail_address_2>)(.+)(<\/mail_address_2>)/<mail_address_2>-3<\/mail_address_2>/g;
	#$_ =~ s/(<mail_unit>)(.+)(<\/mail_unit>)/<mail_unit>-3<\/mail_unit>/g;
	#$_ =~ s/(<mail_city>)(.+)(<\/mail_city>)/<mail_city>-3<\/mail_city>/g;
	#$_ =~ s/(<mail_state>)(.+)(<\/mail_state>)/<mail_state>-3<\/mail_state>/g;
	#$_ =~ s/(<email>)(.+)(<\/email>)/<email>-3<\/email>/g;
	#$_ =~ s/(<new_address_1>)(.+)(<\/new_address1_b>)/<new_address1_b>-3<\/new_address1_b>/g;
	#$_ =~ s/(<new_address_2>)(.+)(<\/new_address2_b>)/<new_address2_b>-3<\/new_address2_b>/g;
	#$_ =~ s/(<new_unit>)(.+)(<\/new_unit>)/<new_unit>-3<\/new_unit>/g;
	#$_ =~ s/(<new_city>)(.+)(<\/new_city>)/<new_city>-3<\/new_city>/g;
	#$_ =~ s/(<new_state>)(.+)(<\/new_state>)/<new_state>-3<\/new_state>/g;
#PREG_VISIT_1 table
	#$_ =~ s/(<r_fname>)(.+)(<\/r_fname>)/<r_fname>-3<\/r_fname>/g;
	#$_ =~ s/(<r_lname>)(.+)(<\/r_lname>)/<r_lname>-3<\/r_lname>/g;
	$_ =~ s/(<birth_place>)(.+)(<\/birth_place>)/<birth_place>-3<\/birth_place>/g;
	$_ =~ s/(<b_address_1>)(.+)(<\/b_address_1>)/<b_address_1>-3<\/b_address_1>/g;
	$_ =~ s/(<b_address_2>)(.+)(<\/b_address_2>)/<b_address_2>-3<\/b_address_2>/g;
	$_ =~ s/(<b_city>)(.+)(<\/b_city>)/<b_city>-3<\/b_city>/g;
	$_ =~ s/(<b_state>)(.+)(<\/b_state>)/<b_state>-3<\/b_state>/g;
	#$_ =~ s/(<email>)(.+)(<\/email>)/<email>-3<\/email>/g;
	#$_ =~ s/(<cell_phone>)(.+)(<\/cell_phone>)/<cell_phone>-3<\/cell_phone>/g;
	#$_ =~ s/(<contact_fname_1>)(.+)(<\/contact_fname_1>)/<contact_fname_1>-3<\/contact_fname_1>/g;
	#$_ =~ s/(<contact_lname_1>)(.+)(<\/contact_lname_1>)/<contact_lname_1>-3<\/contact_lname_1>/g;
	#$_ =~ s/(<contact_addr_1>)(.+)(<\/contact_addr_1>)/<contact_addr_1>-3<\/contact_addr_1>/g;
	#$_ =~ s/(<c_addr1_1>)(.+)(<\/c_addr1_1>)/<c_addr1_1>-3<\/c_addr1_1>/g;
	$_ =~ s/(<c_addr2_1>)(.+)(<\/c_addr2_1>)/<c_addr2_1>-3<\/c_addr2_1>/g;
	#$_ =~ s/(<c_unit_1>)(.+)(<\/c_unit_1>)/<c_unit_1>-3<\/c_unit_1>/g;
	#$_ =~ s/(<c_city_1>)(.+)(<\/c_city_1>)/<c_city_1>-3<\/c_city_1>/g;
	#$_ =~ s/(<c_state_1>)(.+)(<\/c_state_1>)/<c_state_1>-3<\/c_state_1>/g;
	#$_ =~ s/(<contact_phone_1>)(.+)(<\/contact_phone_1>)/<contact_phone_1>-3<\/contact_phone_1>/g;
	#$_ =~ s/(<contact_2>)(.+)(<\/contact_2>)/<contact_2>-3<\/contact_2>/g;
	#$_ =~ s/(<contact_fname_2>)(.+)(<\/contact_fname_2>)/<contact_fname_2>-3<\/contact_fname_2>/g;
	#$_ =~ s/(<contact_lname_2>)(.+)(<\/contact_lname_2>)/<contact_lname_2>-3<\/contact_lname_2>/g;
	#$_ =~ s/(<contact_addr_2>)(.+)(<\/contact_addr_2>)/<contact_addr_2>-3<\/contact_addr_2>/g;
	#$_ =~ s/(<c_addr1_2>)(.+)(<\/c_addr1_2>)/<c_addr1_2>-3<\/c_addr1_2>/g;
	$_ =~ s/(<c_addr2_2>)(.+)(<\/c_addr2_2>)/<c_addr2_2>-3<\/c_addr2_2>/g;	
	#$_ =~ s/(<c_unit_2 >)(.+)(<\/c_unit_2 >)/<c_unit_2 >-3<\/c_unit_2 >/g;
	#$_ =~ s/(<c_city_2>)(.+)(<\/c_city_2>)/<c_city_2>-3<\/c_city_2>/g;
	#$_ =~ s/(<c_state_2>)(.+)(<\/c_state_2>)/<c_state_2>-3<\/c_state_2>/g;
	#$_ =~ s/(<contact_phone_2>)(.+)(<\/contact_phone_2>)/<contact_phone_2>-3<\/contact_phone_2>/g;
#PREG_VISIT_2 table
	#$_ =~ s/(<r_fname>)(.+)(<\/r_fname>)/<r_fname>-3<\/r_fname>/g;
	#$_ =~ s/(<r_lname>)(.+)(<\/r_lname>)/<r_lname>-3<\/r_lname>/g;
	#$_ =~ s/(<birth_place>)(.+)(<\/birth_place>)/<birth_place>-3<\/birth_place>/g;
	#$_ =~ s/(<b_address_1>)(.+)(<\/b_address_1>)/<b_address_1>-3<\/b_address_1>/g;
	#$_ =~ s/(<b_address_2>)(.+)(<\/b_address_2>)/<b_address_2>-3<\/b_address_2>/g;
	#$_ =~ s/(<b_city>)(.+)(<\/b_city>)/<b_city>-3<\/b_city>/g;
	#$_ =~ s/(<b_state>)(.+)(<\/b_state>)/<b_state>-3<\/b_state>/g;
	#$_ =~ s/(<email>)(.+)(<\/email>)/<email>-3<\/email>/g;
	#$_ =~ s/(<cell_phone>)(.+)(<\/cell_phone>)/<cell_phone>-3<\/cell_phone>/g;
	#$_ =~ s/(<contact_fname_1>)(.+)(<\/contact_fname_1>)/<contact_fname_1>-3<\/contact_fname_1>/g;
	#$_ =~ s/(<contact_lname_1>)(.+)(<\/contact_lname_1>)/<contact_lname_1>-3<\/contact_lname_1>/g;
	#$_ =~ s/(<contact_addr_1>)(.+)(<\/contact_addr_1>)/<contact_addr_1>-3<\/contact_addr_1>/g;
	#$_ =~ s/(<c_addr1_1>)(.+)(<\/c_addr1_1>)/<c_addr1_1>-3<\/c_addr1_1>/g;
	#$_ =~ s/(<c_addr2_1>)(.+)(<\/c_addr2_1>)/<c_addr2_1>-3<\/c_addr2_1>/g;
	#$_ =~ s/(<c_unit_1>)(.+)(<\/c_unit_1>)/<c_unit_1>-3<\/c_unit_1>/g;
	#$_ =~ s/(<c_city_1>)(.+)(<\/c_city_1>)/<c_city_1>-3<\/c_city_1>/g;
	#$_ =~ s/(<c_state_1>)(.+)(<\/c_state_1>)/<c_state_1>-3<\/c_state_1>/g;
	#$_ =~ s/(<contact_phone_1>)(.+)(<\/contact_phone_1>)/<contact_phone_1>-3<\/contact_phone_1>/g;
	#$_ =~ s/(<contact_2>)(.+)(<\/contact_2>)/<contact_2>-3<\/contact_2>/g;
	#$_ =~ s/(<contact_fname_2>)(.+)(<\/contact_fname_2>)/<contact_fname_2>-3<\/contact_fname_2>/g;
	#$_ =~ s/(<contact_lname_2>)(.+)(<\/contact_lname_2>)/<contact_lname_2>-3<\/contact_lname_2>/g;
	#$_ =~ s/(<contact_addr_2>)(.+)(<\/contact_addr_2>)/<contact_addr_2>-3<\/contact_addr_2>/g;
	#$_ =~ s/(<c_addr1_2>)(.+)(<\/c_addr1_2>)/<c_addr1_2>-3<\/c_addr1_2>/g;
	#$_ =~ s/(<c_addr2_2>)(.+)(<\/c_addr2_2>)/<c_addr2_2>-3<\/c_addr2_2>/g;	
	#$_ =~ s/(<c_unit_2 >)(.+)(<\/c_unit_2 >)/<c_unit_2 >-3<\/c_unit_2 >/g;
	#$_ =~ s/(<c_city_2>)(.+)(<\/c_city_2>)/<c_city_2>-3<\/c_city_2>/g;
	#$_ =~ s/(<c_state_2>)(.+)(<\/c_state_2>)/<c_state_2>-3<\/c_state_2>/g;
	#$_ =~ s/(<contact_phone_2>)(.+)(<\/contact_phone_2>)/<contact_phone_2>-3<\/contact_phone_2>/g;
#PREG_VISIT_LI table
	#$_ =~ s/(<phone_nbr>)(.+)(<\/phone_nbr>)/<phone_nbr>-3<\/phone_nbr>/g;
	#$_ =~ s/(<birth_place>)(.+)(<\/birth_place>)/<birth_place>-3<\/birth_place>/g;
	#$_ =~ s/(<b_address_1>)(.+)(<\/b_address_1>)/<b_address_1>-3<\/b_address_1>/g;
	#$_ =~ s/(<b_address_2>)(.+)(<\/b_address_2>)/<b_address_2>-3<\/b_address_2>/g;
	#$_ =~ s/(<b_city>)(.+)(<\/b_city>)/<b_city>-3<\/b_city>/g;
	#$_ =~ s/(<b_state>)(.+)(<\/b_state>)/<b_state>-3<\/b_state>/g;
#SIX_MTH_MOTHER table	
	#$_ =~ s/(<email>)(.+)(<\/email>)/<email>-3<\/email>/g;
	#$_ =~ s/(<cell_phone>)(.+)(<\/cell_phone>)/<cell_phone>-3<\/cell_phone>/g;
	#$_ =~ s/(<contact_fname_1>)(.+)(<\/contact_fname_1>)/<contact_fname_1>-3<\/contact_fname_1>/g;
	#$_ =~ s/(<contact_lname_1>)(.+)(<\/contact_lname_1>)/<contact_lname_1>-3<\/contact_lname_1>/g;
	#$_ =~ s/(<contact_addr_1>)(.+)(<\/contact_addr_1>)/<contact_addr_1>-3<\/contact_addr_1>/g;
	#$_ =~ s/(<c_addr1_1>)(.+)(<\/c_addr1_1>)/<c_addr1_1>-3<\/c_addr1_1>/g;
	#$_ =~ s/(<c_addr_2_1>)(.+)(<\/c_addr2_1>)/<c_addr2_1>-3<\/c_addr2_1>/g;
	#$_ =~ s/(<c_unit_1>)(.+)(<\/c_unit_1>)/<c_unit_1>-3<\/c_unit_1>/g;
	#$_ =~ s/(<c_city_1>)(.+)(<\/c_city_1>)/<c_city_1>-3<\/c_city_1>/g;
	#$_ =~ s/(<c_state_1>)(.+)(<\/c_state_1>)/<c_state_1>-3<\/c_state_1>/g;
	#$_ =~ s/(<contact_phone_1>)(.+)(<\/contact_phone_1>)/<contact_phone_1>-3<\/contact_phone_1>/g;
	#$_ =~ s/(<contact_fname_2>)(.+)(<\/contact_fname_2>)/<contact_fname_2>-3<\/contact_fname_2>/g;
	#$_ =~ s/(<contact_lname_2>)(.+)(<\/contact_lname_2>)/<contact_lname_2>-3<\/contact_lname_2>/g;
	#$_ =~ s/(<contact_addr_2>)(.+)(<\/contact_addr_2>)/<contact_addr_2>-3<\/contact_addr_2>/g;
	#$_ =~ s/(<c_addr1_2>)(.+)(<\/c_addr1_2>)/<c_addr1_2>-3<\/c_addr1_2>/g;
	#$_ =~ s/(<c_addr_2_2>)(.+)(<\/c_addr2_2>)/<c_addr2_2>-3<\/c_addr2_2>/g;	
	#$_ =~ s/(<c_unit_2 >)(.+)(<\/c_unit_2 >)/<c_unit_2 >-3<\/c_unit_2 >/g;
	#$_ =~ s/(<c_city_2>)(.+)(<\/c_city_2>)/<c_city_2>-3<\/c_city_2>/g;
	#$_ =~ s/(<c_state_2>)(.+)(<\/c_state_2>)/<c_state_2>-3<\/c_state_2>/g;
	#$_ =~ s/(<contact_phone_2>)(.+)(<\/contact_phone_2>)/<contact_phone_2>-3<\/contact_phone_2>/g;
#SIX_MTH_MOTHER_DETAIL
	#$_ =~ s/(<c_lname>)(.+)(<\/c_lname>)/<c_lname>-3<\/c_lname>/g;
#THREE_MTH_MOTHER_CHILD_DETAIL table
	#$_ =~ s/(<c_fname>)(.+)(<\/c_fname>)/<c_fname>-3<\/c_fname>/g;
	#$_ =~ s/(<c_lname>)(.+)(<\/c_lname>)/<c_lname>-3<\/c_lname>/g;
#TWELVE_MTH_MOTHER table
	#$_ =~ s/(<email>)(.+)(<\/email>)/<email>-3<\/email>/g;
	#$_ =~ s/(<cell_phone>)(.+)(<\/cell_phone>)/<cell_phone>-3<\/cell_phone>/g;
	#$_ =~ s/(<contact_fname_1>)(.+)(<\/contact_fname_1>)/<contact_fname_1>-3<\/contact_fname_1>/g;
	#$_ =~ s/(<contact_lname_1>)(.+)(<\/contact_lname_1>)/<contact_lname_1>-3<\/contact_lname_1>/g;
	#$_ =~ s/(<c_addr1_1>)(.+)(<\/c_addr1_1>)/<c_addr1_1>-3<\/c_addr1_1>/g;
	#$_ =~ s/(<c_addr_2_1>)(.+)(<\/c_addr2_1>)/<c_addr2_1>-3<\/c_addr2_1>/g;
	#$_ =~ s/(<c_unit_1>)(.+)(<\/c_unit_1>)/<c_unit_1>-3<\/c_unit_1>/g;
	#$_ =~ s/(<c_city_1>)(.+)(<\/c_city_1>)/<c_city_1>-3<\/c_city_1>/g;
	#$_ =~ s/(<c_state_1>)(.+)(<\/c_state_1>)/<c_state_1>-3<\/c_state_1>/g;
	#$_ =~ s/(<contact_phone_1>)(.+)(<\/contact_phone_1>)/<contact_phone_1>-3<\/contact_phone_1>/g;
	#$_ =~ s/(<contact_fname_2>)(.+)(<\/contact_fname_2>)/<contact_fname_2>-3<\/contact_fname_2>/g;
	#$_ =~ s/(<contact_lname_2>)(.+)(<\/contact_lname_2>)/<contact_lname_2>-3<\/contact_lname_2>/g;
	#$_ =~ s/(<c_addr1_2>)(.+)(<\/c_addr1_2>)/<c_addr1_2>-3<\/c_addr1_2>/g;
	#$_ =~ s/(<c_addr_2_2>)(.+)(<\/c_addr2_2>)/<c_addr2_2>-3<\/c_addr2_2>/g;	
	#$_ =~ s/(<c_unit_2 >)(.+)(<\/c_unit_2 >)/<c_unit_2 >-3<\/c_unit_2 >/g;
	#$_ =~ s/(<c_city_2>)(.+)(<\/c_city_2>)/<c_city_2>-3<\/c_city_2>/g;
	#$_ =~ s/(<c_state_2>)(.+)(<\/c_state_2>)/<c_state_2>-3<\/c_state_2>/g;
	#$_ =~ s/(<contact_phone_2>)(.+)(<\/contact_phone_2>)/<contact_phone_2>-3<\/contact_phone_2>/g;
#TWELVE_MTH_MOTHER_DETAIL table
	#$_ =~ s/(<c_fname>)(.+)(<\/c_fname>)/<c_fname>-3<\/c_fname>/g;
	#$_ =~ s/(<c_lname>)(.+)(<\/c_lname>)/<c_lname>-3<\/c_lname>/g;
	}
	print OUTFILE $_;
}
 
close(inputFile);
close(OUTFILE);