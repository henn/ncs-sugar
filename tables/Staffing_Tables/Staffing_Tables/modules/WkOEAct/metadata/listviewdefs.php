<?php
$module_name = 'ST_WkOEAct';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ST_WKOEACT_ECSAMPUNT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'st_wkoeact_gt_secsampunt',
    'label' => 'LBL_ST_WKOEACT_GT_SECSAMPUNT_FROM_GT_SECSAMPUNT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ST_MSOUTRACT_WKOEACT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'st_msoutrace_st_wkoeact',
    'label' => 'LBL_ST_MSOUTRACE_ST_WKOEACT_FROM_ST_MSOUTRACE_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ST_MSOUTTART_WKOEACT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'st_msouttarg_st_wkoeact',
    'label' => 'LBL_ST_MSOUTTARG_ST_WKOEACT_FROM_ST_MSOUTTARG_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ST_MSOUTEVAT_WKOEACT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'st_msouteval_st_wkoeact',
    'label' => 'LBL_ST_MSOUTEVAL_ST_WKOEACT_FROM_ST_MSOUTEVAL_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ST_MSOUTLANT_WKOEACT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'st_msoutlang2_st_wkoeact',
    'label' => 'LBL_ST_MSOUTLANG2_ST_WKOEACT_FROM_ST_MSOUTLANG2_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'TITLE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_EVENT_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_OUTREACH_EVENT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_QUANTITY' => 
  array (
    'type' => 'int',
    'label' => 'LBL_OUTREACH_QUANTITY',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_STAFFING' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_STAFFING',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_COST' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_OUTREACH_COST',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => false,
  ),
  'TSU_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TSU_ID',
    'width' => '10%',
    'default' => false,
  ),
  'OUTREACH_INCIDENT' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_INCIDENT',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_CULTURE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_CULTURE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'OUTREACH_CULTURE2' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_CULTURE2',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_CULTURE1' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_CULTURE1',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_RACE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_RACE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'OUTREACH_RACE2' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_RACE2',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_RACE1' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_RACE1',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_LANG_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_LANG_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'OUTREACH_LANG1' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_LANG1',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_TAILORED' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_TAILORED',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'OUTREACH_MODE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_MODE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'OUTREACH_MODE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_MODE',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_TARGET_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_TARGET_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'OUTREACH_TARGET' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_TARGET',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
