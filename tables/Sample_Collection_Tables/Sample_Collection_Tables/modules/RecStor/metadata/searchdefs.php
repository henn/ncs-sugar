<?php
$module_name = 'SAMP_RecStor';
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
      'receipt_dt' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_RECEIPT_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'receipt_dt',
      ),
      'placed_in_storage_dt' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_PLACED_IN_STORAGE_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'placed_in_storage_dt',
      ),
      'storage_compartment_area' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STORAGE_COMPARTMENT_AREA',
        'sortable' => false,
        'width' => '10%',
        'name' => 'storage_compartment_area',
      ),
      'removed_from_storage_dt' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_REMOVED_FROM_STORAGE_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'removed_from_storage_dt',
      ),
      'temp_event_occurred' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TEMP_EVENT_OCCURRED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'temp_event_occurred',
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
      'receipt_dt' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_RECEIPT_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'receipt_dt',
      ),
      'cooler_temp_cond' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_COOLER_TEMP_COND',
        'sortable' => false,
        'width' => '10%',
        'name' => 'cooler_temp_cond',
      ),
      'placed_in_storage_dt' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_PLACED_IN_STORAGE_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'placed_in_storage_dt',
      ),
      'removed_from_storage_dt' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_REMOVED_FROM_STORAGE_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'removed_from_storage_dt',
      ),
      'storage_compartment_area' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STORAGE_COMPARTMENT_AREA',
        'sortable' => false,
        'width' => '10%',
        'name' => 'storage_compartment_area',
      ),
      'temp_event_occurred' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TEMP_EVENT_OCCURRED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'temp_event_occurred',
      ),
      'temp_event_action' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TEMP_EVENT_ACTION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'temp_event_action',
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
