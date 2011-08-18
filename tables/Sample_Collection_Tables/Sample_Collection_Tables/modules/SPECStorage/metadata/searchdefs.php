<?php
$module_name = 'SAMP_SPECStorage';
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
      'master_storage_unit' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MASTER_STORAGE_UNIT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'master_storage_unit',
      ),
      'storage_fill' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_STORAGE_FILL',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'storage_fill',
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
      'master_storage_unit' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MASTER_STORAGE_UNIT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'master_storage_unit',
      ),
      'storage_fill' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_STORAGE_FILL',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'storage_fill',
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
      'temp_event_low_temp' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_TEMP_EVENT_LOW_TEMP',
        'width' => '10%',
        'default' => true,
        'name' => 'temp_event_low_temp',
      ),
      'temp_event_high_temp' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_TEMP_EVENT_HIGH_TEMP',
        'width' => '10%',
        'default' => true,
        'name' => 'temp_event_high_temp',
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
