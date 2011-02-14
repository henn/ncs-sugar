<?php
$module_name = 'PLT_PPGStsHstry';
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
          1 => 
          array (
            'name' => 'ppg_status_date',
            'label' => 'LBL_PPG_STATUS_DATE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'ppg_info_mode',
            'studio' => 'visible',
            'label' => 'LBL_PPG_INFO_MODE',
          ),
          1 => 
          array (
            'name' => 'ppg_info_source',
            'studio' => 'visible',
            'label' => 'LBL_PPG_INFO_SOURCE',
          ),
        ),
        4 => 
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
        5 => 
        array (
          0 => 
          array (
            'name' => 'ppg_comment',
            'studio' => 'visible',
            'label' => 'LBL_PPG_COMMENT',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'plt_participant_plt_ppg_status_history_name',
          ),
          1 => 
          array (
            'name' => 'plt_participant_plt_ppgstshstry_name',
          ),
        ),
      ),
    ),
  ),
);
?>
