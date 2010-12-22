<?php
$module_name = 'ST_STAFF_VALIDATION';
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
  'STAFF_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_ID',
    'width' => '10%',
    'default' => true,
  ),
  'STAFF_VAL_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_VAL_ID',
    'width' => '10%',
    'default' => true,
  ),
  'EVENT_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EVENT_ID',
    'width' => '10%',
    'default' => true,
  ),
  'STAFF_VALIDATE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STAFF_VALIDATE',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'STAFF_VAL_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_STAFF_VAL_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'STAFF_VAL_COMMENT' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_STAFF_VAL_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
);
?>
