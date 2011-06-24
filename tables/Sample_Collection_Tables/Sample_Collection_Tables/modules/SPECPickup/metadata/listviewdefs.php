<?php
$module_name = 'SAMP_SPECPickup';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SPECIMEN_PICKUP_DT' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_SPECIMEN_PICKUP_DT',
    'width' => '10%',
    'default' => true,
  ),
  'SPECIMEN_PICKUP_COMMENT' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SPECIMEN_PICKUP_COMMENT',
    'sortable' => false,
    'width' => '10%',
  ),
  'SPECIMEN_TRANS_TEMP' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_SPECIMEN_TRANS_TEMP',
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
  'SPECIMEN_PICKUP_CMT_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SPECIMEN_PICKUP_CMT_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
?>
