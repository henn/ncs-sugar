<?php

require_once('service/v3/SugarWebServiceUtilv3.php');
require_once ('NCSExportUtils.php');

class NCSSugarWebServiceUtil extends SugarWebServiceUtilv3 {
    
    private $master_psu_id;
    private $master_sc_id;
    
    function parseHeaderValues(&$xmlWriter)
    {
        $results = export(PSU_SUGAR_MODULE);
        $xmlWriter->startElementNS('ns1','transmission_header', null);
        $xmlWriter->startElement('sc_id');
            $xmlWriter->text($results[0]['sc_id']);
        $xmlWriter->endElement();
        $xmlWriter->startElement('psu_id');
            $xmlWriter->text($results[0]['name']);
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
    
    
    function parseStudyCenter(&$xmlWriter)
    {
        $results = export(STUDY_CENTER_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('study_center');
                $this->addXMLElement($xmlWriter, 'sc_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'sc_name', $record['sc_name']);
                $this->addXMLElement($xmlWriter, 'comments', $record['comments']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
            if (strlen($this->master_sc_id) == 0 && strlen($record['name']) != 0) {
                $this->master_sc_id = $record['name'];
            }
        } 
        $xmlWriter->flush();
        unset($results);
    }
    
    function parsePSU(&$xmlWriter)
    {
        $results = export(PSU_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('psu');
                $this->addXMLElement($xmlWriter, 'sc_id', $record['sc_id']);
                $this->addXMLElement($xmlWriter, 'psu_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'psu_name', $record['psu_name']);
                $this->addXMLElement($xmlWriter, 'recruit_type', $record['recruit_type']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
            if (strlen($this->master_psu_id) == 0 && strlen($record['name']) != 0) {
                $this->master_psu_id = $record['name'];
            }
        }
        $xmlWriter->flush();
        unset($results);
    }
    
    function parseSSU(&$xmlWriter)
    {
        $results = export(SSU_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('ssu');
                $this->addXMLElement($xmlWriter, 'sc_id',  $this->replaceIfMissing($record['sc_id'], $this->master_sc_id));
                $this->addXMLElement($xmlWriter, 'psu_id',  $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'ssu_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'ssu_name', $record['ssu_name']);
                $this->addXMLElement($xmlWriter, 'transaction_type', $record['transaction_type']);
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);        
    }
    
    
    function parseTSU(&$xmlWriter)
    {
        $results = export(TSU_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('tsu');
                $this->addXMLElement($xmlWriter, 'sc_id',  $this->replaceIfMissing($record['sc_id'], $this->master_sc_id));
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'tsu_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'tsu_name', $record['tsu_name']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();     
        }
        $xmlWriter->flush();
        unset($results);        
    }
    
    function parseListingUnit(&$xmlWriter)
    {
        $results = export(LISTING_UNIT_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('listing_unit');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id)); // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'list_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'ssu_id', $record['gt_secsampuistingunt_name']);
                $this->addXMLElement($xmlWriter, 'tsu_id', $record['gt_tersampuistingunt_name']);
                $this->addXMLElement($xmlWriter, 'list_line', $record['list_line']);
                $this->addXMLElement($xmlWriter, 'list_source', $record['list_source']);
                $this->addXMLElement($xmlWriter, 'list_comment', $record['list_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();     
        }  
        $xmlWriter->flush();
        unset($results);        
    }
    
    function parseDwellingUnit(&$xmlWriter)
    {
        $results = export(DWELLING_UNIT_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('dwelling_unit');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id)); // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'du_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'list_id', $record['gt_listinguellingunt_name']);
                $this->addXMLElement($xmlWriter, 'tsu_id', $record['gt_secsampuellingunt_name']);
                $this->addXMLElement($xmlWriter, 'ssu_id', $record['gt_secsampuellingunt_name']);
		$this->addXMLElement($xmlWriter, 'duplicate_du', $record['duplicate_du']);
                $this->addXMLElement($xmlWriter, 'missed_du', $record['missed_du']);
                $this->addXMLElement($xmlWriter, 'du_type', $record['du_type']);
                $this->addXMLElement($xmlWriter, 'du_type_oth', $record['du_type_oth']);
                $this->addXMLElement($xmlWriter, 'du_ineligible', $record['du_ineligible']);
                $this->addXMLElement($xmlWriter, 'du_access', $record['du_access']);
                $this->addXMLElement($xmlWriter, 'duid_comment', $record['duid_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);         
    }
    
    function parseHouseHoldUnit(&$xmlWriter)
    {
        $results = export(HOUSEHOLD_UNIT_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('household_unit');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id); // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'hh_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'hh_status', $record['hh_status']);
                $this->addXMLElement($xmlWriter, 'hh_elig', $record['hh_elig']);
                $this->addXMLElement($xmlWriter, 'num_age_elig', $record['num_age_elig']);
                $this->addXMLElement($xmlWriter, 'num_preg', $record['num_preg']);
                $this->addXMLElement($xmlWriter, 'num_preg_minor', $record['num_preg_minor']);
                $this->addXMLElement($xmlWriter, 'num_preg_adult', $record['num_preg_adult']);
                $this->addXMLElement($xmlWriter, 'num_preg_over49', $record['num_preg_over49']);
                $this->addXMLElement($xmlWriter, 'hh_structure', $record['hh_structure']);
                $this->addXMLElement($xmlWriter, 'hh_structure_oth', $record['hh_structure_oth']);
                $this->addXMLElement($xmlWriter, 'hh_comment', $record['hh_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);         
    }
    
    function parseLinkHouseHoldDwelling(&$xmlWriter)
    {
        $results = export(LINK_HOUSEHOLD_DWELLING_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('link_household_dwelling');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);  // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'hh_du_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'hh_id', $record['gt_dwlunthshousehold_name']);
                $this->addXMLElement($xmlWriter, 'du_id', $record['gt_dwlunthsellingunt_name']);
                $this->addXMLElement($xmlWriter, 'is_active', $record['is_active']);
                $this->addXMLElement($xmlWriter, 'du_rank', $record['du_rank']);
                $this->addXMLElement($xmlWriter, 'du_rank_oth', $record['du_rank_oth']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);         
    }
    
    function parseStaff(&$xmlWriter)
    {
        $results = export(STAFF_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('staff');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);  // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'staff_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'staff_type', $record['staff_type']);
                $this->addXMLElement($xmlWriter, 'staff_type_oth', $record['staff_type_oth']);
                $this->addXMLElement($xmlWriter, 'subcontractor', $record['subcontractor']);
                $this->addXMLElement($xmlWriter, 'staff_yob', $record['staff_yob']);
                $this->addXMLElement($xmlWriter, 'staff_age_range', $record['staff_age_range']);
                $this->addXMLElement($xmlWriter, 'staff_gender', $record['staff_gender']);
                $this->addXMLElement($xmlWriter, 'staff_race', $record['staff_race']);
                $this->addXMLElement($xmlWriter, 'staff_race_oth', $record['name']);
                $this->addXMLElement($xmlWriter, 'staff_zip', $record['staff_zip']);
                $this->addXMLElement($xmlWriter, 'staff_ethnicity', $record['staff_ethnicity']);
		$this->addXMLElement($xmlWriter, 'staff_exp', $record['staff_exp']);
                $this->addXMLElement($xmlWriter, 'staff_comment', $record['staff_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results); 
    }
    
    function parseStaffLanguage(&$xmlWriter)
    {
        $results = export(STAFF_LANGUAGE_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('staff_language');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);  // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'staff_language_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $record['st_staffrstt_stflang_name']);
                $this->addXMLElement($xmlWriter, 'staff_lang', $record['staff_lang']);
                $this->addXMLElement($xmlWriter, 'staff_lang_oth', $record['staff_lang_oth']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseStaffValidation(&$xmlWriter)
    {
        $results = export(STAFF_VALIDATION_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('staff_validation');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);  // NO DIRECT RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'staff_val_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $record['st_staffrst_stfvldtn_name']);
                $this->addXMLElement($xmlWriter, 'event_id', $record['ncsdc_event_stfvldtn_name']);
                $this->addXMLElement($xmlWriter, 'staff_validate', $record['staff_validate']);
                $this->addXMLElement($xmlWriter, 'staff_val_date', $record['staff_val_date']);
                $this->addXMLElement($xmlWriter, 'staff_val_comment', $record['staff_val_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseStaffWeeklyExpense(&$xmlWriter)
    {
        $results = export(STAFF_WEEKLY_EXPENSE_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('staff_weekly_expense');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'weekly_exp_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $record['st_staffrsttfwkexpns_name']);
                $this->addXMLElement($xmlWriter, 'week_start_date', $record['week_start_date']);
                $this->addXMLElement($xmlWriter, 'staff_pay', $record['staff_pay']);
                $this->addXMLElement($xmlWriter, 'staff_hours', $record['staff_hours']);
                $this->addXMLElement($xmlWriter, 'staff_expenses', $record['staff_expenses']);
                $this->addXMLElement($xmlWriter, 'staff_miles', $record['staff_miles']);
                $this->addXMLElement($xmlWriter, 'weekly_expenses_comment', $record['weekly_expenses_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseStaffExpenseManagementTask(&$xmlWriter)
    {
        $results = export(STAFF_EXP_MNGMNT_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('staff_exp_mngmnt_tasks');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'staff_exp_mgmt_task_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'staff_weekly_expense_id', $record['st_stfwkexpfexpmgtsk_name']);
                $this->addXMLElement($xmlWriter, 'mgmt_task_type', $record['mgmt_task_type']);
                $this->addXMLElement($xmlWriter, 'mgmt_task_type_oth', $record['mgmt_task_type_oth']);
                $this->addXMLElement($xmlWriter, 'mgmt_task_hrs', $record['mgmt_task_hrs']);
                $this->addXMLElement($xmlWriter, 'mgmt_task_comment', $record['mgmt_task_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseStaffExpenseDataCollectionTask(&$xmlWriter)
    {
        $results = export(STAFF_EXP_DATA_CLLCTN_TASKS_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('staff_exp_data_cllctn_tasks');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'staff_exp_data_coll_task_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'staff_weekly_expense_id', $record['st_stfwkexpfexpdctsk_name']);
                $this->addXMLElement($xmlWriter, 'data_coll_task_type', $record['data_coll_task_type']);
                $this->addXMLElement($xmlWriter, 'data_coll_task_type_oth', $record['data_coll_task_type_oth']);
                $this->addXMLElement($xmlWriter, 'data_coll_tasks_hrs', $record['data_coll_tasks_hrs']);
                $this->addXMLElement($xmlWriter, 'data_coll_task_cases', $record['data_coll_task_cases']);
                $this->addXMLElement($xmlWriter, 'data_coll_transmit', $record['data_coll_transmit']);
                $this->addXMLElement($xmlWriter, 'data_coll_task_comment', $record['data_coll_task_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseOutreach(&$xmlWriter)
    {
        $results = export(OUTREACH_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('outreach');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'tsu_id', $record['tsu_id']);
                $this->addXMLElement($xmlWriter, 'ssu_id', $value);  // NO DB FIELD OR RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'outreach_event_date', $record['outreach_event_date']);
                //$this->addXMLElement($xmlWriter, 'outreach_target', $record['st_msouttart_wkoeact_name']);
                //$this->addXMLElement($xmlWriter, 'outreach_target_oth', $record['outreach_target_oth']);
                $this->addXMLElement($xmlWriter, 'outreach_mode', $record['outreach_mode']);
                $this->addXMLElement($xmlWriter, 'outreach_mode_oth', $record['outreach_mode_oth']);
                $this->addXMLElement($xmlWriter, 'outreach_type', $record['outreach_type']);
                $this->addXMLElement($xmlWriter, 'outreach_type_oth', $record['outreach_type_oth']);
                $this->addXMLElement($xmlWriter, 'outreach_tailored', $record['outreach_tailored']);
                $this->addXMLElement($xmlWriter, 'outreach_lang1', $record['outreach_lang1']);
                //$this->addXMLElement($xmlWriter, 'outreach_lang2', $record['outreach_lang2']);
                $this->addXMLElement($xmlWriter, 'outreach_lang_oth', $record['outreach_lang_oth']);
                $this->addXMLElement($xmlWriter, 'outreach_race1', $record['outreach_race1']);
                //$this->addXMLElement($xmlWriter, 'outreach_race2', $record['st_msoutract_wkoeact_name']);
                //$this->addXMLElement($xmlWriter, 'outreach_race_oth', $record['outreach_race_oth']);
                $this->addXMLElement($xmlWriter, 'outreach_culture1', $record['outreach_culture1']);
                $this->addXMLElement($xmlWriter, 'outreach_culture2', $record['outreach_culture2']);
                $this->addXMLElement($xmlWriter, 'outreach_culture_oth', $record['outreach_culture_oth']);
                $this->addXMLElement($xmlWriter, 'outreach_quantity', $record['outreach_quantity']);
                $this->addXMLElement($xmlWriter, 'outreach_cost', $record['outreach_cost']);
                $this->addXMLElement($xmlWriter, 'outreach_staffing', $record['outreach_staffing']);
                $this->addXMLElement($xmlWriter, 'outreach_incident', $record['outreach_incident']);
                $this->addXMLElement($xmlWriter, 'incident_id', $record['incident_id']);
                $this->addXMLElement($xmlWriter, 'outreach_eval_result', $record['outreach_eval_result']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
	// *************** 2.0 MODULE INSERTED ******************
	function parseOutreachRace(&$xmlWriter)
    {
        $results = export(OUTREACH_RACE_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('outreach_race');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'outreach_race_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $record['st_msoutract_wkoeact_name']);
                $this->addXMLElement($xmlWriter, 'outreach_race2', str_replace("_", "-", $record['outreach_race2']));
                $this->addXMLElement($xmlWriter, 'outreach_race_oth', $record['outreach_race_oth']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	// *****************************************************
    
    function parseOutreachStaff(&$xmlWriter)
    {
        $results = export(OUTREACH_STAFF_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('outreach_staff');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'outreach_event_staff_id', $record['name']); 
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $record['st_otrchstat_wkoeact_name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $record['st_otrchstastaffrstr_name']); // Missing field name in vardef
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseOutreachEval(&$xmlWriter)
    {
        $results = export(OUTREACH_EVAL_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('outreach_eval');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'outreach_event_eval_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $record['st_msoutevat_wkoeact_name']);
		$this->addXMLElement($xmlWriter, 'outreach_eval', $record['outreach_eval']);
                $this->addXMLElement($xmlWriter, 'outreach_eval_oth', $record['outreach_eval_oth']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
	// *************** 2.0 MODULE INSERTED ******************
	function parseOutreachTarget(&$xmlWriter)
    {
        $results = export(OUTREACH_TARGET_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('outreach_target');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'outreach_target_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $record['st_msouttart_wkoeact_name']);
                $this->addXMLElement($xmlWriter, 'outreach_target_ms', $record['outreach_target_ms']);
                $this->addXMLElement($xmlWriter, 'outreach_target_ms_oth', $record['outreach_target_ms_oth']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
	function parseOutreachLanguage2(&$xmlWriter)
    {
        $results = export(OUTREACH_LANG2_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('outreach_lang2');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'outreach_lang2_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'outreach_event_id', $record['st_msoutlant_wkoeact_name']);
                $this->addXMLElement($xmlWriter, 'outreach_lang2', $record['outreach_lang2']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	// ******************************************************
	
    function parseStaffCertTraining(&$xmlWriter)
    {
        $results = export(STAFF_CERT_TRAINING_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('staff_cert_training');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'staff_cert_list_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $record['st_staffrststfcrttrn_name']);
                $this->addXMLElement($xmlWriter, 'cert_train_type', $record['cert_train_type']);
                $this->addXMLElement($xmlWriter, 'cert_completed', $record['cert_completed']);
                $this->addXMLElement($xmlWriter, 'cert_date', $record['cert_date']);
                $this->addXMLElement($xmlWriter, 'staff_bgcheck_lvl', $record['staff_bgcheck_lvl']);
                $this->addXMLElement($xmlWriter, 'cert_type_frequency', $record['cert_type_frequency']);
                $this->addXMLElement($xmlWriter, 'cert_type_exp_date', $record['cert_type_exp_date']);
                $this->addXMLElement($xmlWriter, 'cert_comment', $record['cert_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parsePerson(&$xmlWriter)
    {
        $results = export(PERSON_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('person');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id); // NO CLEAR RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'person_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'prefix', str_replace("_", "-", $record['prefix']));
                $this->addXMLElement($xmlWriter, 'first_name', $record['first_name']);
                $this->addXMLElement($xmlWriter, 'last_name', $record['last_name']);
                $this->addXMLElement($xmlWriter, 'middle_name', $record['middle_name']);
                $this->addXMLElement($xmlWriter, 'maiden_name', $record['maiden_name']);
                $this->addXMLElement($xmlWriter, 'suffix', str_replace("_", "-", $record['suffix']));
                $this->addXMLElement($xmlWriter, 'title', $record['title']);
                $this->addXMLElement($xmlWriter, 'sex', $record['sex']);
                $this->addXMLElement($xmlWriter, 'age', $record['age']);
                $this->addXMLElement($xmlWriter, 'age_range', $record['age_range']);
                $this->addXMLElement($xmlWriter, 'person_dob', $record['person_dob']);
                $this->addXMLElement($xmlWriter, 'deceased', $record['deceased']);
                $this->addXMLElement($xmlWriter, 'ethnic_group', $record['ethnic_group']);
                $this->addXMLElement($xmlWriter, 'person_lang', $record['person_lang']);
                $this->addXMLElement($xmlWriter, 'person_lang_oth', $record['person_lang_oth']);
                $this->addXMLElement($xmlWriter, 'maristat', $record['maristat']);
                $this->addXMLElement($xmlWriter, 'maristat_oth', $record['maristat_oth']);
                $this->addXMLElement($xmlWriter, 'pref_contact', $record['pref_contact']);
                $this->addXMLElement($xmlWriter, 'pref_contact_oth', $record['pref_contact_oth']);
                $this->addXMLElement($xmlWriter, 'plan_move', str_replace("_", "-", $record['plan_move']));
                $this->addXMLElement($xmlWriter, 'move_info', str_replace("_", "-", $record['move_info']));
                $this->addXMLElement($xmlWriter, 'new_address_id', $record['new_address_id']);
                $this->addXMLElement($xmlWriter, 'when_move', str_replace("_", "-", $record['when_move']));
                $this->addXMLElement($xmlWriter, 'date_move', $record['date_move']);
                $this->addXMLElement($xmlWriter, 'p_tracing', $record['p_tracing']);
                $this->addXMLElement($xmlWriter, 'p_info_source', $record['p_info_source']);
                $this->addXMLElement($xmlWriter, 'p_info_source_oth', $record['p_info_source_oth']);
                $this->addXMLElement($xmlWriter, 'p_info_date', $record['p_info_date']);
                $this->addXMLElement($xmlWriter, 'p_info_update', $record['p_info_update']);
                $this->addXMLElement($xmlWriter, 'person_comment', $record['person_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parsePersonRace(&$xmlWriter)
    {
        $results = export(PERSON_RACE_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('person_race');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id); // NO RELATIONSHIP
                $this->addXMLElement($xmlWriter, 'person_race_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'person_id', $record['plt_person_ersonrace_name']);
                $this->addXMLElement($xmlWriter, 'race', $record['race']);
                $this->addXMLElement($xmlWriter, 'race_oth', $record['race_oth']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseLinkPersonHousehold(&$xmlWriter)
    {
        $results = export(LINK_PERSON_HOUSEHOLD_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('link_person_household');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'person_hh_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'person_id', $record['plt_lnkprshlt_person_name']);
                $this->addXMLElement($xmlWriter, 'hh_id', $record['plt_lnkprshhousehold_name']);
                $this->addXMLElement($xmlWriter, 'is_active', $record['is_active']);
                $this->addXMLElement($xmlWriter, 'hh_rank', $record['hh_rank']);
                $this->addXMLElement($xmlWriter, 'hh_rank_oth', $record['hh_rank_oth']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseParticipant(&$xmlWriter)
    {
        $results = export(PARTICIPANT_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('participant');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->master_psu_id);
                $this->addXMLElement($xmlWriter, 'p_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'p_type', $record['p_type']);
                $this->addXMLElement($xmlWriter, 'p_type_oth', $record['p_type_oth']);
                $this->addXMLElement($xmlWriter, 'status_info_source', $record['status_info_source']);
                $this->addXMLElement($xmlWriter, 'status_info_source_oth', $record['status_info_source_oth']);
                $this->addXMLElement($xmlWriter, 'status_info_mode', $record['status_info_mode']);
                $this->addXMLElement($xmlWriter, 'status_info_mode_oth', $record['status_info_mode_oth']);
                $this->addXMLElement($xmlWriter, 'status_info_date', $record['status_info_date']);
                $this->addXMLElement($xmlWriter, 'enroll_status', $record['enroll_status']);
                $this->addXMLElement($xmlWriter, 'enroll_date', $record['enroll_date']);
                $this->addXMLElement($xmlWriter, 'pid_entry', $record['pid_entry']);
                $this->addXMLElement($xmlWriter, 'pid_entry_other', $record['pid_entry_other']);
                $this->addXMLElement($xmlWriter, 'pid_age_elig', $record['pid_age_elig']);
                $this->addXMLElement($xmlWriter, 'pid_comment', $record['pid_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseLinkPersonParticipant(&$xmlWriter)
    {
        $results = export(LINK_PERSON_PARTICIPANT_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('link_person_participant');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id']['value'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'person_pid_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'p_id', $record['plt_lkprsprrticipant_name']);
                $this->addXMLElement($xmlWriter, 'person_id', $record['plt_lkprsprlt_person_name']);
                $this->addXMLElement($xmlWriter, 'relation', $record['relation']);
                $this->addXMLElement($xmlWriter, 'relation_oth', $record['relation_oth']);
                $this->addXMLElement($xmlWriter, 'is_active', $record['is_active']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    // *************** 2.0 MODULE INSERTED ******************
	function parseParticipantAuthorizationForm(&$xmlWriter)
    {
        $results = export(PARTICIPANT_AUTHORIZATION_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('participant_auth');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'auth_form_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'p_id', $record['olt_providertauthfrm_name']);
                $this->addXMLElement($xmlWriter, 'contact_id', $record['ncsdc_cntctrtauthfrm_name']);
                $this->addXMLElement($xmlWriter, 'provider_id', $record['olt_providertauthfrm_name']);
		$this->addXMLElement($xmlWriter, 'auth_form_type', $record['auth_form_type']);
                $this->addXMLElement($xmlWriter, 'auth_type_oth', $record['auth_type_oth']);
                $this->addXMLElement($xmlWriter, 'auth_status', $record['auth_status']);
                $this->addXMLElement($xmlWriter, 'auth_status_oth', $record['auth_status_oth']);
            	$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	// ******************************************************
	
    function parseParticipantConsent(&$xmlWriter) 
    {
        $results = export(PARTICIPANT_CONSENT_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('participant_consent');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'participant_consent_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'p_id', $record['plt_particitcptcnsnt_name']);
                $this->addXMLElement($xmlWriter, 'consent_version', $record['consent_version']);
                $this->addXMLElement($xmlWriter, 'consent_expiration', $record['consent_expiration']);
                $this->addXMLElement($xmlWriter, 'consent_type', $record['consent_type']);
                $this->addXMLElement($xmlWriter, 'consent_form_type', $record['consent_form_type']);
              	$this->addXMLElement($xmlWriter, 'consent_given', $record['consent_given']);
                $this->addXMLElement($xmlWriter, 'consent_date', $record['consent_date']);
                $this->addXMLElement($xmlWriter, 'consent_withdraw', $record['consent_withdraw']);
                $this->addXMLElement($xmlWriter, 'consent_withdraw_type', str_replace("_", "-", $record['consent_withdraw_type']));
                $this->addXMLElement($xmlWriter, 'consent_withdraw_reason', $record['consent_withdraw_reason']);
		$this->addXMLElement($xmlWriter, 'consent_withdraw_date', $record['consent_withdraw_date']);
                $this->addXMLElement($xmlWriter, 'consent_language', $record['consent_language']);
                $this->addXMLElement($xmlWriter, 'consent_language_oth', $record['consent_language_oth']);
                $this->addXMLElement($xmlWriter, 'person_who_consented_id', $record['person_who_consented_id']);
                $this->addXMLElement($xmlWriter, 'who_consented', $record['who_consented']);
                $this->addXMLElement($xmlWriter, 'person_wthdrw_consent_id', $record['person_wthdrw_consent_id']);
                $this->addXMLElement($xmlWriter, 'who_wthdrw_consent', str_replace("_", "-", $record['who_wthdrw_consent']));
                $this->addXMLElement($xmlWriter, 'consent_translate', $record['consent_translate']);
                $this->addXMLElement($xmlWriter, 'consent_comments', $record['consent_comments']);
                $this->addXMLElement($xmlWriter, 'contact_id', $record['ncsdc_cntcttcptcnsnt_name']);
                $this->addXMLElement($xmlWriter, 'reconsideration_script_use', $record['reconsideration_script_use']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parsePPGDetails(&$xmlWriter)
    {
        $results = export(PPG_DETAILS_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('ppg_details');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'ppg_details_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'p_id', $record['plt_participgdetails_name']);
                $this->addXMLElement($xmlWriter, 'ppg_pid_status', $record['ppg_pid_status']);
                $this->addXMLElement($xmlWriter, 'ppg_first', $record['ppg_first']);
                $this->addXMLElement($xmlWriter, 'orig_due_date', $record['orig_due_date']);
                $this->addXMLElement($xmlWriter, 'due_date_2', $record['due_date_2']);
                $this->addXMLElement($xmlWriter, 'due_date_3', $record['due_date_3']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parsePPGStatusHistory(&$xmlWriter)
    {
        $results = export(PPG_STATUS_HISTORY_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('ppg_status_history');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'ppg_history_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'p_id', $record['plt_particigstshstry_name']);
                $this->addXMLElement($xmlWriter, 'ppg_status', $record['ppg_status']);
                $this->addXMLElement($xmlWriter, 'ppg_status_date', $record['ppg_status_date']);
                $this->addXMLElement($xmlWriter, 'ppg_info_source', $record['ppg_info_source']);
                $this->addXMLElement($xmlWriter, 'ppg_info_source_oth', $record['ppg_info_source_oth']);
                $this->addXMLElement($xmlWriter, 'ppg_info_mode', $record['ppg_info_mode']);
                $this->addXMLElement($xmlWriter, 'ppg_info_mode_oth', $record['ppg_info_mode_oth']);
                $this->addXMLElement($xmlWriter, 'ppg_comment', $record['ppg_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseProvider(&$xmlWriter)
    {
        $results = export(PROVIDER_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('provider');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'provider_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'provider_type', $record['provider_type']);
                $this->addXMLElement($xmlWriter, 'provider_type_oth', $record['provider_type_oth']);
                $this->addXMLElement($xmlWriter, 'provider_ncs_role', str_replace("_", "-", $record['provider_ncs_role']));
                $this->addXMLElement($xmlWriter, 'provider_ncs_role_oth', $record['provider_ncs_role_oth']);
                $this->addXMLElement($xmlWriter, 'practice_info', $record['practice_info']);
                $this->addXMLElement($xmlWriter, 'practice_patient_load', $record['practice_patient_load']);
                $this->addXMLElement($xmlWriter, 'practice_size', $record['practice_size']);
                $this->addXMLElement($xmlWriter, 'public_practice', $record['public_practice']);
                $this->addXMLElement($xmlWriter, 'provider_info_source', $record['provider_info_source']);
                $this->addXMLElement($xmlWriter, 'provider_info_source_oth', $record['provider_info_source_oth']);
                $this->addXMLElement($xmlWriter, 'provider_info_date', $record['provider_info_date']);
                $this->addXMLElement($xmlWriter, 'provider_info_update', $record['provider_info_update']);
                $this->addXMLElement($xmlWriter, 'provider_comment', $record['provider_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
	// *************** 2.0 MODULE INSERTED ******************
	function parseProviderRole(&$xmlWriter)
    {
        $results = export(PROVIDER_ROLE_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('provider_role');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'provider_role_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'provider_id', $record['olt_msprovr_provider_name']);
                $this->addXMLElement($xmlWriter, 'provider_ncs_role', $record['provider_ncs_role']);
                $this->addXMLElement($xmlWriter, 'provider_ncs_role_oth', $record['provider_ncs_role_oth']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	// ******************************************************
	
    
    function parseLinkPersonProvider(&$xmlWriter)
    {
        $results = export(LINK_PERSON_PROVIDER_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('link_person_provider');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'person_provider_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'provider_id', $record['olt_prsnprv_provider_name']);
                $this->addXMLElement($xmlWriter, 'person_id', $record['olt_prsnprvlt_person_name']);
                $this->addXMLElement($xmlWriter, 'is_active', $record['is_active']);
                $this->addXMLElement($xmlWriter, 'prov_intro_outcome', $record['prov_intro_outcome']);
                $this->addXMLElement($xmlWriter, 'prov_intro_outcome_oth', $record['prov_intro_outcome_oth']);
              	$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseInstitution(&$xmlWriter)
    {
        $results = export(INSTITUTION_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('institution');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'institute_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'institute_type', $record['institute_type']);
                $this->addXMLElement($xmlWriter, 'institute_name', $record['institute_name']);
                $this->addXMLElement($xmlWriter, 'institute_type_oth', $record['institute_type_oth']);
                $this->addXMLElement($xmlWriter, 'institute_relation', $record['institute_relation']);
                $this->addXMLElement($xmlWriter, 'institute_relation_oth', $record['institute_relation_oth']);
                $this->addXMLElement($xmlWriter, 'institute_owner', $record['institute_owner']);
                $this->addXMLElement($xmlWriter, 'institute_owner_oth', $record['institute_owner_oth']);
                $this->addXMLElement($xmlWriter, 'institute_size', $record['institute_size']);
                $this->addXMLElement($xmlWriter, 'institute_unit', $record['institute_unit']);
                $this->addXMLElement($xmlWriter, 'institute_unit_oth', $record['institute_unit_oth']);
                $this->addXMLElement($xmlWriter, 'institute_info_source', $record['institute_info_source']);
                $this->addXMLElement($xmlWriter, 'institute_info_source_oth', $record['institute_info_source_oth']);
                $this->addXMLElement($xmlWriter, 'institute_info_date', $record['institute_info_date']);
                $this->addXMLElement($xmlWriter, 'institute_info_update', $record['institute_info_update']);
                $this->addXMLElement($xmlWriter, 'institute_comment', $record['institute_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseLinkPersonIntitute(&$xmlWriter)
    {
        $results = export(LINK_PERSON_INSTITUTE_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('link_person_institute');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'person_institute_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'institute_id', $record['olt_prsninsstitution_name']);
                $this->addXMLElement($xmlWriter, 'person_id', $record['olt_prsninslt_person_name']);
                $this->addXMLElement($xmlWriter, 'is_active', $record['is_active']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseAddress(&$xmlWriter)
    {
        $results = export(ADDRESS_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('address');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'address_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'person_id', $record['plt_person_t_address_name']);
                $this->addXMLElement($xmlWriter, 'institute_id', $record['olt_institut_address_name']);
                $this->addXMLElement($xmlWriter, 'provider_id', $record['olt_providet_address_name']);
                $this->addXMLElement($xmlWriter, 'du_id', $record['gt_dwellingt_address_name']);
                $this->addXMLElement($xmlWriter, 'address_rank', $record['address_rank']);
                $this->addXMLElement($xmlWriter, 'address_rank_oth', $record['address_rank_oth']);
                $this->addXMLElement($xmlWriter, 'address_info_source', $record['address_info_source']);
                $this->addXMLElement($xmlWriter, 'address_info_source_oth', $record['address_info_source_oth']);
                $this->addXMLElement($xmlWriter, 'address_info_mode', $record['address_info_mode']);
                $this->addXMLElement($xmlWriter, 'address_info_mode_oth', $record['address_info_mode_oth']);
                $this->addXMLElement($xmlWriter, 'address_info_date', $record['address_info_date']);
                $this->addXMLElement($xmlWriter, 'address_info_update', $record['address_info_update']);
                $this->addXMLElement($xmlWriter, 'address_start_date', $record['address_start_date']);
                $this->addXMLElement($xmlWriter, 'address_end_date', $record['address_end_date']);
                $this->addXMLElement($xmlWriter, 'address_type', $record['address_type']);
                $this->addXMLElement($xmlWriter, 'address_type_oth', $record['address_type_oth']);
                $this->addXMLElement($xmlWriter, 'address_description', $record['address_description']);
                $this->addXMLElement($xmlWriter, 'address_description_oth', $record['address_description_oth']);
                $this->addXMLElement($xmlWriter, 'address_1', $record['address_1']);
                $this->addXMLElement($xmlWriter, 'address_2', $record['address_2']);
                $this->addXMLElement($xmlWriter, 'unit', $record['unit']);
                $this->addXMLElement($xmlWriter, 'city', $record['city']);
                $this->addXMLElement($xmlWriter, 'state', $record['state']);
                $this->addXMLElement($xmlWriter, 'zip', $record['zip']);
                $this->addXMLElement($xmlWriter, 'zip4', $record['zip4']);
                $this->addXMLElement($xmlWriter, 'address_comment', $record['address_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseTelephone(&$xmlWriter)
    {
        $results = export(TELEPHONE_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('telephone');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'phone_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'person_id', $record['plt_person_telephone_name']);
                $this->addXMLElement($xmlWriter, 'institute_id', $record['olt_institutelephone_name']);
                $this->addXMLElement($xmlWriter, 'provider_id', $record['olt_providetelephone_name']);
                $this->addXMLElement($xmlWriter, 'phone_info_source', $record['phone_info_source']);
                $this->addXMLElement($xmlWriter, 'phone_info_source_oth', $record['phone_info_source_oth']);
                $this->addXMLElement($xmlWriter, 'phone_info_date', $record['phone_info_date']);
                $this->addXMLElement($xmlWriter, 'phone_info_update', $record['phone_info_update']);
                $this->addXMLElement($xmlWriter, 'phone_nbr', $record['phone_nbr']);
                $this->addXMLElement($xmlWriter, 'phone_ext', $record['phone_ext']);
                $this->addXMLElement($xmlWriter, 'phone_type', $record['phone_type']);
                $this->addXMLElement($xmlWriter, 'phone_type_oth', $record['phone_type_oth']);
                $this->addXMLElement($xmlWriter, 'phone_rank', $record['phone_rank']);
                $this->addXMLElement($xmlWriter, 'phone_rank_oth', $record['phone_rank_oth']);
                $this->addXMLElement($xmlWriter, 'phone_landline', $record['phone_landline']);
                $this->addXMLElement($xmlWriter, 'phone_share', $record['phone_share']);
                $this->addXMLElement($xmlWriter, 'cell_permission', $record['cell_permission']);
                $this->addXMLElement($xmlWriter, 'text_permission', $record['text_permission']);
                $this->addXMLElement($xmlWriter, 'phone_comment', $record['phone_comment']);
                $this->addXMLElement($xmlWriter, 'phone_start_date', $record['phone_start_date']);
                $this->addXMLElement($xmlWriter, 'phone_end_date', $record['phone_end_date']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseEmail(&$xmlWriter)
    {
        $results = export(EMAIL_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('email');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'email_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'person_id', $record['plt_person_ltt_email_name']);
                $this->addXMLElement($xmlWriter, 'institute_id', $record['olt_institultt_email_name']);
                $this->addXMLElement($xmlWriter, 'provider_id', $record['olt_provideltt_email_name']);
                $this->addXMLElement($xmlWriter, 'email', $record['email']);
                $this->addXMLElement($xmlWriter, 'email_rank', $record['email_rank']);
                $this->addXMLElement($xmlWriter, 'email_rank_oth', $record['email_rank_oth']);
                $this->addXMLElement($xmlWriter, 'email_info_source', $record['email_info_source']);
                $this->addXMLElement($xmlWriter, 'email_info_source_oth', $record['email_info_source_oth']);
                $this->addXMLElement($xmlWriter, 'email_info_date', $record['email_info_date']);
                $this->addXMLElement($xmlWriter, 'email_info_update', $record['email_info_update']);
                $this->addXMLElement($xmlWriter, 'email_type', $record['email_type']);
                $this->addXMLElement($xmlWriter, 'email_type_oth', $record['email_type_oth']);
                $this->addXMLElement($xmlWriter, 'email_share', $record['email_share']);
                $this->addXMLElement($xmlWriter, 'email_active', $record['email_active']);
                $this->addXMLElement($xmlWriter, 'email_comment', $record['email_comment']);
                $this->addXMLElement($xmlWriter, 'email_start_date', $record['email_start_date']);
                $this->addXMLElement($xmlWriter, 'email_end_date', $record['email_end_date']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
    
    function parseEvent(&$xmlWriter)
    {
        $results = export(EVENT_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('event');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'event_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'participant_id', $record['ncsdc_eventrticipant_name']);
                $this->addXMLElement($xmlWriter, 'event_type', str_replace("_", "-", $record['psevent_typeu_id']));
                $this->addXMLElement($xmlWriter, 'event_type_oth', $record['event_type_oth']);
                $this->addXMLElement($xmlWriter, 'event_repeat_key', $record['event_repeat_key']);
                $this->addXMLElement($xmlWriter, 'event_disp', $record['event_disp']);
                $this->addXMLElement($xmlWriter, 'event_disp_cat', $record['event_disp_cat']);
                $this->addXMLElement($xmlWriter, 'event_start_date', $record['event_start_date']);
                $start_time = preg_split('/[ ]/', $record['event_start_time']);
                $this->addXMLElement($xmlWriter, 'event_start_time', $start_time[1]);
                $this->addXMLElement($xmlWriter, 'event_end_date', $record['event_end_date']);
                $end_time = preg_split('/[ ]/', $record['event_end_time']);
                $this->addXMLElement($xmlWriter, 'event_end_time', $end_time[1]);
                $this->addXMLElement($xmlWriter, 'event_breakoff', $record['event_breakoff']);
                $this->addXMLElement($xmlWriter, 'event_incentive_type', $record['event_incentive_type']);
                $this->addXMLElement($xmlWriter, 'event_incent_cash', $record['event_incent_cash']);
                $this->addXMLElement($xmlWriter, 'event_incent_noncash', $record['event_incent_noncash']);
                $this->addXMLElement($xmlWriter, 'event_comment', $record['event_comment']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
	//***************************** 
        function parseInstrument(&$xmlWriter)
	{
            $results = export(INSTRUMENT_SUGAR_MODULE);
		foreach ($results as $record) {
			$xmlWriter->startElement('instrument');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'instrument_id', $record['name']);
				$this->addXMLElement($xmlWriter, 'event_id', $record['ncsdc_eventnstrument_name']);
				$this->addXMLElement($xmlWriter, 'instrument_type', $record['instrument_type']);
				$this->addXMLElement($xmlWriter, 'instrument_type_oth', $record['instrument_type_oth']);
				$this->addXMLElement($xmlWriter, 'instrument_version', $record['instrument_version']);
				$this->addXMLElement($xmlWriter, 'instrument_repeat_key', $record['instrument_repeat_key']);
				$ins_start_time = preg_split('/[ ]/', $record['ins_start_time']);
                                $this->addXMLElement($xmlWriter, 'ins_start_time', $ins_start_time[1]);
				$ins_end_time = preg_split('/[ ]/', $record['ins_end_time']);
                                $this->addXMLElement($xmlWriter, 'ins_end_time', $ins_end_time[1]);
                                $this->addXMLElement($xmlWriter, 'ins_date_start', $record['ins_date_start']);
				$this->addXMLElement($xmlWriter, 'ins_date_end', $record['ins_date_end']);
				$this->addXMLElement($xmlWriter, 'ins_breakoff', $record['ins_breakoff']);
				$this->addXMLElement($xmlWriter, 'ins_status', $record['ins_status']);
				$this->addXMLElement($xmlWriter, 'ins_mode', $record['ins_mode']);
				$this->addXMLElement($xmlWriter, 'ins_mode_oth', $record['ins_mode_oth']);
				$this->addXMLElement($xmlWriter, 'ins_method', $record['ins_method']);
				$this->addXMLElement($xmlWriter, 'sup_review', $record['sup_review']);
				$this->addXMLElement($xmlWriter, 'data_problem', $record['data_problem']);
				$this->addXMLElement($xmlWriter, 'instru_comment', $record['instru_comment']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseContact(&$xmlWriter)
	{
            $results = export(CONTACT_SUGAR_MODULE);
		foreach ($results as $record) {
			$xmlWriter->startElement('contact');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'contact_id', $record['name']);
				$this->addXMLElement($xmlWriter, 'contact_disp', $record['contact_disp']);
				$this->addXMLElement($xmlWriter, 'contact_type', $record['contact_type']);
				$this->addXMLElement($xmlWriter, 'contact_type_oth', $record['contact_type_oth']);
				$this->addXMLElement($xmlWriter, 'contact_date', $record['contact_date']);
				$contact_start_time = preg_split('/[ ]/', $record['contact_start_time']);
                                $this->addXMLElement($xmlWriter, 'contact_start_time', $contact_start_time[1]);
				$contact_end_time = preg_split('/[ ]/', $record['contact_end_time']);
                                $this->addXMLElement($xmlWriter, 'contact_end_time', $contact_end_time[1]);
                                $this->addXMLElement($xmlWriter, 'contact_lang', $record['contact_lang']);
				$this->addXMLElement($xmlWriter, 'contact_lang_oth', $record['contact_lang_oth']);
				$this->addXMLElement($xmlWriter, 'contact_interpret', $record['contact_interpret']);
				$this->addXMLElement($xmlWriter, 'contact_interpret_oth', $record['contact_interpret_oth']);
				$this->addXMLElement($xmlWriter, 'contact_location', $record['contact_location']);
				$this->addXMLElement($xmlWriter, 'contact_location_oth', $record['contact_location_oth']);
				$this->addXMLElement($xmlWriter, 'contact_private', $record['contact_private']);
				$this->addXMLElement($xmlWriter, 'contact_private_detail', $record['contact_private_detail']);
				$this->addXMLElement($xmlWriter, 'contact_distance', $record['contact_distance']);
				$this->addXMLElement($xmlWriter, 'who_contacted', $record['who_contacted']);
				$this->addXMLElement($xmlWriter, 'who_contact_oth', $record['who_contact_oth']);
				$this->addXMLElement($xmlWriter, 'contact_comment', $record['contact_comment']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseContactLinking(&$xmlWriter)
	{
            $results = export(LINK_CONTACT_SUGAR_MODULE);
		foreach ($results as $record) {
			$xmlWriter->startElement('link_contact');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'contact_link_id', $record['name']);
				$this->addXMLElement($xmlWriter, 'contact_id', $record['ncsdc_cntlncntctinfo_name']);
				$this->addXMLElement($xmlWriter, 'event_id', $record['ncsdc_cntlneventinfo_name']);
				$this->addXMLElement($xmlWriter, 'instrument_id', $record['ncsdc_cntlnnstrument_name']);
				$this->addXMLElement($xmlWriter, 'staff_id', $record['ncsdc_cntlnstaffrstr_name']);
				$this->addXMLElement($xmlWriter, 'person_id', $record['ncsdc_cntlnlt_person_name']);
				$this->addXMLElement($xmlWriter, 'provider_id', $record['ncsdc_cntln_provider_name']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseNonInterviewReprt(&$xmlWriter)
	{
            $results = export(NON_INTERVIEW_RPT_SUGAR_MODULE);
		foreach ($results as $record) {
			$xmlWriter->startElement('non_interview_rpt');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'nir_id', $record['name']);
				$this->addXMLElement($xmlWriter, 'contact_id', $record['ncsdc_cntctninterrpt_name']);
				$this->addXMLElement($xmlWriter, 'nir', $record['nir']);
				$this->addXMLElement($xmlWriter, 'du_id', $record['ncsdc_noninellingunt_name']);
				$this->addXMLElement($xmlWriter, 'person_id', $record['ncsdc_noninlt_person_name']);
				$this->addXMLElement($xmlWriter, 'nir_vac_info', $record['nir_vac_info']);
				$this->addXMLElement($xmlWriter, 'nir_vac_info_oth', $record['nir_vac_info_oth']);
				$this->addXMLElement($xmlWriter, 'nir_noaccess', $record['nir_noaccess']);
				$this->addXMLElement($xmlWriter, 'nir_noaccess_oth', $record['nir_noaccess_oth']);
				$this->addXMLElement($xmlWriter, 'nir_access_attempt', $record['nir_access_attempt']);
				$this->addXMLElement($xmlWriter, 'nir_access_attempt_oth', $record['nir_access_attempt_oth']);
				$this->addXMLElement($xmlWriter, 'nir_type_person', $record['nir_type_person']);
				$this->addXMLElement($xmlWriter, 'nir_type_person_oth', $record['nir_type_person_oth']);
				$this->addXMLElement($xmlWriter, 'cog_inform_relation', $record['cog_inform_relation']);
				$this->addXMLElement($xmlWriter, 'cog_inform_relation_oth', $record['cog_inform_relation_oth']);
				$this->addXMLElement($xmlWriter, 'cog_dis_desc', $record['cog_dis_desc']);
				$this->addXMLElement($xmlWriter, 'perm_disability', $record['perm_disability']);
				$this->addXMLElement($xmlWriter, 'deceased_inform_relation', $record['deceased_inform_relation']);
				$this->addXMLElement($xmlWriter, 'deceased_inform_oth', $record['deceased_inform_oth']);
				$this->addXMLElement($xmlWriter, 'yod', $record['yod']);
				$this->addXMLElement($xmlWriter, 'state_death', $record['state_death']);
				$this->addXMLElement($xmlWriter, 'who_refused', $record['who_refused']);
				$this->addXMLElement($xmlWriter, 'who_refused_oth', $record['who_refused_oth']);
				$this->addXMLElement($xmlWriter, 'refuser_strength', $record['refuser_strength']);
				$this->addXMLElement($xmlWriter, 'ref_action', $record['ref_action']);
				$this->addXMLElement($xmlWriter, 'lt_illness_desc', $record['lt_illness_desc']);
				$this->addXMLElement($xmlWriter, 'perm_ltr', $record['perm_ltr']);
				$this->addXMLElement($xmlWriter, 'reason_unavail', $record['reason_unavail']);
				$this->addXMLElement($xmlWriter, 'reason_unavail_oth', $record['reason_unavail_oth']);
				$this->addXMLElement($xmlWriter, 'date_available', $record['date_available']);
				$this->addXMLElement($xmlWriter, 'date_moved', $record['date_moved']);
				$this->addXMLElement($xmlWriter, 'moved_length_time', $record['moved_length_time']);
				$this->addXMLElement($xmlWriter, 'moved_unit', $record['moved_unit']);
				$this->addXMLElement($xmlWriter, 'moved_inform_relation', $record['moved_inform_relation']);
				$this->addXMLElement($xmlWriter, 'moved_relation_oth', $record['moved_relation_oth']);
				$this->addXMLElement($xmlWriter, 'nir_other', $record['nir_other']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseNIRVacant(&$xmlWriter)
	{
            $results = export(NON_INTERVIEW_RPT_VACANT_SUGAR_MODULE);
		foreach ($results as $record) {
			$xmlWriter->startElement('non_interview_rpt_vacant');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'nir_vacant_id', $record['name']);
				$this->addXMLElement($xmlWriter, 'nir_id', $record['ncsdc_noninntrptvcnt_name']);
				$this->addXMLElement($xmlWriter, 'nir_vacant', $record['nir_vacant']);
				$this->addXMLElement($xmlWriter, 'nir_vacant_oth', $record['nir_vacant_oth']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseNIRNoAccess(&$xmlWriter)
	{
            $results = export(NON_INTERVIEW_RPT_NOACCESS_SUGAR_MODULE);
		foreach ($results as $record) {
			$xmlWriter->startElement('non_interview_rpt_noaccess');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'nir_noaccess_id', $record['name']);
				$this->addXMLElement($xmlWriter, 'nir_id', $record['ncsdc_noninrnaccmlts_name']);
				$this->addXMLElement($xmlWriter, 'nir_noaccess', str_replace("_", "-", $record['nir_noaccess']['value']));
				$this->addXMLElement($xmlWriter, 'nir_noaccess_oth', $record['nir_noaccess_oth']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseNIRRefusal(&$xmlWriter)
	{
            $results = export(NON_INTERVIEW_RPT_REFUSAL_SUGAR_MODULE);
		foreach ($results as $record) {
			$xmlWriter->startElement('non_interview_rpt_refusal');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'nir_refusal_id', $record['name']);
				$this->addXMLElement($xmlWriter, 'nir_id', $report['ncsdc_noninirrfsmlts_name']);
				$this->addXMLElement($xmlWriter, 'refusal_reason', $record['refusal_reason']);
				$this->addXMLElement($xmlWriter, 'refusal_reason_oth', $record['refusal_reason_oth']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseNIRDuType(&$xmlWriter)
	{
            $results = export(NON_INTERVIEW_RPT_DUTYPE_SUGAR_MODULE);
		foreach ($results as $record) {
			$xmlWriter->startElement('non_interview_rpt_dutype');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'nir_dutype_id', $record['name']);
				$this->addXMLElement($xmlWriter, 'nir_id', $report['ncsdc_noninrdutpmlts_name']);
				$this->addXMLElement($xmlWriter, 'nir_type_du', $record['nir_type_du']);
				$this->addXMLElement($xmlWriter, 'nir_type_du_oth', $record['nir_type_du_oth']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseIncident(&$xmlWriter)
	{
            $results = export(INCIDENT_SUGAR_MODULE);
		foreach ($results as $record) {
			$xmlWriter->startElement('incident');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'incident_id', $record['name']);
				$this->addXMLElement($xmlWriter, 'incident_date', $record['incident_date']);
				$incident_time = preg_split('/[ ]/', $record['incident_time']);
				$this->addXMLElement($xmlWriter, 'incident_time', $incident_time[1]);
				$this->addXMLElement($xmlWriter, 'inc_report_date', $record['inc_report_date']);
				$inc_report_time = preg_split('/[ ]/', $record['inc_report_time']);
				$this->addXMLElement($xmlWriter, 'inc_report_time', $inc_report_time[1]);
				$this->addXMLElement($xmlWriter, 'inc_staff_reporter_id', $report['inc_staff_reporter_id']);
				$this->addXMLElement($xmlWriter, 'inc_staff_supervisor_id', $report['inc_staff_supervisor_id']);
				$this->addXMLElement($xmlWriter, 'inc_recip_is_participant', $report['inc_recip_is_participant']);
				$this->addXMLElement($xmlWriter, 'inc_recip_is_du', $report['inc_recip_is_du']);
				$this->addXMLElement($xmlWriter, 'inc_recip_is_staff', $report['inc_recip_is_staff']);
				$this->addXMLElement($xmlWriter, 'inc_recip_is_family', $report['inc_recip_is_family']);
				$this->addXMLElement($xmlWriter, 'inc_recip_is_acquaintance', $report['inc_recip_is_acquaintance']);
				$this->addXMLElement($xmlWriter, 'inc_recip_is_other', $record['inc_recip_is_other']);
				$this->addXMLElement($xmlWriter, 'inc_contact_person', $report['inc_contact_person']);
				$this->addXMLElement($xmlWriter, 'inctype', $record['inctype']);
				$this->addXMLElement($xmlWriter, 'inctype_oth', $record['inctype_oth']);
				$this->addXMLElement($xmlWriter, 'incloss_cmptr_model', $record['incloss_cmptr_model']);
				$this->addXMLElement($xmlWriter, 'incloss_cmptr_sn', $record['incloss_cmptr_sn']);
				$this->addXMLElement($xmlWriter, 'incloss_cmptr_decal', $record['incloss_cmptr_decal']);
				$this->addXMLElement($xmlWriter, 'incloss_rem_media', $record['incloss_rem_media']);
				$this->addXMLElement($xmlWriter, 'incloss_paper', $record['incloss_paper']);
				$this->addXMLElement($xmlWriter, 'incloss_oth', $record['incloss_oth']);
				$this->addXMLElement($xmlWriter, 'inc_description', $record['inc_description']);
				$this->addXMLElement($xmlWriter, 'inc_action', $record['inc_action']);
				$this->addXMLElement($xmlWriter, 'inc_reported', $record['inc_reported']);
				$this->addXMLElement($xmlWriter, 'contact_id', $report['ncsdc_cntct_incident_name']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseIncidentMedia(&$xmlWriter)
	{
            $results = export(INCIDENT_MEDIA_SUGAR_MODULE);
		foreach ($results as $record) {
			$xmlWriter->startElement('incident_media');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'incident_media_id', $record['name']);
				$this->addXMLElement($xmlWriter, 'incident_id', $record['ncsdc_incidcmedmults_name']);
				$this->addXMLElement($xmlWriter, 'incloss_media', $record['incloss_media']);
				$this->addXMLElement($xmlWriter, 'incloss_media_oth', $record['incloss_media_oth']);
				$this->addXMLElement($xmlWriter, 'inssev', $record['inssev']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
	function parseIncidentUnanticipated(&$xmlWriter)
	{
            $results = export(INCIDENT_UNANTICIPATED_SUGAR_MODULE);
		foreach ($results as $record) {
			$xmlWriter->startElement('incident_unanticipated');
				$this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
				$this->addXMLElement($xmlWriter, 'inc_unanticipated_id', $record['name']);
				$this->addXMLElement($xmlWriter, 'incident_id', $record['ncsdc_incidcunatmlts_name']);
				$this->addXMLElement($xmlWriter, 'inc_unanticipated', $record['inc_unanticipated']);
				$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
			$xmlWriter->endElement();
		}
                $xmlWriter->flush();
        unset($results);  
	}
	
    //*****************************
    
    // *************** 2.0 MODULES INSERTED ******************
    function parseSPECEquipment(&$xmlWriter)
    {
            $results = export(SPEC_EQUIPMENT_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('spec_equipment');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'spsc_id', $record['']); // MISSING FIELD NAME IN VARDEF FILE
		$this->addXMLElement($xmlWriter, 'equip_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'equipment_type', $record['equipment_type']);
                $this->addXMLElement($xmlWriter, 'equipment_type_oth', $record['equipment_type_oth']);
                $this->addXMLElement($xmlWriter, 'serial_no', $record['serial_no']);
                $this->addXMLElement($xmlWriter, 'government_asset_tag_no', $record['government_asset_tag_no']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseSpecimenPickup(&$xmlWriter)
    {
        $results = export(SPECIMEN_PICKUP_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('spec_pickup');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'spsc_id', $record['']); // MISSING FIELD IN VARDEFS
		$this->addXMLElement($xmlWriter, 'specimen_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'event_id', $record['samp_specpieventinfo_name']);
                $this->addXMLElement($xmlWriter, 'instrument_id', $record['samp_specpinstrument_name']);
                $this->addXMLElement($xmlWriter, 'staff_id', $record['samp_specpistaffrstr_name']);
		$this->addXMLElement($xmlWriter, 'specimen_pickup_dt', $record['specimen_pickup_dt']);
                $this->addXMLElement($xmlWriter, 'specimen_pickup_comment', $record['specimen_pickup_comment']);
                $this->addXMLElement($xmlWriter, 'specimen_pickup_cmt_oth', $record['specimen_pickup_cmt_oth']);
                $this->addXMLElement($xmlWriter, 'specimen_trans_temp', $record['specimen_trans_temp']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseSpecimenReceipt(&$xmlWriter)
    {
        $results = export(SPECIMEN_RECEIPT_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('spec_receipt');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'specimen_id', $record['name']);
		$this->addXMLElement($xmlWriter, 'spsc_id', $record['']); // MISSING FIELD IN VARDEFS
		$this->addXMLElement($xmlWriter, 'staff_id', $record['samp_specrestaffrstr_name']);
                $this->addXMLElement($xmlWriter, 'receipt_comment', $record['receipt_comment']);
                $this->addXMLElement($xmlWriter, 'receipt_comment_oth', $record['receipt_comment_oth']);
                $this->addXMLElement($xmlWriter, 'receipt_dt', $record['receipt_dt']);
                $this->addXMLElement($xmlWriter, 'cooler_temp', $record['cooler_temp']);
		$this->addXMLElement($xmlWriter, 'monitor_status', $record['monitor_status']);
                $this->addXMLElement($xmlWriter, 'upper_trigger', $record['upper_trigger']);
                $this->addXMLElement($xmlWriter, 'upper_trigger_lvl', $record['upper_trigger_lvl']);
                $this->addXMLElement($xmlWriter, 'lower_trigger_cold', $record['lower_trigger_cold']);
		$this->addXMLElement($xmlWriter, 'lower_trigger_ambient', $record['lower_trigger_ambient']);
                $this->addXMLElement($xmlWriter, 'storage_container_id', $record['']); // MISSING FIELD IN VARDEFS
		$this->addXMLElement($xmlWriter, 'centrifuge_comment', $record['centrifuge_comment']);
                $this->addXMLElement($xmlWriter, 'centrifuge_comment_oth', $record['centrifuge_comment_oth']);
		$this->addXMLElement($xmlWriter, 'centrifuge_st', $record['centrifuge_st']);
                $this->addXMLElement($xmlWriter, 'centrifuge_et', $record['centrifuge_et']);
		$this->addXMLElement($xmlWriter, 'centrifuge_staff_id', $record['centrifuge_staff_id']);
		$this->addXMLElement($xmlWriter, 'equip_id', $record['']); // MISSING FIELD IN VARDEFS
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseSpecimenShipping(&$xmlWriter)
    {
        $results = export(SPECIMEN_SHIPPING_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('spec_shipping');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'storage_container_id', $record['name']);
		$this->addXMLElement($xmlWriter, 'spsc_id', $record['']); // MISSING FIELD IN VARDEFS
		$this->addXMLElement($xmlWriter, 'staff_id', $record['samp_specshstaffrstr_name']);
                $this->addXMLElement($xmlWriter, 'shipper_id', $record['']); // MISSING FIELD IN VARDEFS
		$this->addXMLElement($xmlWriter, 'shipper_destination', $record['shipper_destination']);
                $this->addXMLElement($xmlWriter, 'shipment_date', $record['shipment_date']);
                $this->addXMLElement($xmlWriter, 'shipment_temperature', $record['shipment_temperature']);
                $this->addXMLElement($xmlWriter, 'shipment_tracking_no', $record['shipment_tracking_no']);
		$this->addXMLElement($xmlWriter, 'shipment_receipt_confirmed', $record['shipment_receipt_confirmed']);
                $this->addXMLElement($xmlWriter, 'shipment_receipt_dt', $record['shipment_receipt_dt']);
                $this->addXMLElement($xmlWriter, 'shipment_issues', $record['shipment_issues']);
                $this->addXMLElement($xmlWriter, 'shipment_issues_oth', $record['shipment_issues_oth']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseSpecimenStorage(&$xmlWriter)
    {
        $results = export(SPECIMEN_STORAGE_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('spec_storage');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
		$this->addXMLElement($xmlWriter, 'spsc_id', $record['']); // MISSING FIELD IN VARDEFS
		$this->addXMLElement($xmlWriter, 'storage_container_id', $record['name']);
		$this->addXMLElement($xmlWriter, 'placed_in_storage_dt', $record['placed_in_storage_dt']);
		$this->addXMLElement($xmlWriter, 'staff_id', $record['samp_specststaffrstr_name']); 
		$this->addXMLElement($xmlWriter, 'equip_id', $record['']); // MISSING FIELD IN VARDEFS
                $this->addXMLElement($xmlWriter, 'master_storage_unit', $record['master_storage_unit']);
                $this->addXMLElement($xmlWriter, 'storage_comment', $record['storage_comment']);
                $this->addXMLElement($xmlWriter, 'storage_comment_oth', $record['storage_comment_oth']);
                $this->addXMLElement($xmlWriter, 'removed_from_storage_dt', $record['removed_from_storage_dt']);
		$this->addXMLElement($xmlWriter, 'temp_event_st', $record['temp_event_st']);
                $this->addXMLElement($xmlWriter, 'temp_event_et', $record['temp_event_et']);
                $this->addXMLElement($xmlWriter, 'temp_event_low_temp', $record['temp_event_low_temp']);
                $this->addXMLElement($xmlWriter, 'temp_event_high_temp', $record['temp_event_high_temp']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
	}
	
    function parseSpecimenInfo(&$xmlWriter)
    {
        $results = export(SPECIMEN_INFO_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('spec_spsc_info');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
		$this->addXMLElement($xmlWriter, 'spsc_id', $record['name']);
		$this->addXMLElement($xmlWriter, 'address_id', $record['samp_spscint_address_name']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
	}
	
    function parseEnvironmentalEquipmentInformation(&$xmlWriter)
    {
        $results = export(ENVIRONMENTAL_EQUIPMENT_INFO_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('env_equipment');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
		$this->addXMLElement($xmlWriter, 'spsc_id', $record['']); // MISSING FIELD IN VARDEFS
		$this->addXMLElement($xmlWriter, 'equip_id', $record['name']);
		$this->addXMLElement($xmlWriter, 'equipment_type', $record['equipment_type']);
		$this->addXMLElement($xmlWriter, 'equipment_type_oth', $record['equipment_type_oth']);
                $this->addXMLElement($xmlWriter, 'serial_no', $record['serial_no']);
                $this->addXMLElement($xmlWriter, 'government_asset_tag_no', $record['government_asset_tag_no']);
                $this->addXMLElement($xmlWriter, 'retired_date', $record['retired_date']);
		$this->addXMLElement($xmlWriter, 'retired_reason', $record['retired_reason']);
                $this->addXMLElement($xmlWriter, 'retired_reason_oth', $record['retired_reason_oth']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
	}
	
    function parseEnvironmentalEquipmentProblemLog(&$xmlWriter)
    {
        $results = export(ENV_EQUIPMENT_PROBLEM_LOG_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('env_equipment_prob_log');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
		$this->addXMLElement($xmlWriter, 'spsc_id', $record['']); // MISSING FIELD IN VARDEFS
		$this->addXMLElement($xmlWriter, 'equip_id', $record['']); // MISSING FIELD IN VARDEFS
		$this->addXMLElement($xmlWriter, 'problem_id', $record['name']);
		$this->addXMLElement($xmlWriter, 'equipment_type', $record['equipment_type']);
		$this->addXMLElement($xmlWriter, 'equipment_type_oth', $record['equipment_type_oth']);
               	$this->addXMLElement($xmlWriter, 'staff_id', $record['samp_envequstaffrstr_name']);
                $this->addXMLElement($xmlWriter, 'problem_dt', $record['problem_dt']);
                $this->addXMLElement($xmlWriter, 'equip_issue', $record['equip_issue']);
                $this->addXMLElement($xmlWriter, 'equip_action', $record['equip_action']);
		$this->addXMLElement($xmlWriter, 'staff_id_reviewer', $record['staff_id_reviewer']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
	}
	
    function parseParticipantConsentSample(&$xmlWriter)
    {
        $results = export(PARTICIPANT_CONSENT_SAMPLE_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('participant_consent_sample');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'p_id', $record['plt_partsamrticipant_name']);
                $this->addXMLElement($xmlWriter, 'participant_consent_id', $record['']);
                $this->addXMLElement($xmlWriter, 'participant_consent_sample_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'sample_consent_type', $record['sample_consent_type']);
                $this->addXMLElement($xmlWriter, 'sample_consent_given', $record['sample_consent_given']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
	}
	
    function parseParticipantRecordVisit(&$xmlWriter)
    {
        $results = export(PARTICIPANT_RECORD_VISIT_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('participant_rvis');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'rvis_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'p_id', $record['plt_partrvirticipant_name']);
                $this->addXMLElement($xmlWriter, 'rvis_language', $record['rvis_language']);
                $this->addXMLElement($xmlWriter, 'rvis_language_oth', $record['rvis_language_oth']);
                $this->addXMLElement($xmlWriter, 'rvis_person', $record['rvis_person']);
                $this->addXMLElement($xmlWriter, 'rvis_who_consented', $record['rvis_who_consented']);
                $this->addXMLElement($xmlWriter, 'rvis_translate', $record['rvis_translate']);
                $this->addXMLElement($xmlWriter, 'contact_id', $record['']); // MISSING FIELD IN VARDEFS
                $this->addXMLElement($xmlWriter, 'time_stamp_1', $record['time_stamp_1']);
                $this->addXMLElement($xmlWriter, 'rvis_sections', $record['rvis_sections']);
                $this->addXMLElement($xmlWriter, 'rvis_during_interv', $record['rvis_during_interv']);
                $this->addXMLElement($xmlWriter, 'rvis_during_bio', $record['rvis_during_bio']);
                $this->addXMLElement($xmlWriter, 'rvis_bio_cord', $record['rvis_bio_cord']);
                $this->addXMLElement($xmlWriter, 'rvis_during_env', $record['rvis_during_env']);
                $this->addXMLElement($xmlWriter, 'rvis_during_thanks', $record['rvis_during_thanks']);
                $this->addXMLElement($xmlWriter, 'rvis_after_saq', $record['rvis_after_saq']);
                $this->addXMLElement($xmlWriter, 'rvis_reconsideration', $record['rvis_reconsideration']);
                $this->addXMLElement($xmlWriter, 'time_stamp_2', $record['time_stamp_2']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
	}
	
	function parseParticipantVisitConsent(&$xmlWriter)
        {
            $results = export(PARTICIPANT_VIS_CONSENT_SUGAR_MODULE);
            foreach ($results as $record) {
                $xmlWriter->startElement('participant_vis_consent');
                    $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                    $this->addXMLElement($xmlWriter, 'pid_visit_consent_id', $record['name']);
                    $this->addXMLElement($xmlWriter, 'p_id', $record['plt_particirtcptvstc_name']);
                    $this->addXMLElement($xmlWriter, 'vis_consent_type', $record['vis_consent_type']);
                    $this->addXMLElement($xmlWriter, 'vis_consent_response', $record['vis_consent_response']);
                    $this->addXMLElement($xmlWriter, 'vis_language', $record['vis_language']);
                    $this->addXMLElement($xmlWriter, 'vis_language_oth', $record['vis_language_oth']);
                    $this->addXMLElement($xmlWriter, 'vis_person_who_consented_id', $record['vis_person_who_consented_id']);
                    $this->addXMLElement($xmlWriter, 'vis_who_consented', $record['vis_who_consented']);
                    $this->addXMLElement($xmlWriter, 'vis_translate', $record['vis_translate']);
                    $this->addXMLElement($xmlWriter, 'vis_comments', $record['vis_comments']);
                    $this->addXMLElement($xmlWriter, 'contact_id', $record['ncsdc_cntctrtcptvstc_name']);
                    $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
                $xmlWriter->endElement();
            }
            $xmlWriter->flush();
        unset($results);  
        }
	
    function parsePrecisionThermometerCertification(&$xmlWriter)
    {
        $results = export(PRECISION_THERMOMETER_CERT_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('prec_therm_cert');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'srsc_id', $record['']); // MISSING FIELD IN VARDEFS
                $this->addXMLElement($xmlWriter, 'equip_id', $record['']); // MISSING FIELD IN VARDEFS
                $this->addXMLElement($xmlWriter, 'staff_id', $record['samp_prethrstaffrstr_name']);
		$this->addXMLElement($xmlWriter, 'certification_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'precision_cert_status', $record['precision_cert_status']);
                $this->addXMLElement($xmlWriter, 'certification_date', $record['certification_date']);
                $this->addXMLElement($xmlWriter, 'certification_expire_dt', $record['certification_expire_dt']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseRefrigeratorFreezerVerification(&$xmlWriter)
    {
        $results = export(REFRIGERATOR_FREEZER_VER_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('ref_freezer_verification');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'srsc_id', $record['']); // MISSING FIELD IN VARDEFS
                $this->addXMLElement($xmlWriter, 'equip_id', $record['']); // MISSING FIELD IN VARDEFS
                $this->addXMLElement($xmlWriter, 'staff_id', $record['samp_reffrestaffrstr_name']);
		$this->addXMLElement($xmlWriter, 'verification_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'verification_dt', $record['verification_dt']);
                $this->addXMLElement($xmlWriter, 'rf_thermometer_equip_id', $record['rf_thermometer_equip_id']); 
                $this->addXMLElement($xmlWriter, 'correction_factor_temp', $record['correction_factor_temp']);
                $this->addXMLElement($xmlWriter, 'current_temp', $record['current_temp']);
                $this->addXMLElement($xmlWriter, 'maximum_temp', $record['maximum_temp']);
                $this->addXMLElement($xmlWriter, 'minimum_temp', $record['minimum_temp']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseSampleReceiptStorage(&$xmlWriter)
    {
        $results = export(SAMPLE_RECEIPT_STORAGE_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('sample_receipt_store');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'sample_id', $record['name']); // MISSING FIELD IN VARDEFS
		$this->addXMLElement($xmlWriter, 'srsc_id', $record['']); // MISSING FIELD IN VARDEFS
                $this->addXMLElement($xmlWriter, 'staff_id', $record['samp_samprestaffrstr_name']);
                $this->addXMLElement($xmlWriter, 'sample_condition', $record['sample_condition']);
                $this->addXMLElement($xmlWriter, 'receipt_comment_oth', $record['receipt_comment_oth']); 
                $this->addXMLElement($xmlWriter, 'receipt_dt', $record['receipt_dt']);
		$this->addXMLElement($xmlWriter, 'cooler_temp_cond', $record['cooler_temp_cond']);
                $this->addXMLElement($xmlWriter, 'equip_id', $record['']);
		$this->addXMLElement($xmlWriter, 'placed_in_storage_dt', $record['placed_in_storage_dt']);
                $this->addXMLElement($xmlWriter, 'storage_compartment_area', $record['storage_compartment_area']);
                $this->addXMLElement($xmlWriter, 'storage_comment_oth', $record['storage_comment_oth']);
                $this->addXMLElement($xmlWriter, 'removed_from_storage_dt', $record['removed_from_storage_dt']);
                $this->addXMLElement($xmlWriter, 'temp_event_occurred', $record['temp_event_occurred']);
                $this->addXMLElement($xmlWriter, 'temp_event_action', $record['temp_event_action']);
                $this->addXMLElement($xmlWriter, 'temp_event_action_oth', $record['temp_event_action_oth']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseSampleShipping(&$xmlWriter)
    {
        $results = export(SAMPLE_SHIPPING_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('sample_shipping');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'sample_id', $record['name']);
		$this->addXMLElement($xmlWriter, 'srsc_id', $record['']); // MISSING FIELD IN VARDEFS
                $this->addXMLElement($xmlWriter, 'staff_id', $record['samp_sampshstaffrstr_name']);
                $this->addXMLElement($xmlWriter, 'shipper_id', $record['shipper_id']);
                $this->addXMLElement($xmlWriter, 'shipper_destination', $record['shipper_destination']); 
                $this->addXMLElement($xmlWriter, 'shipment_date', $record['shipment_date']);
                $this->addXMLElement($xmlWriter, 'shipment_coolant', $record['shipment_coolant']);
                $this->addXMLElement($xmlWriter, 'shipment_tracking_no', $record['shipment_tracking_no']);
                $this->addXMLElement($xmlWriter, 'shipment_issues_oth', $record['shipment_issues_oth']);
                $this->addXMLElement($xmlWriter, 'staff_id_track', $record['staff_id_track']);
                $this->addXMLElement($xmlWriter, 'sample_shipped_by', $record['sample_shipped_by']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    // PROBLEM WITH THE DATA MODEL RELATED TO THE JOINS. SQL FAILS.
    function parseSrscInformation(&$xmlWriter)
    {
        $results = export(SRSC_INFO_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('srsc_info');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'srsc_id', $record['name']);
		$this->addXMLElement($xmlWriter, 'address_id', $record['samp_srscint_address_name']);
                $this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseSubsampleDocument(&$xmlWriter)
    {
        $results = export(SUBSAMPLE_DOC_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('subsample_doc');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'event_id', $record['samp_subsameventinfo_name']);
		$this->addXMLElement($xmlWriter, 'subsample_doc_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'random_order_no', $record['random_order_no']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseTRHMeterCalibration(&$xmlWriter)
    {
        $results = export(TRH_METER_CALIBRATION_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('trh_meter_calibration');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'srsc_id', $record['']); // MISSING FIELD IN VARDEFS
                $this->addXMLElement($xmlWriter, 'equip_id', $record['']); // MISSING FIELD IN VARDEFS
                $this->addXMLElement($xmlWriter, 'staff_id', $record['samp_trhmetstaffrstr_name']);
		$this->addXMLElement($xmlWriter, 'calibration_id', $record['name']);
		$this->addXMLElement($xmlWriter, 'sample_condition', $record['sample_condition']);
                $this->addXMLElement($xmlWriter, 'calibration_expire_dt', $record['calibration_expire_dt']); 
                $this->addXMLElement($xmlWriter, 'verification_dt', $record['verification_dt']);
                $this->addXMLElement($xmlWriter, 'thr_equip_id', $record['thr_equip_id']);
                $this->addXMLElement($xmlWriter, 'precision_term_temp', $record['precision_term_temp']);
                $this->addXMLElement($xmlWriter, 'trh_temp', $record['trh_temp']);
                $this->addXMLElement($xmlWriter, 'salts_moist', $record['salts_moist']);
                $this->addXMLElement($xmlWriter, 's_33rh_reading', $record['s_33rh_reading']);
                $this->addXMLElement($xmlWriter, 's_75rh_reading', $record['s_75rh_reading']);
                $this->addXMLElement($xmlWriter, 's_33_rh_need_calib', $record['s_33_rh_need_calib']);
		$this->addXMLElement($xmlWriter, 's_75_rh_need_calib', $record['s_75_rh_need_calib']);
		$this->addXMLElement($xmlWriter, 's_33rh_reading_calib', $record['s_33rh_reading_calib']);
		$this->addXMLElement($xmlWriter, 's_75rh_reading_calib', $record['s_75rh_reading_calib']);
		$this->addXMLElement($xmlWriter, 'trh_calib_fail_rsn', $record['trh_calib_fail_rsn']);
		$this->addXMLElement($xmlWriter, 'trh_calib_fail_reas_other', $record['trh_calib_fail_reas_other']);
		$this->addXMLElement($xmlWriter, 'trh_calib_status', $record['trh_calib_status']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseDigitalRefrigeratorFreezerThermVerification(&$xmlWriter)
    {
        $results = export(DRFT_THERM_VERIFICATION_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('drf_therm_verification');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'srsc_id', $record['']); // MISSING FIELD IN VARDEFS
                $this->addXMLElement($xmlWriter, 'staff_id', $record['samp_drfthestaffrstr_name']);
		$this->addXMLElement($xmlWriter, 'drf_therm_verification_date', $record['drf_therm_verification_date']);
		$this->addXMLElement($xmlWriter, 'drf_verification_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'equip_id', $record['']); // MISSING FIELD IN VARDEFS
		$this->addXMLElement($xmlWriter, 'rf_thermometer_equip_id', $record['rf_thermometer_equip_id']);
                $this->addXMLElement($xmlWriter, 'certification_expire_dt', $record['certification_expire_dt']);
                $this->addXMLElement($xmlWriter, 'precision_term_temp', $record['precision_term_temp']);
                $this->addXMLElement($xmlWriter, 'rf_temp', $record['rf_temp']);
                $this->addXMLElement($xmlWriter, 'correction_factor_temp', $record['correction_factor_temp']);
		$this->addXMLElement($xmlWriter, 'transaction_type', 'NA');
            $xmlWriter->endElement();
        }
        $xmlWriter->flush();
        unset($results);  
    }
	
    function parseSampleReceiptConfirmation(&$xmlWriter)
    {
        $results = export(SAMPLE_RECEIPT_CONFIRM_SUGAR_MODULE);
        foreach ($results as $record) {
            $xmlWriter->startElement('sample_receipt_confirm');
                $this->addXMLElement($xmlWriter, 'psu_id', $this->replaceIfMissing($record['psu_id'], $this->master_psu_id));
                $this->addXMLElement($xmlWriter, 'srsc_id', $record['']); // MISSING FIELD IN VARDEFS
		$this->addXMLElement($xmlWriter, 'shipment_receipt_confirmed', $record['shipment_receipt_confirmed']); 
                $this->addXMLElement($xmlWriter, 'shipper_id', $record['shipper_id']);
                $this->addXMLElement($xmlWriter, 'shipment_tracking_no', $record['shipment_tracking_no']);
                $this->addXMLElement($xmlWriter, 'shipment_receipt_dt', $record['shipment_receipt_dt']);
                $this->addXMLElement($xmlWriter, 'shipment_condition', $record['shipment_condition']);
                $this->addXMLElement($xmlWriter, 'shipment_damaged_reason', $record['shipment_damaged_reason']);
		$this->addXMLElement($xmlWriter, 'sample_id', $record['name']);
                $this->addXMLElement($xmlWriter, 'sample_receipt_temp', $record['sample_receipt_temp']);
		$this->addXMLElement($xmlWriter, 'sample_condition', $record['sample_condition']);
		$this->addXMLElement($xmlWriter, 'shipment_received_by', $record['shipment_received_by']);
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
