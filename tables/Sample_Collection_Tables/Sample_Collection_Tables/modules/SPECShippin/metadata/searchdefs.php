<?php
$module_name = 'SAMP_SPECShippin';
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
      'shipment_tracking_no' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SHIPMENT_TRACKING_NO',
        'width' => '10%',
        'default' => true,
        'name' => 'shipment_tracking_no',
      ),
      'shipper_destination' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SHIPPER_DESTINATION',
        'width' => '10%',
        'default' => true,
        'name' => 'shipper_destination',
      ),
      'shipment_temperature' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SHIPMENT_TEMPERATURE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'shipment_temperature',
      ),
      'shipment_receipt_confirmed' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SHIPMENT_RECEIPT_CONFIRMED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'shipment_receipt_confirmed',
      ),
      'shipment_issues' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SHIPMENT_ISSUES',
        'sortable' => false,
        'width' => '10%',
        'name' => 'shipment_issues',
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
      'shipment_tracking_no' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SHIPMENT_TRACKING_NO',
        'width' => '10%',
        'default' => true,
        'name' => 'shipment_tracking_no',
      ),
      'shipment_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_SHIPMENT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'shipment_date',
      ),
      'shipment_temperature' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SHIPMENT_TEMPERATURE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'shipment_temperature',
      ),
      'shipper_destination' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SHIPPER_DESTINATION',
        'width' => '10%',
        'default' => true,
        'name' => 'shipper_destination',
      ),
      'shipment_receipt_confirmed' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SHIPMENT_RECEIPT_CONFIRMED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'shipment_receipt_confirmed',
      ),
      'shipment_issues' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SHIPMENT_ISSUES',
        'sortable' => false,
        'width' => '10%',
        'name' => 'shipment_issues',
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
