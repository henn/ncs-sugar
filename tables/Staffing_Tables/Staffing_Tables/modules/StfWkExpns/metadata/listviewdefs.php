<?php
$module_name = 'ST_StfWkExpns';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'PSU_ID' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PSU_ID',
    'sortable' => false,
    'width' => '10%',
  ),
  'WEEKLY_EXP_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WEEKLY_EXP_ID',
    'width' => '10%',
    'default' => true,
  ),
  'WEEK_START_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_WEEK_START_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'STAFF_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_ID',
    'width' => '10%',
    'default' => true,
  ),
  'STAFF_EXPENSES' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_STAFF_EXPENSES',
    'width' => '10%',
    'default' => false,
  ),
  'STAFF_MILES' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_STAFF_MILES',
    'width' => '10%',
    'default' => false,
  ),
  'STAFF_HOURS' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_STAFF_HOURS',
    'width' => '10%',
    'default' => false,
  ),
  'STAFF_PAY' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_STAFF_PAY',
    'width' => '10%',
    'default' => false,
  ),
  'WEEKLY_EXPENSES_COMMENT' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_WEEKLY_EXPENSES_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
);
?>
