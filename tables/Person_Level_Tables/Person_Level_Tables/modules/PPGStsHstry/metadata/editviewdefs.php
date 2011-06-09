<?php
$module_name = 'PLT_PPGStsHstry';
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
            'label' => 'Name (PPG_HISTORY_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
        1 => 
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
        2 => 
        array (
          0 => 
          array (
            'name' => 'ppg_info_mode',
            'studio' => 'visible',
            'label' => 'LBL_PPG_INFO_MODE',
          ),
          1 => 
          array (
            'name' => 'ppg_info_mode_oth',
            'label' => 'LBL_PPG_INFO_MODE_OTH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'ppg_info_source',
            'studio' => 'visible',
            'label' => 'LBL_PPG_INFO_SOURCE',
          ),
          1 => 
          array (
            'name' => 'ppg_info_source_oth',
            'label' => 'LBL_PPG_INFO_SOURCE_OTH',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'ppg_comment',
            'studio' => 'visible',
            'label' => 'LBL_PPG_COMMENT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'plt_particigstshstry_name',
            'label' => 'LBL_PLT_PARTICIPANT_PLT_PPGSTSHSTRY_FROM_PLT_PARTICIPANT_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
