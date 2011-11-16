<?php
$module_name = 'SAMP_SPECShippin';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SAMP_SPECSHSTAFFRSTR_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_specshn_st_staffrstr',
    'label' => 'LBL_SAMP_SPECSHIPPIN_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'SAMP_SPECSH_SPSCINFO_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_specsh_samp_spscinfo',
    'label' => 'LBL_SAMP_SPECSHIPPIN_SAMP_SPSCINFO_FROM_SAMP_SPSCINFO_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'SHIPMENT_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_SHIPMENT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'SHIPMENT_TRACKING_NO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SHIPMENT_TRACKING_NO',
    'width' => '10%',
    'default' => true,
  ),
  'SHIPMENT_TEMPERATURE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SHIPMENT_TEMPERATURE',
    'sortable' => false,
    'width' => '10%',
  ),
  'SHIPPER_DESTINATION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SHIPPER_DESTINATION',
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
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'SHIPMENT_RECEIPT_DT' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_SHIPMENT_RECEIPT_DT',
    'width' => '10%',
    'default' => false,
  ),
  'SHIPMENT_ISSUES_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SHIPMENT_ISSUES_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'SHIPMENT_ISSUES' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_SHIPMENT_ISSUES',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
