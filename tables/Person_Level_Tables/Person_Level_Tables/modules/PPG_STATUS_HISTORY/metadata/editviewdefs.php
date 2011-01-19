<?php
$module_name = 'PLT_PPG_STATUS_HISTORY';
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
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
        1 => 
        array (
          0 => '',
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'ppg_status',
            'studio' => 'visible',
            'label' => 'LBL_PPG_STATUS',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'ppg_history_id',
            'label' => 'LBL_PPG_HISTORY_ID',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'ppg_info_mode',
            'studio' => 'visible',
            'label' => 'LBL_PPG_INFO_MODE',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'ppg_info_source',
            'studio' => 'visible',
            'label' => 'LBL_PPG_INFO_SOURCE',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'ppg_comment',
            'studio' => 'visible',
            'label' => 'LBL_PPG_COMMENT',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'ppg_status_date',
            'label' => 'LBL_PPG_STATUS_DATE',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'ppg_info_source_oth',
            'label' => 'LBL_PPG_INFO_SOURCE_OTH',
          ),
          1 => 
          array (
            'name' => 'ppg_info_mode_oth',
            'label' => 'LBL_PPG_INFO_MODE_OTH',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'plt_participant_plt_ppg_status_history_name',
          ),
        ),
      ),
    ),
  ),
);
?>
