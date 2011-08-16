<?php
$module_name = 'ST_StfWkExpns';
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
      'staff_miles' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_STAFF_MILES',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_miles',
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
      'staff_miles' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_STAFF_MILES',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_miles',
      ),
      'staff_expenses' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_STAFF_EXPENSES',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_expenses',
      ),
      'week_start_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_WEEK_START_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'week_start_date',
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
