<?php
$module_name = 'SAMP_DRFThermVer';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
        ),
      ),
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
            'name' => 'drf_therm_verification_date',
            'label' => 'LBL_DRF_THERM_VERIFICATION_DATE',
          ),
          1 => 
          array (
            'name' => 'certification_expire_dt',
            'label' => 'LBL_CERTIFICATION_EXPIRE_DT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'precision_term_temp',
            'label' => 'LBL_PRECISION_TERM_TEMP',
          ),
          1 => 
          array (
            'name' => 'rf_thermometer_equip_id',
            'label' => 'LBL_RF_THERMOMETER_EQUIP_ID',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'rf_temp',
            'label' => 'LBL_RF_TEMP',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'correction_factor_temp',
            'label' => 'LBL_CORRECTION_FACTOR_TEMP',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'samp_drfthestaffrstr_name',
          ),
        ),
      ),
    ),
  ),
);
?>
