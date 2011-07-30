<?php
$module_name = 'OLT_Institution';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'INSTITUTE_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INSTITUTE_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'INSTITUTE_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INSTITUTE_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'INSTITUTE_RELATION' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INSTITUTE_RELATION',
    'sortable' => false,
    'width' => '10%',
  ),
  'INSTITUTE_OWNER' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'default' => true,
    'label' => 'LBL_INSTITUTE_OWNER',
    'sortable' => false,
    'width' => '10%',
  ),
  'INSTITUTE_INFO_SOURCE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INSTITUTE_INFO_SOURCE',
    'sortable' => false,
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => false,
  ),
  'INSTITUTE_INFO_UPDATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_INSTITUTE_INFO_UPDATE',
    'width' => '10%',
    'default' => false,
  ),
  'INSTITUTE_INFO_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_INSTITUTE_INFO_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'INSTITUTE_UNIT' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_INSTITUTE_UNIT',
    'sortable' => false,
    'width' => '10%',
  ),
  'INSTITUTE_SIZE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INSTITUTE_SIZE',
    'width' => '10%',
    'default' => false,
  ),
  'INSTITUTE_COMMENT' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_INSTITUTE_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'INSTITUTE_INFO_SOURCE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INSTITUTE_INFO_SOURCE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'INSTITUTE_UNIT_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INSTITUTE_UNIT_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'INSTITUTE_OWNER_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INSTITUTE_OWNER_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'INSTITUTE_RELATION_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INSTITUTE_RELATION_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'INSTITUTE_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INSTITUTE_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
?>
