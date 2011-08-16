<?php

/*
 * Gather data from SugarCRM beans and store to session variable, to be displayed
 * as a summary of a participant's related persons and those persons' information.
 * 
 * Notes:
 * $show_fields is the array of data to be displayed to the end user.
 * The array order of information in $show_fields is the order in which data is
 * displayed to the end user.
 * Example:
        $show_fields = array(
            array('label/array index from bean', 'label to display to end user', 'if this is an int that needs to be translated to a string from $app_list_strings, list it here (or null or blank) e.g. PERSON_PARTCPNT_RELTNSHP_CL1', 'url link to click on'),
            array('plt_lkprsprlt_person_name', 'Person ID', NULL, 'index.php?module=PLT_Person&action=DetailView&record=' . $this->person),
            array('name', 'Person Linkage ID', NULL, 'index.php?module=PLT_LkPrsPrtcpt&action=DetailView&record=' . $bean->id),
        );
 * 
 * All data comes directly from Sugar Beans using built-in relationships. E.g., to get dwelling unit 
 * information, the order is as follows:
 * Participant Module -> Person-Participant Linkage Module -> Person Module -> HH-Person Linkage Module -> HH Module -> HH-DU Linkage Module
 * 
 * FullDetailView is a custom view created to display more verbose information (e.g. all prior addresses and all links).
 * In the standard view, only one piece of information is displayed for each person (i.e. one address, phone number, etc). 
 * The most-recently updated piece of information in standard view is what is displayed in the case where multiple pieces exist.
 * 
 * For WriteInfo(), the third argument, if set to 0, indicates an empty bean. In that case, a link to add
 * that information type is created.  This case is handled when we do a count() on the returned beans in get_linked_beans.
 * 
 */

class PLT_ParticipantController extends SugarController {

    var $bean_person = null;
    var $bean_linkage = null;
    var $bean_household = null;
	var $current_participant_id = null;
	
    var $person = 0;
	var $participant_id = 0;
    var $debug = 0;  // set debug level (0=off,1=on,2=verbose)
	
    function process() {
        parent::process();
        if ($this->debug)
            echo "<pre>";

		//Clear session summary first.
		if(isset($_SESSION['summary']))
			unset($_SESSSION['summary']);

        if ($_REQUEST['action'] == "DetailView") {
						
		// require_once('modules/PLT_LkPrsPrtcpt/PLT_LkPrsPrtcpt.php');
		// get related bean information (linkage info as well as person info)
		// http://www.jjwdesign.com/blog/sugarcrm-account-re-assign-logic-hook.html
            $beans = $this->LoadLinkageBean();
			
            $this->bean_linkage = &$beans;

            if (!is_array($beans))
                return;

            // these are linkage module beans
            foreach ($beans as $bean) {
			
                $this->bean_linkage = &$bean;

                if ($this->debug) {
                    print_r($bean);
                }

								
                list ($key, $value) = $this->FindKeyValuePair($bean->rel_fields_before_value, "person_ida");
                $this->person = $value; // load person id into global var to be used by other functions

					
                /*
                 * Load each module below. The order in which each function is 
                 * listed is the order in which the data is populated.
                 */
                $this->GetPersonInfo($this->person); // works
								
				$this->GetParticipantInfoFromPerson($this->bean_person); 
																
                $this->GetEmailAddress();  
				
                $this->GetPhoneNumber();	
				
                $this->GetAddressInfo();     
				
                $this->GetLinkageInfo($bean);        			
				
				$this->GetEventInfo();     			
				
                $this->GetHouseHoldInfo(TRUE);              

				$this->GetPersonProviderLinkage();	   						
														
                if ($this->debug) {
                    echo "Person info:  <br />";
                    print_r($this->bean_person);
                }
            }
        }
        if ($this->debug)
            echo "</pre>";
    }

    function GetPersonInfo($person_id) {
        // Syntax:  array('sugar_field_name', 'table_label', 'app_list_strings_name','link'),
        $show_fields = array(
			array('name', 'Person Name ID'),
            array('first_name', 'First Name'),
            array('middle_name', 'Middle Name'),
            array('last_name', 'Last Name'),
            array('sex', 'Sex', 'GENDER_CL1'),
            array('person_dob', 'DOB'),
            array('ethnic_group', 'Ethnicity', 'ETHNICITY_CL1'),
            array('person_lang', 'Language', 'LANGUAGE_CL2'),
            array('maristat', 'Marital Status', 'MARITAL_STATUS_CL1'),
			array('pref_contact', 'Preferred Contact Method', 'CONTACT_TYPE_CL1'),
            array('p_info_source', 'Person Information Source', 'INFORMATION_SOURCE_CL4'),
            array('p_info_date', 'Person Information Date'),
            array('person_comment', 'Person Comment')
        );

        // http://bitonwire.com/jblogs/sugarcrm-view-sugarbean-of-a-module
        // http://www.sugarcrm.com/forums/showthread.php?t=44937
        // person bean becomes global var
        require_once('modules/PLT_Person/PLT_Person.php');
        $this->bean_person = new PLT_Person();
        $this->bean_person->retrieve($person_id);
		
        $this->WriteInfo($this->bean_person, $show_fields);
    }

