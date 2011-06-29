<?php
$module_name = 'SAMP_TRhMeterCal';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'TRH_CALIB_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TRH_CALIB_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  'VERIFICATION_DT' => 
  array (
    'type' => 'date',
    'label' => 'LBL_VERIFICATION_DT',
    'width' => '10%',
    'default' => true,
  ),
  'CALIBRATION_EXPIRE_DT' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CALIBRATION_EXPIRE_DT',
    'width' => '10%',
    'default' => true,
  ),
  'TRH_CALIB_FAIL_RSN' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TRH_CALIB_FAIL_RSN',
    'sortable' => false,
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
