<?php
$module_name = 'PLT_PPGDetails';
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
            'label' => 'Name (PPG_DETAILS_ID):',
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
          0 => '',
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'ppg_pid_status',
            'studio' => 'visible',
            'label' => 'LBL_PPG_PID_STATUS',
          ),
          1 => 
          array (
            'name' => 'ppg_first',
            'studio' => 'visible',
            'label' => 'LBL_PPG_FIRST',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'orig_due_date',
            'label' => 'LBL_ORIG_DUE_DATE',
          ),
          1 => 
          array (
            'name' => 'due_date_2',
            'label' => 'LBL_DUE_DATE_2',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'due_date_3',
            'label' => 'LBL_DUE_DATE_3',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'plt_participant_plt_ppg_details_name',
          ),
          1 => 
          array (
            'name' => 'plt_participant_plt_ppgdetails_name',
          ),
        ),
      ),
    ),
  ),
);
?>
