<?php
$dashletData['SAMP_RefFreezVerDashlet']['searchFields'] = array (
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
$dashletData['SAMP_RefFreezVerDashlet']['columns'] = array (
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
  'verification_dt' => 
  array (
    'type' => 'date',
    'label' => 'LBL_VERIFICATION_DT',
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
  'correction_factor_temp' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_CORRECTION_FACTOR_TEMP',
    'width' => '10%',
    'default' => false,
  ),
  'current_temp' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_CURRENT_TEMP',
    'width' => '10%',
    'default' => false,
  ),
  'maximum_temp' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_MAXIMUM_TEMP',
    'width' => '10%',
    'default' => false,
  ),
  'minimum_temp' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_MINIMUM_TEMP',
    'width' => '10%',
    'default' => false,
  ),
  'samp_reffrestaffrstr_name' => 
  array (
    'type' => 'relate',
    'link' => 'samp_reffrer_st_staffrstr',
    'label' => 'LBL_SAMP_REFFREEZVER_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'samp_reffre_srscinfo_name' => 
  array (
    'type' => 'relate',
    'link' => 'samp_reffre_samp_srscinfo',
    'label' => 'LBL_SAMP_REFFREEZVER_SAMP_SRSCINFO_FROM_SAMP_SRSCINFO_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'samp_reffrep_enequip_name' => 
  array (
    'type' => 'relate',
    'link' => 'samp_reffrer_samp_enequip',
    'label' => 'LBL_SAMP_REFFREEZVER_SAMP_ENEQUIP_FROM_SAMP_ENEQUIP_TITLE',
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
