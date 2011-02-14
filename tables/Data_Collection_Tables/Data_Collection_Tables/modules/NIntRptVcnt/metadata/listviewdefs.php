<?php
$module_name = 'NCSDC_NIntRptVcnt';
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
  'NIR_VACANT' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_NIR_VACANT',
    'sortable' => false,
    'width' => '10%',
  ),
  'NIR_VACANT_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NIR_VACANT_OTH',
    'width' => '10%',
    'default' => true,
  ),
);
?>
