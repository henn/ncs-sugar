<?php
$module_name = 'ST_StfExpMgTsk';
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
            'name' => 'psu_id',
            'studio' => 'visible',
            'label' => 'LBL_PSU_ID',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'staff_weekly_expense_id',
            'label' => 'LBL_STAFF_WEEKLY_EXPENSE_ID',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'mgmt_task_type',
            'studio' => 'visible',
            'label' => 'LBL_MGMT_TASK_TYPE',
          ),
          1 => 
          array (
            'name' => 'mgmt_task_type_oth',
            'label' => 'LBL_MGMT_TASK_TYPE_OTH',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'mgmt_task_hrs',
            'label' => 'LBL_MGMT_TASK_HRS',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'mgmt_task_comment',
            'studio' => 'visible',
            'label' => 'LBL_MGMT_TASK_COMMENT',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'st_stfwkexpfexpmgtsk_name',
            'label' => 'LBL_ST_STFWKEXPNS_ST_STFEXPMGTSK_FROM_ST_STFWKEXPNS_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
