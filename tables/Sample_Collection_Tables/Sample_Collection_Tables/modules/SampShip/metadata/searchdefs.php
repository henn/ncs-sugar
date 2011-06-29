<?php
$module_name = 'SAMP_SampShip';
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
      'shipper_destination' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SHIPPER_DESTINATION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'shipper_destination',
      ),
      'sample_shipped_by' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SAMPLE_SHIPPED_BY',
        'sortable' => false,
        'width' => '10%',
        'name' => 'sample_shipped_by',
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
      'staff_id_track' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_ID_TRACK',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_id_track',
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
      'shipper_destination' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SHIPPER_DESTINATION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'shipper_destination',
      ),
      'sample_shipped_by' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SAMPLE_SHIPPED_BY',
        'sortable' => false,
        'width' => '10%',
        'name' => 'sample_shipped_by',
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
      'staff_id_track' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_ID_TRACK',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_id_track',
      ),
      'shipment_coolant' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SHIPMENT_COOLANT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'shipment_coolant',
      ),
      'shipment_issues_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SHIPMENT_ISSUES_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'shipment_issues_oth',
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