    function GetLinkageInfo(&$bean) {
	
		$pp_linkage_array = array();
			
		/*		
        $show_fields = array(
            array('relation', 'Relation', 'PERSON_PARTCPNT_RELTNSHP_CL1'),
            array('plt_lkprsprlt_person_name', 'Person_ID', NULL, 'index.php?module=PLT_Person&action=DetailView&record=' . $this->person),
        );
		*/

        $show_fields = array(
            array('relation', 'Relation', 'PERSON_PARTCPNT_RELTNSHP_CL1'),
            array('plt_lkprsprlt_person_name', 'Person_ID'),
        );

		
        $this->WriteInfo($bean, $show_fields, "linkage", $pp_linkage_array);
		
		$_SESSION['summary'][$this->person]['pp_linkage'] = $pp_linkage_array;
    }

    function GetPhoneNumber() {
        $phones = $this->bean_person->get_linked_beans('plt_person_ltt_telephone', 'LTT_Telephone');
		
		$phone_list = array();
		
        foreach ($phones as $phone) {
            if ($this->debug) {
                echo '$phone name';
                print_r($phone);
            }
            $show_fields = array(
				array('id', 'Phone_ID'),
                array('phone_type', 'Phone_Type', 'PHONE_TYPE_CL1'),
                array('phone_nbr', 'Phone_Number')             //, NULL, 'index.php?module=LTT_Telephone&action=DetailView&record=' . $phone->id)
            );
            $this->WriteInfo($phone, $show_fields, $phone->name, $phone_list);
        }
		
		$_SESSION['summary'][$this->person]['phones'] = $phone_list;		
    }

	
    function GetPersonProviderLinkage() {
        $provider_links = $this->bean_person->get_linked_beans('olt_prsnprvlnk_plt_person', 'OLT_PrsnPrvdLnk');
		
		$provider_list = array();
		
        foreach ($provider_links as $provider_link) {
            if ($this->debug) {
                echo "provider";
                echo '$provider_links';
                print_r($provider_link);
            }
            list ($key, $value) = $this->FindKeyValuePair($provider_link->rel_fields_before_value, "rovider_ida");
            $show_fields = array(
                array('olt_prsnprv_provider_name', 'Provider_ID', NULL, 'index.php?module=OLT_Provider&action=DetailView&record=' . $value),
                array('name', 'Provider_Linkage_ID', NULL, 'index.php?module=OLT_PrsnPrvdLnk&action=DetailView&record=' . $provider_link->id),
            );
            $this->WriteInfo($provider_link, $show_fields, $provider_link->name,$provider_list);
        }
		
		$_SESSION['summary'][$this->person]['providers'] = $provider_list;
    }

    function GetEmailAddress() {
        $emails = $this->bean_person->get_linked_beans('plt_person_ltt_email', 'LTT_Email');		
		$email_list = array();
		
        foreach ($emails as $email) {
            if ($this->debug) {
                echo '$email name';
                print_r($email);
            }
            $show_fields = array(
				array('id', 'Email_ID'),
                array('email_type', 'Email_Type', 'EMAIL_TYPE_CL1'),
                array('email', 'Email_Address', NULL, 'index.php?module=LTT_Email&action=DetailView&record=' . $email->id)
            );
            $this->WriteInfo($email, $show_fields, $email->name, $email_list);
        }				
		$_SESSION['summary'][$this->person]['emails'] = $email_list;
    }


