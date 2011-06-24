<?php
$module_name = 'SAMP_TRhMeterCal';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'trh_calib_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TRH_CALIB_STATUS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'trh_calib_status',
      ),
      'verification_dt' => 
      array (
        'type' => 'date',
        'label' => 'LBL_VERIFICATION_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'verification_dt',
      ),
      'calibration_expire_dt' => 
      array (
        'type' => 'date',
        'label' => 'LBL_CALIBRATION_EXPIRE_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'calibration_expire_dt',
      ),
      'trh_calib_fail_rsn' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TRH_CALIB_FAIL_RSN',
        'sortable' => false,
        'width' => '10%',
        'name' => 'trh_calib_fail_rsn',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'verification_dt' => 
      array (
        'type' => 'date',
        'label' => 'LBL_VERIFICATION_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'verification_dt',
      ),
      'calibration_expire_dt' => 
      array (
        'type' => 'date',
        'label' => 'LBL_CALIBRATION_EXPIRE_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'calibration_expire_dt',
      ),
      'trh_calib_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TRH_CALIB_STATUS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'trh_calib_status',
      ),
      'trh_calib_fail_rsn' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TRH_CALIB_FAIL_RSN',
        'sortable' => false,
        'width' => '10%',
        'name' => 'trh_calib_fail_rsn',
      ),
      's_33_rh_need_calib' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_S_33_RH_NEED_CALIB',
        'sortable' => false,
        'width' => '10%',
        'name' => 's_33_rh_need_calib',
      ),
      's_75_rh_need_calib' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_S_75_RH_NEED_CALIB',
        'sortable' => false,
        'width' => '10%',
        'name' => 's_75_rh_need_calib',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
