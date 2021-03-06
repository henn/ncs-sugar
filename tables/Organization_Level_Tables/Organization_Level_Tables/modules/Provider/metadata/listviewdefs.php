<?php
$module_name = 'OLT_Provider';
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
    'label' => 'LBL_OLT_PROVIDER_OLT_MSPROVROLE_FROM_OLT_MSPROVROLE_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'OLT_MSPROVR_PROVIDER_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'olt_msprovre_olt_provider',
    'label' => 'LBL_OLT_MSPROVROLE_OLT_PROVIDER_FROM_OLT_MSPROVROLE_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'PROVIDER_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PROVIDER_TYPE',
    'sortable' => false,
    'width' => '10%',
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
  'PROVIDER_INFO_SOURCE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PROVIDER_INFO_SOURCE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PROVIDER_INFO_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PROVIDER_INFO_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => false,
  ),
  'PROVIDER_INFO_UPDATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PROVIDER_INFO_UPDATE',
    'width' => '10%',
    'default' => false,
  ),
  'PROVIDER_COMMENT' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_PROVIDER_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'PROVIDER_INFO_SOURCE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PROVIDER_INFO_SOURCE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'PUBLIC_PRACTICE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PUBLIC_PRACTICE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PRACTICE_SIZE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PRACTICE_SIZE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PRACTICE_PATIENT_LOAD' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PRACTICE_PATIENT_LOAD',
    'sortable' => false,
    'width' => '10%',
  ),
  'PRACTICE_INFO' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PRACTICE_INFO',
    'sortable' => false,
    'width' => '10%',
  ),
  'PROVIDER_NCS_ROLE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PROVIDER_NCS_ROLE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'PROVIDER_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PROVIDER_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
?>
