<?php
$module_name = 'SAMP_RefFreezVer';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'verification_dt',
            'label' => 'LBL_VERIFICATION_DT',
          ),
          1 => 
          array (
            'name' => 'rf_thermometer_equip_id',
            'label' => 'LBL_RF_THERMOMETER_EQUIP_ID',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'current_temp',
            'label' => 'LBL_CURRENT_TEMP',
          ),
          1 => 
          array (
            'name' => 'correction_factor_temp',
            'label' => 'LBL_CORRECTION_FACTOR_TEMP',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'minimum_temp',
            'label' => 'LBL_MINIMUM_TEMP',
          ),
          1 => 
          array (
            'name' => 'maximum_temp',
            'label' => 'LBL_MAXIMUM_TEMP',
          ),
        ),
      ),
    ),
  ),
);
?>
