<?php
$module_name = 'LTT_ADDRESS';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'CITY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CITY',
    'width' => '10%',
    'default' => true,
  ),
  'ZIP' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ZIP',
    'width' => '10%',
    'default' => true,
  ),
  'ZIP4' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ZIP4',
    'width' => '10%',
    'default' => true,
  ),
  'ADDRESS_DESCRIPTION' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
  ),
  'ADDRESS_DESCRIPTION_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_DESCRIPTION_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'ADDRESS_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'ADDRESS_RANK' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_RANK',
    'sortable' => false,
    'width' => '10%',
  ),
  'ADDRESS_RANK_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_RANK_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'ADDRESS_INFO_MODE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_INFO_MODE',
    'sortable' => false,
    'width' => '10%',
  ),
  'ADDRESS_INFO_MODE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_INFO_MODE_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'ADDRESS_INFO_SOURCE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_INFO_SOURCE',
    'sortable' => false,
    'width' => '10%',
  ),
  'ADDRESS_INFO_SOURCE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_INFO_SOURCE_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'ADDRESS_COMMENT' => 
  array (
    'type' => 'text',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_COMMENT',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
