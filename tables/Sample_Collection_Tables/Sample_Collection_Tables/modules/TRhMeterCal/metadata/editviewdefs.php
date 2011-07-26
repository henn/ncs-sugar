<?php
$module_name = 'SAMP_TRhMeterCal';
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
            'name' => 'calibration_expire_dt',
            'label' => 'LBL_CALIBRATION_EXPIRE_DT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'trh_calib_status',
            'studio' => 'visible',
            'label' => 'LBL_TRH_CALIB_STATUS',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'trh_calib_fail_rsn',
            'studio' => 'visible',
            'label' => 'LBL_TRH_CALIB_FAIL_RSN',
          ),
          1 => 
          array (
            'name' => 'trh_calib_fail_reas_other',
            'label' => 'LBL_TRH_CALIB_FAIL_REAS_OTHER',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'samp_trhmetstaffrstr_name',
          ),
          1 => 
          array (
            'name' => 'samp_trhmet_srscinfo_name',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'samp_trhmetp_enequip_name',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'precision_term_temp',
            'label' => 'LBL_PRECISION_TERM_TEMP',
          ),
          1 => 
          array (
            'name' => 'thr_equip_id',
            'label' => 'LBL_THR_EQUIP_ID',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'trh_temp',
            'label' => 'LBL_TRH_TEMP',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'salts_moist',
            'studio' => 'visible',
            'label' => 'LBL_SALTS_MOIST',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 's_33rh_reading',
            'label' => 'LBL_S_33RH_READING',
          ),
          1 => 
          array (
            'name' => 's_33_rh_need_calib',
            'studio' => 'visible',
            'label' => 'LBL_S_33_RH_NEED_CALIB',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 's_33rh_reading_calib',
            'label' => 'LBL_S_33RH_READING_CALIB',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 's_75rh_reading',
            'label' => 'LBL_S_75RH_READING',
          ),
          1 => 
          array (
            'name' => 's_75_rh_need_calib',
            'studio' => 'visible',
            'label' => 'LBL_S_75_RH_NEED_CALIB',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 's_75rh_reading_calib',
            'label' => 'LBL_S_75RH_READING_CALIB',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
