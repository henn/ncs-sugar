<?php
$module_name = 'SAMP_RefFreezVer';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'VERIFICATION_DT' => 
  array (
    'type' => 'date',
    'label' => 'LBL_VERIFICATION_DT',
    'width' => '10%',
    'default' => true,
  ),
  'CURRENT_TEMP' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_CURRENT_TEMP',
    'width' => '10%',
    'default' => true,
  ),
  'MINIMUM_TEMP' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_MINIMUM_TEMP',
    'width' => '10%',
    'default' => true,
  ),
  'MAXIMUM_TEMP' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_MAXIMUM_TEMP',
    'width' => '10%',
    'default' => true,
  ),
  'CORRECTION_FACTOR_TEMP' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_CORRECTION_FACTOR_TEMP',
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
  'RF_THERMOMETER_EQUIP_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RF_THERMOMETER_EQUIP_ID',
    'width' => '10%',
    'default' => false,
  ),
);
?>
