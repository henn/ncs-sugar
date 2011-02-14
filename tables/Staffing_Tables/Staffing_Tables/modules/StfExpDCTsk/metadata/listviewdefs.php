<?php
$module_name = 'ST_StfExpDCTsk';
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
  'STAFF_WEEKLY_EXPENSE_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_WEEKLY_EXPENSE_ID',
    'width' => '10%',
    'default' => true,
  ),
  'DATA_COLL_TASK_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_DATA_COLL_TASK_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'DATA_COLL_TRANSMIT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DATA_COLL_TRANSMIT',
    'width' => '10%',
    'default' => true,
  ),
  'DATA_COLL_TASK_COMMENT' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_DATA_COLL_TASK_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'DATA_COLL_TASK_CASES' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DATA_COLL_TASK_CASES',
    'width' => '10%',
    'default' => false,
  ),
  'DATA_COLL_TASKS_HRS' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_DATA_COLL_TASKS_HRS',
    'width' => '10%',
    'default' => false,
  ),
  'DATA_COLL_TASK_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DATA_COLL_TASK_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
?>
