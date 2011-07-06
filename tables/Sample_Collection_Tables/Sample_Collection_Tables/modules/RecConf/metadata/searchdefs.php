<?php
$module_name = 'SAMP_RecConf';
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
      'shipment_receipt_dt' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_SHIPMENT_RECEIPT_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'shipment_receipt_dt',
      ),
      'shipment_condition' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SHIPMENT_CONDITION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'shipment_condition',
      ),
      'sample_condition' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SAMPLE_CONDITION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'sample_condition',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
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
      'shipment_receipt_dt' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_SHIPMENT_RECEIPT_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'shipment_receipt_dt',
      ),
      'shipment_condition' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SHIPMENT_CONDITION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'shipment_condition',
      ),
      'shipment_damaged_reason' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_SHIPMENT_DAMAGED_REASON',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'shipment_damaged_reason',
      ),
      'sample_condition' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SAMPLE_CONDITION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'sample_condition',
      ),
      'shipment_received_by' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SHIPMENT_RECEIVED_BY',
        'width' => '10%',
        'default' => true,
        'name' => 'shipment_received_by',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
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
