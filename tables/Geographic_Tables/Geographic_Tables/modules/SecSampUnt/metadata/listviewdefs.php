<?php
$module_name = 'GT_SecSampUnt';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SSU_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SSU_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'SC_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SC_ID',
    'width' => '10%',
    'default' => true,
  ),
  'TRANSACTION_TYPE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TRANSACTION_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
?>
