<?php
$module_name = 'ST_STAFF_EXP_DATA_CLLCTN_TASKS';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'psu_id' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PSU_ID',
        'sortable' => false,
        'width' => '10%',
        'name' => 'psu_id',
      ),
      'staff_exp_data_coll_task_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_EXP_DATA_COLL_TASK_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_exp_data_coll_task_id',
      ),
      'staff_weekly_expense_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_WEEKLY_EXPENSE_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_weekly_expense_id',
      ),
      'data_coll_task_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_DATA_COLL_TASK_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'data_coll_task_type',
      ),
      'data_coll_task_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_DATA_COLL_TASK_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'data_coll_task_type_oth',
      ),
      'data_coll_tasks_hrs' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_DATA_COLL_TASKS_HRS',
        'width' => '10%',
        'default' => true,
        'name' => 'data_coll_tasks_hrs',
      ),
      'data_coll_task_cases' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_DATA_COLL_TASK_CASES',
        'width' => '10%',
        'default' => true,
        'name' => 'data_coll_task_cases',
      ),
      'data_coll_transmit' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_DATA_COLL_TRANSMIT',
        'width' => '10%',
        'default' => true,
        'name' => 'data_coll_transmit',
      ),
      'data_coll_task_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_DATA_COLL_TASK_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'data_coll_task_comment',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
