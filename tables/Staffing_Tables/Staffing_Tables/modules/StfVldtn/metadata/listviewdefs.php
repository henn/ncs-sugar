<?php
$module_name = 'ST_StfVldtn';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'STAFF_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_ID',
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
  'STAFF_VAL_COMMENT' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_STAFF_VAL_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'STAFF_VAL_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_STAFF_VAL_DATE',
    'width' => '10%',
    'default' => false,
  ),
);
?>
