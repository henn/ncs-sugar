<?php
$module_name = 'SAMP_DRFThermVer';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'DRF_THERM_VERIFICATION_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DRF_THERM_VERIFICATION_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'CERTIFICATION_EXPIRE_DT' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CERTIFICATION_EXPIRE_DT',
    'width' => '10%',
    'default' => true,
  ),
  'PRECISION_TERM_TEMP' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_PRECISION_TERM_TEMP',
    'width' => '10%',
    'default' => true,
  ),
  'RF_TEMP' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_RF_TEMP',
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
);
?>
