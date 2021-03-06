<?php
$module_name = 'LTT_Telephone';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'PHONE_NBR' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PHONE_NBR',
    'width' => '10%',
    'default' => true,
  ),
  'PHONE_EXT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PHONE_EXT',
    'width' => '10%',
    'default' => true,
  ),
  'PHONE_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PHONE_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PHONE_COMMENT' => 
  array (
    'type' => 'text',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PHONE_COMMENT',
    'sortable' => false,
    'width' => '10%',
  ),
  'TEXT_PERMISSION' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_TEXT_PERMISSION',
    'sortable' => false,
    'width' => '10%',
  ),
  'CELL_PERMISSION' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CELL_PERMISSION',
    'sortable' => false,
    'width' => '10%',
  ),
  'PHONE_SHARE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PHONE_SHARE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PHONE_LANDLINE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PHONE_LANDLINE',
    'sortable' => false,
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => false,
  ),
  'PHONE_INFO_SOURCE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PHONE_INFO_SOURCE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'PHONE_INFO_SOURCE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PHONE_INFO_SOURCE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PHONE_RANK_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PHONE_RANK_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'PHONE_RANK' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PHONE_RANK',
    'sortable' => false,
    'width' => '10%',
  ),
  'PHONE_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PHONE_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
?>
