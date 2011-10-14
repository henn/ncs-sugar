<?php
$dashletData['SAMP_DRFThermVerDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'type' => 'assigned_user_name',
    'default' => 'Administrator',
  ),
);
$dashletData['SAMP_DRFThermVerDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'name' => 'date_entered',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'drf_therm_verification_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DRF_THERM_VERIFICATION_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'certification_expire_dt' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CERTIFICATION_EXPIRE_DT',
    'width' => '10%',
    'default' => false,
  ),
  'rf_thermometer_equip_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RF_THERMOMETER_EQUIP_ID',
    'width' => '10%',
    'default' => false,
  ),
  'precision_term_temp' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_PRECISION_TERM_TEMP',
    'width' => '10%',
    'default' => false,
  ),
  'rf_temp' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_RF_TEMP',
    'width' => '10%',
    'default' => false,
  ),
  'correction_factor_temp' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_CORRECTION_FACTOR_TEMP',
    'width' => '10%',
    'default' => false,
  ),
  'samp_drfthestaffrstr_name' => 
  array (
    'type' => 'relate',
    'link' => 'samp_drfther_st_staffrstr',
    'label' => 'LBL_SAMP_DRFTHERMVER_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'samp_drfthe_srscinfo_name' => 
  array (
    'type' => 'relate',
    'link' => 'samp_drfthe_samp_srscinfo',
    'label' => 'LBL_SAMP_DRFTHERMVER_SAMP_SRSCINFO_FROM_SAMP_SRSCINFO_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'samp_drfthep_enequip_name' => 
  array (
    'type' => 'relate',
    'link' => 'samp_drfther_samp_enequip',
    'label' => 'LBL_SAMP_DRFTHERMVER_SAMP_ENEQUIP_FROM_SAMP_ENEQUIP_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
);
