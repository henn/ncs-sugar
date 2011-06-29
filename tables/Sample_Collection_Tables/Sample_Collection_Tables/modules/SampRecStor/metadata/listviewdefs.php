<?php
$module_name = 'SAMP_SampRecStor';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SAMPLE_CONDITION' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SAMPLE_CONDITION',
    'sortable' => false,
    'width' => '10%',
  ),
  'RECEIPT_DT' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_RECEIPT_DT',
    'width' => '10%',
    'default' => true,
  ),
  'PLACED_IN_STORAGE_DT' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_PLACED_IN_STORAGE_DT',
    'width' => '10%',
    'default' => true,
  ),
  'STORAGE_COMPARTMENT_AREA' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STORAGE_COMPARTMENT_AREA',
    'sortable' => false,
    'width' => '10%',
  ),
  'TEMP_EVENT_OCCURRED' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TEMP_EVENT_OCCURRED',
    'sortable' => false,
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'COOLER_TEMP_COND' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_COOLER_TEMP_COND',
    'sortable' => false,
    'width' => '10%',
  ),
  'RECEIPT_COMMENT_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RECEIPT_COMMENT_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'STORAGE_COMMENT_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STORAGE_COMMENT_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'TEMP_EVENT_ACTION_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TEMP_EVENT_ACTION_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'TEMP_EVENT_ACTION' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_TEMP_EVENT_ACTION',
    'sortable' => false,
    'width' => '10%',
  ),
  'REMOVED_FROM_STORAGE_DT' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_REMOVED_FROM_STORAGE_DT',
    'width' => '10%',
    'default' => false,
  ),
);
?>
