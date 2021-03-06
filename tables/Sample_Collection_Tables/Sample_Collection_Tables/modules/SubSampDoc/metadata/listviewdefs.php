<?php
$module_name = 'SAMP_SubSampDoc';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SAMP_SUBSAMEVENTINFO_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_subsamcsdc_eventinfo',
    'label' => 'LBL_SAMP_SUBSAMPDOC_NCSDC_EVENTINFO_FROM_NCSDC_EVENTINFO_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'RANDOM_ORDER_NO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RANDOM_ORDER_NO',
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
