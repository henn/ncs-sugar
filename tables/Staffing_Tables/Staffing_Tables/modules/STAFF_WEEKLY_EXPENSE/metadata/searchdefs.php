<?php
$module_name = 'ST_STAFF_WEEKLY_EXPENSE';
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
      'weekly_exp_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_WEEKLY_EXP_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'weekly_exp_id',
      ),
      'staff_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_id',
      ),
      'week_start_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_WEEK_START_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'week_start_date',
      ),
      'staff_pay' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_STAFF_PAY',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_pay',
      ),
      'staff_hours' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_STAFF_HOURS',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_hours',
      ),
      'staff_expenses' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_STAFF_EXPENSES',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_expenses',
      ),
      'staff_miles' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_STAFF_MILES',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_miles',
      ),
      'weekly_expenses_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_WEEKLY_EXPENSES_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'weekly_expenses_comment',
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
