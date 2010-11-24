<?php
$module_name = 'PLT_PPG_STATUS_HISTORY';
$listViewDefs [$module_name] = 
array (
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'PPG_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PPG_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  'PPG_HISTORY_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PPG_HISTORY_ID',
    'width' => '10%',
    'default' => true,
  ),
  'PPG_INFO_MODE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PPG_INFO_MODE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PPG_INFO_SOURCE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PPG_INFO_SOURCE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PPG_COMMENT' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_PPG_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
);
?>
