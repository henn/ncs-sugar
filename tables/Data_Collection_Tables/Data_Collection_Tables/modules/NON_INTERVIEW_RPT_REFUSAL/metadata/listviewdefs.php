<?php
$module_name = 'NCSDC_NON_INTERVIEW_RPT_REFUSAL';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'NIR_REFUSAL_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NIR_REFUSAL_ID',
    'width' => '10%',
    'default' => true,
  ),
  'REFUSAL_REASON_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_REFUSAL_REASON_OTH',
    'width' => '10%',
    'default' => true,
  ),
);
?>
