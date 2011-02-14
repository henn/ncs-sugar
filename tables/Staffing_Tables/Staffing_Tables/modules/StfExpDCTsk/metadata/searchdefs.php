<?php
$module_name = 'ST_StfExpDCTsk';
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
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
      'data_coll_task_cases' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_DATA_COLL_TASK_CASES',
        'width' => '10%',
        'default' => true,
        'name' => 'data_coll_task_cases',
      ),
      'assigned_user_id' => 
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
        'default' => true,
        'width' => '10%',
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
