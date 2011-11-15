<?php
$module_name = 'ST_MSOutRace';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ST_MSOUTRACT_WKOEACT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'st_msoutrace_st_wkoeact',
    'label' => 'LBL_ST_MSOUTRACE_ST_WKOEACT_FROM_ST_WKOEACT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_RACE2' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_RACE2',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_RACE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_RACE_OTH',
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
