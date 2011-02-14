<?php
$module_name = 'ST_StfExpMgTsk';
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
      'mgmt_task_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MGMT_TASK_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'mgmt_task_type',
      ),
      'mgmt_task_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_MGMT_TASK_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'mgmt_task_type_oth',
      ),
      'mgmt_task_hrs' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_MGMT_TASK_HRS',
        'width' => '10%',
        'default' => true,
        'name' => 'mgmt_task_hrs',
      ),
      'mgmt_task_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_MGMT_TASK_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'mgmt_task_comment',
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
      'mgmt_task_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MGMT_TASK_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'mgmt_task_type',
      ),
      'mgmt_task_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_MGMT_TASK_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'mgmt_task_type_oth',
      ),
      'mgmt_task_hrs' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_MGMT_TASK_HRS',
        'width' => '10%',
        'default' => true,
        'name' => 'mgmt_task_hrs',
      ),
      'mgmt_task_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_MGMT_TASK_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'mgmt_task_comment',
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
