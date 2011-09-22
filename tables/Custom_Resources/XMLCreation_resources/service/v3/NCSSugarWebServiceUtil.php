<?php

require_once('service/v3/SugarWebServiceUtilv3.php');
require_once ('NCSExportUtils.php');

class NCSSugarWebServiceUtil extends SugarWebServiceUtilv3 {
    
    private $master_psu_id = '200000XX';
    private $master_sc_id = '200000XY';
    
    function parseHeaderValues(&$xmlWriter)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, PSU_SUGAR_MODULE, null);
        $val = $db->fetchByAssoc($results, -1, false);
        $xmlWriter->startElementNS('ns1','transmission_header', null);
        $xmlWriter->startElement('sc_id');
        $xmlWriter->text($val['sc_id']);
        $xmlWriter->endElement();
        $xmlWriter->startElement('psu_id');
        $xmlWriter->text($val['name']);
        $xmlWriter->endElement();
        $xmlWriter->startElement('specification_version');
        $xmlWriter->text('2.0.01.00');
        $xmlWriter->endElement();
        $xmlWriter->startElement('is_snapshot');
        $xmlWriter->text('true');
        $xmlWriter->endElement();
        $xmlWriter->endElement();
        $xmlWriter->flush();
        unset($results);
    }
    
    
    function parseStudyCenter(&$xmlWriter, &$chunk) 
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, STUDY_CENTER_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('study_center');
            $this->addXMLElement($xmlWriter, 'sc_id', $val['name']);
            $this->addXMLElement($xmlWriter, 'sc_name', $val['sc_name']);
            $this->addXMLElement($xmlWriter, 'comments', $val['comments']);
            $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
            if (strlen($val['name']) != 0) {
                $this->master_sc_id = $val['name'];
            }
        }
        $xmlWriter->flush();
        unset($results);
    }
    
    function parsePSU(&$xmlWriter, &$chunk) 
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, PSU_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('psu');
            $this->addXMLElement($xmlWriter, 'sc_id', $val['sc_id']);
            $this->addXMLElement($xmlWriter, 'psu_id', $val['name']);
            $this->addXMLElement($xmlWriter, 'psu_name', $val['psu_name']);
            //$this->addXMLElement($xmlWriter, 'recruit_type', $val['recruit_type']);
			$this->addXMLElement($xmlWriter, 'recruit_type', str_replace("_", "-", $val['recruit_type']));
            $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
            if (strlen($val['name']) != 0) {
                $this->master_psu_id = $val['name'];
            }
        }
        $xmlWriter->flush();
        unset($results);
    }
    
    function parseSSU(&$xmlWriter, &$chunk) 
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, SSU_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('ssu');
            $this->addXMLElement($xmlWriter, 'sc_id', $this->master_sc_id);
            $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
            $this->addXMLElement($xmlWriter, 'ssu_id', $val['name']);
            $this->addXMLElement($xmlWriter, 'ssu_name', $val['ssu_name']);
            $this->addXMLElement($xmlWriter, 'transaction_type', $val['transaction_type']);
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);
    }
    
    
    function parseTSU(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, TSU_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('tsu');
                $this->addXMLElement($xmlWriter, 'sc_id',  $this->master_sc_id);
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'tsu_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'tsu_name', $val['tsu_name']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();     
        }
        $xmlWriter->flush();
        unset($results);        
    }
    
    function parseListingUnit(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, LISTING_UNIT_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('listing_unit');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id); // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'list_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'ssu_id', $val['gt_secsampuistingunt_name']);
                $this->addXMLElement($xmlWriter, 'tsu_id', $val['gt_tersampuistingunt_name']);
                $this->addXMLElement($xmlWriter, 'list_line', $val['list_line']);
                // $this->addXMLElement($xmlWriter, 'list_source', $val['list_source']);
				$this->addXMLElement($xmlWriter, 'list_source', str_replace("_", "-", $val['list_source']));
                $this->addXMLElement($xmlWriter, 'list_comment', $val['list_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();     
        }  
        $xmlWriter->flush();
        unset($results);        
    }
    
    function parseDwellingUnit(&$xmlWriter, &$chunk) 
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, DWELLING_UNIT_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('dwelling_unit');
            $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id); // NO DIRECT RELATIONSHIP
            $this->addXMLElement($xmlWriter, 'du_id', $val['name']);
            $this->addXMLElement($xmlWriter, 'list_id', $val['gt_listinguellingunt_name']);
            $this->addXMLElement($xmlWriter, 'tsu_id', $val['gt_secsampuellingunt_name']);
            $this->addXMLElement($xmlWriter, 'ssu_id', $val['gt_secsampuellingunt_name']);
            //$this->addXMLElement($xmlWriter, 'duplicate_du', $val['duplicate_du']);
			$this->addXMLElement($xmlWriter, 'duplicate_du', str_replace("_", "-", $val['duplicate_du']));
            //$this->addXMLElement($xmlWriter, 'missed_du', $val['missed_du']);
			$this->addXMLElement($xmlWriter, 'missed_du', str_replace("_", "-", $val['missed_du']));
            //$this->addXMLElement($xmlWriter, 'du_type', $val['du_type']);
			$this->addXMLElement($xmlWriter, 'du_type', str_replace("_", "-", $val['du_type']));
            $this->addXMLElement($xmlWriter, 'du_type_oth', $val['du_type_oth']);
            //$this->addXMLElement($xmlWriter, 'du_ineligible', $record['du_ineligible']);
            $this->addXMLElement($xmlWriter, 'du_ineligible', str_replace("_", "-", $val['du_ineligible']));
            // $this->addXMLElement($xmlWriter, 'du_access', $val['du_access']);
			$this->addXMLElement($xmlWriter, 'du_access', str_replace("_", "-", $val['du_access']));
            $this->addXMLElement($xmlWriter, 'duid_comment', $val['duid_comment']);
            $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);
    }
    
    function parseHouseHoldUnit(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, HOUSEHOLD_UNIT_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('household_unit');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id); // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'hh_id', $val['name']);
                // $this->addXMLElement($xmlWriter, 'hh_status', $val['hh_status']);
				$this->addXMLElement($xmlWriter, 'hh_status', str_replace("_", "-", $val['hh_status']));
                // $this->addXMLElement($xmlWriter, 'hh_elig', $val['hh_elig']);
				$this->addXMLElement($xmlWriter, 'hh_elig', str_replace("_", "-", $val['hh_elig']));
                $this->addXMLElement($xmlWriter, 'num_age_elig', $val['num_age_elig']);
                $this->addXMLElement($xmlWriter, 'num_preg', $val['num_preg']);
                $this->addXMLElement($xmlWriter, 'num_preg_minor', $val['num_preg_minor']);
                $this->addXMLElement($xmlWriter, 'num_preg_adult', $val['num_preg_adult']);
                $this->addXMLElement($xmlWriter, 'num_preg_over49', $val['num_preg_over49']);
                // $this->addXMLElement($xmlWriter, 'hh_structure', $val['hh_structure']);
				$this->addXMLElement($xmlWriter, 'hh_structure', str_replace("_", "-", $val['hh_structure']));
                $this->addXMLElement($xmlWriter, 'hh_structure_oth', $val['hh_structure_oth']);
                $this->addXMLElement($xmlWriter, 'hh_comment', $val['hh_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);         
    }
    
    function parseLinkHouseHoldDwelling(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, LINK_HOUSEHOLD_DWELLING_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('link_household_dwelling');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);  // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'hh_du_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'hh_id', $val['gt_dwlunthshousehold_name']);
                $this->addXMLElement($xmlWriter, 'du_id', $val['gt_dwlunthsellingunt_name']);
                // $this->addXMLElement($xmlWriter, 'is_active', $val['is_active']);
				$this->addXMLElement($xmlWriter, 'is_active', str_replace("_", "-", $val['is_active']));
                // $this->addXMLElement($xmlWriter, 'du_rank', $val['du_rank']);
				$this->addXMLElement($xmlWriter, 'du_rank', str_replace("_", "-", $val['du_rank']));
                $this->addXMLElement($xmlWriter, 'du_rank_oth', $val['du_rank_oth']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);         
    }
    
    function parseStaff(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, STAFF_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('staff');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);  // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'staff_id', $val['name']);
                //$this->addXMLElement($xmlWriter, 'staff_type', $record['staff_type']);
                $this->addXMLElement($xmlWriter, 'staff_type', str_replace("_", "-", $val['staff_type']));
				$this->addXMLElement($xmlWriter, 'staff_type_oth', $val['staff_type_oth']);
                //$this->addXMLElement($xmlWriter, 'subcontractor', $val['subcontractor']);
				$this->addXMLElement($xmlWriter, 'subcontractor', str_replace("_", "-", $val['subcontractor']));
                $this->addXMLElement($xmlWriter, 'staff_yob', $val['staff_yob']);
                //$this->addXMLElement($xmlWriter, 'staff_age_range', $val['staff_age_range']);
				$this->addXMLElement($xmlWriter, 'staff_age_range', str_replace("_", "-", $val['staff_age_range']));
                $this->addXMLElement($xmlWriter, 'staff_gender', $val['staff_gender']);
                //$this->addXMLElement($xmlWriter, 'staff_race', $val['staff_race']);
				$this->addXMLElement($xmlWriter, 'staff_race', str_replace("_", "-", $val['staff_race']));
                //$this->addXMLElement($xmlWriter, 'staff_race_oth', $record['name']);
				$this->addXMLElement($xmlWriter, 'staff_race_oth', str_replace("_", "-", $val['staff_race_oth']));
                $this->addXMLElement($xmlWriter, 'staff_zip', $val['staff_zip']);
                $this->addXMLElement($xmlWriter, 'staff_ethnicity', $val['staff_ethnicity']);
				$this->addXMLElement($xmlWriter, 'staff_exp', $val['staff_exp']);
                $this->addXMLElement($xmlWriter, 'staff_comment', $val['staff_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results); 
    }
    
    function parseStaffLanguage(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, STAFF_LANGUAGE_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('staff_language');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);  // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'staff_language_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $val['st_staffrstt_stflang_name']);
                // $this->addXMLElement($xmlWriter, 'staff_lang', $val['staff_lang']);
				$this->addXMLElement($xmlWriter, 'staff_lang', str_replace("_", "-", $val['staff_lang']));
                $this->addXMLElement($xmlWriter, 'staff_lang_oth', $val['staff_lang_oth']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseStaffValidation(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, STAFF_VALIDATION_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('staff_validation');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);  // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'staff_val_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $val['st_staffrst_stfvldtn_name']);
                $this->addXMLElement($xmlWriter, 'event_id', $val['ncsdc_event_stfvldtn_name']);
                // $this->addXMLElement($xmlWriter, 'staff_validate', $val['staff_validate']);
				$this->addXMLElement($xmlWriter, 'staff_validate', str_replace("_", "-", $val['staff_validate']));
                $this->addXMLElement($xmlWriter, 'staff_val_date', $val['staff_val_date']);
                $this->addXMLElement($xmlWriter, 'staff_val_comment', $val['staff_val_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseStaffWeeklyExpense(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, STAFF_WEEKLY_EXPENSE_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('staff_weekly_expense');
                $this->addXMLElement($xmlWriter, 'psu_id',  $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'weekly_exp_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $val['st_staffrsttfwkexpns_name']);
                //$this->addXMLElement($xmlWriter, 'week_start_date', $val['week_start_date']);
                $start_date = preg_split('/[ ]/', $val['week_start_date']);
                $this->addXMLElement($xmlWriter, 'week_start_date', $start_date[0]);
				$this->addXMLElement($xmlWriter, 'staff_pay', $val['staff_pay']);
                $this->addXMLElement($xmlWriter, 'staff_hours', $val['staff_hours']);
                $this->addXMLElement($xmlWriter, 'staff_expenses', $val['staff_expenses']);
                $this->addXMLElement($xmlWriter, 'staff_miles', $val['staff_miles']);
                $this->addXMLElement($xmlWriter, 'weekly_expenses_comment', $val['weekly_expenses_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseStaffExpenseManagementTask(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, STAFF_EXP_MNGMNT_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('staff_exp_mngmnt_tasks');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'staff_exp_mgmt_task_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'staff_weekly_expense_id', $val['st_stfwkexpfexpmgtsk_name']);
                // $this->addXMLElement($xmlWriter, 'mgmt_task_type', $val['mgmt_task_type']);
				$this->addXMLElement($xmlWriter, 'mgmt_task_type', str_replace("_", "-", $val['mgmt_task_type']));
                $this->addXMLElement($xmlWriter, 'mgmt_task_type_oth', $val['mgmt_task_type_oth']);
                $this->addXMLElement($xmlWriter, 'mgmt_task_hrs', $val['mgmt_task_hrs']);
                $this->addXMLElement($xmlWriter, 'mgmt_task_comment', $val['mgmt_task_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseStaffExpenseDataCollectionTask(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, STAFF_EXP_DATA_CLLCTN_TASKS_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('staff_exp_data_cllctn_tasks');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'staff_exp_data_coll_task_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'staff_weekly_expense_id', $val['st_stfwkexpfexpdctsk_name']);
                // $this->addXMLElement($xmlWriter, 'data_coll_task_type', $val['data_coll_task_type']);
				$this->addXMLElement($xmlWriter, 'data_coll_task_type', str_replace("_", "-", $val['data_coll_task_type']));
                $this->addXMLElement($xmlWriter, 'data_coll_task_type_oth', $val['data_coll_task_type_oth']);
                $this->addXMLElement($xmlWriter, 'data_coll_tasks_hrs', $val['data_coll_tasks_hrs']);
                $this->addXMLElement($xmlWriter, 'data_coll_task_cases', $val['data_coll_task_cases']);
                $this->addXMLElement($xmlWriter, 'data_coll_transmit', $val['data_coll_transmit']);
                $this->addXMLElement($xmlWriter, 'data_coll_task_comment', $val['data_coll_task_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseOutreach(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, OUTREACH_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('outreach');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'tsu_id', $val['tsu_id']);
                $this->addXMLElement($xmlWriter, 'ssu_id', $val['st_wkoeact_ecsampunt_name']);  // NO DB FIELD OR RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $val['name']);
                // $this->addXMLElement($xmlWriter, 'outreach_event_date', $val['outreach_event_date']);
				$outreach_event_date = preg_split('/[ ]/', $val['outreach_event_date']);
                $this->addXMLElement($xmlWriter, 'outreach_event_date', $outreach_event_date[0]);
                //$this->addXMLElement($xmlWriter, 'outreach_target', $record['st_msouttart_wkoeact_name']);
                //$this->addXMLElement($xmlWriter, 'outreach_target_oth', $record['outreach_target_oth']);
                // $this->addXMLElement($xmlWriter, 'outreach_mode', $val['outreach_mode']);
				$this->addXMLElement($xmlWriter, 'outreach_mode', str_replace("_", "-", $val['outreach_mode']));
                $this->addXMLElement($xmlWriter, 'outreach_mode_oth', $val['outreach_mode_oth']);
                // $this->addXMLElement($xmlWriter, 'outreach_type', $val['outreach_type']);
				$this->addXMLElement($xmlWriter, 'outreach_type', str_replace("_", "-", $val['outreach_type']));
                $this->addXMLElement($xmlWriter, 'outreach_type_oth', $val['outreach_type_oth']);
                // $this->addXMLElement($xmlWriter, 'outreach_tailored', $val['outreach_tailored']);
				$this->addXMLElement($xmlWriter, 'outreach_tailored', str_replace("_", "-", $val['outreach_tailored']));
                // $this->addXMLElement($xmlWriter, 'outreach_lang1', $val['outreach_lang1']);
				$this->addXMLElement($xmlWriter, 'outreach_lang1', str_replace("_", "-", $val['outreach_lang1']));
                //$this->addXMLElement($xmlWriter, 'outreach_lang2', $record['outreach_lang2']);
                $this->addXMLElement($xmlWriter, 'outreach_lang_oth', $val['outreach_lang_oth']);
                // $this->addXMLElement($xmlWriter, 'outreach_race1', $val['outreach_race1']);
				$this->addXMLElement($xmlWriter, 'outreach_race1', str_replace("_", "-", $val['outreach_race1']));
                //$this->addXMLElement($xmlWriter, 'outreach_race2', $record['st_msoutract_wkoeact_name']);
                //$this->addXMLElement($xmlWriter, 'outreach_race_oth', $record['outreach_race_oth']);
                // $this->addXMLElement($xmlWriter, 'outreach_culture1', $val['outreach_culture1']);
				$this->addXMLElement($xmlWriter, 'outreach_culture1', str_replace("_", "-", $val['outreach_culture1']));
                // $this->addXMLElement($xmlWriter, 'outreach_culture2', $val['outreach_culture2']);
				$this->addXMLElement($xmlWriter, 'outreach_culture2', str_replace("_", "-", $val['outreach_culture2']));
                $this->addXMLElement($xmlWriter, 'outreach_culture_oth', $val['outreach_culture_oth']);
                $this->addXMLElement($xmlWriter, 'outreach_quantity', $val['outreach_quantity']);
                $this->addXMLElement($xmlWriter, 'outreach_cost', $val['outreach_cost']);
                $this->addXMLElement($xmlWriter, 'outreach_staffing', $val['outreach_staffing']);
                // $this->addXMLElement($xmlWriter, 'outreach_incident', $val['outreach_incident']);
				$this->addXMLElement($xmlWriter, 'outreach_incident', str_replace("_", "-", $val['outreach_incident']));
                $this->addXMLElement($xmlWriter, 'incident_id', $val['incident_id']);
                // $this->addXMLElement($xmlWriter, 'outreach_eval_result', $val['outreach_eval_result']);
				$this->addXMLElement($xmlWriter, 'outreach_eval_result', str_replace("_", "-", $val['outreach_eval_result']));
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
	// *************** 2.0 MODULE INSERTED ******************
    function parseOutreachRace(&$xmlWriter, &$chunk) 
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, OUTREACH_RACE_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('outreach_race');
            $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
            $this->addXMLElement($xmlWriter, 'outreach_race_id', $val['name']);
            $this->addXMLElement($xmlWriter, 'outreach_event_id', $val['st_msoutract_wkoeact_name']);
            //$this->addXMLElement($xmlWriter, 'outreach_race2', str_replace("_", "-", $record['outreach_race2']['value']));
            // $this->addXMLElement($xmlWriter, 'outreach_race2', $val['outreach_race2']);
			$this->addXMLElement($xmlWriter, 'outreach_race2', str_replace("^","",str_replace("_", "-", $val['outreach_race2'])));
            $this->addXMLElement($xmlWriter, 'outreach_race_oth', $val['outreach_race_oth']);
            $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);
    }
	// *****************************************************
    
    function parseOutreachStaff(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, OUTREACH_STAFF_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('outreach_staff');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'outreach_event_staff_id', $val['name']); 
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $val['st_otrchstat_wkoeact_name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $val['st_otrchstastaffrstr_name']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseOutreachEval(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, OUTREACH_EVAL_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('outreach_eval');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'outreach_event_eval_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $val['st_msoutevat_wkoeact_name']);
		// $this->addXMLElement($xmlWriter, 'outreach_eval', $val['outreach_eval']);
				$this->addXMLElement($xmlWriter, 'outreach_eval', str_replace("^","",str_replace("_", "-", $val['outreach_eval'])));
                $this->addXMLElement($xmlWriter, 'outreach_eval_oth', $val['outreach_eval_oth']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
	// *************** 2.0 MODULE INSERTED ******************
	function parseOutreachTarget(&$xmlWriter, &$chunk)
    {
            $db = DBManagerFactory::getInstance();
        $results = export($db, OUTREACH_TARGET_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('outreach_target');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'outreach_target_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $val['st_msouttart_wkoeact_name']);
                // $this->addXMLElement($xmlWriter, 'outreach_target_ms', $val['outreach_target_ms']);
				$this->addXMLElement($xmlWriter, 'outreach_target_ms', str_replace("^","",str_replace("_", "-", $val['outreach_target_ms'])));
                $this->addXMLElement($xmlWriter, 'outreach_target_ms_oth', $val['outreach_target_ms_oth']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
	function parseOutreachLanguage2(&$xmlWriter, &$chunk)
    {
            $db = DBManagerFactory::getInstance();
        $results = export($db, OUTREACH_LANG2_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('outreach_lang2');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'outreach_lang2_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $val['st_msoutlant_wkoeact_name']);
                // $this->addXMLElement($xmlWriter, 'outreach_lang2', $val['outreach_lang2']);
				$this->addXMLElement($xmlWriter, 'outreach_lang2', str_replace("^","",str_replace("_", "-", $val['outreach_lang2'])));
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	// ******************************************************
	
    function parseStaffCertTraining(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, STAFF_CERT_TRAINING_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('staff_cert_training');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'staff_cert_list_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $val['st_staffrststfcrttrn_name']);
                // $this->addXMLElement($xmlWriter, 'cert_train_type', $val['cert_train_type']);
				$this->addXMLElement($xmlWriter, 'cert_train_type', str_replace("_", "-", $val['cert_train_type']));
                // $this->addXMLElement($xmlWriter, 'cert_completed', $val['cert_completed']);
				$this->addXMLElement($xmlWriter, 'cert_completed', str_replace("_", "-", $val['cert_completed']));
                $this->addXMLElement($xmlWriter, 'cert_date', $val['cert_date']);
                // $this->addXMLElement($xmlWriter, 'staff_bgcheck_lvl', $val['staff_bgcheck_lvl']);
				$this->addXMLElement($xmlWriter, 'staff_bgcheck_lvl', str_replace("_", "-", $val['staff_bgcheck_lvl']));
                $this->addXMLElement($xmlWriter, 'cert_type_frequency', $val['cert_type_frequency']);
                $this->addXMLElement($xmlWriter, 'cert_type_exp_date', $val['cert_type_exp_date']);
                $this->addXMLElement($xmlWriter, 'cert_comment', $val['cert_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parsePerson(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, PERSON_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            //$GLOBALS['log']->error(PERSON_SUGAR_MODULE . ' --- export row ' . $xmlRow . ': ' . memory_get_usage());
            $xmlWriter->startElement('person');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id); // NO CLEAR RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'person_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'prefix', str_replace("_", "-", $val['prefix']));
                $this->addXMLElement($xmlWriter, 'first_name', $val['first_name']);
                $this->addXMLElement($xmlWriter, 'last_name', $val['last_name']);
                $this->addXMLElement($xmlWriter, 'middle_name', $val['middle_name']);
                $this->addXMLElement($xmlWriter, 'maiden_name', $val['maiden_name']);
                $this->addXMLElement($xmlWriter, 'suffix', str_replace("_", "-", $val['suffix']));
                $this->addXMLElement($xmlWriter, 'title', $val['title']);
                // $this->addXMLElement($xmlWriter, 'sex', $val['sex']);
				$this->addXMLElement($xmlWriter, 'sex', str_replace("_", "-", $val['sex']));
                $this->addXMLElement($xmlWriter, 'age', $val['age']);
                //$this->addXMLElement($xmlWriter, 'age_range', $record['age_range']);
				$this->addXMLElement($xmlWriter, 'age_range', str_replace("_", "-", $val['age_range']));
                // $this->addXMLElement($xmlWriter, 'person_dob', $val['person_dob']);
				$person_dob = preg_split('/[ ]/', $val['person_dob']);
				$this->addXMLElement($xmlWriter, 'person_dob', $person_dob[0]);
                $this->addXMLElement($xmlWriter, 'deceased', $val['deceased']);
                //$this->addXMLElement($xmlWriter, 'ethnic_group', $record['ethnic_group']);
				$this->addXMLElement($xmlWriter, 'ethnic_group', str_replace("_", "-", $val['ethnic_group']));
                // $this->addXMLElement($xmlWriter, 'person_lang', $val['person_lang']);
				$this->addXMLElement($xmlWriter, 'person_lang', str_replace("_", "-", $val['person_lang']));
                $this->addXMLElement($xmlWriter, 'person_lang_oth', $val['person_lang_oth']);
                //$this->addXMLElement($xmlWriter, 'maristat', $record['maristat']);
				$this->addXMLElement($xmlWriter, 'maristat', str_replace("_", "-", $val['maristat']));
                $this->addXMLElement($xmlWriter, 'maristat_oth', $val['maristat_oth']);
                // $this->addXMLElement($xmlWriter, 'pref_contact', $val['pref_contact']);
				$this->addXMLElement($xmlWriter, 'pref_contact', str_replace("_", "-", $val['pref_contact']));
                $this->addXMLElement($xmlWriter, 'pref_contact_oth', $val['pref_contact_oth']);
                $this->addXMLElement($xmlWriter, 'plan_move', str_replace("_", "-", $val['plan_move']));
                $this->addXMLElement($xmlWriter, 'move_info', str_replace("_", "-", $val['move_info']));
                $this->addXMLElement($xmlWriter, 'new_address_id', $val['new_address_id']);
                $this->addXMLElement($xmlWriter, 'when_move', str_replace("_", "-", $val['when_move']));
                $this->addXMLElement($xmlWriter, 'date_move', $val['date_move']);
                $this->addXMLElement($xmlWriter, 'p_tracing', $val['p_tracing']);
                // $this->addXMLElement($xmlWriter, 'p_info_source', $val['p_info_source']);
				$this->addXMLElement($xmlWriter, 'p_info_source', str_replace("_", "-", $val['p_info_source']));
                $this->addXMLElement($xmlWriter, 'p_info_source_oth', $val['p_info_source_oth']);
                // $this->addXMLElement($xmlWriter, 'p_info_date', $val['p_info_date']);
				$p_info_date = preg_split('/[ ]/', $val['p_info_date']);
				$this->addXMLElement($xmlWriter, 'p_info_date', $p_info_date[0]);
                // $this->addXMLElement($xmlWriter, 'p_info_update', $val['p_info_update']);
				$p_info_update = preg_split('/[ ]/', $val['p_info_update']);
				$this->addXMLElement($xmlWriter, 'p_info_update', $p_info_update[0]);
                $this->addXMLElement($xmlWriter, 'person_comment', $val['person_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results); 
    }
    
    function parsePersonRace(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, PERSON_RACE_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('person_race');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id); // NO RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'person_race_id', $val['name']);
                //$this->addXMLElement($xmlWriter, 'person_id', $record['plt_person_ersonrace_name']);
                $this->addXMLElement($xmlWriter, 'person_id', getModuleNameByID(PERSON_TABLE, $val[PERSONRACE_PERSON_RHS]));
                //$this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(PERSON_RACE_SUGAR_MODULE, $val['id'], 'plt_person_plt_personrace', 'name'));
                // $this->addXMLElement($xmlWriter, 'race', $val['race']);
				$this->addXMLElement($xmlWriter, 'race', str_replace("_", "-", $val['race']));
                // $this->addXMLElement($xmlWriter, 'race_oth', $val['race_oth']);
				$this->addXMLElement($xmlWriter, 'race_oth', str_replace("_", "-", $val['race_oth']));
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseLinkPersonHousehold(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, LINK_PERSON_HOUSEHOLD_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('link_person_household');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'person_hh_id', $val['name']);
                //$this->addXMLElement($xmlWriter, 'person_id', $record['plt_lnkprshlt_person_name']);
                $this->addXMLElement($xmlWriter, 'person_id', getModuleNameByID(PERSON_TABLE, $val[LINKPERSONHOUSEHOLD_PERSON_RHS]));
                //$this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(LINK_PERSON_HOUSEHOLD_SUGAR_MODULE, $val['id'], 'plt_lnkprshhld_plt_person', 'name'));
                $this->addXMLElement($xmlWriter, 'hh_id', $val['plt_lnkprshhousehold_name']);
                // $this->addXMLElement($xmlWriter, 'is_active', $val['is_active']);
				$this->addXMLElement($xmlWriter, 'is_active', str_replace("_", "-", $val['is_active']));
                // $this->addXMLElement($xmlWriter, 'hh_rank', $val['hh_rank']);
				$this->addXMLElement($xmlWriter, 'hh_rank', str_replace("_", "-", $val['hh_rank']));
                $this->addXMLElement($xmlWriter, 'hh_rank_oth', $val['hh_rank_oth']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseParticipant(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, PARTICIPANT_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('participant');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'p_id', $val['name']);
                //$this->addXMLElement($xmlWriter, 'p_type', $record['p_type']);
                $this->addXMLElement($xmlWriter, 'p_type', str_replace("_", "-", $val['p_type']));
				$this->addXMLElement($xmlWriter, 'p_type_oth', $val['p_type_oth']);
                // $this->addXMLElement($xmlWriter, 'status_info_source', $val['status_info_source']);
				$this->addXMLElement($xmlWriter, 'status_info_source', str_replace("_", "-", $val['status_info_source']));
                $this->addXMLElement($xmlWriter, 'status_info_source_oth', $val['status_info_source_oth']);
                // $this->addXMLElement($xmlWriter, 'status_info_mode', $val['status_info_mode']);
				$this->addXMLElement($xmlWriter, 'status_info_mode', str_replace("_", "-", $val['status_info_mode']));
                $this->addXMLElement($xmlWriter, 'status_info_mode_oth', $val['status_info_mode_oth']);
                $this->addXMLElement($xmlWriter, 'status_info_date', $val['status_info_date']);
                // $this->addXMLElement($xmlWriter, 'enroll_status', $val['enroll_status']);
				$this->addXMLElement($xmlWriter, 'enroll_status', str_replace("_", "-", $val['enroll_status']));
                // $this->addXMLElement($xmlWriter, 'enroll_date', $val['enroll_date']);
				$enroll_date = preg_split('/[ ]/', $val['enroll_date']);
				$this->addXMLElement($xmlWriter, 'enroll_date', $enroll_date[0]);
                // $this->addXMLElement($xmlWriter, 'pid_entry', $val['pid_entry']);
				$this->addXMLElement($xmlWriter, 'pid_entry', str_replace("_", "-", $val['pid_entry']));
                $this->addXMLElement($xmlWriter, 'pid_entry_other', $val['pid_entry_other']);
                //$this->addXMLElement($xmlWriter, 'pid_age_elig', $record['pid_age_elig']);
				$this->addXMLElement($xmlWriter, 'pid_age_elig', str_replace("_", "-", $val['pid_age_elig']));
                $this->addXMLElement($xmlWriter, 'pid_comment', $val['pid_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseLinkPersonParticipant(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, LINK_PERSON_PARTICIPANT_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('link_person_participant');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'person_pid_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'p_id', $val['plt_lkprsprrticipant_name']);
                //$this->addXMLElement($xmlWriter, 'person_id', $record['plt_lkprsprlt_person_name']);
                $this->addXMLElement($xmlWriter, 'person_id', getModuleNameByID(PERSON_TABLE, $val[LINKPERSONPARTICIPANT_PERSON_RHS]));
                //$this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(LINK_PERSON_PARTICIPANT_SUGAR_MODULE, $val['id'], 'plt_lkprsprcpt_plt_person', 'name'));
                // $this->addXMLElement($xmlWriter, 'relation', $val['relation']);
				$this->addXMLElement($xmlWriter, 'relation', str_replace("_", "-", $val['relation']));
                $this->addXMLElement($xmlWriter, 'relation_oth', $val['relation_oth']);
                // $this->addXMLElement($xmlWriter, 'is_active', $val['is_active']);
				$this->addXMLElement($xmlWriter, 'is_active', str_replace("_", "-", $val['is_active']));
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    // *************** 2.0 MODULE INSERTED ******************
	function parseParticipantAuthorizationForm(&$xmlWriter, &$chunk)
    {
            $db = DBManagerFactory::getInstance();
        $results = export($db, PARTICIPANT_AUTHORIZATION_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('participant_auth');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'auth_form_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'p_id', $val['olt_providertauthfrm_name']);
                $this->addXMLElement($xmlWriter, 'contact_id', $val['ncsdc_cntctrtauthfrm_name']);
                $this->addXMLElement($xmlWriter, 'provider_id', $val['olt_providertauthfrm_name']);
				// $this->addXMLElement($xmlWriter, 'auth_form_type', $val['auth_form_type']);
				$this->addXMLElement($xmlWriter, 'auth_form_type', str_replace("_", "-", $val['auth_form_type']));
                $this->addXMLElement($xmlWriter, 'auth_type_oth', $val['auth_type_oth']);
                // $this->addXMLElement($xmlWriter, 'auth_status', $val['auth_status']);
				$this->addXMLElement($xmlWriter, 'auth_status', str_replace("_", "-", $val['auth_status']));
                $this->addXMLElement($xmlWriter, 'auth_status_oth', $val['auth_status_oth']);
            	$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	// ******************************************************
	
    function parseParticipantConsent(&$xmlWriter, &$chunk) 
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, PARTICIPANT_CONSENT_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('participant_consent');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'participant_consent_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'p_id', $val['plt_particitcptcnsnt_name']);
                $this->addXMLElement($xmlWriter, 'consent_version', $val['consent_version']);
                // $this->addXMLElement($xmlWriter, 'consent_expiration', $val['consent_expiration']);
				$exp_date = preg_split('/[ ]/', $val['consent_expiration']);
				$this->addXMLElement($xmlWriter, 'consent_expiration', $exp_date[0]);
                // $this->addXMLElement($xmlWriter, 'consent_type', $val['consent_type']);
				$this->addXMLElement($xmlWriter, 'consent_type', str_replace("_", "-", $val['consent_type']));
                // $this->addXMLElement($xmlWriter, 'consent_form_type', $val['consent_form_type']);
				$this->addXMLElement($xmlWriter, 'consent_form_type', str_replace("_", "-", $val['consent_form_type']));
              	// $this->addXMLElement($xmlWriter, 'consent_given', $val['consent_given']);
				$this->addXMLElement($xmlWriter, 'consent_given', str_replace("_", "-", $val['consent_given']));
				// $this->addXMLElement($xmlWriter, 'consent_date', $val['consent_date']);
				$consent_date = preg_split('/[ ]/', $val['consent_date']);
				$this->addXMLElement($xmlWriter, 'consent_date', $consent_date[0]);
                $this->addXMLElement($xmlWriter, 'consent_withdraw', $val['consent_withdraw']);
                $this->addXMLElement($xmlWriter, 'consent_withdraw_type', str_replace("_", "-", $val['consent_withdraw_type']));
                // $this->addXMLElement($xmlWriter, 'consent_withdraw_reason', $val['consent_withdraw_reason']);
				$this->addXMLElement($xmlWriter, 'consent_withdraw_reason', str_replace("_", "-", $val['consent_withdraw_reason']));
				// $this->addXMLElement($xmlWriter, 'consent_withdraw_date', $val['consent_withdraw_date']);
				$consent_withdraw_date = preg_split('/[ ]/', $val['consent_withdraw_date']);
				$this->addXMLElement($xmlWriter, 'consent_withdraw_date', $consent_withdraw_date[0]);
                // $this->addXMLElement($xmlWriter, 'consent_language', $val['consent_language']);
				$this->addXMLElement($xmlWriter, 'consent_language', str_replace("_", "-", $val['consent_language']));
				$this->addXMLElement($xmlWriter, 'consent_language_oth', $val['consent_language_oth']);
                $this->addXMLElement($xmlWriter, 'person_who_consented_id', $val['person_who_consented_id']);
                // $this->addXMLElement($xmlWriter, 'who_consented', $val['who_consented']);
				$this->addXMLElement($xmlWriter, 'who_consented', str_replace("_", "-", $val['who_consented']));
				$this->addXMLElement($xmlWriter, 'person_wthdrw_consent_id', $val['person_wthdrw_consent_id']);
                $this->addXMLElement($xmlWriter, 'who_wthdrw_consent', str_replace("_", "-", $val['who_wthdrw_consent']));
                // $this->addXMLElement($xmlWriter, 'consent_translate', $val['consent_translate']);
				$this->addXMLElement($xmlWriter, 'consent_translate', str_replace("_", "-", $val['consent_translate']));
				$this->addXMLElement($xmlWriter, 'consent_comments', $val['consent_comments']);
                $this->addXMLElement($xmlWriter, 'contact_id', $val['ncsdc_cntcttcptcnsnt_name']);
                // $this->addXMLElement($xmlWriter, 'reconsideration_script_use', $val['reconsideration_script_use']);
				$this->addXMLElement($xmlWriter, 'reconsideration_script_use', str_replace("_", "-", $val['reconsideration_script_use']));
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parsePPGDetails(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, PPG_DETAILS_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('ppg_details');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'ppg_details_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'p_id', $val['plt_partiFeinstcipgdetails_name']);
                // $this->addXMLElement($xmlWriter, 'ppg_pid_status', $val['ppg_pid_status']);
				$this->addXMLElement($xmlWriter, 'ppg_pid_status', str_replace("_", "-", $val['ppg_pid_status']));
                // $this->addXMLElement($xmlWriter, 'ppg_first', $val['ppg_first']);
				$this->addXMLElement($xmlWriter, 'ppg_first', str_replace("_", "-", $val['ppg_first']));
                // $this->addXMLElement($xmlWriter, 'orig_due_date', $val['orig_due_date']);
				$due_date = preg_split('/[ ]/', $val['orig_due_date']);
				$this->addXMLElement($xmlWriter, 'orig_due_date', $due_date[0]);
                // $this->addXMLElement($xmlWriter, 'due_date_2', $val['due_date_2']);
				$due2_date = preg_split('/[ ]/', $val['due_date_2']);
				$this->addXMLElement($xmlWriter, 'due_date_2', $due2_date[0]);
                // $this->addXMLElement($xmlWriter, 'due_date_3', $val['due_date_3']);
				$due3_date = preg_split('/[ ]/', $val['due_date_3']);
				$this->addXMLElement($xmlWriter, 'due_date_3', $due3_date[0]);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parsePPGStatusHistory(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, PPG_STATUS_HISTORY_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('ppg_status_history');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'ppg_history_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'p_id', $val['plt_particigstshstry_name']);
                // $this->addXMLElement($xmlWriter, 'ppg_status', $val['ppg_status']);
				$this->addXMLElement($xmlWriter, 'ppg_status', str_replace("_", "-", $val['ppg_status']));
                // $this->addXMLElement($xmlWriter, 'ppg_status_date', $val['ppg_status_date']);
				$stat_date = preg_split('/[ ]/', $val['ppg_status_date']);
				$this->addXMLElement($xmlWriter, 'ppg_status_date', $stat_date[0]);
                // $this->addXMLElement($xmlWriter, 'ppg_info_source', $val['ppg_info_source']);
				$this->addXMLElement($xmlWriter, 'ppg_info_source', str_replace("_", "-", $val['ppg_info_source']));
                $this->addXMLElement($xmlWriter, 'ppg_info_source_oth', $val['ppg_info_source_oth']);
                // $this->addXMLElement($xmlWriter, 'ppg_info_mode', $val['ppg_info_mode']);
				$this->addXMLElement($xmlWriter, 'ppg_info_mode', str_replace("_", "-", $val['ppg_info_mode']));
                $this->addXMLElement($xmlWriter, 'ppg_info_mode_oth', $val['ppg_info_mode_oth']);
                $this->addXMLElement($xmlWriter, 'ppg_comment', $val['ppg_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseProvider(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, PROVIDER_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('provider');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'provider_id', $val['name']);
                // $this->addXMLElement($xmlWriter, 'provider_type', $val['provider_type']);
					$this->addXMLElement($xmlWriter, 'provider_type', str_replace("_", "-", $val['provider_type']));
                $this->addXMLElement($xmlWriter, 'provider_type_oth', $val['provider_type_oth']);
                // $this->addXMLElement($xmlWriter, 'practice_info', $val['practice_info']);
				$this->addXMLElement($xmlWriter, 'practice_info', str_replace("_", "-", $val['practice_info']));
                // $this->addXMLElement($xmlWriter, 'practice_patient_load', $val['practice_patient_load']);
				$this->addXMLElement($xmlWriter, 'practice_patient_load', str_replace("_", "-", $val['practice_patient_load']));
                // $this->addXMLElement($xmlWriter, 'practice_size', $val['practice_size']);
				$this->addXMLElement($xmlWriter, 'practice_size', str_replace("_", "-", $val['practice_size']));
                // $this->addXMLElement($xmlWriter, 'public_practice', $val['public_practice']);
				$this->addXMLElement($xmlWriter, 'public_practice', str_replace("_", "-", $val['public_practice']));
                $this->addXMLElement($xmlWriter, 'provider_info_source', $val['provider_info_source']);
                $this->addXMLElement($xmlWriter, 'provider_info_source_oth', $val['provider_info_source_oth']);
                // $this->addXMLElement($xmlWriter, 'provider_info_date', $val['provider_info_date']);
				$info_date = preg_split('/[ ]/', $val['provider_info_date']);
				$this->addXMLElement($xmlWriter, 'provider_info_date', $info_date[0]);
                // $this->addXMLElement($xmlWriter, 'provider_info_update', $val['provider_info_update']);
				$info_date = preg_split('/[ ]/', $val['provider_info_update']);
				$this->addXMLElement($xmlWriter, 'provider_info_update', $info_date[0]);
                $this->addXMLElement($xmlWriter, 'provider_comment', $val['provider_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
	// *************** 2.0 MODULE INSERTED ******************
	function parseProviderRole(&$xmlWriter, &$chunk)
    {
            $db = DBManagerFactory::getInstance();
        $results = export($db, PROVIDER_ROLE_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('provider_role');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'provider_role_id', $val['name']);
                // $this->addXMLElement($xmlWriter, 'provider_id', $val['olt_msprovr_provider_name']);
				$this->addXMLElement($xmlWriter, 'provider_id', $val['olt_providesprovrole_name']);
                // $this->addXMLElement($xmlWriter, 'provider_ncs_role', $val['provider_ncs_role']);
				$this->addXMLElement($xmlWriter, 'provider_ncs_role', str_replace("^","",str_replace("_", "-", $val['provider_ncs_role'])));
                $this->addXMLElement($xmlWriter, 'provider_ncs_role_oth', $val['provider_ncs_role_oth']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	// ******************************************************
	
    
    function parseLinkPersonProvider(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, LINK_PERSON_PROVIDER_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('link_person_provider');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'person_provider_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'provider_id', $val['olt_prsnprv_provider_name']);
                //$this->addXMLElement($xmlWriter, 'person_id', $record['olt_prsnprvlt_person_name']);
                $this->addXMLElement($xmlWriter, 'person_id', getModuleNameByID(PERSON_TABLE, $val[LINKPERSONPROVIDER_PERSON_RHS]));
                //$this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(LINK_PERSON_PROVIDER_SUGAR_MODULE, $val['id'], 'olt_prsnprvlnk_plt_person', 'name'));
                // $this->addXMLElement($xmlWriter, 'is_active', $val['is_active']);
				$this->addXMLElement($xmlWriter, 'is_active', str_replace("_", "-", $val['is_active']));
                // $this->addXMLElement($xmlWriter, 'prov_intro_outcome', $val['prov_intro_outcome']);
				$this->addXMLElement($xmlWriter, 'prov_intro_outcome', str_replace("_", "-", $val['prov_intro_outcome']));
                $this->addXMLElement($xmlWriter, 'prov_intro_outcome_oth', $val['prov_intro_outcome_oth']);
              	$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseInstitution(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, INSTITUTION_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('institution');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'institute_id', $val['name']);
                // $this->addXMLElement($xmlWriter, 'institute_type', $val['institute_type']);
				$this->addXMLElement($xmlWriter, 'institute_type', str_replace("_", "-", $val['institute_type']));
                $this->addXMLElement($xmlWriter, 'institute_name', $val['institute_name']);
                $this->addXMLElement($xmlWriter, 'institute_type_oth', $val['institute_type_oth']);
                // $this->addXMLElement($xmlWriter, 'institute_relation', $val['institute_relation']);
				$this->addXMLElement($xmlWriter, 'institute_relation', str_replace("_", "-", $val['institute_relation']));
                $this->addXMLElement($xmlWriter, 'institute_relation_oth', $val['institute_relation_oth']);
                // $this->addXMLElement($xmlWriter, 'institute_owner', $val['institute_owner']);
				$this->addXMLElement($xmlWriter, 'institute_owner', str_replace("_", "-", $val['institute_owner']));
                $this->addXMLElement($xmlWriter, 'institute_owner_oth', $val['institute_owner_oth']);
                $this->addXMLElement($xmlWriter, 'institute_size', $val['institute_size']);
                // $this->addXMLElement($xmlWriter, 'institute_unit', $val['institute_unit']);
				$this->addXMLElement($xmlWriter, 'institute_unit', str_replace("_", "-", $val['institute_unit']));
                $this->addXMLElement($xmlWriter, 'institute_unit_oth', $val['institute_unit_oth']);
                $this->addXMLElement($xmlWriter, 'institute_info_source', $val['institute_info_source']);
                $this->addXMLElement($xmlWriter, 'institute_info_source_oth', $val['institute_info_source_oth']);
                // $this->addXMLElement($xmlWriter, 'institute_info_date', $val['institute_info_date']);
				$info_date = preg_split('/[ ]/', $val['institute_info_date']);
				$this->addXMLElement($xmlWriter, 'institute_info_date', $info_date[0]);
                // $this->addXMLElement($xmlWriter, 'institute_info_update', $val['institute_info_update']);
				$info_date = preg_split('/[ ]/', $val['institute_info_update']);
				$this->addXMLElement($xmlWriter, 'institute_info_update', $info_date[0]);
                $this->addXMLElement($xmlWriter, 'institute_comment', $val['institute_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseLinkPersonInstitute(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, LINK_PERSON_INSTITUTE_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('link_person_institute');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'person_institute_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'institute_id', $val['olt_prsninsstitution_name']);
                //$this->addXMLElement($xmlWriter, 'person_id', $record['olt_prsninslt_person_name']);
                $this->addXMLElement($xmlWriter, 'person_id', getModuleNameByID(PERSON_TABLE, $val[LINKPERSONINSTITUTE_PERSON_RHS]));
                //$this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(LINK_PERSON_INSTITUTE_SUGAR_MODULE, $val['id'], 'olt_prsninslnk_plt_person', 'name'));
                // $this->addXMLElement($xmlWriter, 'is_active', $val['is_active']);
				$this->addXMLElement($xmlWriter, 'is_active', str_replace("_", "-", $val['is_active']));
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseAddress(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, ADDRESS_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            //$GLOBALS['log']->error(ADDRESS_SUGAR_MODULE . ' --- after fetch by assoc: ' . memory_get_usage());
            $xmlWriter->startElement('address');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'address_id', $val['name']);
                //$this->addXMLElement($xmlWriter, 'person_id', $val['plt_person_t_address_name']);
                $this->addXMLElement($xmlWriter, 'person_id', getModuleNameByID(PERSON_TABLE, $val[ADDRESS_PERSON_RHS]));
                // The following call seems to have a major impact on memory usage. Needs to be investigated.
                // Can we try and roll this into the original export query builder? Just one more field! Name as well as Id.
                //$this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(ADDRESS_SUGAR_MODULE, $val['id'], 'plt_person_ltt_address', 'name'));
                $this->addXMLElement($xmlWriter, 'institute_id', $val['olt_institut_address_name']);
                $this->addXMLElement($xmlWriter, 'provider_id', $val['olt_providet_address_name']);
                $this->addXMLElement($xmlWriter, 'du_id', $val['gt_dwellingt_address_name']);
                // $this->addXMLElement($xmlWriter, 'address_rank', $val['address_rank']);
				$this->addXMLElement($xmlWriter, 'address_rank', str_replace("_", "-", $val['address_rank']));
                $this->addXMLElement($xmlWriter, 'address_rank_oth', $val['address_rank_oth']);
                // $this->addXMLElement($xmlWriter, 'address_info_source', $val['address_info_source']);
				$this->addXMLElement($xmlWriter, 'address_info_source', str_replace("_", "-", $val['address_info_source']));
                $this->addXMLElement($xmlWriter, 'address_info_source_oth', $val['address_info_source_oth']);
                // $this->addXMLElement($xmlWriter, 'address_info_mode', $val['address_info_mode']);
				$this->addXMLElement($xmlWriter, 'address_info_mode', str_replace("_", "-", $val['address_info_mode']));
                $this->addXMLElement($xmlWriter, 'address_info_mode_oth', $val['address_info_mode_oth']);
                // $this->addXMLElement($xmlWriter, 'address_info_date', $val['address_info_date']);
				$address_info_date = preg_split('/[ ]/', $val['address_info_date']);
				$this->addXMLElement($xmlWriter, 'address_info_date', $address_info_date[0]);
                $this->addXMLElement($xmlWriter, 'address_info_update', $val['address_info_update']);
                $this->addXMLElement($xmlWriter, 'address_start_date', $val['address_start_date']);
                $this->addXMLElement($xmlWriter, 'address_end_date', $val['address_end_date']);
                // $this->addXMLElement($xmlWriter, 'address_type', $val['address_type']);
				$this->addXMLElement($xmlWriter, 'address_type', str_replace("_", "-", $val['address_type']));
                $this->addXMLElement($xmlWriter, 'address_type_oth', $val['address_type_oth']);
                // $this->addXMLElement($xmlWriter, 'address_description', $val['address_description']);
				$this->addXMLElement($xmlWriter, 'address_description', str_replace("_", "-", $val['address_description']));
                $this->addXMLElement($xmlWriter, 'address_description_oth', $val['address_description_oth']);
                $this->addXMLElement($xmlWriter, 'address_1', $val['address_1']);
                $this->addXMLElement($xmlWriter, 'address_2', $val['address_2']);
                $this->addXMLElement($xmlWriter, 'unit', $val['unit']);
                $this->addXMLElement($xmlWriter, 'city', $val['city']);
                // $this->addXMLElement($xmlWriter, 'state', $val['state']);
				$this->addXMLElement($xmlWriter, 'state', str_replace("_", "-", $val['state']));
                $this->addXMLElement($xmlWriter, 'zip', $val['zip']);
                $this->addXMLElement($xmlWriter, 'zip4', $val['zip4']);
                $this->addXMLElement($xmlWriter, 'address_comment', $val['address_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
            $val = null;
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseTelephone(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, TELEPHONE_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('telephone');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'phone_id', $val['name']);
                //$this->addXMLElement($xmlWriter, 'person_id', $record['plt_person_telephone_name']);
                $this->addXMLElement($xmlWriter, 'person_id', getModuleNameByID(PERSON_TABLE, $val[TELEPHONE_PERSON_RHS]));
                //$this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(TELEPHONE_SUGAR_MODULE, $val['id'], 'plt_person_ltt_telephone', 'name'));
                $this->addXMLElement($xmlWriter, 'institute_id', $val['olt_institutelephone_name']);
                $this->addXMLElement($xmlWriter, 'provider_id', $val['olt_providetelephone_name']);
                // $this->addXMLElement($xmlWriter, 'phone_info_source', $val['phone_info_source']);
				$this->addXMLElement($xmlWriter, 'phone_info_source', str_replace("_", "-", $val['phone_info_source']));
                $this->addXMLElement($xmlWriter, 'phone_info_source_oth', $val['phone_info_source_oth']);
                $this->addXMLElement($xmlWriter, 'phone_info_date', $val['phone_info_date']);
                $this->addXMLElement($xmlWriter, 'phone_info_update', $val['phone_info_update']);
                $this->addXMLElement($xmlWriter, 'phone_nbr', $val['phone_nbr']);
                $this->addXMLElement($xmlWriter, 'phone_ext', $val['phone_ext']);
                // $this->addXMLElement($xmlWriter, 'phone_type', $val['phone_type']);
				$this->addXMLElement($xmlWriter, 'phone_type', str_replace("_", "-", $val['phone_type']));
                $this->addXMLElement($xmlWriter, 'phone_type_oth', $val['phone_type_oth']);
                // $this->addXMLElement($xmlWriter, 'phone_rank', $val['phone_rank']);
				$this->addXMLElement($xmlWriter, 'phone_rank', str_replace("_", "-", $val['phone_rank']));
                $this->addXMLElement($xmlWriter, 'phone_rank_oth', $val['phone_rank_oth']);
                // $this->addXMLElement($xmlWriter, 'phone_landline', $val['phone_landline']);
				$this->addXMLElement($xmlWriter, 'phone_landline', str_replace("_", "-", $val['phone_landline']));
                // $this->addXMLElement($xmlWriter, 'phone_share', $val['phone_share']);
				$this->addXMLElement($xmlWriter, 'phone_share', str_replace("_", "-", $val['phone_share']));
                // $this->addXMLElement($xmlWriter, 'cell_permission', $val['cell_permission']);
				$this->addXMLElement($xmlWriter, 'cell_permission', str_replace("_", "-", $val['cell_permission']));
                // $this->addXMLElement($xmlWriter, 'text_permission', $val['text_permission']);
				$this->addXMLElement($xmlWriter, 'text_permission', str_replace("_", "-", $val['text_permission']));
                $this->addXMLElement($xmlWriter, 'phone_comment', $val['phone_comment']);
                // $this->addXMLElement($xmlWriter, 'phone_start_date', $val['phone_start_date']);
				$phone_start_date = preg_split('/[ ]/', $val['phone_start_date']);
				$this->addXMLElement($xmlWriter, 'phone_start_date', $phone_start_date[0]);
                $this->addXMLElement($xmlWriter, 'phone_end_date', $val['phone_end_date']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseEmail(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, EMAIL_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('email');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'email_id', $val['name']);
                //$this->addXMLElement($xmlWriter, 'person_id', $record['plt_person_ltt_email_name']);
                $this->addXMLElement($xmlWriter, 'person_id', getModuleNameByID(PERSON_TABLE, $val[EMAIL_PERSON_RHS]));
                //$this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(EMAIL_SUGAR_MODULE, $val['id'], 'plt_person_ltt_email', 'name'));
                $this->addXMLElement($xmlWriter, 'institute_id', $val['olt_institultt_email_name']);
                $this->addXMLElement($xmlWriter, 'provider_id', $val['olt_provideltt_email_name']);
                $this->addXMLElement($xmlWriter, 'email', $val['email']);
                // $this->addXMLElement($xmlWriter, 'email_rank', $val['email_rank']);
				$this->addXMLElement($xmlWriter, 'email_rank', str_replace("_", "-", $val['email_rank']));
                $this->addXMLElement($xmlWriter, 'email_rank_oth', $val['email_rank_oth']);
                // $this->addXMLElement($xmlWriter, 'email_info_source', $val['email_info_source']);
				$this->addXMLElement($xmlWriter, 'email_info_source', str_replace("_", "-", $val['email_info_source']));
                $this->addXMLElement($xmlWriter, 'email_info_source_oth', $val['email_info_source_oth']);
                // $this->addXMLElement($xmlWriter, 'email_info_date', $val['email_info_date']);
				$email_info_date = preg_split('/[ ]/', $val['email_info_date']);
				$this->addXMLElement($xmlWriter, 'email_info_date', $email_info_date[0]);
                // $this->addXMLElement($xmlWriter, 'email_info_update', $val['email_info_update']);
				$email_info_update = preg_split('/[ ]/', $val['email_info_update']);
				$this->addXMLElement($xmlWriter, 'email_info_update', $email_info_update[0]);
                // $this->addXMLElement($xmlWriter, 'email_type', $val['email_type']);
				$this->addXMLElement($xmlWriter, 'email_type', str_replace("_", "-", $val['email_type']));
                $this->addXMLElement($xmlWriter, 'email_type_oth', $val['email_type_oth']);
                // $this->addXMLElement($xmlWriter, 'email_share', $val['email_share']);
				$this->addXMLElement($xmlWriter, 'email_share', str_replace("_", "-", $val['email_share']));
                // $this->addXMLElement($xmlWriter, 'email_active', $val['email_active']);
				$this->addXMLElement($xmlWriter, 'email_active', str_replace("_", "-", $val['email_active']));
                $this->addXMLElement($xmlWriter, 'email_comment', $val['email_comment']);
                // $this->addXMLElement($xmlWriter, 'email_start_date', $val['email_start_date']);
				$email_start_date = preg_split('/[ ]/', $val['email_start_date']);
				$this->addXMLElement($xmlWriter, 'email_start_date', $email_start_date[0]);
                $this->addXMLElement($xmlWriter, 'email_end_date', $val['email_end_date']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseEvent(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, EVENT_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('event');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'event_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'participant_id', $val['ncsdc_eventrticipant_name']);
                $this->addXMLElement($xmlWriter, 'event_type', str_replace("_", "-", $val['event_type']));
                $this->addXMLElement($xmlWriter, 'event_type_oth', $val['event_type_oth']);
                $this->addXMLElement($xmlWriter, 'event_repeat_key', $val['event_repeat_key']);
                $this->addXMLElement($xmlWriter, 'event_disp', $val['event_disp']);
                // $this->addXMLElement($xmlWriter, 'event_disp_cat', $val['event_disp_cat']);
				$this->addXMLElement($xmlWriter, 'event_disp_cat', str_replace("_", "-", $val['event_disp_cat']));
                $this->addXMLElement($xmlWriter, 'event_start_date', $val['event_start_date']);	
				$start_date = preg_split('/[ ]/', $val['event_start_date_time']);
                $this->addXMLElement($xmlWriter, 'event_start_date', $start_date[0]);
                $start_time = preg_split('/[ ]/', $val['event_start_date_time']);
                $this->addXMLElement($xmlWriter, 'event_start_time', $start_time[1]);
				$end_date = preg_split('/[ ]/', $val['event_end_date_time']);
                $this->addXMLElement($xmlWriter, 'event_end_date', $end_date[0]);
                $end_time = preg_split('/[ ]/', $val['event_end_date_time']);
                $this->addXMLElement($xmlWriter, 'event_end_time', $end_time[1]);
                // $this->addXMLElement($xmlWriter, 'event_breakoff', $val['event_breakoff']);
				$this->addXMLElement($xmlWriter, 'event_breakoff', str_replace("_", "-", $val['event_breakoff']));
                // $this->addXMLElement($xmlWriter, 'event_incentive_type', $val['event_incentive_type']);
				$this->addXMLElement($xmlWriter, 'event_incentive_type', str_replace("_", "-", $val['event_incentive_type']));
                $this->addXMLElement($xmlWriter, 'event_incent_cash', $val['event_incent_cash']);
                $this->addXMLElement($xmlWriter, 'event_incent_noncash', $val['event_incent_noncash']);
                $this->addXMLElement($xmlWriter, 'event_comment', $val['event_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
	//***************************** 
        function parseInstrument(&$xmlWriter, &$chunk)
	{
            $db = DBManagerFactory::getInstance();
            $results = export($db, INSTRUMENT_SUGAR_MODULE, $chunk);
		while($val = $db->fetchByAssoc($results, -1, false)) {
			$xmlWriter->startElement('instrument');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
				$this->addXMLElement($xmlWriter, 'instrument_id', $val['name']);
				$this->addXMLElement($xmlWriter, 'event_id', $val['ncsdc_eventnstrument_name']);
				// $this->addXMLElement($xmlWriter, 'instrument_type', $val['instrument_type']);
				$this->addXMLElement($xmlWriter, 'instrument_type', str_replace("_", "-", $val['instrument_type']));
				$this->addXMLElement($xmlWriter, 'instrument_type_oth', $val['instrument_type_oth']);
				$this->addXMLElement($xmlWriter, 'instrument_version', $val['instrument_version']);
				$this->addXMLElement($xmlWriter, 'instrument_repeat_key', $val['instrument_repeat_key']);
				$ins_start_date_time = preg_split('/[ ]/', $val['instrument_start_date_time_date']);
                $this->addXMLElement($xmlWriter, 'instrument_start_date_time_date', $ins_start_date_time[1]);
				$ins_end_date_time = preg_split('/[ ]/', $val['instrument_end_date_time_date']);
                $this->addXMLElement($xmlWriter, 'instrument_end_date_time_date', $ins_end_date_time[1]);
                // $this->addXMLElement($xmlWriter, 'ins_date_start', $val['ins_date_start']);
				$this->addXMLElement($xmlWriter, 'ins_date_start', $ins_end_date_time[0]);
				// $this->addXMLElement($xmlWriter, 'ins_date_end', $val['ins_date_end']);
				$this->addXMLElement($xmlWriter, 'ins_date_end', $ins_end_date_time[0]);
				// $this->addXMLElement($xmlWriter, 'ins_breakoff', $val['ins_breakoff']);
				$this->addXMLElement($xmlWriter, 'ins_breakoff', str_replace("_", "-", $val['ins_breakoff']));
				// $this->addXMLElement($xmlWriter, 'ins_status', $val['ins_status']);
				$this->addXMLElement($xmlWriter, 'ins_status', str_replace("_", "-", $val['ins_status']));
				// $this->addXMLElement($xmlWriter, 'ins_mode', $val['ins_mode']);
				$this->addXMLElement($xmlWriter, 'ins_mode', str_replace("_", "-", $val['ins_mode']));
				$this->addXMLElement($xmlWriter, 'ins_mode_oth', $val['ins_mode_oth']);
				// $this->addXMLElement($xmlWriter, 'ins_method', $val['ins_method']);
				$this->addXMLElement($xmlWriter, 'ins_method', str_replace("_", "-", $val['ins_method']));
				// $this->addXMLElement($xmlWriter, 'sup_review', $val['sup_review']);
				$this->addXMLElement($xmlWriter, 'sup_review', str_replace("_", "-", $val['sup_review']));
				// $this->addXMLElement($xmlWriter, 'data_problem', $val['data_problem']);
				$this->addXMLElement($xmlWriter, 'data_problem', str_replace("_", "-", $val['data_problem']));
				$this->addXMLElement($xmlWriter, 'instru_comment', $val['instru_comment']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseContact(&$xmlWriter, &$chunk)
	{
            $db = DBManagerFactory::getInstance();
            $results = export($db, CONTACT_SUGAR_MODULE, $chunk);
		while($val = $db->fetchByAssoc($results, -1, false)) {
			$xmlWriter->startElement('contact');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
				$this->addXMLElement($xmlWriter, 'contact_id', $val['name']);
				$this->addXMLElement($xmlWriter, 'contact_disp', $val['contact_disp']);
				// $this->addXMLElement($xmlWriter, 'contact_type', $val['contact_type']);
				$this->addXMLElement($xmlWriter, 'contact_type', str_replace("_", "-", $val['contact_type']));
				$this->addXMLElement($xmlWriter, 'contact_type_oth', $val['contact_type_oth']);
				$contact_date = preg_split('/[ ]/', $val['contact_start_date_time']);
				$this->addXMLElement($xmlWriter, 'contact_date', $contact_date[0]);
				$contact_start_time = preg_split('/[ ]/', $val['contact_start_date_time']);
                $this->addXMLElement($xmlWriter, 'contact_start_time', $contact_start_time[1]);
				$contact_end_time = preg_split('/[ ]/', $val['contact_end_date_time']);
                $this->addXMLElement($xmlWriter, 'contact_end_time', $contact_end_time[1]);
                // $this->addXMLElement($xmlWriter, 'contact_lang', $val['contact_lang']);
				$this->addXMLElement($xmlWriter, 'contact_lang', str_replace("_", "-", $val['contact_lang']));
				$this->addXMLElement($xmlWriter, 'contact_lang_oth', $val['contact_lang_oth']);
				// $this->addXMLElement($xmlWriter, 'contact_interpret', $val['contact_interpret']);
				$this->addXMLElement($xmlWriter, 'contact_interpret', str_replace("_", "-", $val['contact_interpret']));
				$this->addXMLElement($xmlWriter, 'contact_interpret_oth', $val['contact_interpret_oth']);
				// $this->addXMLElement($xmlWriter, 'contact_location', $val['contact_location']);
				$this->addXMLElement($xmlWriter, 'contact_location', str_replace("_", "-", $val['contact_location']));
				$this->addXMLElement($xmlWriter, 'contact_location_oth', $val['contact_location_oth']);
				// $this->addXMLElement($xmlWriter, 'contact_private', $val['contact_private']);
				$this->addXMLElement($xmlWriter, 'contact_private', str_replace("_", "-", $val['contact_private']));
				$this->addXMLElement($xmlWriter, 'contact_private_detail', $val['contact_private_detail']);
				$this->addXMLElement($xmlWriter, 'contact_distance', $val['contact_distance']);
				// $this->addXMLElement($xmlWriter, 'who_contacted', $val['who_contacted']);
				$this->addXMLElement($xmlWriter, 'who_contacted', str_replace("_", "-", $val['who_contacted']));
				$this->addXMLElement($xmlWriter, 'who_contact_oth', $val['who_contact_oth']);
				$this->addXMLElement($xmlWriter, 'contact_comment', $val['contact_comment']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseContactLinking(&$xmlWriter, &$chunk)
	{
            $db = DBManagerFactory::getInstance();
            $results = export($db, LINK_CONTACT_SUGAR_MODULE, $chunk);
		while($val = $db->fetchByAssoc($results, -1, false)) {
			$xmlWriter->startElement('link_contact');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
				$this->addXMLElement($xmlWriter, 'contact_link_id', $val['name']);
				$this->addXMLElement($xmlWriter, 'contact_id', $val['ncsdc_cntlncntctinfo_name']);
				$this->addXMLElement($xmlWriter, 'event_id', $val['ncsdc_cntlneventinfo_name']);
				$this->addXMLElement($xmlWriter, 'instrument_id', $val['ncsdc_cntlnnstrument_name']);
				$this->addXMLElement($xmlWriter, 'staff_id', $val['ncsdc_cntlnstaffrstr_name']);
				//$this->addXMLElement($xmlWriter, 'person_id', $record['ncsdc_cntlnlt_person_name']);
                $this->addXMLElement($xmlWriter, 'person_id', getModuleNameByID(PERSON_TABLE, $val[CONTACTLINKING_PERSON_RHS]));
                //$this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(LINK_CONTACT_SUGAR_MODULE, $val['id'], 'ncsdc_cntlnk_plt_person', 'name'));
				$this->addXMLElement($xmlWriter, 'provider_id', $val['ncsdc_cntln_provider_name']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseNonInterviewReprt(&$xmlWriter, &$chunk)
	{
            $db = DBManagerFactory::getInstance();
            $results = export($db, NON_INTERVIEW_RPT_SUGAR_MODULE, $chunk);
		while($val = $db->fetchByAssoc($results, -1, false)) {
			$xmlWriter->startElement('non_interview_rpt');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
				$this->addXMLElement($xmlWriter, 'nir_id', $val['name']);
				$this->addXMLElement($xmlWriter, 'contact_id', $val['ncsdc_cntctninterrpt_name']);
				$this->addXMLElement($xmlWriter, 'nir', $val['nir']);
				$this->addXMLElement($xmlWriter, 'du_id', $val['ncsdc_noninellingunt_name']);
				//$this->addXMLElement($xmlWriter, 'person_id', $record['ncsdc_noninlt_person_name']);
                $this->addXMLElement($xmlWriter, 'person_id', getModuleNameByID(PERSON_TABLE, $val[NONINTERVIEWREPORT_PERSON_RHS]));
                //$this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(NON_INTERVIEW_RPT_SUGAR_MODULE, $val['id'], 'ncsdc_noninterrpt_plt_person', 'name'));
				// $this->addXMLElement($xmlWriter, 'nir_vac_info', $val['nir_vac_info']);
				$this->addXMLElement($xmlWriter, 'nir_vac_info', str_replace("_", "-", $val['nir_vac_info']));
				$this->addXMLElement($xmlWriter, 'nir_vac_info_oth', $val['nir_vac_info_oth']);
				$this->addXMLElement($xmlWriter, 'nir_noaccess', $val['nir_noaccess']);
				$this->addXMLElement($xmlWriter, 'nir_noaccess_oth', $val['nir_noaccess_oth']);
				// $this->addXMLElement($xmlWriter, 'nir_access_attempt', $val['nir_access_attempt']);
				$this->addXMLElement($xmlWriter, 'nir_access_attempt', str_replace("_", "-", $val['nir_access_attempt']));
				$this->addXMLElement($xmlWriter, 'nir_access_attempt_oth', $val['nir_access_attempt_oth']);
				// $this->addXMLElement($xmlWriter, 'nir_type_person', $val['nir_type_person']);
				$this->addXMLElement($xmlWriter, 'nir_type_person', str_replace("_", "-", $val['nir_type_person']));
				$this->addXMLElement($xmlWriter, 'nir_type_person_oth', $val['nir_type_person_oth']);
				// $this->addXMLElement($xmlWriter, 'cog_inform_relation', $val['cog_inform_relation']);
				$this->addXMLElement($xmlWriter, 'cog_inform_relation', str_replace("_", "-", $val['cog_inform_relation']));
				$this->addXMLElement($xmlWriter, 'cog_inform_relation_oth', $val['cog_inform_relation_oth']);
				$this->addXMLElement($xmlWriter, 'cog_dis_desc', $val['cog_dis_desc']);
				// $this->addXMLElement($xmlWriter, 'perm_disability', $val['perm_disability']);
				$this->addXMLElement($xmlWriter, 'perm_disability', str_replace("_", "-", $val['perm_disability']));
				// $this->addXMLElement($xmlWriter, 'deceased_inform_relation', $val['deceased_inform_relation']);
				$this->addXMLElement($xmlWriter, 'deceased_inform_relation', str_replace("_", "-", $val['deceased_inform_relation']));
				$this->addXMLElement($xmlWriter, 'deceased_inform_oth', $val['deceased_inform_oth']);
				$this->addXMLElement($xmlWriter, 'yod', $val['yod']);
				// $this->addXMLElement($xmlWriter, 'state_death', $val['state_death']);
				$this->addXMLElement($xmlWriter, 'state_death', str_replace("_", "-", $val['state_death']));
				// $this->addXMLElement($xmlWriter, 'who_refused', $val['who_refused']);
				$this->addXMLElement($xmlWriter, 'who_refused', str_replace("_", "-", $val['who_refused']));
				$this->addXMLElement($xmlWriter, 'who_refused_oth', $val['who_refused_oth']);
				// $this->addXMLElement($xmlWriter, 'refuser_strength', $val['refuser_strength']);
				$this->addXMLElement($xmlWriter, 'refuser_strength', str_replace("_", "-", $val['refuser_strength']));
				// $this->addXMLElement($xmlWriter, 'ref_action', $val['ref_action']);
				$this->addXMLElement($xmlWriter, 'ref_action', str_replace("_", "-", $val['ref_action']));
				$this->addXMLElement($xmlWriter, 'lt_illness_desc', $val['lt_illness_desc']);
				// $this->addXMLElement($xmlWriter, 'perm_ltr', $val['perm_ltr']);
				$this->addXMLElement($xmlWriter, 'perm_ltr', str_replace("_", "-", $val['perm_ltr']));
				// $this->addXMLElement($xmlWriter, 'reason_unavail', $val['reason_unavail']);
				$this->addXMLElement($xmlWriter, 'reason_unavail', str_replace("_", "-", $val['reason_unavail']));
				$this->addXMLElement($xmlWriter, 'reason_unavail_oth', $val['reason_unavail_oth']);
				// $this->addXMLElement($xmlWriter, 'date_available', $val['date_available']);
				$start_date = preg_split('/[ ]/', $val['date_available']);
				$this->addXMLElement($xmlWriter, 'date_available', $start_date[0]);
				$this->addXMLElement($xmlWriter, 'date_moved', $val['date_moved']);
				$this->addXMLElement($xmlWriter, 'moved_length_time', $val['moved_length_time']);
				// $this->addXMLElement($xmlWriter, 'moved_unit', $val['moved_unit']);
				$this->addXMLElement($xmlWriter, 'moved_unit', str_replace("_", "-", $val['moved_unit']));
				// $this->addXMLElement($xmlWriter, 'moved_inform_relation', $val['moved_inform_relation']);
				$this->addXMLElement($xmlWriter, 'moved_inform_relation', str_replace("_", "-", $val['moved_inform_relation']));
				$this->addXMLElement($xmlWriter, 'moved_relation_oth', $val['moved_relation_oth']);
				$this->addXMLElement($xmlWriter, 'nir_other', $val['nir_other']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseNIRVacant(&$xmlWriter, &$chunk)
	{
            $db = DBManagerFactory::getInstance();
            $results = export($db, NON_INTERVIEW_RPT_VACANT_SUGAR_MODULE, $chunk);
		while($val = $db->fetchByAssoc($results, -1, false)) {
			$xmlWriter->startElement('non_interview_rpt_vacant');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
				$this->addXMLElement($xmlWriter, 'nir_vacant_id', $val['name']);
				$this->addXMLElement($xmlWriter, 'nir_id', $val['ncsdc_noninntrptvcnt_name']);
				// $this->addXMLElement($xmlWriter, 'nir_vacant', $val['nir_vacant']);
				$this->addXMLElement($xmlWriter, 'nir_vacant', str_replace("^","",str_replace("_", "-", $val['nir_vacant'])));
				$this->addXMLElement($xmlWriter, 'nir_vacant_oth', $val['nir_vacant_oth']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseNIRNoAccess(&$xmlWriter, &$chunk)
	{
            $db = DBManagerFactory::getInstance();
            $results = export($db, NON_INTERVIEW_RPT_NOACCESS_SUGAR_MODULE, $chunk);
		while($val = $db->fetchByAssoc($results, -1, false)) {
			$xmlWriter->startElement('non_interview_rpt_noaccess');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
				$this->addXMLElement($xmlWriter, 'nir_noaccess_id', $val['name']);
				$this->addXMLElement($xmlWriter, 'nir_id', $val['ncsdc_noninrnaccmlts_name']);
				$this->addXMLElement($xmlWriter, 'nir_noaccess', str_replace("^","",str_replace("_", "-", $val['nir_noaccess'])));
				$this->addXMLElement($xmlWriter, 'nir_noaccess_oth', $val['nir_noaccess_oth']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseNIRRefusal(&$xmlWriter, &$chunk)
	{
            $db = DBManagerFactory::getInstance();
            $results = export($db, NON_INTERVIEW_RPT_REFUSAL_SUGAR_MODULE, $chunk);
		while($val = $db->fetchByAssoc($results, -1, false)) {
			$xmlWriter->startElement('non_interview_rpt_refusal');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
				$this->addXMLElement($xmlWriter, 'nir_refusal_id', $val['name']);
				$this->addXMLElement($xmlWriter, 'nir_id', $report['ncsdc_noninirrfsmlts_name']);
				// $this->addXMLElement($xmlWriter, 'refusal_reason', $val['refusal_reason']);
				$this->addXMLElement($xmlWriter, 'refusal_reason', str_replace("^","",str_replace("_", "-", $val['refusal_reason'])));
				$this->addXMLElement($xmlWriter, 'refusal_reason_oth', $val['refusal_reason_oth']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseNIRDuType(&$xmlWriter, &$chunk)
	{
            $db = DBManagerFactory::getInstance();
            $results = export($db, NON_INTERVIEW_RPT_DUTYPE_SUGAR_MODULE, $chunk);
		while($val = $db->fetchByAssoc($results, -1, false)) {
			$xmlWriter->startElement('non_interview_rpt_dutype');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
				$this->addXMLElement($xmlWriter, 'nir_dutype_id', $val['name']);
				$this->addXMLElement($xmlWriter, 'nir_id', $report['ncsdc_noninrdutpmlts_name']);
				// $this->addXMLElement($xmlWriter, 'nir_type_du', $val['nir_type_du']);
				$this->addXMLElement($xmlWriter, 'nir_type_du', str_replace("^","",str_replace("_", "-", $val['nir_type_du'])));
				$this->addXMLElement($xmlWriter, 'nir_type_du_oth', $val['nir_type_du_oth']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseIncident(&$xmlWriter, &$chunk)
	{
            $db = DBManagerFactory::getInstance();
            $results = export($db, INCIDENT_SUGAR_MODULE, $chunk);
		while($val = $db->fetchByAssoc($results, -1, false)) {
			$xmlWriter->startElement('incident');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
				$this->addXMLElement($xmlWriter, 'incident_id', $val['name']);
				$incident_date = preg_split('/[ ]/', $val['incident_date_time']);
				$this->addXMLElement($xmlWriter, 'incident_date', $incident_date[0]);
				$incident_time = preg_split('/[ ]/', $val['incident_date_time']);
				$this->addXMLElement($xmlWriter, 'incident_time', $incident_time[1]);
				$inc_report_date = preg_split('/[ ]/', $val['incident_report_date_time']);
				$this->addXMLElement($xmlWriter, 'inc_report_date', $inc_report_date[0]);
				$inc_report_time = preg_split('/[ ]/', $val['incident_report_date_time']);
				$this->addXMLElement($xmlWriter, 'inc_report_time', $inc_report_time[1]);
				$this->addXMLElement($xmlWriter, 'inc_staff_reporter_id', $report['inc_staff_reporter_id']);
				$this->addXMLElement($xmlWriter, 'inc_staff_supervisor_id', $report['inc_staff_supervisor_id']);
				$this->addXMLElement($xmlWriter, 'inc_recip_is_participant', $report['inc_recip_is_participant']);
				$this->addXMLElement($xmlWriter, 'inc_recip_is_du', $report['inc_recip_is_du']);
				$this->addXMLElement($xmlWriter, 'inc_recip_is_staff', $report['inc_recip_is_staff']);
				$this->addXMLElement($xmlWriter, 'inc_recip_is_family', $report['inc_recip_is_family']);
				$this->addXMLElement($xmlWriter, 'inc_recip_is_acquaintance', $report['inc_recip_is_acquaintance']);
				$this->addXMLElement($xmlWriter, 'inc_recip_is_other', $val['inc_recip_is_other']);
				$this->addXMLElement($xmlWriter, 'inc_contact_person', $report['inc_contact_person']);
				// $this->addXMLElement($xmlWriter, 'inctype', $val['inctype']);
				$this->addXMLElement($xmlWriter, 'inctype', str_replace("_", "-", $val['inctype']));
				$this->addXMLElement($xmlWriter, 'inctype_oth', $val['inctype_oth']);
				$this->addXMLElement($xmlWriter, 'incloss_cmptr_model', $val['incloss_cmptr_model']);
				$this->addXMLElement($xmlWriter, 'incloss_cmptr_sn', $val['incloss_cmptr_sn']);
				$this->addXMLElement($xmlWriter, 'incloss_cmptr_decal', $val['incloss_cmptr_decal']);
				$this->addXMLElement($xmlWriter, 'incloss_rem_media', $val['incloss_rem_media']);
				$this->addXMLElement($xmlWriter, 'incloss_paper', $val['incloss_paper']);
				$this->addXMLElement($xmlWriter, 'incloss_oth', $val['incloss_oth']);
				$this->addXMLElement($xmlWriter, 'inc_description', $val['inc_description']);
				$this->addXMLElement($xmlWriter, 'inc_action', $val['inc_action']);
				// $this->addXMLElement($xmlWriter, 'inc_reported', $val['inc_reported']);
				$this->addXMLElement($xmlWriter, 'inc_reported', str_replace("_", "-", $val['inc_reported']));
				$this->addXMLElement($xmlWriter, 'contact_id', $report['ncsdc_cntct_incident_name']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseIncidentMedia(&$xmlWriter, &$chunk)
	{
            $db = DBManagerFactory::getInstance();
            $results = export($db, INCIDENT_MEDIA_SUGAR_MODULE, $chunk);
		while($val = $db->fetchByAssoc($results, -1, false)) {
			$xmlWriter->startElement('incident_media');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
				$this->addXMLElement($xmlWriter, 'incident_media_id', $val['name']);
				$this->addXMLElement($xmlWriter, 'incident_id', $val['ncsdc_incidcmedmults_name']);
				// $this->addXMLElement($xmlWriter, 'incloss_media', str_replace("^","",$val['incloss_media']));
				$this->addXMLElement($xmlWriter, 'incloss_media', str_replace("_", "-", $val['incloss_media']));
				$this->addXMLElement($xmlWriter, 'incloss_media_oth', $val['incloss_media_oth']);
				// $this->addXMLElement($xmlWriter, 'inssev', str_replace("^","",$val['inssev']));
				$this->addXMLElement($xmlWriter, 'inssev', str_replace("_", "-", $val['inssev']));
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseIncidentUnanticipated(&$xmlWriter, &$chunk)
	{
            $db = DBManagerFactory::getInstance();
            $results = export($db, INCIDENT_UNANTICIPATED_SUGAR_MODULE, $chunk);
		while($val = $db->fetchByAssoc($results, -1, false)) {
			$xmlWriter->startElement('incident_unanticipated');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
				$this->addXMLElement($xmlWriter, 'inc_unanticipated_id', $val['name']);
				$this->addXMLElement($xmlWriter, 'incident_id', $val['ncsdc_incidcunatmlts_name']);
				// $this->addXMLElement($xmlWriter, 'inc_unanticipated', str_replace("^","",$val['inc_unanticipated']));
				$this->addXMLElement($xmlWriter, 'inc_unanticipated', str_replace("_", "-", $val['inc_unanticipated']));
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
    //*****************************
    
    // *************** 2.0 MODULES INSERTED ******************
    function parseSPECEquipment(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
            $results = export($db, SPEC_EQUIPMENT_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('spec_equipment');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'spsc_id', $val['samp_speceq_spscinfo_name']);
				$this->addXMLElement($xmlWriter, 'equip_id', $val['name']);
                // $this->addXMLElement($xmlWriter, 'equipment_type', $val['equipment_type']);
				$this->addXMLElement($xmlWriter, 'equipment_type', str_replace("_", "-", $val['equipment_type']));
                $this->addXMLElement($xmlWriter, 'equipment_type_oth', $val['equipment_type_oth']);
                $this->addXMLElement($xmlWriter, 'serial_no', $val['serial_no']);
                $this->addXMLElement($xmlWriter, 'government_asset_tag_no', $val['government_asset_tag_no']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseSpecimenPickup(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, SPECIMEN_PICKUP_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('spec_pickup');
                $this->addXMLElement($xmlWriter, 'psu_id',  $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'spsc_id', $val['samp_specpi_spscinfo_name']);
				$this->addXMLElement($xmlWriter, 'specimen_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'event_id', $val['samp_specpieventinfo_name']);
                $this->addXMLElement($xmlWriter, 'instrument_id', $val['samp_specpinstrument_name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $val['samp_specpistaffrstr_name']);
				// $this->addXMLElement($xmlWriter, 'specimen_pickup_dt', $val['specimen_pickup_dt']);
				$pickup_date = preg_split('/[ ]/', $val['specimen_pickup_dt']);
				$this->addXMLElement($xmlWriter, 'specimen_pickup_dt', $pickup_date[0]);
                // $this->addXMLElement($xmlWriter, 'specimen_pickup_comment', $val['specimen_pickup_comment']);
				$this->addXMLElement($xmlWriter, 'specimen_pickup_comment', str_replace("_", "-", $val['specimen_pickup_comment']));
                $this->addXMLElement($xmlWriter, 'specimen_pickup_cmt_oth', $val['specimen_pickup_cmt_oth']);
                $this->addXMLElement($xmlWriter, 'specimen_trans_temp', $val['specimen_trans_temp']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseSpecimenReceipt(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, SPECIMEN_RECEIPT_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('spec_receipt');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'specimen_id', $val['name']);
				$this->addXMLElement($xmlWriter, 'spsc_id', $val['samp_specre_spscinfo_name']);
				$this->addXMLElement($xmlWriter, 'staff_id', $val['samp_specrestaffrstr_name']);
                // $this->addXMLElement($xmlWriter, 'receipt_comment', $val['receipt_comment']);
				$this->addXMLElement($xmlWriter, 'receipt_comment', str_replace("_", "-", $val['receipt_comment']));
                $this->addXMLElement($xmlWriter, 'receipt_comment_oth', $val['receipt_comment_oth']);
                $this->addXMLElement($xmlWriter, 'receipt_dt', $val['receipt_dt']);
                $this->addXMLElement($xmlWriter, 'cooler_temp', $val['cooler_temp']);
				// $this->addXMLElement($xmlWriter, 'monitor_status', $val['monitor_status']);
				$this->addXMLElement($xmlWriter, 'monitor_status', str_replace("_", "-", $val['monitor_status']));
                // $this->addXMLElement($xmlWriter, 'upper_trigger', $val['upper_trigger']);
				$this->addXMLElement($xmlWriter, 'upper_trigger', str_replace("_", "-", $val['upper_trigger']));
                // $this->addXMLElement($xmlWriter, 'upper_trigger_lvl', $val['upper_trigger_lvl']);
				$this->addXMLElement($xmlWriter, 'upper_trigger_lvl', str_replace("_", "-", $val['upper_trigger_lvl']));
                // $this->addXMLElement($xmlWriter, 'lower_trigger_cold', $val['lower_trigger_cold']);
				$this->addXMLElement($xmlWriter, 'lower_trigger_cold', str_replace("_", "-", $val['lower_trigger_cold']));
				// $this->addXMLElement($xmlWriter, 'lower_trigger_ambient', $val['lower_trigger_ambient']);
				$this->addXMLElement($xmlWriter, 'lower_trigger_ambient', str_replace("_", "-", $val['lower_trigger_ambient']));
                $this->addXMLElement($xmlWriter, 'storage_container_id', $val['samp_specreecstorage_name']);
				// $this->addXMLElement($xmlWriter, 'centrifuge_comment', $val['centrifuge_comment']);
				$this->addXMLElement($xmlWriter, 'centrifuge_comment', str_replace("_", "-", $val['centrifuge_comment']));
                $this->addXMLElement($xmlWriter, 'centrifuge_comment_oth', $val['centrifuge_comment_oth']);
				// $this->addXMLElement($xmlWriter, 'centrifuge_st', $val['centrifuge_st']);
				$st_date = preg_split('/[ ]/', $val['centrifuge_st']);
				$this->addXMLElement($xmlWriter, 'centrifuge_st', $st_date[0]);
                // $this->addXMLElement($xmlWriter, 'centrifuge_et', $val['centrifuge_et']);
				$et_date = preg_split('/[ ]/', $val['centrifuge_et']);
				$this->addXMLElement($xmlWriter, 'centrifuge_et', $et_date[0]);
				$this->addXMLElement($xmlWriter, 'centrifuge_staff_id', $val['centrifuge_staff_id']);
				$this->addXMLElement($xmlWriter, 'equip_id', $val['samp_specrespecequip_name']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseSpecimenShipping(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, SPECIMEN_SHIPPING_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('spec_shipping');
                $this->addXMLElement($xmlWriter, 'psu_id',  $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'storage_container_id', $val['name']);
				$this->addXMLElement($xmlWriter, 'spsc_id', $val['samp_sampsh_srscinfo_name']);
				$this->addXMLElement($xmlWriter, 'staff_id', $val['samp_specshstaffrstr_name']);
                $this->addXMLElement($xmlWriter, 'shipper_id', $val['samp_sampshstaffrstr_name']);
				$this->addXMLElement($xmlWriter, 'shipper_destination', $val['shipper_destination']);
                // $this->addXMLElement($xmlWriter, 'shipment_date', $val['shipment_date']);
				$shipment_date = preg_split('/[ ]/', $val['shipment_date']);
				$this->addXMLElement($xmlWriter, 'shipment_date', $shipment_date[0]);
                // $this->addXMLElement($xmlWriter, 'shipment_temperature', $val['shipment_temperature']);
				$this->addXMLElement($xmlWriter, 'shipment_temperature', str_replace("_", "-", $val['shipment_temperature']));
                $this->addXMLElement($xmlWriter, 'shipment_tracking_no', $val['shipment_tracking_no']);
				// $this->addXMLElement($xmlWriter, 'shipment_receipt_confirmed', $val['shipment_receipt_confirmed']);
				$this->addXMLElement($xmlWriter, 'shipment_receipt_confirmed', str_replace("_", "-", $val['shipment_receipt_confirmed']));
                $this->addXMLElement($xmlWriter, 'shipment_receipt_dt', $val['shipment_receipt_dt']);
                // $this->addXMLElement($xmlWriter, 'shipment_issues', $val['shipment_issues']);
				$this->addXMLElement($xmlWriter, 'shipment_issues', str_replace("_", "-", $val['shipment_issues']));
                $this->addXMLElement($xmlWriter, 'shipment_issues_oth', $val['shipment_issues_oth']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseSpecimenStorage(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, SPECIMEN_STORAGE_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('spec_storage');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'spsc_id', $val['samp_specst_spscinfo_name']);
                $this->addXMLElement($xmlWriter, 'storage_container_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'placed_in_storage_dt', $val['placed_in_storage_dt']);
				// $placed_in_storage_dt = preg_split('/[ ]/', $val['placed_in_storage_dt']);
				// $this->addXMLElement($xmlWriter, 'placed_in_storage_dt', $placed_in_storage_dt[0]);
                $this->addXMLElement($xmlWriter, 'staff_id', $val['samp_specststaffrstr_name']); 
                $this->addXMLElement($xmlWriter, 'equip_id', $val['samp_specstspecequip_name']);
                $this->addXMLElement($xmlWriter, 'master_storage_unit', $val['master_storage_unit']);
				$this->addXMLElement($xmlWriter, 'master_storage_unit', str_replace("_", "-", $val['master_storage_unit']));
                $this->addXMLElement($xmlWriter, 'storage_comment', $val['storage_comment']);
                $this->addXMLElement($xmlWriter, 'storage_comment_oth', $val['storage_comment_oth']);
                $this->addXMLElement($xmlWriter, 'removed_from_storage_dt', $val['removed_from_storage_dt']);
				// $removed_from_storage_dt = preg_split('/[ ]/', $val['removed_from_storage_dt']);
				// $this->addXMLElement($xmlWriter, 'removed_from_storage_dt', $removed_from_storage_dt[0]);
				$this->addXMLElement($xmlWriter, 'temp_event_st', $val['temp_event_st']);
                $this->addXMLElement($xmlWriter, 'temp_event_et', $val['temp_event_et']);
                $this->addXMLElement($xmlWriter, 'temp_event_low_temp', $val['temp_event_low_temp']);
                $this->addXMLElement($xmlWriter, 'temp_event_high_temp', $val['temp_event_high_temp']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
	}
	
    function parseSpecimenInfo(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, SPECIMEN_INFO_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('spec_spsc_info');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
		$this->addXMLElement($xmlWriter, 'spsc_id', $val['name']);
		$this->addXMLElement($xmlWriter, 'address_id', $val['samp_spscint_address_name']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
	}
	
    function parseEnvironmentalEquipmentInformation(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, ENVIRONMENTAL_EQUIPMENT_INFO_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('env_equipment');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
				$this->addXMLElement($xmlWriter, 'srsc_id', $val['samp_enequi_srscinfo_name']);
				$this->addXMLElement($xmlWriter, 'equip_id', $val['name']);
				// $this->addXMLElement($xmlWriter, 'equipment_type', $val['equipment_type']);
				$this->addXMLElement($xmlWriter, 'equipment_type', str_replace("_", "-", $val['equipment_type']));
				$this->addXMLElement($xmlWriter, 'equipment_type_oth', $val['equipment_type_oth']);
                $this->addXMLElement($xmlWriter, 'serial_no', $val['serial_no']);
                $this->addXMLElement($xmlWriter, 'government_asset_tag_no', $val['government_asset_tag_no']);
                $this->addXMLElement($xmlWriter, 'retired_date', $val['retired_date']);
				// $this->addXMLElement($xmlWriter, 'retired_reason', $val['retired_reason']);
				$this->addXMLElement($xmlWriter, 'retired_reason', str_replace("_", "-", $val['retired_reason']));
                $this->addXMLElement($xmlWriter, 'retired_reason_oth', $val['retired_reason_oth']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
	}
	
    function parseEnvironmentalEquipmentProblemLog(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, ENV_EQUIPMENT_PROBLEM_LOG_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('env_equipment_prob_log');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
				$this->addXMLElement($xmlWriter, 'spsc_id', $val['samp_enloge_srscinfo_name']);
				$this->addXMLElement($xmlWriter, 'equip_id', $val['samp_enlogep_enequip_name']);
				$this->addXMLElement($xmlWriter, 'problem_id', $val['name']);
				// $this->addXMLElement($xmlWriter, 'equipment_type', $val['equipment_type']);
				$this->addXMLElement($xmlWriter, 'equipment_type', str_replace("_", "-", $val['equipment_type']));
				$this->addXMLElement($xmlWriter, 'equipment_type_oth', $val['equipment_type_oth']);
               	$this->addXMLElement($xmlWriter, 'staff_id', $val['samp_envequstaffrstr_name']);
                // $this->addXMLElement($xmlWriter, 'problem_dt', $val['problem_dt']);
				$problem_dt = preg_split('/[ ]/', $val['problem_dt']);
				$this->addXMLElement($xmlWriter, 'problem_dt', $problem_dt[0]);
                // $this->addXMLElement($xmlWriter, 'equip_issue', $val['equip_issue']);
				$this->addXMLElement($xmlWriter, 'equip_issue', str_replace("_", "-", $val['equip_issue']));
                // $this->addXMLElement($xmlWriter, 'equip_action', $val['equip_action']);
				$this->addXMLElement($xmlWriter, 'equip_action', str_replace("_", "-", $val['equip_action']));
				$this->addXMLElement($xmlWriter, 'staff_id_reviewer', $val['staff_id_reviewer']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
	}
	
    function parseParticipantConsentSample(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, PARTICIPANT_CONSENT_SAMPLE_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('participant_consent_sample');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'p_id', $val['plt_partsamrticipant_name']);
                $this->addXMLElement($xmlWriter, 'participant_consent_id', $val['plt_partsamtcptcnsnt_name']);
                $this->addXMLElement($xmlWriter, 'participant_consent_sample_id', $val['name']);
                // $this->addXMLElement($xmlWriter, 'sample_consent_type', $val['sample_consent_type']);
				$this->addXMLElement($xmlWriter, 'sample_consent_type', str_replace("_", "-", $val['sample_consent_type']));
                // $this->addXMLElement($xmlWriter, 'sample_consent_given', $val['sample_consent_given']);
				$this->addXMLElement($xmlWriter, 'sample_consent_given', str_replace("_", "-", $val['sample_consent_given']));
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
	}
	
    function parseParticipantRecordVisit(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, PARTICIPANT_RECORD_VISIT_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('participant_rvis');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'rvis_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'p_id', $val['plt_partrvirticipant_name']);
                // $this->addXMLElement($xmlWriter, 'rvis_language', $val['rvis_language']);
				$this->addXMLElement($xmlWriter, 'rvis_language', str_replace("_", "-", $val['rvis_language']));
                $this->addXMLElement($xmlWriter, 'rvis_language_oth', $val['rvis_language_oth']);
                $this->addXMLElement($xmlWriter, 'rvis_person', $val['rvis_person']);
                // $this->addXMLElement($xmlWriter, 'rvis_who_consented', $val['rvis_who_consented']);
				$this->addXMLElement($xmlWriter, 'rvis_who_consented', str_replace("_", "-", $val['rvis_who_consented']));
                // $this->addXMLElement($xmlWriter, 'rvis_translate', $val['rvis_translate']);
				$this->addXMLElement($xmlWriter, 'rvis_translate', str_replace("_", "-", $val['rvis_translate']));
                $this->addXMLElement($xmlWriter, 'contact_id', $val['plt_partrvicntctinfo_name']);
                $this->addXMLElement($xmlWriter, 'time_stamp_1', $val['time_stamp_1']);
                // $this->addXMLElement($xmlWriter, 'rvis_sections', $val['rvis_sections']);
				$this->addXMLElement($xmlWriter, 'rvis_sections', str_replace("_", "-", $val['rvis_sections']));
                // $this->addXMLElement($xmlWriter, 'rvis_during_interv', $val['rvis_during_interv']);
				$this->addXMLElement($xmlWriter, 'rvis_during_interv', str_replace("_", "-", $val['rvis_during_interv']));
                // $this->addXMLElement($xmlWriter, 'rvis_during_bio', $val['rvis_during_bio']);
				$this->addXMLElement($xmlWriter, 'rvis_during_bio', str_replace("_", "-", $val['rvis_during_bio']));
                // $this->addXMLElement($xmlWriter, 'rvis_bio_cord', $val['rvis_bio_cord']);
				$this->addXMLElement($xmlWriter, 'rvis_bio_cord', str_replace("_", "-", $val['rvis_bio_cord']));
                // $this->addXMLElement($xmlWriter, 'rvis_during_env', $val['rvis_during_env']);
				$this->addXMLElement($xmlWriter, 'rvis_during_env', str_replace("_", "-", $val['rvis_during_env']));
                // $this->addXMLElement($xmlWriter, 'rvis_during_thanks', $val['rvis_during_thanks']);
				$this->addXMLElement($xmlWriter, 'rvis_during_thanks', str_replace("_", "-", $val['rvis_during_thanks']));
                // $this->addXMLElement($xmlWriter, 'rvis_after_saq', $val['rvis_after_saq']);
				$this->addXMLElement($xmlWriter, 'rvis_after_saq', str_replace("_", "-", $val['rvis_after_saq']));
                // $this->addXMLElement($xmlWriter, 'rvis_reconsideration', $val['rvis_reconsideration']);
				$this->addXMLElement($xmlWriter, 'rvis_reconsideration', str_replace("_", "-", $val['rvis_reconsideration']));
                $this->addXMLElement($xmlWriter, 'time_stamp_2', $val['time_stamp_2']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
	}
	
	function parseParticipantVisitConsent(&$xmlWriter, &$chunk)
        {
            $db = DBManagerFactory::getInstance();
            $results = export($db, PARTICIPANT_VIS_CONSENT_SUGAR_MODULE, $chunk);
            while($val = $db->fetchByAssoc($results, -1, false)) {
                $xmlWriter->startElement('participant_vis_consent');
                    $this->addXMLElement($xmlWriter, 'psu_id',  $this->master_psu_id);
                    $this->addXMLElement($xmlWriter, 'pid_visit_consent_id', $val['name']);
                    $this->addXMLElement($xmlWriter, 'p_id', $val['plt_particirtcptvstc_name']);
                    // $this->addXMLElement($xmlWriter, 'vis_consent_type', $val['vis_consent_type']);
					$this->addXMLElement($xmlWriter, 'vis_consent_type', str_replace("_", "-", $val['vis_consent_type']));
                    // $this->addXMLElement($xmlWriter, 'vis_consent_response', $val['vis_consent_response']);
					$this->addXMLElement($xmlWriter, 'vis_consent_response', str_replace("_", "-", $val['vis_consent_response']));
                    // $this->addXMLElement($xmlWriter, 'vis_language', $val['vis_language']);
					$this->addXMLElement($xmlWriter, 'vis_language', str_replace("_", "-", $val['vis_language']));
                    $this->addXMLElement($xmlWriter, 'vis_language_oth', $val['vis_language_oth']);
                    $this->addXMLElement($xmlWriter, 'vis_person_who_consented_id', $val['vis_person_who_consented_id']);
                    // $this->addXMLElement($xmlWriter, 'vis_who_consented', $val['vis_who_consented']);
					$this->addXMLElement($xmlWriter, 'vis_who_consented', str_replace("_", "-", $val['vis_who_consented']));
                    // $this->addXMLElement($xmlWriter, 'vis_translate', $val['vis_translate']);
					$this->addXMLElement($xmlWriter, 'vis_translate', str_replace("_", "-", $val['vis_translate']));
                    $this->addXMLElement($xmlWriter, 'vis_comments', $val['vis_comments']);
                    $this->addXMLElement($xmlWriter, 'contact_id', $val['ncsdc_cntctrtcptvstc_name']);
                    $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
                $xmlWriter->endElement();
            }
            $xmlWriter->flush();
        unset($results);  
        }
	
    function parsePrecisionThermometerCertification(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, PRECISION_THERMOMETER_CERT_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('prec_therm_cert');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'srsc_id', $val['samp_prethr_srscinfo_name']);
                $this->addXMLElement($xmlWriter, 'equip_id', $val['samp_prethrp_enequip_name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $val['samp_prethrstaffrstr_name']);
				$this->addXMLElement($xmlWriter, 'certification_id', $val['name']);
                // $this->addXMLElement($xmlWriter, 'precision_cert_status', $val['precision_cert_status']);
				$this->addXMLElement($xmlWriter, 'precision_cert_status', str_replace("_", "-", $val['precision_cert_status']));
                // $this->addXMLElement($xmlWriter, 'certification_date', $val['certification_date']);
				$certification_date = preg_split('/[ ]/', $val['certification_date']);
				$this->addXMLElement($xmlWriter, 'certification_date', $certification_date[0]);
                // $this->addXMLElement($xmlWriter, 'certification_expire_dt', $val['certification_expire_dt']);
				$certification_expire_dt = preg_split('/[ ]/', $val['certification_expire_dt']);
				$this->addXMLElement($xmlWriter, 'certification_expire_dt', $certification_expire_dt[0]);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseRefrigeratorFreezerVerification(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, REFRIGERATOR_FREEZER_VER_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('ref_freezer_verification');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'srsc_id', $val['samp_reffre_srscinfo_name']);
                $this->addXMLElement($xmlWriter, 'equip_id', $val['samp_reffrep_enequip_name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $val['samp_reffrestaffrstr_name']);
				// $this->addXMLElement($xmlWriter, 'verification_id', $val['name']);
				$verification_id = preg_split('/[ ]/', $val['verification_id']);
				$this->addXMLElement($xmlWriter, 'verification_id', $verification_id[0]);
                $this->addXMLElement($xmlWriter, 'verification_dt', $val['verification_dt']);
                $this->addXMLElement($xmlWriter, 'rf_thermometer_equip_id', $val['rf_thermometer_equip_id']); 
                $this->addXMLElement($xmlWriter, 'correction_factor_temp', $val['correction_factor_temp']);
                $this->addXMLElement($xmlWriter, 'current_temp', $val['current_temp']);
                $this->addXMLElement($xmlWriter, 'maximum_temp', $val['maximum_temp']);
                $this->addXMLElement($xmlWriter, 'minimum_temp', $val['minimum_temp']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseSampleReceiptStorage(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, SAMPLE_RECEIPT_STORAGE_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('sample_receipt_store');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'sample_id', $val['name']); // MISSING FIELD IN VARDEFS
				$this->addXMLElement($xmlWriter, 'srsc_id', $val['samp_recsto_srscinfo_name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $val['samp_samprestaffrstr_name']);
                // $this->addXMLElement($xmlWriter, 'sample_condition', $val['sample_condition']);
				$this->addXMLElement($xmlWriter, 'sample_condition', str_replace("_", "-", $val['sample_condition']));
                $this->addXMLElement($xmlWriter, 'receipt_comment_oth', $val['receipt_comment_oth']); 
                // $this->addXMLElement($xmlWriter, 'receipt_dt', $val['receipt_dt']);
				$receipt_dt = preg_split('/[ ]/', $val['receipt_dt']);
				$this->addXMLElement($xmlWriter, 'receipt_dt', $receipt_dt[0]);
				// $this->addXMLElement($xmlWriter, 'cooler_temp_cond', $val['cooler_temp_cond']);
				$this->addXMLElement($xmlWriter, 'cooler_temp_cond', str_replace("_", "-", $val['cooler_temp_cond']));
                $this->addXMLElement($xmlWriter, 'equip_id', $val['']);
				// $this->addXMLElement($xmlWriter, 'placed_in_storage_dt', $val['placed_in_storage_dt']);
				$placed_in_storage_dt = preg_split('/[ ]/', $val['placed_in_storage_dt']);
				$this->addXMLElement($xmlWriter, 'placed_in_storage_dt', $placed_in_storage_dt[0]);
                // $this->addXMLElement($xmlWriter, 'storage_compartment_area', $val['storage_compartment_area']);
				$this->addXMLElement($xmlWriter, 'storage_compartment_area', str_replace("_", "-", $val['storage_compartment_area']));
                $this->addXMLElement($xmlWriter, 'storage_comment_oth', $val['storage_comment_oth']);
                $this->addXMLElement($xmlWriter, 'removed_from_storage_dt', $val['removed_from_storage_dt']);
                // $this->addXMLElement($xmlWriter, 'temp_event_occurred', $val['temp_event_occurred']);
				$this->addXMLElement($xmlWriter, 'temp_event_occurred', str_replace("_", "-", $val['temp_event_occurred']));
                // $this->addXMLElement($xmlWriter, 'temp_event_action', $val['temp_event_action']);
				$this->addXMLElement($xmlWriter, 'temp_event_action', str_replace("_", "-", $val['temp_event_action']));
                $this->addXMLElement($xmlWriter, 'temp_event_action_oth', $val['temp_event_action_oth']);
			$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseSampleShipping(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, SAMPLE_SHIPPING_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('sample_shipping');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'sample_id', $val['name']);
				$this->addXMLElement($xmlWriter, 'srsc_id', $val['samp_sampsh_srscinfo_name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $val['samp_sampshstaffrstr_name']);
                $this->addXMLElement($xmlWriter, 'shipper_id', $val['shipper_id']);
                // $this->addXMLElement($xmlWriter, 'shipper_destination', $val['shipper_destination']); 
				$this->addXMLElement($xmlWriter, 'shipper_destination', str_replace("_", "-", $val['shipper_destination']));
                // $this->addXMLElement($xmlWriter, 'shipment_date', $val['shipment_date']);
				$shipment_date = preg_split('/[ ]/', $val['shipment_date']);
				$this->addXMLElement($xmlWriter, 'shipment_date', $shipment_date[0]);
                // $this->addXMLElement($xmlWriter, 'shipment_coolant', $val['shipment_coolant']);
				$this->addXMLElement($xmlWriter, 'shipment_coolant', str_replace("_", "-", $val['shipment_coolant']));
                $this->addXMLElement($xmlWriter, 'shipment_tracking_no', $val['shipment_tracking_no']);
                $this->addXMLElement($xmlWriter, 'shipment_issues_oth', $val['shipment_issues_oth']);
                $this->addXMLElement($xmlWriter, 'staff_id_track', $val['staff_id_track']);
                // $this->addXMLElement($xmlWriter, 'sample_shipped_by', $val['sample_shipped_by']);
				$this->addXMLElement($xmlWriter, 'sample_shipped_by', str_replace("_", "-", $val['sample_shipped_by']));
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    // PROBLEM WITH THE DATA MODEL RELATED TO THE JOINS. SQL FAILS.
    function parseSrscInformation(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, SRSC_INFO_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('srsc_info');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'srsc_id', $val['name']);
				$this->addXMLElement($xmlWriter, 'address_id', $val['samp_srscint_address_name']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseSubsampleDocument(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, SUBSAMPLE_DOC_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('subsample_doc');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'event_id', $val['samp_subsameventinfo_name']);
				$this->addXMLElement($xmlWriter, 'subsample_doc_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'random_order_no', $val['random_order_no']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseTRHMeterCalibration(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, TRH_METER_CALIBRATION_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('trh_meter_calibration');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'srsc_id', $val['samp_trhmet_srscinfo_name']);
                $this->addXMLElement($xmlWriter, 'equip_id', $val['samp_trhmetp_enequip_name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $val['samp_trhmetstaffrstr_name']);
				$this->addXMLElement($xmlWriter, 'calibration_id', $val['name']);
				$this->addXMLElement($xmlWriter, 'sample_condition', $val['sample_condition']);
                // $this->addXMLElement($xmlWriter, 'calibration_expire_dt', $val['calibration_expire_dt']);
				$calibration_expire_dt = preg_split('/[ ]/', $val['calibration_expire_dt']);
				$this->addXMLElement($xmlWriter, 'calibration_expire_dt', $calibration_expire_dt[0]);
                // $this->addXMLElement($xmlWriter, 'verification_dt', $val['verification_dt']);
				$verification_dt = preg_split('/[ ]/', $val['verification_dt']);
				$this->addXMLElement($xmlWriter, 'verification_dt', $verification_dt[0]);
                $this->addXMLElement($xmlWriter, 'thr_equip_id', $val['thr_equip_id']);
                $this->addXMLElement($xmlWriter, 'precision_term_temp', $val['precision_term_temp']);
                $this->addXMLElement($xmlWriter, 'trh_temp', $val['trh_temp']);
                // $this->addXMLElement($xmlWriter, 'salts_moist', $val['salts_moist']);
				$this->addXMLElement($xmlWriter, 'salts_moist', str_replace("_", "-", $val['salts_moist']));
                $this->addXMLElement($xmlWriter, 's_33rh_reading', $val['s_33rh_reading']);
                $this->addXMLElement($xmlWriter, 's_75rh_reading', $val['s_75rh_reading']);
                // $this->addXMLElement($xmlWriter, 's_33_rh_need_calib', $val['s_33_rh_need_calib']);
				$this->addXMLElement($xmlWriter, 's_33_rh_need_calib', str_replace("_", "-", $val['s_33_rh_need_calib']));
				// $this->addXMLElement($xmlWriter, 's_75_rh_need_calib', $val['s_75_rh_need_calib']);
				$this->addXMLElement($xmlWriter, 's_75_rh_need_calib', str_replace("_", "-", $val['s_75_rh_need_calib']));
				$this->addXMLElement($xmlWriter, 's_33rh_reading_calib', $val['s_33rh_reading_calib']);
				$this->addXMLElement($xmlWriter, 's_75rh_reading_calib', $val['s_75rh_reading_calib']);
				// $this->addXMLElement($xmlWriter, 'trh_calib_fail_rsn', $val['trh_calib_fail_rsn']);
				$this->addXMLElement($xmlWriter, 'trh_calib_fail_rsn', str_replace("_", "-", $val['trh_calib_fail_rsn']));
				$this->addXMLElement($xmlWriter, 'trh_calib_fail_reas_other', $val['trh_calib_fail_reas_other']);
				// $this->addXMLElement($xmlWriter, 'trh_calib_status', $val['trh_calib_status']);
				$this->addXMLElement($xmlWriter, 'trh_calib_status', str_replace("_", "-", $val['trh_calib_status']));
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseDigitalRefrigeratorFreezerThermVerification(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, DRFT_THERM_VERIFICATION_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('drf_therm_verification');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'srsc_id', $val['samp_drfthe_srscinfo_nam']);
                $this->addXMLElement($xmlWriter, 'staff_id', $val['samp_drfthestaffrstr_name']);
				// $this->addXMLElement($xmlWriter, 'drf_therm_verification_date', $val['drf_therm_verification_date']);
				$drf_therm_verification_date = preg_split('/[ ]/', $val['drf_therm_verification_date']);
				$this->addXMLElement($xmlWriter, 'drf_therm_verification_date', $drf_therm_verification_date[0]);
				$this->addXMLElement($xmlWriter, 'drf_verification_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'equip_id', $val['samp_drfthep_enequip_name']);
				$this->addXMLElement($xmlWriter, 'rf_thermometer_equip_id', $val['rf_thermometer_equip_id']);
                // $this->addXMLElement($xmlWriter, 'certification_expire_dt', $val['certification_expire_dt']);
				$certification_expire_dt = preg_split('/[ ]/', $val['certification_expire_dt']);
				$this->addXMLElement($xmlWriter, 'certification_expire_dt', $certification_expire_dt[0]);
                $this->addXMLElement($xmlWriter, 'precision_term_temp', $val['precision_term_temp']);
                $this->addXMLElement($xmlWriter, 'rf_temp', $val['rf_temp']);
                $this->addXMLElement($xmlWriter, 'correction_factor_temp', $val['correction_factor_temp']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseSampleReceiptConfirmation(&$xmlWriter, &$chunk)
    {
        $db = DBManagerFactory::getInstance();
        $results = export($db, SAMPLE_RECEIPT_CONFIRM_SUGAR_MODULE, $chunk);
        while($val = $db->fetchByAssoc($results, -1, false)) {
            $xmlWriter->startElement('sample_receipt_confirm');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'srsc_id', $val['']); // MISSING FIELD IN VARDEFS
				// $this->addXMLElement($xmlWriter, 'shipment_receipt_confirmed', $val['shipment_receipt_confirmed']); 
				$this->addXMLElement($xmlWriter, 'shipment_receipt_confirmed', str_replace("_", "-", $val['shipment_receipt_confirmed']));
                $this->addXMLElement($xmlWriter, 'shipper_id', $val['shipper_id']);
                $this->addXMLElement($xmlWriter, 'shipment_tracking_no', $val['shipment_tracking_no']);
                $this->addXMLElement($xmlWriter, 'shipment_receipt_dt', $val['shipment_receipt_dt']);
                $this->addXMLElement($xmlWriter, 'shipment_condition', $val['shipment_condition']);
                $this->addXMLElement($xmlWriter, 'shipment_damaged_reason', $val['shipment_damaged_reason']);
				$this->addXMLElement($xmlWriter, 'sample_id', $val['name']);
                $this->addXMLElement($xmlWriter, 'sample_receipt_temp', $val['sample_receipt_temp']);
				// $this->addXMLElement($xmlWriter, 'sample_condition', $val['sample_condition']);
				$this->addXMLElement($xmlWriter, 'sample_condition', str_replace("_", "-", $val['sample_condition']));
				$this->addXMLElement($xmlWriter, 'shipment_received_by', $val['shipment_received_by']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
	//// ******************************************************
	
    private function addXMLElement(&$xmlWriter, $element, $value) {
        $xmlWriter->startElement($element);
            $xmlWriter->text($value);
        $xmlWriter->endElement();
    }
    
    /**
     *
     * @param type $primaryModuleName -- The name of the module that the primary record is from.  This name should be the name the module was developed under (changing a tab name is studio does not affect the name that should be passed into this method)..
     * @param type $primaryModuleID -- The ID of the bean in the specified module
     * @param type $relationshipName -- The name of the lnk field to return records from.  This name should be the name of the relationship.
     * @param type $secondaryModuleIDField -- The bean field on the related module the ID is held that we want to retrieve
     * @return string $relatedModuleID -- The related module ID value
     */
    private function getRelatedModuleID($primaryModuleName, $primaryModuleID, $relationshipName, $secondaryModuleIDField)
    {
        // Need to call get_relationships() but issue with identifying target class and getting session
        // There is also a Util function called getRelationshipResults()
        // that might be a shortcut past some of the stuff which could be copied here.
        global  $beanList, $beanFiles;
        $class_name = $beanList[$primaryModuleName];
    	require_once($beanFiles[$class_name]);
    	$mod = new $class_name();
    	$mod->retrieve($primaryModuleID);
        $field_list = array($secondaryModuleIDField);
        $result = parent::getRelationshipResults($mod, $relationshipName, $field_list);
        if ($result){
            unset($mod);
            return $result['rows'][0][$secondaryModuleIDField];
        }
        else {
            unset($mod);
            return '';
        }
    }
    
    private function replaceIfMissing($testVal, $alternativeVal)
    {
        if (strlen($testVal) == 0 & strlen($alternativeVal) !=0) {
            return $alternativeVal;
        }
        else {
            return $testVal;
        }
    }
}
?>