	//$this->bean = this participant bean. need to dynamically pass in the bean ???????????????
    function GetEventInfo() {        
				
		$event_list = array();
				
		if(!empty($this->current_participant_id))
		{						
			require_once("modules/PLT_Participant/PLT_Participant.php");
		
			$pt = new PLT_Participant();
			$pt->retrieve($this->current_participant_id);
		
			$events = $pt->get_linked_beans('ncsdc_eventlt_participant', 'NCSDC_EventInfo');		
			$event_list = array();
			
			foreach ($events as $event) {
				if ($this->debug) {
					echo '$email name';
					print_r($events);
				}
				
				$show_fields = array(
					array('id', 'Event_ID'),
					array('name', 'Event_Name'),
					array('event_type', 'Event_Type', 'EVENT_TYPE_CL1'),
					array('event_type_oth', 'Event_Type_Other'),
					array('event_start_date', 'Event_Start_Date'),
					array('event_end_date', 'Event_End_Date'),
					array('visit_window_starttime_c', 'Visit_Window_Start_Date'),
					array('visit_window_endtime_c', 'Visit_Window_End_Date')				
				);				
				
				$this->WriteInfo($event, $show_fields, $event->name, $event_list);
			}	
						
		}					
		
		$_SESSION['summary'][$this->person]['events'] = $event_list;		
    }

	
	
	//get_participantinfo_from_person  (jl added)
	//Returns an associative array that contains the participant info given a person id. (guid) 	
	//Returns an empty array if no record found.
	function GetParticipantInfoFromPerson(&$person_bean)
	{		
		$participant_info_array = null;
		$linkage_id = "";
		$load_result = $person_bean->load_relationship('plt_lkprsprcpt_plt_person');
		
		if($load_result)
		{				
			$query_array = $person_bean->plt_lkprsprcpt_plt_person->getQuery($return_as_array=true);
			$query_array['select'] = "SELECT plt_lkprsprtcpt.*";	
			$query = implode(" ", $query_array);						
			$result = $GLOBALS['db']->query($query);				
						
			while($row = $person_bean->db->fetchByAssoc($result))
			{
				if($row['relation'] == "1")
				{
					$linkage_id = $row['id'];
					
					break;
				}
			}						
			
			if(!empty($linkage_id))
			{			
				require_once("modules/PLT_LkPrsPrtcpt/PLT_LkPrsPrtcpt.php");
				
				$pp_linkage = new PLT_LkPrsPrtcpt();
				$pp_linkage->id = $linkage_id;	

				$participant_info_array = $pp_linkage->get_linked_beans('plt_lkprsprlt_participant', 'PLT_Participant');							
			}
		}
		
		//set current participant id
		if(!empty($participant_info_array))
		{
			//$this->current_participant_id = $participant_info_array['id'];			
			$this->current_participant_id = $participant_info_array[0]->id;	
		}
		else
			$this->current_participant_id = null;
		
		//$_SESSION['summary'][$this->person]['participant_info'] = $participant_info_array;


		if(!empty($this->current_participant_id))
		{		
			$show_fields = array(
				array('id', 'id'),
				array('p_type', 'p_type', 'PARTICIPANT_TYPE_CL1'),  
				array('p_type_oth', 'p_type_oth'),
				array('name', 'name'),
			);		
		
			$participant_arr = array();
			$this->WriteInfo($participant_info_array[0], $show_fields, $participant_info_array[0]->name, $participant_arr);
			
			$_SESSION['summary'][$this->person]['participant_info'] = $participant_arr[0];	
		}
		else
			$_SESSION['summary'][$this->person]['participant_info'] = array	();
	}	
		
	

	//$THIS->BEAN = participant bean.
	//returns a list of person-participant linkage beans (lkprsprtcpt object)
    function LoadLinkageBean() {
		
        $beans = $this->bean->get_linked_beans('plt_lkprsprlt_participant', 'PLT_LkPrsPrtcpt'); // version 1308...
		// $beans = $this->bean->get_linked_beans('plt_lkprsprtcpt_plt_participant', 'PLT_LkPrsPrtcpt');  // version 1307...
        if ($this->debug) {
            echo "LoadLinkageBean";
            print_r($beans);
        }
		
        return $beans;
    }

