<?php
$module_name = 'PLT_PPG_DETAILS';
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
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'ppg_details_id',
            'label' => 'LBL_PPG_DETAILS_ID',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'ppg_first',
            'studio' => 'visible',
            'label' => 'LBL_PPG_FIRST',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'ppg_pid_status',
            'studio' => 'visible',
            'label' => 'LBL_PPG_PID_STATUS',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'orig_due_date',
            'label' => 'LBL_ORIG_DUE_DATE',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'due_date_2',
            'label' => 'LBL_DUE_DATE_2',
          ),
          1 => 
          array (
            'name' => 'due_date_3',
            'label' => 'LBL_DUE_DATE_3',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'plt_participant_plt_ppg_details_name',
          ),
        ),
      ),
    ),
  ),
);
?>
