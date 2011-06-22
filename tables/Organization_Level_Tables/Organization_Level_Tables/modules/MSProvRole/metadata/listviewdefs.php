<?php
$module_name = 'OLT_MSProvRole';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'PROVIDER_NCS_ROLE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PROVIDER_NCS_ROLE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PROVIDER_NCS_ROLE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PROVIDER_NCS_ROLE_OTH',
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