    function GetHouseHoldInfo($get_dus=FALSE) {

	// get household info
        $households_l = $this->bean_person->get_linked_beans('plt_lnkprshhld_plt_person', 'PLT_LnkPrsHshld');
				
		$households_list = array();
		$households_du = array();		
				
        foreach ($households_l as $household_l) {
            if ($this->debug) {
                echo '$household_l name';
                echo $household_l->name;
                echo $household_l->plt_lnkprshhousehold_name;
                print_r($household_l);
            }
            list ($key, $value) = $this->FindKeyValuePair($household_l->rel_fields_before_value, "hold_ida");
            $show_fields = array(				
                array('plt_lnkprshhousehold_name', 'Household_ID', NULL, 'index.php?module=GT_Household&action=DetailView&record=' . $value),
                array('name', 'Household_Link_ID', NULL, 'index.php?module=PLT_LnkPrsHshld&action=DetailView&record=' . $household_l->id)
            );
            $this->WriteInfo($household_l, $show_fields, $household_l->name, $households_list);

            // get DUS
            if ($get_dus) {
                $households = $household_l->get_linked_beans('plt_lnkprshd_gt_household', 'GT_Household');
                foreach ($households as $household) {
                    $du_links = $household->get_linked_beans('gt_dwlunthsk_gt_household', 'GT_DwlUntHsLnk');
                    foreach ($du_links as $du_link) {
                        if ($this->debug) {
                            echo '$du_link name';
                            print_r($du_link);
                        }
                        list ($key, $value) = $this->FindKeyValuePair($du_link->rel_fields_before_value, "unt_ida");
                        $show_fields = array(
                            array('gt_dwlunthsellingunt_name', 'Dwelling Unit', NULL, 'index.php?module=GT_DwellingUnt&action=DetailView&record=' . $value),
                            array('name', 'Dwelling Unit Linkage ID', NULL, 'index.php?module=GT_DwlUntHsLnk&action=DetailView&record=' . $du_link->id)
                        );
                        $this->WriteInfo($du_link, $show_fields, $household_l->name, $households_du);
                    }
                }
            }
        }
		
		$_SESSION['summary'][$this->person]['households'] = $households_list;
		$_SESSION['summary'][$this->person]['households_du'] = $households_du;
		
        //  $this->WriteInfo($households, $show_fields);
        if ($this->debug) {
            echo "Households:  <br />";
            echo count($households_l);
            print_r($households_l);  // any related households
        }
    }

	//debug: address is OK. No need to pass # bean.
    function GetAddressInfo() {
        // get addresses
        $addresses = $this->bean_person->get_linked_beans('plt_person_ltt_address', 'LTT_Address');
		
		$address_list = array();
		
        foreach ($addresses as $address) {
            $show_fields = array(
				array('id', 'Address_ID'),
                array('address_1', 'Address'),  
				array('unit', 'Unit'),
                array('address_2', 'Address_2'),			
                array('city', 'City'),
                array('state', 'State', 'STATE_CL1'),
                array('zip', 'Zip'),
				array('address_type', 'Address_Type', 'ADDRESS_CATEGORY_CL1'),
            );
            if ($this->debug) {
                echo '$address name';
                echo $address->name;
            }
			
            $this->WriteInfo($address, $show_fields, $address->name, $address_list);

//            $dwellingunits = $address->get_linked_beans('gt_dwlunthslnk_gt_dwellingunt', 'GT_DwlUntHsLnk');
//            if ($this->debug) {
//                echo '$dwellingunits name';
//                print_r($dwellingunits);
//            }
        }
				
		$_SESSION['summary'][$this->person]['addresses'] = $address_list;
		
        if ($this->debug) {
            echo "Addresses:  <br />";
            print_r($addresses);  // any related households
        }
    }

    /*
     * Given a unique partial string of the relationship table 
     * (e.g. give "person_ida" for plt_lkprspe360_person_ida), this function returns
     * an array with the key/value pair (e.g. plt_lkprspe360_person_ida/7cdd52b1-6281-a0c2-238b-4deeac40cbcf)
     */
    function FindKeyValuePair($searcharray, $searchstring) {
        foreach ($searcharray as $key => $value) {
            if (strstr($key, $searchstring)) {
                if ($this->debug)
                    echo "\n\nFound ($key/$value) with string $searchstring\n\n";
                return array($key, $value);
            }
        }
    }

	
	
// input relevant info into session var
    function WriteInfo(&$bean, &$show_fields, $array=NULL,&$item_list=NULL) {
        static $key = 0;

		$item_array = array();
				
        foreach ($show_fields as $field) {
            $value = "";
            isset($field[3]) ?
                            $value = "<a href='$field[3]'>" :
                            $value = "";
			// if we need to translate data from $app_list_strings
            if (isset($field[2]))
                $value .= $GLOBALS['app_list_strings'][$field[2]][$bean->$field[0]];
            elseif (isset($array) && $array === 0)
                $value .= "(add)";
            else
                $value .= $bean->$field[0];
            if (isset($field[3]))
                $value .= "</a>";

			//jadd
			if(!is_null($item_list))
			{
				$item_array[$field[1]] = $value;
			}
			else
			{
                $_SESSION['summary'][$this->person][$field[0]]['label'] = $field[1];
                $_SESSION['summary'][$this->person][$field[0]]['value'] = $value;			
			}
        }

		if(!is_null($item_list))
		{
			array_push($item_list, $item_array);
		}
		
        if ($this->debug >= 2) {
            print_r($_SESSION['summary']);
            print_r($GLOBALS['app_list_strings']);
        }
        $key++;
    }	
	
}

?>