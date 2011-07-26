<?php
$module_name = 'SAMP_SPECReceipt';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'RECEIPT_COMMENT' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_RECEIPT_COMMENT',
    'sortable' => false,
    'width' => '10%',
  ),
  'MONITOR_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_MONITOR_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  'CENTRIFUGE_COMMENT' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CENTRIFUGE_COMMENT',
    'sortable' => false,
    'width' => '10%',
  ),
  'CENTRIFUGE_STAFF_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CENTRIFUGE_STAFF_ID',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'RECEIPT_COMMENT_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RECEIPT_COMMENT_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'COOLER_TEMP' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_COOLER_TEMP',
    'width' => '10%',
    'default' => false,
  ),
  'UPPER_TRIGGER' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_UPPER_TRIGGER',
    'sortable' => false,
    'width' => '10%',
  ),
  'UPPER_TRIGGER_LVL' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_UPPER_TRIGGER_LVL',
    'sortable' => false,
    'width' => '10%',
  ),
  'LOWER_TRIGGER_COLD' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_LOWER_TRIGGER_COLD',
    'sortable' => false,
    'width' => '10%',
  ),
  'LOWER_TRIGGER_AMBIENT' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_LOWER_TRIGGER_AMBIENT',
    'sortable' => false,
    'width' => '10%',
  ),
  'CENTRIFUGE_COMMENT_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CENTRIFUGE_COMMENT_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'CENTRIFUGE_ST' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_CENTRIFUGE_ST',
    'width' => '10%',
    'default' => false,
  ),
  'CENTRIFUGE_ET' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_CENTRIFUGE_ET',
    'width' => '10%',
    'default' => false,
  ),
);
?>
