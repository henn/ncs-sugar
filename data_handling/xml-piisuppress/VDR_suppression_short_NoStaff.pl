#!/usr/bin/perl

use strict;
use warnings;

###Update the filename and path if needed

#If the file is in the smae folder as the script then there is no need to write the whole path to the file
open(inputFile,'input1.xml');
#If you do not write the path to the output file, it will be created in the same folder as the script
open(OUTFILE, '>supressed.xml');


#array with all the variables that need to be suppressed
my @var = ("first_name","last_name","middle_name","maiden_name","address_1","address_2",
"unit","city","state","address_comment","phone_nbr","phone_ext","phone_comment",
"email","state_death","r_fname","r_lname","friend_phone_oth","home_phone","cell_phone",
"new_address_1","new_address_2","new_unit","new_city","new_state","mail_address1",
"mail_address2","mail_unit","mail_city","mail_state","new_address1_b","new_address2_b",
"new_unit_b","new_city_b","new_state_b","baby_fname","baby_mname","baby_lname",
"phone_alt","age_elig_fname","hdu_address_1","hdu_address_2","hdu_unit","hdu_city",
"hdu_state","p_fname","c_fname","c_lname","contact","home_address","mail_address",
"phone","work_phone","other_phone","contact_fname_1","contact_lname_1","contact_addr_1",
"c_addr1_1","c_addr_2_1","c_unit_1","c_city_1","c_state_1","contact_phone_1","contact_2",
"contact_fname_2","contact_lname_2","contact_addr_2","c_addr1_2","c_addr_2_2","c_unit_2",
"c_city_2","c_state_2","contact_phone_2","phone_nbr_oth","mail_address_1",
"mail_address_2","incoming","r_phone_1","birth_place","b_address_1","b_address_2",
"b_city","b_state","c_addr2_1","c_addr2_2");

#array to hold the staff and all its attributes
my %staff =( "Bryan.Name", "12AB3456",
		"Jenny.False", "56BA3412");
		
#array to hold the staff ID linked to staff type values
my %staff_if_type = ( "12AB3456", 9,
		"56BA3412", 10,);

my($id,$type,$person);

while (<inputFile>) {


foreach my $var(@var){
# Check if it is the end of dwelling unit to insert staff
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
			print OUTFILE	"\t\t<person>\n"; # The table tag that follows the staff table
		}
		else{
			last;
		}	
	}
}

#Checks if the staff_id contains a name, and if it does it ecxchanges it with the coresponding id
elsif($_=~ /<staff_id>.+<\/staff_id>/){
	while(($person,$id) = each(%staff)){
		if($_=~ m/$person/i){
		$_=~ s/<staff_id>.+<\/staff_id>/<staff_id>$id<\/staff_id>/g;
		}
	}
}

#Change the psu_id to the correct psu_id
elsif( $_ =~/<psu_id>.+<\/psu_id>/){
	$_ =~ s/(<psu_id>)(.+)(<\/psu_id>)/<psu_id>20000032<\/psu_id>/g;
}

elsif ($_=~/<address>/){ #When the program reaches the table named adress it enters a new loop to change the state to -6
	print OUTFILE $_; 
	while (<inputFile>) {
	if($_=~/<\/address>/){ #Checks if the table is over. If it is the program will resume previous loop
		last;
	}
	foreach$var(@var){
		if($_=~/<state>.+<\/state>/){ #When the state field is found change only its value to -6
			$_ =~ s/<state>.+<\/state>/<state>-6<\/state>/g;
			last;
		}
		elsif( $_ =~/<state_death>.+<\/state_death>/){
			$_ =~ s/(<state_death>)(.+)(<\/state_death>)/<state_death>-6<\/state_death>/g;
		}
		elsif( $_ =~/<unit>.+<\/unit>/){
			$_ =~ s/(<unit>)(.+)(<\/unit>)/<unit>-6<\/unit>/g;
		}
		else{
			$_ =~ s/<$var>.+<\/$var>/<$var>-3<\/$var>/g;
		}
	}
	print OUTFILE $_;
	}
} #end if address

elsif( $_ =~/<state_death>.+<\/state_death>/){
	$_ =~ s/(<state_death>)(.+)(<\/state_death>)/<state_death>-6<\/state_death>/g;
}

elsif( $_ =~/<unit>.+<\/unit>/){
	$_ =~ s/(<unit>)(.+)(<\/unit>)/<unit>-6<\/unit>/g;
}

else{
	$_ =~ s/<$var>.+<\/$var>/<$var>-3<\/$var>/g;
}
}
print OUTFILE $_;
}

close(inputFile);
close(OUTFILE);