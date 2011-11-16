<?php
$module_name = 'SAMP_SPECEquip';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SAMP_SPECEQ_SPSCINFO_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_speceq_samp_spscinfo',
    'label' => 'LBL_SAMP_SPECEQUIP_SAMP_SPSCINFO_FROM_SAMP_SPSCINFO_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'EQUIPMENT_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EQUIPMENT_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'SERIAL_NO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SERIAL_NO',
    'width' => '10%',
    'default' => true,
  ),
  'GOVERNMENT_ASSET_TAG_NO' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_GOVERNMENT_ASSET_TAG_NO',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'EQUIPMENT_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EQUIPMENT_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
?>
