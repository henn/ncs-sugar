<?php
$module_name = 'ST_MSOutTarg';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ST_MSOUTTART_WKOEACT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'st_msouttarg_st_wkoeact',
    'label' => 'LBL_ST_MSOUTTARG_ST_WKOEACT_FROM_ST_WKOEACT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_TARGET_MS' => 
  array (
    'type' => 'multienum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_TARGET_MS',
    'width' => '10%',
  ),
  'OUTREACH_TARGET_MS_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_TARGET_MS_OTH',
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
