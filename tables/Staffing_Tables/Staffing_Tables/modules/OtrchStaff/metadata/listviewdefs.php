<?php
$module_name = 'ST_OtrchStaff';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ST_OTRCHSTASTAFFRSTR_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'st_otrchstaf_st_staffrstr',
    'label' => 'LBL_ST_OTRCHSTAFF_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ST_OTRCHSTAT_WKOEACT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'st_otrchstaff_st_wkoeact',
    'label' => 'LBL_ST_OTRCHSTAFF_ST_WKOEACT_FROM_ST_WKOEACT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
);
?>
