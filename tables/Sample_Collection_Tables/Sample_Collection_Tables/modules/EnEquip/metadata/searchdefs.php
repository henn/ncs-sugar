<?php
$module_name = 'SAMP_EnEquip';
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
      'equipment_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EQUIPMENT_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'equipment_type',
      ),
      'serial_no' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SERIAL_NO',
        'width' => '10%',
        'default' => true,
        'name' => 'serial_no',
      ),
      'government_asset_tag_no' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_GOVERNMENT_ASSET_TAG_NO',
        'width' => '10%',
        'default' => true,
        'name' => 'government_asset_tag_no',
      ),
      'retired_reason' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RETIRED_REASON',
        'sortable' => false,
        'width' => '10%',
        'name' => 'retired_reason',
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
      'equipment_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EQUIPMENT_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'equipment_type',
      ),
      'serial_no' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SERIAL_NO',
        'width' => '10%',
        'default' => true,
        'name' => 'serial_no',
      ),
      'government_asset_tag_no' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_GOVERNMENT_ASSET_TAG_NO',
        'width' => '10%',
        'default' => true,
        'name' => 'government_asset_tag_no',
      ),
      'retired_reason' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RETIRED_REASON',
        'sortable' => false,
        'width' => '10%',
        'name' => 'retired_reason',
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
