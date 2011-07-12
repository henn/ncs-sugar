<?php

require_once('service/v3/SugarWebServiceUtilv3.php');

class NCSSugarWebServiceUtil extends SugarWebServiceUtilv3 {
    
    private $master_psu_id;
    private $master_sc_id;
    
    function parseStudyCenter(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('study_center');
                $this->addXMLElement($xmlWriter, 'sc_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'sc_name', $record['name_value_list']['sc_name']['value']);
                $this->addXMLElement($xmlWriter, 'comments', $record['name_value_list']['comments']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
            if (strlen($this->master_sc_id) == 0 && strlen($record['name_value_list']['name']['value']) != 0) {
                $this->master_sc_id = $record['name_value_list']['name']['value'];
            }
        } 
    }
    
    function parsePSU(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('psu');
                $this->addXMLElement($xmlWriter, 'sc_id', $record['name_value_list']['sc_id']['value']);
                $this->addXMLElement($xmlWriter, 'psu_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'psu_name', $record['name_value_list']['psu_name']['value']);
                $this->addXMLElement($xmlWriter, 'recruit_type', $record['name_value_list']['recruit_type']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
            if (strlen($this->master_psu_id) == 0 && strlen($record['name_value_list']['name']['value']) != 0) {
                $this->master_psu_id = $record['name_value_list']['name']['value'];
            }
        }
    }
    
    function parseSSU(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('ssu');
                $this->addXMLElement($xmlWriter, 'sc_id', $record['name_value_list']['sc_id']['value']);
                $this->addXMLElement($xmlWriter, 'psu_id', $record['name_value_list']['psu_id']['value']);
                $this->addXMLElement($xmlWriter, 'ssu_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'ssu_name', $record['name_value_list']['ssu_name']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', $record['name_value_list']['transaction_type']['value']);
            $xmlWriter->endElement();
        }
    }
    
    
    function parseTSU(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('tsu');
                $this->addXMLElement($xmlWriter, 'sc_id', $record['name_value_list']['sc_id']['value']);
                $this->addXMLElement($xmlWriter, 'psu_id', $record['name_value_list']['psu_id']['value']);
                $this->addXMLElement($xmlWriter, 'tsu_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'tsu_name', $record['name_value_list']['tsu_name']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();     
        }
    }
    
    function parseListingUnit(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('listing_unit');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id)); // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'list_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'ssu_id', $this->getRelatedModuleID(LISTING_UNIT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'gt_secsampu_gt_listingunt', 'name'));
                $this->addXMLElement($xmlWriter, 'tsu_id', $this->getRelatedModuleID(LISTING_UNIT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'gt_tersampu_gt_listingunt', 'name'));
                $this->addXMLElement($xmlWriter, 'list_line', $record['name_value_list']['list_line']['value']);
                $this->addXMLElement($xmlWriter, 'list_source', $record['name_value_list']['list_source']['value']);
                $this->addXMLElement($xmlWriter, 'list_comment', $record['name_value_list']['list_comment']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();     
        }        
    }
    
    function parseDwellingUnit(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('dwelling_unit');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id)); // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'du_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'list_id', $this->getRelatedModuleID(DWELLING_UNIT_SUGAR_MODULE, $record['name_value_list']['list_id']['value'], 'gt_listingunt_gt_dwellingunt', 'name'));
                $this->addXMLElement($xmlWriter, 'tsu_id', $this->getRelatedModuleID(DWELLING_UNIT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'gt_secsampunt_gt_dwellingunt', 'name'));
				$this->addXMLElement($xmlWriter, 'ssu_id', $this->getRelatedModuleID(DWELLING_UNIT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'gt_secsampunt_gt_dwellingunt', 'name'));
				$this->addXMLElement($xmlWriter, 'duplicate_du', $record['name_value_list']['duplicate_du']['value']);
                $this->addXMLElement($xmlWriter, 'missed_du', $record['name_value_list']['missed_du']['value']);
                $this->addXMLElement($xmlWriter, 'du_type', $record['name_value_list']['du_type']['value']);
                $this->addXMLElement($xmlWriter, 'du_type_oth', $record['name_value_list']['du_type_oth']['value']);
                $this->addXMLElement($xmlWriter, 'du_ineligible', $record['name_value_list']['du_ineligible']['value']);
                $this->addXMLElement($xmlWriter, 'du_access', $record['name_value_list']['du_access']['value']);
                $this->addXMLElement($xmlWriter, 'duid_comment', $record['name_value_list']['duid_comment']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseHouseHoldUnit(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('household_unit');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id); // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'hh_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'hh_status', $record['name_value_list']['hh_status']['value']);
                $this->addXMLElement($xmlWriter, 'hh_elig', $record['name_value_list']['hh_elig']['value']);
                $this->addXMLElement($xmlWriter, 'num_age_elig', $record['name_value_list']['num_age_elig']['value']);
                $this->addXMLElement($xmlWriter, 'num_preg', $record['name_value_list']['num_preg']['value']);
                $this->addXMLElement($xmlWriter, 'num_preg_minor', $record['name_value_list']['num_preg_minor']['value']);
                $this->addXMLElement($xmlWriter, 'num_preg_adult', $record['name_value_list']['num_preg_adult']['value']);
                $this->addXMLElement($xmlWriter, 'num_preg_over49', $record['name_value_list']['num_preg_over49']['value']);
                $this->addXMLElement($xmlWriter, 'hh_structure', $record['name_value_list']['hh_structure']['value']);
                $this->addXMLElement($xmlWriter, 'hh_structure_oth', $record['name_value_list']['hh_structure_oth']['value']);
                $this->addXMLElement($xmlWriter, 'hh_comment', $record['name_value_list']['hh_comment']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseLinkHouseHoldDwelling(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('link_household_dwelling');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);  // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'hh_du_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'hh_id', $this->getRelatedModuleID(LINK_HOUSEHOLD_DWELLING_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'gt_dwlunthsk_gt_household', 'name'));
                $this->addXMLElement($xmlWriter, 'du_id', $this->getRelatedModuleID(LINK_HOUSEHOLD_DWELLING_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'gt_dwlunthsgt_dwellingunt', 'name'));
                $this->addXMLElement($xmlWriter, 'is_active', $record['name_value_list']['is_active']['value']);
                $this->addXMLElement($xmlWriter, 'du_rank', $record['name_value_list']['du_rank']['value']);
                $this->addXMLElement($xmlWriter, 'du_rank_oth', $record['name_value_list']['du_rank_oth']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseStaff(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('staff');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);  // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'staff_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'staff_type', $record['name_value_list']['staff_type']['value']);
                $this->addXMLElement($xmlWriter, 'staff_type_oth', $record['name_value_list']['staff_type_oth']['value']);
                $this->addXMLElement($xmlWriter, 'subcontractor', $record['name_value_list']['subcontractor']['value']);
                $this->addXMLElement($xmlWriter, 'staff_yob', $record['name_value_list']['staff_yob']['value']);
                $this->addXMLElement($xmlWriter, 'staff_age_range', $record['name_value_list']['staff_age_range']['value']);
                $this->addXMLElement($xmlWriter, 'staff_gender', $record['name_value_list']['staff_gender']['value']);
                $this->addXMLElement($xmlWriter, 'staff_race', $record['name_value_list']['staff_race']['value']);
                $this->addXMLElement($xmlWriter, 'staff_race_oth', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'staff_zip', $record['name_value_list']['staff_zip']['value']);
                $this->addXMLElement($xmlWriter, 'staff_ethnicity', $record['name_value_list']['staff_ethnicity']['value']);
		$this->addXMLElement($xmlWriter, 'staff_exp', $record['name_value_list']['staff_exp']['value']);
                $this->addXMLElement($xmlWriter, 'staff_comment', $record['name_value_list']['staff_comment']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseStaffLanguage(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('staff_language');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);  // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'staff_language_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(STAFF_LANGUAGE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'st_staffrstr_st_stflang', 'name'));
                $this->addXMLElement($xmlWriter, 'staff_lang', $record['name_value_list']['staff_lang']['value']);
                $this->addXMLElement($xmlWriter, 'staff_lang_oth', $record['name_value_list']['staff_lang_oth']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseStaffValidation(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('staff_validation');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);  // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'staff_val_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(STAFF_VALIDATION_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'st_staffrstr_st_stfvldtn', 'name'));
                $this->addXMLElement($xmlWriter, 'event_id', $this->getRelatedModuleID(STAFF_VALIDATION_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_eventfo_st_stfvldtn', 'name'));
                $this->addXMLElement($xmlWriter, 'staff_validate', $record['name_value_list']['staff_validate']['value']);
                $this->addXMLElement($xmlWriter, 'staff_val_date', $record['name_value_list']['staff_val_date']['value']);
                $this->addXMLElement($xmlWriter, 'staff_val_comment', $record['name_value_list']['staff_val_comment']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseStaffWeeklyExpense(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('staff_weekly_expense');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'weekly_exp_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(STAFF_WEEKLY_EXPENSE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'st_staffrst_st_stfwkexpns', 'name'));
                $this->addXMLElement($xmlWriter, 'week_start_date', $record['name_value_list']['week_start_date']['value']);
                $this->addXMLElement($xmlWriter, 'staff_pay', $record['name_value_list']['staff_pay']['value']);
                $this->addXMLElement($xmlWriter, 'staff_hours', $record['name_value_list']['staff_hours']['value']);
                $this->addXMLElement($xmlWriter, 'staff_expenses', $record['name_value_list']['staff_expenses']['value']);
                $this->addXMLElement($xmlWriter, 'staff_miles', $record['name_value_list']['staff_miles']['value']);
                $this->addXMLElement($xmlWriter, 'weekly_expenses_comment', $record['name_value_list']['weekly_expenses_comment']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseStaffExpenseManagementTask(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('staff_exp_mngmnt_tasks');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'staff_exp_mgmt_task_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'staff_weekly_expense_id', $this->getRelatedModuleID(STAFF_EXP_MNGMNT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'st_stfwkexpst_stfexpmgtsk', 'name'));
                $this->addXMLElement($xmlWriter, 'mgmt_task_type', $record['name_value_list']['mgmt_task_type']['value']);
                $this->addXMLElement($xmlWriter, 'mgmt_task_type_oth', $record['name_value_list']['mgmt_task_type_oth']['value']);
                $this->addXMLElement($xmlWriter, 'mgmt_task_hrs', $record['name_value_list']['mgmt_task_hrs']['value']);
                $this->addXMLElement($xmlWriter, 'mgmt_task_comment', $record['name_value_list']['mgmt_task_comment']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseStaffExpenseDataCollectionTask(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('staff_exp_data_cllctn_tasks');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'staff_exp_data_coll_task_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'staff_weekly_expense_id', $this->getRelatedModuleID(STAFF_EXP_DATA_CLLCTN_TASKS_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'st_stfwkexpst_stfexpdctsk', 'name'));
                $this->addXMLElement($xmlWriter, 'data_coll_task_type', $record['name_value_list']['data_coll_task_type']['value']);
                $this->addXMLElement($xmlWriter, 'data_coll_task_type_oth', $record['name_value_list']['data_coll_task_type_oth']['value']);
                $this->addXMLElement($xmlWriter, 'data_coll_tasks_hrs', $record['name_value_list']['data_coll_tasks_hrs']['value']);
                $this->addXMLElement($xmlWriter, 'data_coll_task_cases', $record['name_value_list']['data_coll_task_cases']['value']);
                $this->addXMLElement($xmlWriter, 'data_coll_transmit', $record['name_value_list']['data_coll_transmit']['value']);
                $this->addXMLElement($xmlWriter, 'data_coll_task_comment', $record['name_value_list']['data_coll_task_comment']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseOutreach(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('outreach');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'tsu_id', $record['name_value_list']['tsu_id']['value']);
                $this->addXMLElement($xmlWriter, 'ssu_id', $value);  // NO DB FIELD OR RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_event_date', $record['name_value_list']['outreach_event_date']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_target', $record['name_value_list']['outreach_target']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_target_oth', $record['name_value_list']['outreach_target_oth']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_mode', $record['name_value_list']['outreach_mode']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_mode_oth', $record['name_value_list']['outreach_mode_oth']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_type', $record['name_value_list']['outreach_type']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_type_oth', $record['name_value_list']['outreach_type_oth']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_tailored', $record['name_value_list']['outreach_tailored']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_lang1', $record['name_value_list']['outreach_lang1']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_lang2', $record['name_value_list']['outreach_lang2']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_lang_oth', $record['name_value_list']['outreach_lang_oth']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_race1', $record['name_value_list']['outreach_race1']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_race2', $record['name_value_list']['outreach_race2']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_race_oth', $record['name_value_list']['outreach_race_oth']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_culture1', $record['name_value_list']['outreach_culture1']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_culture2', $record['name_value_list']['outreach_culture2']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_culture_oth', $record['name_value_list']['outreach_culture_oth']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_quantity', $record['name_value_list']['outreach_quantity']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_cost', $record['name_value_list']['outreach_cost']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_staffing', $record['name_value_list']['outreach_staffing']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_incident', $record['name_value_list']['outreach_incident']['value']);
                $this->addXMLElement($xmlWriter, 'incident_id', $record['name_value_list']['incident_id']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_eval_result', $record['name_value_list']['outreach_eval_result']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
	// *************** 2.0 MODULE INSERTED ******************
	function parseOutreachRace(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('outreach_race');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'outreach_race_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $this->getRelatedModuleID(OUTREACH_RACE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'st_msoutrace_st_wkoeact', 'name'));
                $this->addXMLElement($xmlWriter, 'outreach_race2', str_replace("_", "-", $record['name_value_list']['outreach_race2']['value']));
                $this->addXMLElement($xmlWriter, 'outreach_race_oth', $record['name_value_list']['outreach_race_oth']['value']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	// *****************************************************
    
    function parseOutreachStaff(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('outreach_staff');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'outreach_event_staff_id', $record['name_value_list']['name']['value']); 
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $this->getRelatedModuleID(OUTREACH_STAFF_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'st_otrchstaff_st_wkoeact', 'name'));
                $this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(OUTREACH_STAFF_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'st_otrchstaff_st_staffrstr', 'name'));
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseOutreachEval(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('outreach_eval');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'outreach_event_eval_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $this->getRelatedModuleID(OUTREACH_EVAL_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'st_otrcheval_st_wkoeact', 'name'));
				$this->addXMLElement($xmlWriter, 'outreach_eval', $record['name_value_list']['outreach_eval']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_eval_oth', $record['name_value_list']['outreach_eval_oth']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
	// *************** 2.0 MODULE INSERTED ******************
	function parseOutreachTarget(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('outreach_target');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'outreach_target_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $this->getRelatedModuleID(OUTREACH_TARGET_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'st_msouttarg_st_wkoeact', 'name'));
                $this->addXMLElement($xmlWriter, 'outreach_target_ms', $record['name_value_list']['outreach_target_ms']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_target_ms_oth', $record['name_value_list']['outreach_target_ms_oth']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
	function parseOutreachLanguage2(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('outreach_lang2');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'outreach_lang2_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $this->getRelatedModuleID(OUTREACH_LANG2_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'st_msoutlang2_st_wkoeact', 'name'));
                $this->addXMLElement($xmlWriter, 'outreach_lang2', $record['name_value_list']['outreach_lang2']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	// ******************************************************
	
    function parseStaffCertTraining(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('staff_cert_training');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'staff_cert_list_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(STAFF_CERT_TRAINING_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'st_staffrstr_st_stfcrttrn', 'name'));
                $this->addXMLElement($xmlWriter, 'cert_train_type', $record['name_value_list']['cert_train_type']['value']);
                $this->addXMLElement($xmlWriter, 'cert_completed', $record['name_value_list']['cert_completed']['value']);
                $this->addXMLElement($xmlWriter, 'cert_date', $record['name_value_list']['cert_date']['value']);
                $this->addXMLElement($xmlWriter, 'staff_bgcheck_lvl', $record['name_value_list']['staff_bgcheck_lvl']['value']);
                $this->addXMLElement($xmlWriter, 'cert_type_frequency', $record['name_value_list']['cert_type_frequency']['value']);
                $this->addXMLElement($xmlWriter, 'cert_type_exp_date', $record['name_value_list']['cert_type_exp_date']['value']);
                $this->addXMLElement($xmlWriter, 'cert_comment', $record['name_value_list']['cert_comment']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parsePerson(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('person');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id); // NO CLEAR RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'person_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'prefix', str_replace("_", "-", $record['name_value_list']['prefix']['value']));
                $this->addXMLElement($xmlWriter, 'first_name', $record['name_value_list']['first_name']['value']);
                $this->addXMLElement($xmlWriter, 'last_name', $record['name_value_list']['last_name']['value']);
                $this->addXMLElement($xmlWriter, 'middle_name', $record['name_value_list']['middle_name']['value']);
                $this->addXMLElement($xmlWriter, 'maiden_name', $record['name_value_list']['maiden_name']['value']);
                $this->addXMLElement($xmlWriter, 'suffix', str_replace("_", "-", $record['name_value_list']['suffix']['value']));
                $this->addXMLElement($xmlWriter, 'title', $record['name_value_list']['title']['value']);
                $this->addXMLElement($xmlWriter, 'sex', $record['name_value_list']['sex']['value']);
                $this->addXMLElement($xmlWriter, 'age', $record['name_value_list']['age']['value']);
                $this->addXMLElement($xmlWriter, 'age_range', $record['name_value_list']['age_range']['value']);
                $this->addXMLElement($xmlWriter, 'person_dob', $record['name_value_list']['person_dob']['value']);
                $this->addXMLElement($xmlWriter, 'deceased', $record['name_value_list']['deceased']['value']);
                $this->addXMLElement($xmlWriter, 'ethnic_group', $record['name_value_list']['ethnic_group']['value']);
                $this->addXMLElement($xmlWriter, 'person_lang', $record['name_value_list']['person_lang']['value']);
                $this->addXMLElement($xmlWriter, 'person_lang_oth', $record['name_value_list']['person_lang_oth']['value']);
                $this->addXMLElement($xmlWriter, 'maristat', $record['name_value_list']['maristat']['value']);
                $this->addXMLElement($xmlWriter, 'maristat_oth', $record['name_value_list']['maristat_oth']['value']);
                $this->addXMLElement($xmlWriter, 'pref_contact', $record['name_value_list']['pref_contact']['value']);
                $this->addXMLElement($xmlWriter, 'pref_contact_oth', $record['name_value_list']['pref_contact_oth']['value']);
                $this->addXMLElement($xmlWriter, 'plan_move', str_replace("_", "-", $record['name_value_list']['plan_move']['value']));
                $this->addXMLElement($xmlWriter, 'move_info', str_replace("_", "-", $record['name_value_list']['move_info']['value']));
                $this->addXMLElement($xmlWriter, 'new_address_id', $record['name_value_list']['new_address_id']['value']);
                $this->addXMLElement($xmlWriter, 'when_move', str_replace("_", "-", $record['name_value_list']['when_move']['value']));
                $this->addXMLElement($xmlWriter, 'date_move', $record['name_value_list']['date_move']['value']);
                $this->addXMLElement($xmlWriter, 'p_tracing', $record['name_value_list']['p_tracing']['value']);
                $this->addXMLElement($xmlWriter, 'p_info_source', $record['name_value_list']['p_info_source']['value']);
                $this->addXMLElement($xmlWriter, 'p_info_source_oth', $record['name_value_list']['p_info_source_oth']['value']);
                $this->addXMLElement($xmlWriter, 'p_info_date', $record['name_value_list']['p_info_date']['value']);
                $this->addXMLElement($xmlWriter, 'p_info_update', $record['name_value_list']['p_info_update']['value']);
                $this->addXMLElement($xmlWriter, 'person_comment', $record['name_value_list']['person_comment']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parsePersonRace(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('person_race');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id); // NO RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'person_race_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(PERSON_RACE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_person_plt_personrace', 'name'));
                $this->addXMLElement($xmlWriter, 'race', $record['name_value_list']['race']['value']);
                $this->addXMLElement($xmlWriter, 'race_oth', $record['name_value_list']['race_oth']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseLinkPersonHousehold(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('link_person_household');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'person_hh_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(LINK_PERSON_HOUSEHOLD_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_lnkprshhld_plt_person', 'name'));
                $this->addXMLElement($xmlWriter, 'hh_id', $this->getRelatedModuleID(LINK_PERSON_HOUSEHOLD_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_lnkprshd_gt_household', 'name'));
                $this->addXMLElement($xmlWriter, 'is_active', $record['name_value_list']['is_active']['value']);
                $this->addXMLElement($xmlWriter, 'hh_rank', $record['name_value_list']['hh_rank']['value']);
                $this->addXMLElement($xmlWriter, 'hh_rank_oth', $record['name_value_list']['hh_rank_oth']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseParticipant(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('participant');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'p_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'p_type', $record['name_value_list']['p_type']['value']);
                $this->addXMLElement($xmlWriter, 'p_type_oth', $record['name_value_list']['p_type_oth']['value']);
                $this->addXMLElement($xmlWriter, 'status_info_source', $record['name_value_list']['status_info_source']['value']);
                $this->addXMLElement($xmlWriter, 'status_info_source_oth', $record['name_value_list']['status_info_source_oth']['value']);
                $this->addXMLElement($xmlWriter, 'status_info_mode', $record['name_value_list']['status_info_mode']['value']);
                $this->addXMLElement($xmlWriter, 'status_info_mode_oth', $record['name_value_list']['status_info_mode_oth']['value']);
                $this->addXMLElement($xmlWriter, 'status_info_date', $record['name_value_list']['status_info_date']['value']);
                $this->addXMLElement($xmlWriter, 'enroll_status', $record['name_value_list']['enroll_status']['value']);
                $this->addXMLElement($xmlWriter, 'enroll_date', $record['name_value_list']['enroll_date']['value']);
                $this->addXMLElement($xmlWriter, 'pid_entry', $record['name_value_list']['pid_entry']['value']);
                $this->addXMLElement($xmlWriter, 'pid_entry_other', $record['name_value_list']['pid_entry_other']['value']);
                $this->addXMLElement($xmlWriter, 'pid_age_elig', $record['name_value_list']['pid_age_elig']['value']);
                $this->addXMLElement($xmlWriter, 'pid_comment', $record['name_value_list']['pid_comment']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseLinkPersonParticipant(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('link_person_participant');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'person_pid_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'p_id', $this->getRelatedModuleID(LINK_PERSON_PARTICIPANT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_lkprsprlt_participant', 'name'));
                $this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(LINK_PERSON_PARTICIPANT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_lkprsprcpt_plt_person', 'name'));
                $this->addXMLElement($xmlWriter, 'relation', $record['name_value_list']['relation']['value']);
                $this->addXMLElement($xmlWriter, 'relation_oth', $record['name_value_list']['relation_oth']['value']);
                $this->addXMLElement($xmlWriter, 'is_active', $record['name_value_list']['is_active']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
    // *************** 2.0 MODULE INSERTED ******************
	function parseParticipantAuthorizationForm(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('participant_auth');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'auth_form_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'p_id', $this->getRelatedModuleID(PARTICIPANT_AUTHORIZATION_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_partauthfrm_plt_participant', 'name'));
                $this->addXMLElement($xmlWriter, 'contact_id', $this->getRelatedModuleID(PARTICIPANT_AUTHORIZATION_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_cntctinfo_plt_partauthfrm', 'name'));
                $this->addXMLElement($xmlWriter, 'provider_id', $this->getRelatedModuleID(PARTICIPANT_AUTHORIZATION_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'olt_provider_plt_partauthfrm', 'name'));
		$this->addXMLElement($xmlWriter, 'auth_form_type', $record['name_value_list']['auth_form_type']['value']);
                $this->addXMLElement($xmlWriter, 'auth_type_oth', $record['name_value_list']['auth_type_oth']['value']);
                $this->addXMLElement($xmlWriter, 'auth_status', $record['name_value_list']['auth_status']['value']);
                $this->addXMLElement($xmlWriter, 'auth_status_oth', $record['name_value_list']['auth_status_oth']['value']);
            	$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	// ******************************************************
	
    function parseParticipantConsent(&$xmlWriter, $results) 
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('participant_consent');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'participant_consent_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'p_id', $this->getRelatedModuleID(PARTICIPANT_CONSENT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_participant_plt_prtcptcnsnt', 'name'));
                $this->addXMLElement($xmlWriter, 'consent_version', $record['name_value_list']['consent_version']['value']);
                $this->addXMLElement($xmlWriter, 'consent_expiration', $record['name_value_list']['consent_expiration']['value']);
                $this->addXMLElement($xmlWriter, 'consent_type', $record['name_value_list']['consent_type']['value']);
                $this->addXMLElement($xmlWriter, 'consent_form_type', $record['name_value_list']['consent_form_type']['value']);
              	$this->addXMLElement($xmlWriter, 'consent_given', $record['name_value_list']['consent_given']['value']);
                $this->addXMLElement($xmlWriter, 'consent_date', $record['name_value_list']['consent_date']['value']);
                $this->addXMLElement($xmlWriter, 'consent_withdraw', $record['name_value_list']['consent_withdraw']['value']);
                $this->addXMLElement($xmlWriter, 'consent_withdraw_type', str_replace("_", "-", $record['name_value_list']['consent_withdraw_type']['value']));
                $this->addXMLElement($xmlWriter, 'consent_withdraw_reason', $record['name_value_list']['consent_withdraw_reason']['value']);
		$this->addXMLElement($xmlWriter, 'consent_withdraw_date', $record['name_value_list']['consent_withdraw_date']['value']);
                $this->addXMLElement($xmlWriter, 'consent_language', $record['name_value_list']['consent_language']['value']);
                $this->addXMLElement($xmlWriter, 'consent_language_oth', $record['name_value_list']['consent_language_oth']['value']);
                $this->addXMLElement($xmlWriter, 'person_who_consented_id', $record['name_value_list']['person_who_consented_id']['value']);
                $this->addXMLElement($xmlWriter, 'who_consented', $record['name_value_list']['who_consented']['value']);
                $this->addXMLElement($xmlWriter, 'person_wthdrw_consent_id', $record['name_value_list']['person_wthdrw_consent_id']['value']);
                $this->addXMLElement($xmlWriter, 'who_wthdrw_consent', str_replace("_", "-", $record['name_value_list']['who_wthdrw_consent']['value']));
                $this->addXMLElement($xmlWriter, 'consent_translate', $record['name_value_list']['consent_translate']['value']);
                $this->addXMLElement($xmlWriter, 'consent_comments', $record['name_value_list']['consent_comments']['value']);
                $this->addXMLElement($xmlWriter, 'contact_id', $this->getRelatedModuleID(PARTICIPANT_CONSENT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_cntctinfo_plt_prtcptcnsnt', 'name'));
                $this->addXMLElement($xmlWriter, 'reconsideration_script_use', $record['name_value_list']['reconsideration_script_use']['value']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parsePPGDetails(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('ppg_details');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'ppg_details_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'p_id', $this->getRelatedModuleID(PPG_DETAILS_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_participlt_ppgdetails', 'name'));
                $this->addXMLElement($xmlWriter, 'ppg_pid_status', $record['name_value_list']['ppg_pid_status']['value']);
                $this->addXMLElement($xmlWriter, 'ppg_first', $record['name_value_list']['ppg_first']['value']);
                $this->addXMLElement($xmlWriter, 'orig_due_date', $record['name_value_list']['orig_due_date']['value']);
                $this->addXMLElement($xmlWriter, 'due_date_2', $record['name_value_list']['due_date_2']['value']);
                $this->addXMLElement($xmlWriter, 'due_date_3', $record['name_value_list']['due_date_3']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parsePPGStatusHistory(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('ppg_status_history');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'ppg_history_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'p_id', $this->getRelatedModuleID(PPG_STATUS_HISTORY_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_particilt_ppgstshstry', 'name'));
                $this->addXMLElement($xmlWriter, 'ppg_status', $record['name_value_list']['ppg_status']['value']);
                $this->addXMLElement($xmlWriter, 'ppg_status_date', $record['name_value_list']['ppg_status_date']['value']);
                $this->addXMLElement($xmlWriter, 'ppg_info_source', $record['name_value_list']['ppg_info_source']['value']);
                $this->addXMLElement($xmlWriter, 'ppg_info_source_oth', $record['name_value_list']['ppg_info_source_oth']['value']);
                $this->addXMLElement($xmlWriter, 'ppg_info_mode', $record['name_value_list']['ppg_info_mode']['value']);
                $this->addXMLElement($xmlWriter, 'ppg_info_mode_oth', $record['name_value_list']['ppg_info_mode_oth']['value']);
                $this->addXMLElement($xmlWriter, 'ppg_comment', $record['name_value_list']['ppg_comment']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseProvider(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('provider');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'provider_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'provider_type', $record['name_value_list']['provider_type']['value']);
                $this->addXMLElement($xmlWriter, 'provider_type_oth', $record['name_value_list']['provider_type_oth']['value']);
                $this->addXMLElement($xmlWriter, 'provider_ncs_role', str_replace("_", "-", $record['name_value_list']['provider_ncs_role']['value']));
                $this->addXMLElement($xmlWriter, 'provider_ncs_role_oth', $record['name_value_list']['provider_ncs_role_oth']['value']);
                $this->addXMLElement($xmlWriter, 'practice_info', $record['name_value_list']['practice_info']['value']);
                $this->addXMLElement($xmlWriter, 'practice_patient_load', $record['name_value_list']['practice_patient_load']['value']);
                $this->addXMLElement($xmlWriter, 'practice_size', $record['name_value_list']['practice_size']['value']);
                $this->addXMLElement($xmlWriter, 'public_practice', $record['name_value_list']['public_practice']['value']);
                $this->addXMLElement($xmlWriter, 'provider_info_source', $record['name_value_list']['provider_info_source']['value']);
                $this->addXMLElement($xmlWriter, 'provider_info_source_oth', $record['name_value_list']['provider_info_source_oth']['value']);
                $this->addXMLElement($xmlWriter, 'provider_info_date', $record['name_value_list']['provider_info_date']['value']);
                $this->addXMLElement($xmlWriter, 'provider_info_update', $record['name_value_list']['provider_info_update']['value']);
                $this->addXMLElement($xmlWriter, 'provider_comment', $record['name_value_list']['provider_comment']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
	// *************** 2.0 MODULE INSERTED ******************
	function parseProviderRole(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('provider_role');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'provider_role_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'provider_id', $this->getRelatedModuleID(PROVIDER_ROLE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'olt_msprovrole_olt_provider', 'name'));
                $this->addXMLElement($xmlWriter, 'provider_ncs_role', $record['name_value_list']['provider_ncs_role']['value']);
                $this->addXMLElement($xmlWriter, 'provider_ncs_role_oth', $record['name_value_list']['provider_ncs_role_oth']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	// ******************************************************
	
    
    function parseLinkPersonProvider(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('link_person_provider');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'person_provider_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'provider_id', $this->getRelatedModuleID(LINK_PERSON_PROVIDER_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'olt_prsnprvk_olt_provider', 'name'));
                $this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(LINK_PERSON_PROVIDER_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'olt_prsnprvlnk_plt_person', 'name'));
                $this->addXMLElement($xmlWriter, 'is_active', $record['name_value_list']['is_active']['value']);
                $this->addXMLElement($xmlWriter, 'prov_intro_outcome', $record['name_value_list']['prov_intro_outcome']['value']);
                $this->addXMLElement($xmlWriter, 'prov_intro_outcome_oth', $record['name_value_list']['prov_intro_outcome_oth']['value']);
              	$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseInstitution(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('institution');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'institute_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'institute_type', $record['name_value_list']['institute_type']['value']);
                $this->addXMLElement($xmlWriter, 'institute_name', $record['name_value_list']['institute_name']['value']);
                $this->addXMLElement($xmlWriter, 'institute_type_oth', $record['name_value_list']['institute_type_oth']['value']);
                $this->addXMLElement($xmlWriter, 'institute_relation', $record['name_value_list']['institute_relation']['value']);
                $this->addXMLElement($xmlWriter, 'institute_relation_oth', $record['name_value_list']['institute_relation_oth']['value']);
                $this->addXMLElement($xmlWriter, 'institute_owner', $record['name_value_list']['institute_owner']['value']);
                $this->addXMLElement($xmlWriter, 'institute_owner_oth', $record['name_value_list']['institute_owner_oth']['value']);
                $this->addXMLElement($xmlWriter, 'institute_size', $record['name_value_list']['institute_size']['value']);
                $this->addXMLElement($xmlWriter, 'institute_unit', $record['name_value_list']['institute_unit']['value']);
                $this->addXMLElement($xmlWriter, 'institute_unit_oth', $record['name_value_list']['institute_unit_oth']['value']);
                $this->addXMLElement($xmlWriter, 'institute_info_source', $record['name_value_list']['institute_info_source']['value']);
                $this->addXMLElement($xmlWriter, 'institute_info_source_oth', $record['name_value_list']['institute_info_source_oth']['value']);
                $this->addXMLElement($xmlWriter, 'institute_info_date', $record['name_value_list']['institute_info_date']['value']);
                $this->addXMLElement($xmlWriter, 'institute_info_update', $record['name_value_list']['institute_info_update']['value']);
                $this->addXMLElement($xmlWriter, 'institute_comment', $record['name_value_list']['institute_comment']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseLinkPersonIntitute(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('link_person_institute');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'person_institute_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'institute_id', $this->getRelatedModuleID(LINK_PERSON_INSTITUTE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'olt_prsninslt_institution', 'name'));
                $this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(LINK_PERSON_INSTITUTE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'olt_prsninslnk_plt_person', 'name'));
                $this->addXMLElement($xmlWriter, 'is_active', $record['name_value_list']['is_active']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseAddress(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('address');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'address_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(ADDRESS_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_person_ltt_address', 'name'));
                $this->addXMLElement($xmlWriter, 'institute_id', $this->getRelatedModuleID(ADDRESS_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'olt_instituon_ltt_address', 'name'));
                $this->addXMLElement($xmlWriter, 'provider_id', $this->getRelatedModuleID(ADDRESS_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'olt_provider_ltt_address', 'name'));
                $this->addXMLElement($xmlWriter, 'du_id', $this->getRelatedModuleID(ADDRESS_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_person_ltt_address', 'name'));
                $this->addXMLElement($xmlWriter, 'address_rank', $record['name_value_list']['address_rank']['value']);
                $this->addXMLElement($xmlWriter, 'address_rank_oth', $record['name_value_list']['address_rank_oth']['value']);
                $this->addXMLElement($xmlWriter, 'address_info_source', $record['name_value_list']['address_info_source']['value']);
                $this->addXMLElement($xmlWriter, 'address_info_source_oth', $record['name_value_list']['address_info_source_oth']['value']);
                $this->addXMLElement($xmlWriter, 'address_info_mode', $record['name_value_list']['address_info_mode']['value']);
                $this->addXMLElement($xmlWriter, 'address_info_mode_oth', $record['name_value_list']['address_info_mode_oth']['value']);
                $this->addXMLElement($xmlWriter, 'address_info_date', $record['name_value_list']['address_info_date']['value']);
                $this->addXMLElement($xmlWriter, 'address_info_update', $record['name_value_list']['address_info_update']['value']);
                $this->addXMLElement($xmlWriter, 'address_start_date', $record['name_value_list']['address_start_date']['value']);
                $this->addXMLElement($xmlWriter, 'address_end_date', $record['name_value_list']['address_end_date']['value']);
                $this->addXMLElement($xmlWriter, 'address_type', $record['name_value_list']['address_type']['value']);
                $this->addXMLElement($xmlWriter, 'address_type_oth', $record['name_value_list']['address_type_oth']['value']);
                $this->addXMLElement($xmlWriter, 'address_description', $record['name_value_list']['address_description']['value']);
                $this->addXMLElement($xmlWriter, 'address_description_oth', $record['name_value_list']['address_description_oth']['value']);
                $this->addXMLElement($xmlWriter, 'address_1', $record['name_value_list']['address_1']['value']);
                $this->addXMLElement($xmlWriter, 'address_2', $record['name_value_list']['address_2']['value']);
                $this->addXMLElement($xmlWriter, 'unit', $record['name_value_list']['unit']['value']);
                $this->addXMLElement($xmlWriter, 'city', $record['name_value_list']['city']['value']);
                $this->addXMLElement($xmlWriter, 'state', $record['name_value_list']['state']['value']);
                $this->addXMLElement($xmlWriter, 'zip', $record['name_value_list']['zip']['value']);
                $this->addXMLElement($xmlWriter, 'zip4', $record['name_value_list']['zip4']['value']);
                $this->addXMLElement($xmlWriter, 'address_comment', $record['name_value_list']['address_comment']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseTelephone(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('telephone');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'phone_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(TELEPHONE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_person_ltt_telephone', 'name'));
                $this->addXMLElement($xmlWriter, 'institute_id', $this->getRelatedModuleID(TELEPHONE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'olt_institu_ltt_telephone', 'name'));
                $this->addXMLElement($xmlWriter, 'provider_id', $this->getRelatedModuleID(TELEPHONE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'olt_provide_ltt_telephone', 'name'));
                $this->addXMLElement($xmlWriter, 'phone_info_source', $record['name_value_list']['phone_info_source']['value']);
                $this->addXMLElement($xmlWriter, 'phone_info_source_oth', $record['name_value_list']['phone_info_source_oth']['value']);
                $this->addXMLElement($xmlWriter, 'phone_info_date', $record['name_value_list']['phone_info_date']['value']);
                $this->addXMLElement($xmlWriter, 'phone_info_update', $record['name_value_list']['phone_info_update']['value']);
                $this->addXMLElement($xmlWriter, 'phone_nbr', $record['name_value_list']['phone_nbr']['value']);
                $this->addXMLElement($xmlWriter, 'phone_ext', $record['name_value_list']['phone_ext']['value']);
                $this->addXMLElement($xmlWriter, 'phone_type', $record['name_value_list']['phone_type']['value']);
                $this->addXMLElement($xmlWriter, 'phone_type_oth', $record['name_value_list']['phone_type_oth']['value']);
                $this->addXMLElement($xmlWriter, 'phone_rank', $record['name_value_list']['phone_rank']['value']);
                $this->addXMLElement($xmlWriter, 'phone_rank_oth', $record['name_value_list']['phone_rank_oth']['value']);
                $this->addXMLElement($xmlWriter, 'phone_landline', $record['name_value_list']['phone_landline']['value']);
                $this->addXMLElement($xmlWriter, 'phone_share', $record['name_value_list']['phone_share']['value']);
                $this->addXMLElement($xmlWriter, 'cell_permission', $record['name_value_list']['cell_permission']['value']);
                $this->addXMLElement($xmlWriter, 'text_permission', $record['name_value_list']['text_permission']['value']);
                $this->addXMLElement($xmlWriter, 'phone_comment', $record['name_value_list']['phone_comment']['value']);
                $this->addXMLElement($xmlWriter, 'phone_start_date', $record['name_value_list']['phone_start_date']['value']);
                $this->addXMLElement($xmlWriter, 'phone_end_date', $record['name_value_list']['phone_end_date']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseEmail(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('email');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'email_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(EMAIL_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_person_ltt_email', 'name'));
                $this->addXMLElement($xmlWriter, 'institute_id', $this->getRelatedModuleID(EMAIL_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'olt_institution_ltt_email', 'name'));
                $this->addXMLElement($xmlWriter, 'provider_id', $this->getRelatedModuleID(EMAIL_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'olt_provider_ltt_email', 'name'));
                $this->addXMLElement($xmlWriter, 'email', $record['name_value_list']['email']['value']);
                $this->addXMLElement($xmlWriter, 'email_rank', $record['name_value_list']['email_rank']['value']);
                $this->addXMLElement($xmlWriter, 'email_rank_oth', $record['name_value_list']['email_rank_oth']['value']);
                $this->addXMLElement($xmlWriter, 'email_info_source', $record['name_value_list']['email_info_source']['value']);
                $this->addXMLElement($xmlWriter, 'email_info_source_oth', $record['name_value_list']['email_info_source_oth']['value']);
                $this->addXMLElement($xmlWriter, 'email_info_date', $record['name_value_list']['email_info_date']['value']);
                $this->addXMLElement($xmlWriter, 'email_info_update', $record['name_value_list']['email_info_update']['value']);
                $this->addXMLElement($xmlWriter, 'email_type', $record['name_value_list']['email_type']['value']);
                $this->addXMLElement($xmlWriter, 'email_type_oth', $record['name_value_list']['email_type_oth']['value']);
                $this->addXMLElement($xmlWriter, 'email_share', $record['name_value_list']['email_share']['value']);
                $this->addXMLElement($xmlWriter, 'email_active', $record['name_value_list']['email_active']['value']);
                $this->addXMLElement($xmlWriter, 'email_comment', $record['name_value_list']['email_comment']['value']);
                $this->addXMLElement($xmlWriter, 'email_start_date', $record['name_value_list']['email_start_date']['value']);
                $this->addXMLElement($xmlWriter, 'email_end_date', $record['name_value_list']['email_end_date']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
    
    function parseEvent(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('event');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'event_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'participant_id', $this->getRelatedModuleID(EVENT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_eventlt_participant', 'name'));
                $this->addXMLElement($xmlWriter, 'event_type', str_replace("_", "-", $record['name_value_list']['psevent_typeu_id']['value']));
                $this->addXMLElement($xmlWriter, 'event_type_oth', $record['name_value_list']['event_type_oth']['value']);
                $this->addXMLElement($xmlWriter, 'event_repeat_key', $record['name_value_list']['event_repeat_key']['value']);
                $this->addXMLElement($xmlWriter, 'event_disp', $record['name_value_list']['event_disp']['value']);
                $this->addXMLElement($xmlWriter, 'event_disp_cat', $record['name_value_list']['event_disp_cat']['value']);
                $this->addXMLElement($xmlWriter, 'event_start_date', $record['name_value_list']['event_start_date']['value']);
                $start_time = preg_split('/[ ]/', $record['name_value_list']['event_start_time']['value']);
                $this->addXMLElement($xmlWriter, 'event_start_time', $start_time[1]);
                $this->addXMLElement($xmlWriter, 'event_end_date', $record['name_value_list']['event_end_date']['value']);
                $end_time = preg_split('/[ ]/', $record['name_value_list']['event_end_time']['value']);
                $this->addXMLElement($xmlWriter, 'event_end_time', $end_time[1]);
                $this->addXMLElement($xmlWriter, 'event_breakoff', $record['name_value_list']['event_breakoff']['value']);
                $this->addXMLElement($xmlWriter, 'event_incentive_type', $record['name_value_list']['event_incentive_type']['value']);
                $this->addXMLElement($xmlWriter, 'event_incent_cash', $record['name_value_list']['event_incent_cash']['value']);
                $this->addXMLElement($xmlWriter, 'event_incent_noncash', $record['name_value_list']['event_incent_noncash']['value']);
                $this->addXMLElement($xmlWriter, 'event_comment', $record['name_value_list']['event_comment']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
	//***************************** 
	function parseInstrument(&$xmlWriter, $results)
	{
		foreach ($results['entry_list'] as $record) {
			$xmlWriter->startElement('instrument');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'instrument_id', $record['name_value_list']['name']['value']);
				$this->addXMLElement($xmlWriter, 'event_id', $this->getRelatedModuleID(INSTRUMENT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_eventinfo_ncsdc_instrument', 'name'));
				$this->addXMLElement($xmlWriter, 'instrument_type', $record['name_value_list']['instrument_type']['value']);
				$this->addXMLElement($xmlWriter, 'instrument_type_oth', $record['name_value_list']['instrument_type_oth']['value']);
				$this->addXMLElement($xmlWriter, 'instrument_version', $record['name_value_list']['instrument_version']['value']);
				$this->addXMLElement($xmlWriter, 'instrument_repeat_key', $record['name_value_list']['instrument_repeat_key']['value']);
				$ins_start_time = preg_split('/[ ]/', $record['name_value_list']['ins_start_time']['value']);
                $this->addXMLElement($xmlWriter, 'ins_start_time', $ins_start_time[1]);
				$ins_end_time = preg_split('/[ ]/', $record['name_value_list']['ins_end_time']['value']);
                $this->addXMLElement($xmlWriter, 'ins_end_time', $ins_end_time[1]);
                $this->addXMLElement($xmlWriter, 'ins_date_start', $record['name_value_list']['ins_date_start']['value']);
				$this->addXMLElement($xmlWriter, 'ins_date_end', $record['name_value_list']['ins_date_end']['value']);
				$this->addXMLElement($xmlWriter, 'ins_breakoff', $record['name_value_list']['ins_breakoff']['value']);
				$this->addXMLElement($xmlWriter, 'ins_status', $record['name_value_list']['ins_status']['value']);
				$this->addXMLElement($xmlWriter, 'ins_mode', $record['name_value_list']['ins_mode']['value']);
				$this->addXMLElement($xmlWriter, 'ins_mode_oth', $record['name_value_list']['ins_mode_oth']['value']);
				$this->addXMLElement($xmlWriter, 'ins_method', $record['name_value_list']['ins_method']['value']);
				$this->addXMLElement($xmlWriter, 'sup_review', $record['name_value_list']['sup_review']['value']);
				$this->addXMLElement($xmlWriter, 'data_problem', $record['name_value_list']['data_problem']['value']);
				$this->addXMLElement($xmlWriter, 'instru_comment', $record['name_value_list']['instru_comment']['value']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
	}
	
	function parseContact(&$xmlWriter, $results)
	{
		foreach ($results['entry_list'] as $record) {
			$xmlWriter->startElement('contact');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'contact_id', $record['name_value_list']['name']['value']);
				$this->addXMLElement($xmlWriter, 'contact_disp', $record['name_value_list']['contact_disp']['value']);
				$this->addXMLElement($xmlWriter, 'contact_type', $record['name_value_list']['contact_type']['value']);
				$this->addXMLElement($xmlWriter, 'contact_type_oth', $record['name_value_list']['contact_type_oth']['value']);
				$this->addXMLElement($xmlWriter, 'contact_date', $record['name_value_list']['contact_date']['value']);
				$contact_start_time = preg_split('/[ ]/', $record['name_value_list']['contact_start_time']['value']);
                $this->addXMLElement($xmlWriter, 'contact_start_time', $contact_start_time[1]);
				$contact_end_time = preg_split('/[ ]/', $record['name_value_list']['contact_end_time']['value']);
                $this->addXMLElement($xmlWriter, 'contact_end_time', $contact_end_time[1]);
                $this->addXMLElement($xmlWriter, 'contact_lang', $record['name_value_list']['contact_lang']['value']);
				$this->addXMLElement($xmlWriter, 'contact_lang_oth', $record['name_value_list']['contact_lang_oth']['value']);
				$this->addXMLElement($xmlWriter, 'contact_interpret', $record['name_value_list']['contact_interpret']['value']);
				$this->addXMLElement($xmlWriter, 'contact_interpret_oth', $record['name_value_list']['contact_interpret_oth']['value']);
				$this->addXMLElement($xmlWriter, 'contact_location', $record['name_value_list']['contact_location']['value']);
				$this->addXMLElement($xmlWriter, 'contact_location_oth', $record['name_value_list']['contact_location_oth']['value']);
				$this->addXMLElement($xmlWriter, 'contact_private', $record['name_value_list']['contact_private']['value']);
				$this->addXMLElement($xmlWriter, 'contact_private_detail', $record['name_value_list']['contact_private_detail']['value']);
				$this->addXMLElement($xmlWriter, 'contact_distance', $record['name_value_list']['contact_distance']['value']);
				$this->addXMLElement($xmlWriter, 'who_contacted', $record['name_value_list']['who_contacted']['value']);
				$this->addXMLElement($xmlWriter, 'who_contact_oth', $record['name_value_list']['who_contact_oth']['value']);
				$this->addXMLElement($xmlWriter, 'contact_comment', $record['name_value_list']['contact_comment']['value']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
	}
	
	function parseContactLinking(&$xmlWriter, $results)
	{
		foreach ($results['entry_list'] as $record) {
			$xmlWriter->startElement('link_contact');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'contact_link_id', $record['name_value_list']['name']['value']);
				$this->addXMLElement($xmlWriter, 'contact_id', $this->getRelatedModuleID(LINK_CONTACT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_cntlnk_ncsdc_cntctinfo', 'name'));
				$this->addXMLElement($xmlWriter, 'event_id', $this->getRelatedModuleID(LINK_CONTACT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_cntlnk_ncsdc_eventinfo', 'name'));
				$this->addXMLElement($xmlWriter, 'instrument_id', $this->getRelatedModuleID(LINK_CONTACT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_cntlnk_ncsdc_instrument', 'name'));
				$this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(LINK_CONTACT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_cntlnk_st_staffrstr', 'name'));
				$this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(LINK_CONTACT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_cntlnk_plt_person', 'name'));
				$this->addXMLElement($xmlWriter, 'provider_id', $this->getRelatedModuleID(LINK_CONTACT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_cntlnk_olt_provider', 'name'));
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
	}
	
	function parseNonInterviewReprt(&$xmlWriter, $results)
	{
		foreach ($results['entry_list'] as $record) {
			$xmlWriter->startElement('non_interview_rpt');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'nir_id', $record['name_value_list']['name']['value']);
				$this->addXMLElement($xmlWriter, 'contact_id', $this->getRelatedModuleID(NON_INTERVIEW_RPT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_cntctinfo_ncsdc_noninterrpt', 'name'));
				$this->addXMLElement($xmlWriter, 'nir', $record['name_value_list']['nir']['value']);
				$this->addXMLElement($xmlWriter, 'du_id', $this->getRelatedModuleID(NON_INTERVIEW_RPT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_noninterrpt_gt_dwellingunt', 'name'));
				$this->addXMLElement($xmlWriter, 'person_id', $this->getRelatedModuleID(NON_INTERVIEW_RPT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_noninterrpt_plt_person', 'name'));
				$this->addXMLElement($xmlWriter, 'nir_vac_info', $record['name_value_list']['nir_vac_info']['value']);
				$this->addXMLElement($xmlWriter, 'nir_vac_info_oth', $record['name_value_list']['nir_vac_info_oth']['value']);
				$this->addXMLElement($xmlWriter, 'nir_noaccess', $record['name_value_list']['nir_noaccess']['value']);
				$this->addXMLElement($xmlWriter, 'nir_noaccess_oth', $record['name_value_list']['nir_noaccess_oth']['value']);
				$this->addXMLElement($xmlWriter, 'nir_access_attempt', $record['name_value_list']['nir_access_attempt']['value']);
				$this->addXMLElement($xmlWriter, 'nir_access_attempt_oth', $record['name_value_list']['nir_access_attempt_oth']['value']);
				$this->addXMLElement($xmlWriter, 'nir_type_person', $record['name_value_list']['nir_type_person']['value']);
				$this->addXMLElement($xmlWriter, 'nir_type_person_oth', $record['name_value_list']['nir_type_person_oth']['value']);
				$this->addXMLElement($xmlWriter, 'cog_inform_relation', $record['name_value_list']['cog_inform_relation']['value']);
				$this->addXMLElement($xmlWriter, 'cog_inform_relation_oth', $record['name_value_list']['cog_inform_relation_oth']['value']);
				$this->addXMLElement($xmlWriter, 'cog_dis_desc', $record['name_value_list']['cog_dis_desc']['value']);
				$this->addXMLElement($xmlWriter, 'perm_disability', $record['name_value_list']['perm_disability']['value']);
				$this->addXMLElement($xmlWriter, 'deceased_inform_relation', $record['name_value_list']['deceased_inform_relation']['value']);
				$this->addXMLElement($xmlWriter, 'deceased_inform_oth', $record['name_value_list']['deceased_inform_oth']['value']);
				$this->addXMLElement($xmlWriter, 'yod', $record['name_value_list']['yod']['value']);
				$this->addXMLElement($xmlWriter, 'state_death', $record['name_value_list']['state_death']['value']);
				$this->addXMLElement($xmlWriter, 'who_refused', $record['name_value_list']['who_refused']['value']);
				$this->addXMLElement($xmlWriter, 'who_refused_oth', $record['name_value_list']['who_refused_oth']['value']);
				$this->addXMLElement($xmlWriter, 'refuser_strength', $record['name_value_list']['refuser_strength']['value']);
				$this->addXMLElement($xmlWriter, 'ref_action', $record['name_value_list']['ref_action']['value']);
				$this->addXMLElement($xmlWriter, 'lt_illness_desc', $record['name_value_list']['lt_illness_desc']['value']);
				$this->addXMLElement($xmlWriter, 'perm_ltr', $record['name_value_list']['perm_ltr']['value']);
				$this->addXMLElement($xmlWriter, 'reason_unavail', $record['name_value_list']['reason_unavail']['value']);
				$this->addXMLElement($xmlWriter, 'reason_unavail_oth', $record['name_value_list']['reason_unavail_oth']['value']);
				$this->addXMLElement($xmlWriter, 'date_available', $record['name_value_list']['date_available']['value']);
				$this->addXMLElement($xmlWriter, 'date_moved', $record['name_value_list']['date_moved']['value']);
				$this->addXMLElement($xmlWriter, 'moved_length_time', $record['name_value_list']['moved_length_time']['value']);
				$this->addXMLElement($xmlWriter, 'moved_unit', $record['name_value_list']['moved_unit']['value']);
				$this->addXMLElement($xmlWriter, 'moved_inform_relation', $record['name_value_list']['moved_inform_relation']['value']);
				$this->addXMLElement($xmlWriter, 'moved_relation_oth', $record['name_value_list']['moved_relation_oth']['value']);
				$this->addXMLElement($xmlWriter, 'nir_other', $record['name_value_list']['nir_other']['value']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
	}
	
	function parseNIRVacant(&$xmlWriter, $results)
	{
		foreach ($results['entry_list'] as $record) {
			$xmlWriter->startElement('non_interview_rpt_vacant');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'nir_vacant_id', $record['name_value_list']['name']['value']);
				$this->addXMLElement($xmlWriter, 'nir_id', $this->getRelatedModuleID(NON_INTERVIEW_RPT_VACANT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_noninterrpt_ncsdc_nintrptvcnt', 'name'));
				$this->addXMLElement($xmlWriter, 'nir_vacant', $record['name_value_list']['nir_vacant']['value']);
				$this->addXMLElement($xmlWriter, 'nir_vacant_oth', $record['name_value_list']['nir_vacant_oth']['value']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
	}
	
	function parseNIRNoAccess(&$xmlWriter, $results)
	{
		foreach ($results['entry_list'] as $record) {
			$xmlWriter->startElement('non_interview_rpt_noaccess');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'nir_noaccess_id', $record['name_value_list']['name']['value']);
				$this->addXMLElement($xmlWriter, 'nir_id', $this->getRelatedModuleID(NON_INTERVIEW_RPT_NOACCESS_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_noninterrpt_ncsdc_nirnaccmlts', 'name'));
				$this->addXMLElement($xmlWriter, 'nir_noaccess', str_replace("_", "-", $record['name_value_list']['nir_noaccess']['value']));
				$this->addXMLElement($xmlWriter, 'nir_noaccess_oth', $record['name_value_list']['nir_noaccess_oth']['value']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
	}
	
	function parseNIRRefusal(&$xmlWriter, $results)
	{
		foreach ($results['entry_list'] as $record) {
			$xmlWriter->startElement('non_interview_rpt_refusal');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'nir_refusal_id', $record['name_value_list']['name']['value']);
				$this->addXMLElement($xmlWriter, 'nir_id', $this->getRelatedModuleID(NON_INTERVIEW_RPT_REFUSAL_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_noninterrpt_ncsdc_nirrfsmlts', 'name'));
				$this->addXMLElement($xmlWriter, 'refusal_reason', $record['name_value_list']['refusal_reason']['value']);
				$this->addXMLElement($xmlWriter, 'refusal_reason_oth', $record['name_value_list']['refusal_reason_oth']['value']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
	}
	
	function parseNIRDuType(&$xmlWriter, $results)
	{
		foreach ($results['entry_list'] as $record) {
			$xmlWriter->startElement('non_interview_rpt_dutype');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'nir_dutype_id', $record['name_value_list']['name']['value']);
				$this->addXMLElement($xmlWriter, 'nir_id', $this->getRelatedModuleID(NON_INTERVIEW_RPT_DUTYPE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_noninterrpt_ncsdc_nirdutpmlts', 'name'));
				$this->addXMLElement($xmlWriter, 'nir_type_du', $record['name_value_list']['nir_type_du']['value']);
				$this->addXMLElement($xmlWriter, 'nir_type_du_oth', $record['name_value_list']['nir_type_du_oth']['value']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
	}
	
	function parseIncident(&$xmlWriter, $results)
	{
		foreach ($results['entry_list'] as $record) {
			$xmlWriter->startElement('incident');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'incident_id', $record['name_value_list']['name']['value']);
				$this->addXMLElement($xmlWriter, 'incident_date', $record['name_value_list']['incident_date']['value']);
				$incident_time = preg_split('/[ ]/', $record['name_value_list']['incident_time']['value']);
				$this->addXMLElement($xmlWriter, 'incident_time', $incident_time[1]);
				$this->addXMLElement($xmlWriter, 'inc_report_date', $record['name_value_list']['inc_report_date']['value']);
				$inc_report_time = preg_split('/[ ]/', $record['name_value_list']['inc_report_time']['value']);
				$this->addXMLElement($xmlWriter, 'inc_report_time', $inc_report_time[1]);
				$this->addXMLElement($xmlWriter, 'inc_staff_reporter_id', $this->getRelatedModuleID(INCIDENT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_incident_st_staffrstr', 'name'));
				$this->addXMLElement($xmlWriter, 'inc_staff_supervisor_id', $this->getRelatedModuleID(INCIDENT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_incident_st_staffrstr', 'name'));
				$this->addXMLElement($xmlWriter, 'inc_recip_is_participant', $this->getRelatedModuleID(INCIDENT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_incident_plt_participant', 'name'));
				$this->addXMLElement($xmlWriter, 'inc_recip_is_du', $this->getRelatedModuleID(INCIDENT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_incident_gt_dwellingunt', 'name'));
				$this->addXMLElement($xmlWriter, 'inc_recip_is_staff', $this->getRelatedModuleID(INCIDENT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_incident_st_staffrstr', 'name'));
				$this->addXMLElement($xmlWriter, 'inc_recip_is_family', $this->getRelatedModuleID(INCIDENT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_incident_plt_person', 'name'));
				$this->addXMLElement($xmlWriter, 'inc_recip_is_acquaintance', $this->getRelatedModuleID(INCIDENT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_incident_plt_person', 'name'));
				$this->addXMLElement($xmlWriter, 'inc_recip_is_other', $record['name_value_list']['inc_recip_is_other']['value']);
				$this->addXMLElement($xmlWriter, 'inc_contact_person', $this->getRelatedModuleID(INCIDENT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_incident_plt_person', 'name'));
				$this->addXMLElement($xmlWriter, 'inctype', $record['name_value_list']['inctype']['value']);
				$this->addXMLElement($xmlWriter, 'inctype_oth', $record['name_value_list']['inctype_oth']['value']);
				$this->addXMLElement($xmlWriter, 'incloss_cmptr_model', $record['name_value_list']['incloss_cmptr_model']['value']);
				$this->addXMLElement($xmlWriter, 'incloss_cmptr_sn', $record['name_value_list']['incloss_cmptr_sn']['value']);
				$this->addXMLElement($xmlWriter, 'incloss_cmptr_decal', $record['name_value_list']['incloss_cmptr_decal']['value']);
				$this->addXMLElement($xmlWriter, 'incloss_rem_media', $record['name_value_list']['incloss_rem_media']['value']);
				$this->addXMLElement($xmlWriter, 'incloss_paper', $record['name_value_list']['incloss_paper']['value']);
				$this->addXMLElement($xmlWriter, 'incloss_oth', $record['name_value_list']['incloss_oth']['value']);
				$this->addXMLElement($xmlWriter, 'inc_description', $record['name_value_list']['inc_description']['value']);
				$this->addXMLElement($xmlWriter, 'inc_action', $record['name_value_list']['inc_action']['value']);
				$this->addXMLElement($xmlWriter, 'inc_reported', $record['name_value_list']['inc_reported']['value']);
				$this->addXMLElement($xmlWriter, 'contact_id', $this->getRelatedModuleID(INCIDENT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_cntctinfo_ncsdc_incident', 'name'));
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
	}
	
	function parseIncidentMedia(&$xmlWriter, $results)
	{
		foreach ($results['entry_list'] as $record) {
			$xmlWriter->startElement('incident_media');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'incident_media_id', $record['name_value_list']['name']['value']);
				$this->addXMLElement($xmlWriter, 'incident_id', $this->getRelatedModuleID(INCIDENT_MEDIA_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_incident_ncsdc_incmedmults', 'name'));
				$this->addXMLElement($xmlWriter, 'incloss_media', $record['name_value_list']['incloss_media']['value']);
				$this->addXMLElement($xmlWriter, 'incloss_media_oth', $record['name_value_list']['incloss_media_oth']['value']);
				$this->addXMLElement($xmlWriter, 'inssev', $record['name_value_list']['inssev']['value']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
	}
	
	function parseIncidentUnanticipated(&$xmlWriter, $results)
	{
		foreach ($results['entry_list'] as $record) {
			$xmlWriter->startElement('incident_unanticipated');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'inc_unanticipated_id', $record['name_value_list']['name']['value']);
				$this->addXMLElement($xmlWriter, 'incident_id', $this->getRelatedModuleID(INCIDENT_UNANTICIPATED_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_incident_ncsdc_incunatmlts', 'name'));
				$this->addXMLElement($xmlWriter, 'inc_unanticipated', $record['name_value_list']['inc_unanticipated']['value']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
	}
	
	//*****************************
    
	// *************** 2.0 MODULES INSERTED ******************
	function parseSPECEquipment(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('spec_equipment');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'spsc_id', $this->getRelatedModuleID(SPEC_EUIPMENT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_specequip_samp_spscinfo', 'name'));
		$this->addXMLElement($xmlWriter, 'equip_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'equipment_type', $record['name_value_list']['equipment_type']['value']);
                $this->addXMLElement($xmlWriter, 'equipment_type_oth', $record['name_value_list']['equipment_type_oth']['value']);
                $this->addXMLElement($xmlWriter, 'serial_no', $record['name_value_list']['serial_no']['value']);
                $this->addXMLElement($xmlWriter, 'government_asset_tag_no', $record['name_value_list']['government_asset_tag_no']['value']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
	function parseSpecimenPickup(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('spec_pickup');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'spsc_id', $this->getRelatedModuleID(SPECIMEN_PICKUP_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_specpickup_samp_spscinfo', 'name'));
		$this->addXMLElement($xmlWriter, 'specimen_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'event_id', $this->getRelatedModuleID(SPECIMEN_PICKUP_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_specpickup_ncsdc_eventinfo', 'name'));
                $this->addXMLElement($xmlWriter, 'instrument_id', $this->getRelatedModuleID(SPECIMEN_PICKUP_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_specpickup_ncsdc_instrument', 'name'));
                $this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(SPECIMEN_PICKUP_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_specpickup_st_staffrstr', 'name'));
		$this->addXMLElement($xmlWriter, 'specimen_pickup_dt', $record['name_value_list']['specimen_pickup_dt']['value']);
                $this->addXMLElement($xmlWriter, 'specimen_pickup_comment', $record['name_value_list']['specimen_pickup_comment']['value']);
                $this->addXMLElement($xmlWriter, 'specimen_pickup_cmt_oth', $record['name_value_list']['specimen_pickup_cmt_oth']['value']);
                $this->addXMLElement($xmlWriter, 'specimen_trans_temp', $record['name_value_list']['specimen_trans_temp']['value']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
	function parseSpecimenReceipt(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('spec_receipt');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'specimen_id', $record['name_value_list']['name']['value']);
		$this->addXMLElement($xmlWriter, 'spsc_id', $this->getRelatedModuleID(SPECIMEN_RECEIPT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_specreceipt_samp_spscinfo', 'name'));
		$this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(SPECIMEN_RECEIPT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_specreceipt_st_staffrstr', 'name'));
                $this->addXMLElement($xmlWriter, 'receipt_comment', $record['name_value_list']['receipt_comment']['value']);
                $this->addXMLElement($xmlWriter, 'receipt_comment_oth', $record['name_value_list']['receipt_comment_oth']['value']);
                $this->addXMLElement($xmlWriter, 'receipt_dt', $record['name_value_list']['receipt_dt']['value']);
                $this->addXMLElement($xmlWriter, 'cooler_temp', $record['name_value_list']['cooler_temp']['value']);
		$this->addXMLElement($xmlWriter, 'monitor_status', $record['name_value_list']['monitor_status']['value']);
                $this->addXMLElement($xmlWriter, 'upper_trigger', $record['name_value_list']['upper_trigger']['value']);
                $this->addXMLElement($xmlWriter, 'upper_trigger_lvl', $record['name_value_list']['upper_trigger_lvl']['value']);
                $this->addXMLElement($xmlWriter, 'lower_trigger_cold', $record['name_value_list']['lower_trigger_cold']['value']);
		$this->addXMLElement($xmlWriter, 'lower_trigger_ambient', $record['name_value_list']['lower_trigger_ambient']['value']);
                $this->addXMLElement($xmlWriter, 'storage_container_id', $this->getRelatedModuleID(SPECIMEN_RECEIPT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_specreceipt_samp_specstorage', 'name'));
		$this->addXMLElement($xmlWriter, 'centrifuge_comment', $record['name_value_list']['centrifuge_comment']['value']);
                $this->addXMLElement($xmlWriter, 'centrifuge_comment_oth', $record['name_value_list']['centrifuge_comment_oth']['value']);
		$this->addXMLElement($xmlWriter, 'centrifuge_st', $record['name_value_list']['centrifuge_st']['value']);
                $this->addXMLElement($xmlWriter, 'centrifuge_et', $record['name_value_list']['centrifuge_et']['value']);
		$this->addXMLElement($xmlWriter, 'centrifuge_staff_id', $record['name_value_list']['centrifuge_staff_id']['value']);
		$this->addXMLElement($xmlWriter, 'equip_id', $this->getRelatedModuleID(SPECIMEN_RECEIPT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_specreceipt_samp_specequip', 'name'));
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
	function parseSpecimenShipping(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('spec_shipping');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'storage_container_id', $record['name_value_list']['name']['value']);
		$this->addXMLElement($xmlWriter, 'spsc_id', $this->getRelatedModuleID(SPECIMEN_SHIPPING_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_specshippin_samp_spscinfo', 'name'));
		$this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(SPECIMEN_SHIPPING_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_specshippin_st_staffrstr', 'name'));
                $this->addXMLElement($xmlWriter, 'shipper_id', $this->getRelatedModuleID(SPECIMEN_SHIPPING_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_specshippin_samp_sampship', 'name'));
		$this->addXMLElement($xmlWriter, 'shipper_destination', $record['name_value_list']['shipper_destination']['value']);
                $this->addXMLElement($xmlWriter, 'shipment_date', $record['name_value_list']['shipment_date']['value']);
                $this->addXMLElement($xmlWriter, 'shipment_temperature', $record['name_value_list']['shipment_temperature']['value']);
                $this->addXMLElement($xmlWriter, 'shipment_tracking_no', $record['name_value_list']['shipment_tracking_no']['value']);
		$this->addXMLElement($xmlWriter, 'shipment_receipt_confirmed', $record['name_value_list']['shipment_receipt_confirmed']['value']);
                $this->addXMLElement($xmlWriter, 'shipment_receipt_dt', $record['name_value_list']['shipment_receipt_dt']['value']);
                $this->addXMLElement($xmlWriter, 'shipment_issues', $record['name_value_list']['shipment_issues']['value']);
                $this->addXMLElement($xmlWriter, 'shipment_issues_oth', $record['name_value_list']['shipment_issues_oth']['value']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
	function parseSpecimenStorage(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('spec_storage');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
		$this->addXMLElement($xmlWriter, 'spsc_id', $this->getRelatedModuleID(SPECIMEN_STORAGE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_specstorage_samp_spscinfo', 'name'));
		$this->addXMLElement($xmlWriter, 'storage_container_id', $record['name_value_list']['name']['value']);
		$this->addXMLElement($xmlWriter, 'placed_in_storage_dt', $record['name_value_list']['placed_in_storage_dt']['value']);
		$this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(SPECIMEN_STORAGE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_specstorage_st_staffrstr', 'name'));
		$this->addXMLElement($xmlWriter, 'equip_id', $this->getRelatedModuleID(SPECIMEN_STORAGE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_specstorage_samp_specequip', 'name'));
                $this->addXMLElement($xmlWriter, 'master_storage_unit', $record['name_value_list']['master_storage_unit']['value']);
                $this->addXMLElement($xmlWriter, 'storage_comment', $record['name_value_list']['storage_comment']['value']);
                $this->addXMLElement($xmlWriter, 'storage_comment_oth', $record['name_value_list']['storage_comment_oth']['value']);
                $this->addXMLElement($xmlWriter, 'removed_from_storage_dt', $record['name_value_list']['removed_from_storage_dt']['value']);
		$this->addXMLElement($xmlWriter, 'temp_event_st', $record['name_value_list']['temp_event_st']['value']);
                $this->addXMLElement($xmlWriter, 'temp_event_et', $record['name_value_list']['temp_event_et']['value']);
                $this->addXMLElement($xmlWriter, 'temp_event_low_temp', $record['name_value_list']['temp_event_low_temp']['value']);
                $this->addXMLElement($xmlWriter, 'temp_event_high_temp', $record['name_value_list']['temp_event_high_temp']['value']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
	}
	
	function parseSpecimenInfo(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('spec_spsc_info');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
		$this->addXMLElement($xmlWriter, 'spsc_id', $record['name_value_list']['name']['value']);
		$this->addXMLElement($xmlWriter, 'address_id', $this->getRelatedModuleID(SPECIMEN_INFO_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_spscinfo_ltt_address', 'name'));
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
	}
	
	function parseEnvironmentalEquipmentInformation(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('env_equipment');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
		$this->addXMLElement($xmlWriter, 'spsc_id', $this->getRelatedModuleID(ENVIRONMENTAL_EQUIPMENT_INFO_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_enequip_samp_srscinfo', 'name'));
		$this->addXMLElement($xmlWriter, 'equip_id', $record['name_value_list']['name']['value']);
		$this->addXMLElement($xmlWriter, 'equipment_type', $record['name_value_list']['equipment_type']['value']);
		$this->addXMLElement($xmlWriter, 'equipment_type_oth', $record['name_value_list']['equipment_type_oth']['value']);
                $this->addXMLElement($xmlWriter, 'serial_no', $record['name_value_list']['serial_no']['value']);
                $this->addXMLElement($xmlWriter, 'government_asset_tag_no', $record['name_value_list']['government_asset_tag_no']['value']);
                $this->addXMLElement($xmlWriter, 'retired_date', $record['name_value_list']['retired_date']['value']);
		$this->addXMLElement($xmlWriter, 'retired_reason', $record['name_value_list']['retired_reason']['value']);
                $this->addXMLElement($xmlWriter, 'retired_reason_oth', $record['name_value_list']['retired_reason_oth']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
	}
	
	function parseEnvironmentalEquipmentProblemLog(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('env_equipment_prob_log');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
		$this->addXMLElement($xmlWriter, 'spsc_id', $this->getRelatedModuleID(ENV_EQUIPMENT_PROBLEM_LOG_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_enlogequip_samp_srscinfo', 'name'));
		$this->addXMLElement($xmlWriter, 'equip_id', $this->getRelatedModuleID(ENV_EQUIPMENT_PROBLEM_LOG_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_enlogequip_samp_enequip', 'name'));
		$this->addXMLElement($xmlWriter, 'problem_id', $record['name_value_list']['name']['value']);
		$this->addXMLElement($xmlWriter, 'equipment_type', $record['name_value_list']['equipment_type']['value']);
		$this->addXMLElement($xmlWriter, 'equipment_type_oth', $record['name_value_list']['equipment_type_oth']['value']);
               	$this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(ENV_EQUIPMENT_PROBLEM_LOG_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_enlogequip_st_staffrstr', 'name'));
                $this->addXMLElement($xmlWriter, 'problem_dt', $record['name_value_list']['problem_dt']['value']);
                $this->addXMLElement($xmlWriter, 'equip_issue', $record['name_value_list']['equip_issue']['value']);
                $this->addXMLElement($xmlWriter, 'equip_action', $record['name_value_list']['equip_action']['value']);
		$this->addXMLElement($xmlWriter, 'staff_id_reviewer', $record['name_value_list']['staff_id_reviewer']['value']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
	}
	
	function parseParticipantConsentSample(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('participant_consent_sample');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'p_id', $this->getRelatedModuleID(PARTICIPANT_CONSENT_SAMPLE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_partsampcon_plt_participant', 'name'));
				$this->addXMLElement($xmlWriter, 'participant_consent_id', $this->getRelatedModuleID(PARTICIPANT_CONSENT_SAMPLE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_partsampcon_plt_prtcptcnsnt', 'name'));
				$this->addXMLElement($xmlWriter, 'participant_consent_sample_id', $record['name_value_list']['name']['value']);
				$this->addXMLElement($xmlWriter, 'sample_consent_type', $record['name_value_list']['sample_consent_type']['value']);
				$this->addXMLElement($xmlWriter, 'sample_consent_given', $record['name_value_list']['sample_consent_given']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
	}
	
	function parseParticipantRecordVisit(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('participant_rvis');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'rvis_id', $record['name_value_list']['name']['value']);
				$this->addXMLElement($xmlWriter, 'p_id', $this->getRelatedModuleID(PARTICIPANT_RECORD_VISIT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_partrvis_plt_participant', 'name'));
				$this->addXMLElement($xmlWriter, 'rvis_language', $record['name_value_list']['rvis_language']['value']);
				$this->addXMLElement($xmlWriter, 'rvis_language_oth', $record['name_value_list']['rvis_language_oth']['value']);
				$this->addXMLElement($xmlWriter, 'rvis_person', $record['name_value_list']['rvis_person']['value']);
				$this->addXMLElement($xmlWriter, 'rvis_who_consented', $record['name_value_list']['rvis_who_consented']['value']);
				$this->addXMLElement($xmlWriter, 'rvis_translate', $record['name_value_list']['rvis_translate']['value']);
				//$this->addXMLElement($xmlWriter, 'contact_id', $this->getRelatedModuleID(PARTICIPANT_RECORD_VISIT_SUGAR_MODULE, $record['name_value_list']['id']['value'], '???', 'name'));
                $this->addXMLElement($xmlWriter, 'time_stamp_1', $record['name_value_list']['time_stamp_1']['value']);
                $this->addXMLElement($xmlWriter, 'rvis_sections', $record['name_value_list']['rvis_sections']['value']);
                $this->addXMLElement($xmlWriter, 'rvis_during_interv', $record['name_value_list']['rvis_during_interv']['value']);
				$this->addXMLElement($xmlWriter, 'rvis_during_bio', $record['name_value_list']['rvis_during_bio']['value']);
                $this->addXMLElement($xmlWriter, 'rvis_bio_cord', $record['name_value_list']['rvis_bio_cord']['value']);
                $this->addXMLElement($xmlWriter, 'rvis_during_env', $record['name_value_list']['rvis_during_env']['value']);
				$this->addXMLElement($xmlWriter, 'rvis_during_thanks', $record['name_value_list']['rvis_during_thanks']['value']);
                $this->addXMLElement($xmlWriter, 'rvis_after_saq', $record['name_value_list']['rvis_after_saq']['value']);
                $this->addXMLElement($xmlWriter, 'rvis_reconsideration', $record['name_value_list']['rvis_reconsideration']['value']);
				$this->addXMLElement($xmlWriter, 'time_stamp_2', $record['name_value_list']['time_stamp_2']['value']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
	}
	
	function parseParticipantVisitConsent(&$xmlWriter, $results)
        {
            foreach ($results['entry_list'] as $record) {
                $xmlWriter->startElement('participant_vis_consent');
                    $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                    $this->addXMLElement($xmlWriter, 'pid_visit_consent_id', $record['name_value_list']['name']['value']);
                    $this->addXMLElement($xmlWriter, 'p_id', $this->getRelatedModuleID(PARTICIPANT_VIS_CONSENT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'plt_participant_plt_prtcptvstc', 'name'));
                    $this->addXMLElement($xmlWriter, 'vis_consent_type', $record['name_value_list']['vis_consent_type']['value']);
                    $this->addXMLElement($xmlWriter, 'vis_consent_response', $record['name_value_list']['vis_consent_response']['value']);
                    $this->addXMLElement($xmlWriter, 'vis_language', $record['name_value_list']['vis_language']['value']);
                    $this->addXMLElement($xmlWriter, 'vis_language_oth', $record['name_value_list']['vis_language_oth']['value']);
                    $this->addXMLElement($xmlWriter, 'vis_person_who_consented_id', $record['name_value_list']['vis_person_who_consented_id']['value']);
                    $this->addXMLElement($xmlWriter, 'vis_who_consented', $record['name_value_list']['vis_who_consented']['value']);
                    $this->addXMLElement($xmlWriter, 'vis_translate', $record['name_value_list']['vis_translate']['value']);
                    $this->addXMLElement($xmlWriter, 'vis_comments', $record['name_value_list']['vis_comments']['value']);
                    $this->addXMLElement($xmlWriter, 'contact_id', $this->getRelatedModuleID(PARTICIPANT_VIS_CONSENT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'ncsdc_cntctinfo_plt_prtcptvstc', 'name'));
                    $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
                $xmlWriter->endElement();
            }
        }
	
	function parsePrecisionThermometerCertification(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('prec_therm_cert');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'srsc_id', $this->getRelatedModuleID(PRECISION_THERMOMETER_CERT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_prethrmcert_samp_srscinfo', 'name'));
                $this->addXMLElement($xmlWriter, 'equip_id', $this->getRelatedModuleID(PRECISION_THERMOMETER_CERT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_prethrmcert_samp_enequip', 'name'));
                $this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(PRECISION_THERMOMETER_CERT_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_prethrmcert_st_staffrstr', 'name'));
		$this->addXMLElement($xmlWriter, 'certification_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'precision_cert_status', $record['name_value_list']['precision_cert_status']['value']);
                $this->addXMLElement($xmlWriter, 'certification_date', $record['name_value_list']['certification_date']['value']);
                $this->addXMLElement($xmlWriter, 'certification_expire_dt', $record['name_value_list']['certification_expire_dt']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
	function parseRefrigeratorFreezerVerification(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('ref_freezer_verification');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'srsc_id', $this->getRelatedModuleID(REFRIGERATOR_FREEZER_VER_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_reffreezver_samp_srscinfo', 'name'));
                $this->addXMLElement($xmlWriter, 'equip_id', $this->getRelatedModuleID(REFRIGERATOR_FREEZER_VER_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_reffreezver_samp_enequip', 'name'));
                $this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(REFRIGERATOR_FREEZER_VER_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_reffreezver_st_staffrstr', 'name'));
		$this->addXMLElement($xmlWriter, 'verification_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'verification_dt', $record['name_value_list']['verification_dt']['value']);
                $this->addXMLElement($xmlWriter, 'rf_thermometer_equip_id', $record['name_value_list']['rf_thermometer_equip_id']['value']); 
                $this->addXMLElement($xmlWriter, 'correction_factor_temp', $record['name_value_list']['correction_factor_temp']['value']);
                $this->addXMLElement($xmlWriter, 'current_temp', $record['name_value_list']['current_temp']['value']);
                $this->addXMLElement($xmlWriter, 'maximum_temp', $record['name_value_list']['maximum_temp']['value']);
                $this->addXMLElement($xmlWriter, 'minimum_temp', $record['name_value_list']['minimum_temp']['value']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
	function parseSampleReceiptStorage(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('sample_receipt_store');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'sample_id', $record['name_value_list']['name']['value']);
		$this->addXMLElement($xmlWriter, 'srsc_id', $this->getRelatedModuleID(SAMPLE_RECEIPT_STORAGE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_recstor_samp_srscinfo', 'name'));
                $this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(SAMPLE_RECEIPT_STORAGE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_recstor_st_staffrstr', 'name'));
                $this->addXMLElement($xmlWriter, 'sample_condition', $record['name_value_list']['sample_condition']['value']);
                $this->addXMLElement($xmlWriter, 'receipt_comment_oth', $record['name_value_list']['receipt_comment_oth']['value']); 
                $this->addXMLElement($xmlWriter, 'receipt_dt', $record['name_value_list']['receipt_dt']['value']);
		$this->addXMLElement($xmlWriter, 'cooler_temp_cond', $record['name_value_list']['cooler_temp_cond']['value']);
                $this->addXMLElement($xmlWriter, 'equip_id', $this->getRelatedModuleID(SAMPLE_RECEIPT_STORAGE_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_recstor_samp_enequip', 'name'));
		$this->addXMLElement($xmlWriter, 'placed_in_storage_dt', $record['name_value_list']['placed_in_storage_dt']['value']);
                $this->addXMLElement($xmlWriter, 'storage_compartment_area', $record['name_value_list']['storage_compartment_area']['value']);
                $this->addXMLElement($xmlWriter, 'storage_comment_oth', $record['name_value_list']['storage_comment_oth']['value']);
                $this->addXMLElement($xmlWriter, 'removed_from_storage_dt', $record['name_value_list']['removed_from_storage_dt']['value']);
                $this->addXMLElement($xmlWriter, 'temp_event_occurred', $record['name_value_list']['temp_event_occurred']['value']);
                $this->addXMLElement($xmlWriter, 'temp_event_action', $record['name_value_list']['temp_event_action']['value']);
                $this->addXMLElement($xmlWriter, 'temp_event_action_oth', $record['name_value_list']['temp_event_action_oth']['value']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
	function parseSampleShipping(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('sample_shipping');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'sample_id', $record['name_value_list']['name']['value']);
		$this->addXMLElement($xmlWriter, 'srsc_id', $this->getRelatedModuleID(SAMPLE_SHIPPING_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_sampship_samp_srscinfo', 'name'));
                $this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(SAMPLE_SHIPPING_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_sampship_st_staffrstr', 'name'));
                $this->addXMLElement($xmlWriter, 'shipper_id', $record['name_value_list']['shipper_id']['value']);
                $this->addXMLElement($xmlWriter, 'shipper_destination', $record['name_value_list']['shipper_destination']['value']); 
                $this->addXMLElement($xmlWriter, 'shipment_date', $record['name_value_list']['shipment_date']['value']);
                $this->addXMLElement($xmlWriter, 'shipment_coolant', $record['name_value_list']['shipment_coolant']['value']);
                $this->addXMLElement($xmlWriter, 'shipment_tracking_no', $record['name_value_list']['shipment_tracking_no']['value']);
                $this->addXMLElement($xmlWriter, 'shipment_issues_oth', $record['name_value_list']['shipment_issues_oth']['value']);
                $this->addXMLElement($xmlWriter, 'staff_id_track', $record['name_value_list']['staff_id_track']['value']);
                $this->addXMLElement($xmlWriter, 'sample_shipped_by', $record['name_value_list']['sample_shipped_by']['value']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
	function parseSrscInformation(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('srsc_info');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'srsc_id', $record['name_value_list']['name']['value']);
		$this->addXMLElement($xmlWriter, 'address_id', $this->getRelatedModuleID(SRSC_INFO_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_srscinfo_ltt_address', 'name'));
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
	function parseSubsampleDocument(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('subsample_doc');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'event_id', $this->getRelatedModuleID(SUBSAMPLE_DOC_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_subsampdoc_ncsdc_eventinfo', 'name'));
		$this->addXMLElement($xmlWriter, 'subsample_doc_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'random_order_no', $record['name_value_list']['random_order_no']['value']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
	function parseTRHMeterCalibration(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('trh_meter_calibration');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'srsc_id', $this->getRelatedModuleID(TRH_METER_CALIBRATION_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_trhmetercal_samp_srscinfo', 'name'));
                $this->addXMLElement($xmlWriter, 'equip_id', $this->getRelatedModuleID(TRH_METER_CALIBRATION_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_trhmetercal_samp_enequip', 'name'));
                $this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(TRH_METER_CALIBRATION_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_trhmetercal_st_staffrstr', 'name'));
		$this->addXMLElement($xmlWriter, 'calibration_id', $record['name_value_list']['name']['value']);
		$this->addXMLElement($xmlWriter, 'sample_condition', $record['name_value_list']['sample_condition']['value']);
                $this->addXMLElement($xmlWriter, 'calibration_expire_dt', $record['name_value_list']['calibration_expire_dt']['value']); 
                $this->addXMLElement($xmlWriter, 'verification_dt', $record['name_value_list']['verification_dt']['value']);
                $this->addXMLElement($xmlWriter, 'thr_equip_id', $record['name_value_list']['thr_equip_id']['value']);
                $this->addXMLElement($xmlWriter, 'precision_term_temp', $record['name_value_list']['precision_term_temp']['value']);
                $this->addXMLElement($xmlWriter, 'trh_temp', $record['name_value_list']['trh_temp']['value']);
                $this->addXMLElement($xmlWriter, 'salts_moist', $record['name_value_list']['salts_moist']['value']);
                $this->addXMLElement($xmlWriter, 's_33rh_reading', $record['name_value_list']['s_33rh_reading']['value']);
                $this->addXMLElement($xmlWriter, 's_75rh_reading', $record['name_value_list']['s_75rh_reading']['value']);
                $this->addXMLElement($xmlWriter, 's_33_rh_need_calib', $record['name_value_list']['s_33_rh_need_calib']['value']);
		$this->addXMLElement($xmlWriter, 's_75_rh_need_calib', $record['name_value_list']['s_75_rh_need_calib']['value']);
		$this->addXMLElement($xmlWriter, 's_33rh_reading_calib', $record['name_value_list']['s_33rh_reading_calib']['value']);
		$this->addXMLElement($xmlWriter, 's_75rh_reading_calib', $record['name_value_list']['s_75rh_reading_calib']['value']);
		$this->addXMLElement($xmlWriter, 'trh_calib_fail_rsn', $record['name_value_list']['trh_calib_fail_rsn']['value']);
		$this->addXMLElement($xmlWriter, 'trh_calib_fail_reas_other', $record['name_value_list']['trh_calib_fail_reas_other']['value']);
		$this->addXMLElement($xmlWriter, 'trh_calib_status', $record['name_value_list']['trh_calib_status']['value']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
	function parseDigitalRefrigeratorFreezerThermVerification(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('drf_therm_verification');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'srsc_id', $this->getRelatedModuleID(DRFT_THERM_VERIFICATION_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_drfthermver_samp_srscinfo', 'name'));
                $this->addXMLElement($xmlWriter, 'staff_id', $this->getRelatedModuleID(DRFT_THERM_VERIFICATION_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_drfthermver_st_staffrstr', 'name'));
		$this->addXMLElement($xmlWriter, 'drf_therm_verification_date', $record['name_value_list']['drf_therm_verification_date']['value']);
		$this->addXMLElement($xmlWriter, 'drf_verification_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'equip_id', $this->getRelatedModuleID(DRFT_THERM_VERIFICATION_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_drfthermver_samp_enequip', 'name'));
		$this->addXMLElement($xmlWriter, 'rf_thermometer_equip_id', $record['name_value_list']['rf_thermometer_equip_id']['value']);
                $this->addXMLElement($xmlWriter, 'certification_expire_dt', $record['name_value_list']['certification_expire_dt']['value']);
                $this->addXMLElement($xmlWriter, 'precision_term_temp', $record['name_value_list']['precision_term_temp']['value']);
                $this->addXMLElement($xmlWriter, 'rf_temp', $record['name_value_list']['rf_temp']['value']);
                $this->addXMLElement($xmlWriter, 'correction_factor_temp', $record['name_value_list']['correction_factor_temp']['value']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
    }
	
	function parseSampleReceiptConfirmation(&$xmlWriter, $results)
    {
        foreach ($results['entry_list'] as $record) {
            $xmlWriter->startElement('sample_receipt_confirm');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['name_value_list']['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'srsc_id', $this->getRelatedModuleID(SAMPLE_RECEIPT_CONFIRM_SUGAR_MODULE, $record['name_value_list']['id']['value'], 'samp_recconf_samp_srscinfo', 'name'));
		$this->addXMLElement($xmlWriter, 'shipment_receipt_confirmed', $record['name_value_list']['shipment_receipt_confirmed']['value']); 
                $this->addXMLElement($xmlWriter, 'shipper_id', $record['name_value_list']['shipper_id']['value']);
                $this->addXMLElement($xmlWriter, 'shipment_tracking_no', $record['name_value_list']['shipment_tracking_no']['value']);
                $this->addXMLElement($xmlWriter, 'shipment_receipt_dt', $record['name_value_list']['shipment_receipt_dt']['value']);
                $this->addXMLElement($xmlWriter, 'shipment_condition', $record['name_value_list']['shipment_condition']['value']);
                $this->addXMLElement($xmlWriter, 'shipment_damaged_reason', $record['name_value_list']['shipment_damaged_reason']['value']);
		$this->addXMLElement($xmlWriter, 'sample_id', $record['name_value_list']['name']['value']);
                $this->addXMLElement($xmlWriter, 'sample_receipt_temp', $record['name_value_list']['sample_receipt_temp']['value']);
		$this->addXMLElement($xmlWriter, 'sample_condition', $record['name_value_list']['sample_condition']['value']);
		$this->addXMLElement($xmlWriter, 'shipment_received_by', $record['name_value_list']['shipment_received_by']['value']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
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
            return $result['rows'][0][$secondaryModuleIDField];
        }
        else {
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
