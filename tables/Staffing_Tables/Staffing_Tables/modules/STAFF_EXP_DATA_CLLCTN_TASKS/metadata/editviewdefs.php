<?php
$module_name = 'ST_STAFF_EXP_DATA_CLLCTN_TASKS';
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
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'psu_id',
            'studio' => 'visible',
            'label' => 'LBL_PSU_ID',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'staff_exp_data_coll_task_id',
            'label' => 'LBL_STAFF_EXP_DATA_COLL_TASK_ID',
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
            'name' => 'data_coll_task_type',
            'studio' => 'visible',
            'label' => 'LBL_DATA_COLL_TASK_TYPE',
          ),
          1 => 
          array (
            'name' => 'data_coll_task_type_oth',
            'label' => 'LBL_DATA_COLL_TASK_TYPE_OTH',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'data_coll_tasks_hrs',
            'label' => 'LBL_DATA_COLL_TASKS_HRS',
          ),
          1 => 
          array (
            'name' => 'data_coll_task_cases',
            'label' => 'LBL_DATA_COLL_TASK_CASES',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'data_coll_transmit',
            'label' => 'LBL_DATA_COLL_TRANSMIT',
          ),
          1 => 
          array (
            'name' => 'data_coll_task_comment',
            'studio' => 'visible',
            'label' => 'LBL_DATA_COLL_TASK_COMMENT',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'st_staff_weekly_expense_st_staff_exp_data_cllctn_tasks_name',
          ),
        ),
      ),
    ),
  ),
);
?>