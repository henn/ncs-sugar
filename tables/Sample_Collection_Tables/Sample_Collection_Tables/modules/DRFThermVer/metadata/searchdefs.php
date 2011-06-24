<?php
$module_name = 'SAMP_DRFThermVer';
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
      'drf_therm_verification_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DRF_THERM_VERIFICATION_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'drf_therm_verification_date',
      ),
      'certification_expire_dt' => 
      array (
        'type' => 'date',
        'label' => 'LBL_CERTIFICATION_EXPIRE_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'certification_expire_dt',
      ),
      'rf_thermometer_equip_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_RF_THERMOMETER_EQUIP_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'rf_thermometer_equip_id',
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
      'drf_therm_verification_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DRF_THERM_VERIFICATION_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'drf_therm_verification_date',
      ),
      'certification_expire_dt' => 
      array (
        'type' => 'date',
        'label' => 'LBL_CERTIFICATION_EXPIRE_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'certification_expire_dt',
      ),
      'rf_thermometer_equip_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_RF_THERMOMETER_EQUIP_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'rf_thermometer_equip_id',
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
