<?php
$module_name = 'ST_MSOutLang2';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ST_MSOUTLANT_WKOEACT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'st_msoutlang2_st_wkoeact',
    'label' => 'LBL_ST_MSOUTLANG2_ST_WKOEACT_FROM_ST_WKOEACT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_LANG2' => 
  array (
    'type' => 'multienum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_LANG2',
    'width' => '10%',
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
