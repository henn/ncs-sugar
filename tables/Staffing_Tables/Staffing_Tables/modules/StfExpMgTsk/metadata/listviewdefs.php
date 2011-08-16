<?php
$module_name = 'ST_StfExpMgTsk';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'MGMT_TASK_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_MGMT_TASK_TYPE',
    'sortable' => false,
    'width' => '30%',
  ),
  'MGMT_TASK_HRS' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_MGMT_TASK_HRS',
    'width' => '10%',
    'default' => true,
  ),
  'ST_STFWKEXPFEXPMGTSK_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'st_stfwkexpst_stfexpmgtsk',
    'label' => 'LBL_ST_STFWKEXPNS_ST_STFEXPMGTSK_FROM_ST_STFWKEXPNS_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'MGMT_TASK_COMMENT' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_MGMT_TASK_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'MGMT_TASK_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MGMT_TASK_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => false,
  ),
  'STAFF_WEEKLY_EXPENSE_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_WEEKLY_EXPENSE_ID',
    'width' => '10%',
    'default' => false,
  ),
);
?>
