<?php
$module_name = 'SAMP_SPECEquip';
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
      'equipment_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EQUIPMENT_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'equipment_type_oth',
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
