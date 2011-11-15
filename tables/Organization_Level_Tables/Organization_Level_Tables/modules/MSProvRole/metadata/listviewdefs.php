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
  'OLT_PROVIDESPROVROLE_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'olt_provideolt_msprovrole',
    'label' => 'LBL_OLT_PROVIDER_OLT_MSPROVROLE_FROM_OLT_PROVIDER_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'OLT_MSPROVR_PROVIDER_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'olt_msprovre_olt_provider',
    'label' => 'LBL_OLT_MSPROVROLE_OLT_PROVIDER_FROM_OLT_PROVIDER_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'PROVIDER_NCS_ROLE' => 
  array (
    'type' => 'multienum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PROVIDER_NCS_ROLE',
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
