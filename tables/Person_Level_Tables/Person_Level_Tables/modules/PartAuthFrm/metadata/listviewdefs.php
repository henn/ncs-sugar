<?php
$module_name = 'PLT_PartAuthFrm';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'AUTH_FORM_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_AUTH_FORM_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'AUTH_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_AUTH_TYPE_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'AUTH_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_AUTH_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  'AUTH_STATUS_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_AUTH_STATUS_OTH',
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
);
?>
