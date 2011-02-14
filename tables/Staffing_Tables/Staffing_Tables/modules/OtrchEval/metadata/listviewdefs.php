<?php
$module_name = 'ST_OtrchEval';
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
  'PSU_ID' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PSU_ID',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_EVENT_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_EVENT_ID',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_EVAL' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_EVAL',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_EVAL_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_EVAL_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
?>
