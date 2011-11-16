<?php
$module_name = 'SAMP_EnEquip';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SAMP_ENEQUI_SRSCINFO_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_enequi_samp_srscinfo',
    'label' => 'LBL_SAMP_ENEQUIP_SAMP_SRSCINFO_FROM_SAMP_SRSCINFO_TITLE',
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
  'RETIRED_REASON' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_RETIRED_REASON',
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
  'EQUIPMENT_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EQUIPMENT_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'RETIRED_REASON_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RETIRED_REASON_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
?>
