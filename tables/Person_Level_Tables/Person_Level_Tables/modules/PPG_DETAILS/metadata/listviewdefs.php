<?php
$module_name = 'PLT_PPG_DETAILS';
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
  'PPG_DETAILS_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PPG_DETAILS_ID',
    'width' => '10%',
    'default' => true,
  ),
  'PPG_PID_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PPG_PID_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  'PPG_FIRST' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PPG_FIRST',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
