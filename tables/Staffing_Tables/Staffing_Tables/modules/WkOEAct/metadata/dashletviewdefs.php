<?php
$dashletData['ST_WkOEActDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'type' => 'assigned_user_name',
    'default' => 'Administrator',
  ),
);
$dashletData['ST_WkOEActDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'name' => 'date_entered',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'tsu_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TSU_ID',
    'width' => '10%',
    'default' => false,
  ),
  'outreach_event_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_OUTREACH_EVENT_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'outreach_mode' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_MODE',
    'sortable' => false,
    'width' => '10%',
  ),
  'outreach_mode_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_MODE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'outreach_type' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'outreach_type_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'outreach_tailored' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_TAILORED',
    'sortable' => false,
    'width' => '10%',
  ),
  'outreach_lang1' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_LANG1',
    'sortable' => false,
    'width' => '10%',
  ),
  'outreach_lang_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_LANG_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'outreach_race1' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_RACE1',
    'sortable' => false,
    'width' => '10%',
  ),
  'outreach_culture1' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_CULTURE1',
    'sortable' => false,
    'width' => '10%',
  ),
  'outreach_culture2' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_CULTURE2',
    'sortable' => false,
    'width' => '10%',
  ),
  'outreach_culture_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_CULTURE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'outreach_quantity' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_QUANTITY',
    'width' => '10%',
    'default' => false,
  ),
  'outreach_cost' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_OUTREACH_COST',
    'width' => '10%',
    'default' => false,
  ),
  'outreach_staffing' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_STAFFING',
    'width' => '10%',
    'default' => false,
  ),
  'outreach_incident' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_INCIDENT',
    'sortable' => false,
    'width' => '10%',
  ),
  'outreach_eval_result' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_EVAL_RESULT',
    'sortable' => false,
    'width' => '10%',
  ),
  'title' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'st_msoutlant_wkoeact_name' => 
  array (
    'type' => 'relate',
    'link' => 'st_msoutlang2_st_wkoeact',
    'label' => 'LBL_ST_MSOUTLANG2_ST_WKOEACT_FROM_ST_MSOUTLANG2_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'st_msoutevat_wkoeact_name' => 
  array (
    'type' => 'relate',
    'link' => 'st_msouteval_st_wkoeact',
    'label' => 'LBL_ST_MSOUTEVAL_ST_WKOEACT_FROM_ST_MSOUTEVAL_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'st_msoutract_wkoeact_name' => 
  array (
    'type' => 'relate',
    'link' => 'st_msoutrace_st_wkoeact',
    'label' => 'LBL_ST_MSOUTRACE_ST_WKOEACT_FROM_ST_MSOUTRACE_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'st_msouttart_wkoeact_name' => 
  array (
    'type' => 'relate',
    'link' => 'st_msouttarg_st_wkoeact',
    'label' => 'LBL_ST_MSOUTTARG_ST_WKOEACT_FROM_ST_MSOUTTARG_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'st_wkoeact_ecsampunt_name' => 
  array (
    'type' => 'relate',
    'link' => 'st_wkoeact_gt_secsampunt',
    'label' => 'LBL_ST_WKOEACT_GT_SECSAMPUNT_FROM_GT_SECSAMPUNT_TITLE',
    'width' => '10%',
    'default' => false,
  ),
);
