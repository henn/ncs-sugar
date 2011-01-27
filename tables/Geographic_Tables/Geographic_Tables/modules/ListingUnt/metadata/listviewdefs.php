<?php
$module_name = 'GT_ListingUnt';
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
  'LIST_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LIST_ID',
    'width' => '10%',
    'default' => true,
  ),
  'LIST_LINE' => 
  array (
    'type' => 'int',
    'label' => 'LBL_LIST_LINE',
    'width' => '10%',
    'default' => true,
  ),
  'LIST_SOURCE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_LIST_SOURCE',
    'sortable' => false,
    'width' => '10%',
  ),
  'LIST_COMMENT' => 
  array (
    'type' => 'text',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_LIST_COMMENT',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
