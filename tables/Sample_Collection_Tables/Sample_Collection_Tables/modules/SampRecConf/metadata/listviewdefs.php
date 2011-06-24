<?php
$module_name = 'SAMP_SampRecConf';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SHIPMENT_TRACKING_NO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SHIPMENT_TRACKING_NO',
    'width' => '10%',
    'default' => true,
  ),
  'SHIPMENT_RECEIPT_CONFIRMED' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SHIPMENT_RECEIPT_CONFIRMED',
    'sortable' => false,
    'width' => '10%',
  ),
  'SHIPMENT_RECEIPT_DT' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_SHIPMENT_RECEIPT_DT',
    'width' => '10%',
    'default' => true,
  ),
  'SHIPMENT_CONDITION' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SHIPMENT_CONDITION',
    'sortable' => false,
    'width' => '10%',
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
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
