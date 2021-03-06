<?php
$module_name = 'ST_MSOutEval';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ST_MSOUTEVAT_WKOEACT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'st_msouteval_st_wkoeact',
    'label' => 'LBL_ST_MSOUTEVAL_ST_WKOEACT_FROM_ST_WKOEACT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_EVAL' => 
  array (
    'type' => 'multienum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_EVAL',
    'width' => '10%',
  ),
  'OUTREACH_EVAL_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_EVAL_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
