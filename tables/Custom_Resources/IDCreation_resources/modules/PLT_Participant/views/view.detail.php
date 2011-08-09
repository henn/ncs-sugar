<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

require_once 'include/MVC/View/views/view.detail.php';
require_once 'include/utils.php';

class PLT_ParticipantViewDetail extends ViewDetail {

    // if set to true, table will output blank/empty fields
    var $show_blank_fields = true;

    function PLT_ParticipantViewDetail() {
        parent::ViewDetail();
    }

    function display() {

		//clear cached data to prevent the same data to be displayed for multiple participants.
		$this->th2 = new TemplateHandler();
		$this->th2->clearCache($this->module);
				
        if (isset($_SESSION['summary']))
		{		
            $this->bean->person_info_c = $this->FormatTable();
			
			$_SESSION['summary'] = NULL;
			unset($_SESSION['summary']);			
		}				
		parent::display();
    }

	
    // http://developers.sugarcrm.com/docs/OS/6.1/-docs-Developer_Guides-Sugar_Developer_Guide_6.1.0-Chapter%203%20Module%20Framework.html#9000012
    function FormatTable() {
													
		$summary_html = "<table>";							
		$heading_td_style = "style='background-color:#EDF0F7;border-bottom:1px dotted #8D99BC'";	
		$add_link_style = "style='text-decoration:none;color:#6751C1'";	
		$link_style2 = "style='text-decoration:none'";
			
        // create table for each person
        foreach ($_SESSION['summary'] as $id => $person) {
		
			$summary_html .= "<tr><td>";			
            $summary_html .= "<table style='border: 0px solid #AA9ED3;float:left;width:350px;background-color:#ffffff'>";

			$full_name = "";			
			
			if($person['middle_name']['value'] != "")
				$full_name = $person['first_name']['value']." ".$person['middle_name']['value']." ".$person['last_name']['value'];
			else
				$full_name = $person['first_name']['value']." ".$person['last_name']['value'];
								
			//Person Info			
			$summary_html .= "<tr><td><b>Name</b></td><td style='font-weight:bold;color:#755252;font-size:larger;'>".$full_name."</td></tr>";			
			$summary_html .= "<tr><td><b>Person ID</b></td><td><a href='index.php?module=PLT_Person&action=DetailView&record=".$id."'>".$person['name']['value']."</a></td></tr>";
			
			if(!empty($person['pp_linkage']))
				$summary_html .= "<tr><td><b>Relation</b></td><td>".$person['pp_linkage'][0]['Relation']."</td></tr>";
				
			$summary_html .= "<tr><td nowrap><b>Sex</b></td><td>".$person['sex']['value']."</td></tr>";
			$summary_html .= "<tr><td nowrap><b>DOB</b></td><td>".$person['person_dob']['value']."</td></tr>";			
			$summary_html .= "<tr><td nowrap><b>Ethnicity</b></td><td>".$person['ethnic_group']['value']."</td></tr>";
			$summary_html .= "<tr><td nowrap><b>Language</b></td><td>".$person['person_lang']['value']."</td></tr>";
			$summary_html .= "<tr><td nowrap><b>Marital Status</b></td><td>".$person['maristat']['value']."</td></tr>";
			$summary_html .= "<tr><td nowrap><b>Preferred Contact Method</b></td><td>".$person['pref_contact']['value']."</td></tr>";
			$summary_html .= "<tr><td nowrap><b>Person Information Source</b></td><td>".$person['p_info_source']['value']."</td></tr>";
			$summary_html .= "<tr><td nowrap><b>Person Information Date</b></td><td>".$person['p_info_date']['value']."</td></tr>";
			$summary_html .= "<tr><td nowrap><b>Person Comment</b></td><td>".$person['person_comment']['value']."</td></tr>";						
			
			if(!empty($person['participant_info']))
			{
				$summary_html .= "<tr><td nowrap><b>Participant ID</b></td><td><a href='index.php?module=PLT_Participant&action=DetailView&record=".$person['participant_info']['id']."'>".$person['participant_info']['name']."</a></td></tr>";												
				
				if(trim($person['participant_info']['p_type_oth']) != "")
					$summary_html .= "<tr><td nowrap><b>Participant Type</b></td><td>".$person['participant_info']['p_type_oth']."</td></tr>";												
				else
					$summary_html .= "<tr><td nowrap><b>Participant Type</b></td><td>".$person['participant_info']['p_type']."</td></tr>";												
			}			
            // blank row
            $summary_html .= "<td>&nbsp;</td></tr></table></td>\n";			

			//======================  Show Contact Information	=========================				
			$summary_html .= "<td><table style='border: 0px solid #AA9ED3;float:left;width:320px;background-color:#ffffff'>";
						
			//loop thru all addresses.
			$summary_html .= "<tr><td ".$heading_td_style." colspan='2'><b>Address</b>&nbsp;&nbsp;&nbsp;<a ".$add_link_style." href='index.php?module=LTT_Address&action=EditView&return_module=PLT_Participant&return_id=".$this->bean->id."&return_action=DetailView&person_name=".$person['name']['value']."&person_id=".$id."'>Add New Address</a></td></tr>";						
			if(!empty($person['addresses']))
			{				
				$summary_html .= "<tr><td colspan='2' nowrap>";
								
				foreach($person['addresses'] as $address)
				{					
					$update_addr_link = "<a title='click to update this address' href='index.php?module=LTT_Address&action=EditView&record=".$address['Address_ID']."&return_module=PLT_Participant&return_id=".$this->bean->id."&return_action=DetailView'>Update</a>";
					
					$addr_str = $address['Address'];
					
					if(!empty($address['Unit']))
						$addr_str .= " Unit ".$address['Unit'];
					
					$addr_str .= ", ".$address['City'].", ".$address['State']." ".$address['Zip'];
					
					$addr_str = trim($addr_str, " ,");			
					$addr_str .= " <br><font color='#9B9595'>".$address['Address_Type']."</font>";			
					$addr_str .= " &nbsp;&nbsp;".$update_addr_link."<br>";
						
					//address 2.
					if(!empty($address['Address_2']))
						$addr_str .= "<u>Address 2</u> ".$address['Address_2']."<br>";
					
					$summary_html .= $addr_str."<br/>";
				}
				$summary_html .= "</td></tr>";				
			}
			//$summary_html .= "<tr><td colspan='2'>&nbsp;</td></tr>";

				
			//loop thru all emails.
			$summary_html .= "<tr><td nowrap ".$heading_td_style." colspan='2'><b>Email</b> &nbsp;&nbsp;&nbsp;<a ".$add_link_style." href='index.php?module=LTT_Email&action=EditView&return_module=PLT_Participant&return_id=".$this->bean->id."&return_action=DetailView&person_name=".$person['name']['value']."&person_id=".$id."'>Add Email</a></td></tr>";						
			if(!empty($person['emails']))
			{
				$summary_html .= "<tr><td colspan='2' nowrap>";
								
				foreach($person['emails'] as $email)
				{
					$update_email_link = "<a title='click to update this email' href='index.php?module=LTT_Email&action=EditView&record=".$email['Email_ID']."&return_module=PLT_Participant&return_id=".$this->bean->id."&return_action=DetailView'>Edit</a>";
					$summary_html .= $email['Email_Address']." &nbsp;&nbsp;<font color='#9B9595'>".$email['Email_Type']."</font>";
					$summary_html .= " &nbsp;&nbsp;".$update_email_link."<br/>";
				}		
				$summary_html .= "<br/>";
				$summary_html .= "</td></tr>";
			}

			
			//loop thru phone(s)			
			$summary_html .= "<tr><td nowrap ".$heading_td_style." colspan='2'><b>Phone</b>&nbsp;&nbsp;&nbsp;<a ".$add_link_style." href='index.php?module=LTT_Telephone&action=EditView&return_module=PLT_Participant&return_id=".$this->bean->id."&return_action=DetailView&person_name=".$person['name']['value']."&person_id=".$id."'>Add Phone</a></td></tr>";						
			if(!empty($person['phones']))
			{				
				$summary_html .= "<tr><td colspan='2' nowrap>";
								
				foreach($person['phones'] as $phone)
				{
					$update_phone_link = "<a title='click to update this phone' href='index.php?module=LTT_Telephone&action=EditView&record=".$phone['Phone_ID']."&return_module=PLT_Participant&return_id=".$this->bean->id."&return_action=DetailView'>Edit</a>";
					$summary_html .= $phone['Phone_Number']." &nbsp;&nbsp;<font color='#9B9595'>".$phone['Phone_Type']."</font>";
					$summary_html .= " &nbsp;&nbsp;".$update_phone_link."<br/>";
				}		
				$summary_html .= "<br/>";
				
				$summary_html .= "</td></tr>";
			}
			else
			{
				//$summary_html .= "<tr><td nowrap><b>Phone</b></td><td><a href='index.php?module=LTT_Telephone&action=EditView&return_module=PLT_Participant&return_id=".$this->bean->id."&return_action=DetailView&person_name=".$person['name']['value']."&person_id=".$id."'>Add</a></td></tr>";
			}
			
			//loop thru households
			if(!empty($person['households']))
			{
				foreach($person['households'] as $household)
				{
					$summary_html .= "<tr><td nowrap><b>Household ID</b></td><td>".$household['Household_ID']."</td></tr>";															
					$summary_html .= "<tr><td nowrap><b>Household Link ID</b></td><td>".$household['Household_Link_ID']."</td></tr>";															
				}				
			}
			else
			{
				$summary_html .= "<tr><td nowrap><b>Household ID</b></td><td><a href='index.php?module=GT_Household&action=EditView'>Add</a></td></tr>";															
				$summary_html .= "<tr><td nowrap><b>Household Link ID</b></td><td><a href='index.php?module=PLT_LnkPrsHshld&action=EditView'>Add</a></td></tr>";																		
			}
			
			//loop thru providers.
			if(!empty($person['providers']))
			{
				foreach($person['providers'] as $provider)
				{
					$summary_html .= "<tr><td nowrap><b>Provider ID</b></td><td>".$provider['Provider_ID']."</td></tr>";															
					$summary_html .= "<tr><td nowrap><b>Provider Link ID</b></td><td>".$provider['Provider_Linkage_ID']."</td></tr>";															
				}				
			}
			else
			{
				$summary_html .= "<tr><td nowrap><b>Provider ID</b></td><td><a href='index.php?module=OLT_Provider&action=EditView'>Add</a></td></tr>";															
				$summary_html .= "<tr><td nowrap><b>Provider Link ID</b></td><td><a href='index.php?module=OLT_PrsnPrvdLnk&action=EditView'>Add</a></td></tr>";																		
			}			
			
			$summary_html .= "</table></td>";
			
			
			//========================= Show Event Information ========================			
			$summary_html .= "<td><table style='border: 0px solid #AA9ED3;float:left;width:300px;background-color:#ffffff'>";
			$summary_html .= "<tr><td><b>Events</b></td></tr>";
			
			if(!empty($person['events']))
			{
				$summary_html .= "<tr><td><table style='border: 0px solid #AA9ED3;float:left;background-color:#EAEBF9'>";
				$summary_html .= "<tr><td>Event ID</td><td>Event Type</td><td colspan='2'>Event Time Window</td></tr>";

				foreach($person['events'] as $event)
				{		
					if($event['Event_Type_Other'] != "")
						$event_type = $event['Event_Type_Other'];
					else
						$event_type = $event['Event_Type'];
				
					$summary_html .= "<tr><td><a href='index.php?module=NCSDC_EventInfo&action=DetailView&record=".$event['Event_ID']."'>".$event['Event_Name']."</a></td><td>".$event_type."</td><td>".$event['Visit_Window_Start_Date']."</td><td>".$event['Visit_Window_End_Date']."</td></tr>";
				}
				
				$summary_html .= "</table></td></tr>";
			}
			else
			{
				$summary_html .= "<tr><td>No event found.</td></tr>";
			}
			
			//Add link to create new event.
			if(!empty($person['participant_info']))
				$summary_html .= "<tr><td align='left'><br/><a href='index.php?module=NCSDC_EventInfo&action=EditView&participant_id=".$person['participant_info']['id']."&participant_name=".$person['participant_info']['name']."' title='Click here to add new event'>Add event</a></td></tr>";
				
				
				//$summary_html .= "<tr><td align='left'><br/><a href='index.php?module=NCSDC_EventInfo&action=EditView&participant_id=".$person['participant_info']['id']."&participant_name=".$person['participant_info']['name']."&return_module=PLT_Participant&return_id=".$this->bean->id."&return_action=DetailView' title='Click here to add new event'>Add event</a></td></tr>";				
				//&return_module=PLT_Participant&return_id=".$this->bean->id."&return_action=DetailView
				//$summary_html .= "<tr><td align='left'><br/><a href='index.php?module=NCSDC_EventInfo&action=EditView&return_module=PLT_Participant&return_id=".$this->bean->id."&return_action=DetailView&participant_id=".$person['participant_info']['id']."&participant_name=".$person['participant_info']['name']."' title='Click here to add new event'>Add event</a></td></tr>";				
				
		
			$summary_html .= "</table></td>";
			
			$summary_html .= "</tr>";		
        }

		$summary_html .= "</table>";
		
		return $summary_html;
    }
	
	
}
?>