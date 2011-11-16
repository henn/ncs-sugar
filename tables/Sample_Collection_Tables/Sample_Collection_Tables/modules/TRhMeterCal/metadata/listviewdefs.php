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
  'SAMP_TRHMETSTAFFRSTR_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_trhmetl_st_staffrstr',
    'label' => 'LBL_SAMP_TRHMETERCAL_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'SAMP_TRHMET_SRSCINFO_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_trhmet_samp_srscinfo',
    'label' => 'LBL_SAMP_TRHMETERCAL_SAMP_SRSCINFO_FROM_SAMP_SRSCINFO_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'SAMP_TRHMETP_ENEQUIP_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_trhmetl_samp_enequip',
    'label' => 'LBL_SAMP_TRHMETERCAL_SAMP_ENEQUIP_FROM_SAMP_ENEQUIP_TITLE',
    'width' => '10%',
    'default' => true,
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
