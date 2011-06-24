<?php
$module_name = 'SAMP_RefFreezVer';
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
      'verification_dt' => 
      array (
        'type' => 'date',
        'label' => 'LBL_VERIFICATION_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'verification_dt',
      ),
      'current_temp' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_CURRENT_TEMP',
        'width' => '10%',
        'default' => true,
        'name' => 'current_temp',
      ),
      'minimum_temp' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_MINIMUM_TEMP',
        'width' => '10%',
        'default' => true,
        'name' => 'minimum_temp',
      ),
      'maximum_temp' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_MAXIMUM_TEMP',
        'width' => '10%',
        'default' => true,
        'name' => 'maximum_temp',
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
      'verification_dt' => 
      array (
        'type' => 'date',
        'label' => 'LBL_VERIFICATION_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'verification_dt',
      ),
      'current_temp' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_CURRENT_TEMP',
        'width' => '10%',
        'default' => true,
        'name' => 'current_temp',
      ),
      'maximum_temp' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_MAXIMUM_TEMP',
        'width' => '10%',
        'default' => true,
        'name' => 'maximum_temp',
      ),
      'minimum_temp' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_MINIMUM_TEMP',
        'width' => '10%',
        'default' => true,
        'name' => 'minimum_temp',
      ),
      'correction_factor_temp' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_CORRECTION_FACTOR_TEMP',
        'width' => '10%',
        'default' => true,
        'name' => 'correction_factor_temp',
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
