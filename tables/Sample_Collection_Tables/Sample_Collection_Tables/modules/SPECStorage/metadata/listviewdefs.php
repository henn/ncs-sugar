<?php
$module_name = 'SAMP_SPECStorage';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SAMP_SPECST_SPSCINFO_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_specst_samp_spscinfo',
    'label' => 'LBL_SAMP_SPECSTORAGE_SAMP_SPSCINFO_FROM_SAMP_SPSCINFO_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'SAMP_SPECSTSTAFFRSTR_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_specste_st_staffrstr',
    'label' => 'LBL_SAMP_SPECSTORAGE_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'SAMP_SPECSHECSTORAGE_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_specshmp_specstorage',
    'label' => 'LBL_SAMP_SPECSHIPPIN_SAMP_SPECSTORAGE_FROM_SAMP_SPECSHIPPIN_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'STORAGE_FILL' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_STORAGE_FILL',
    'sortable' => false,
    'width' => '15%',
    'default' => true,
  ),
  'STORAGE_COMMENT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STORAGE_COMMENT',
    'width' => '10%',
    'default' => true,
  ),
  'MASTER_STORAGE_UNIT' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_MASTER_STORAGE_UNIT',
    'sortable' => false,
    'width' => '10%',
  ),
  'PLACED_IN_STORAGE_DT' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_PLACED_IN_STORAGE_DT',
    'width' => '10%',
    'default' => true,
  ),
  'REMOVED_FROM_STORAGE_DT' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_REMOVED_FROM_STORAGE_DT',
    'width' => '10%',
    'default' => true,
  ),
  'TEMP_EVENT_LOW_TEMP' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_TEMP_EVENT_LOW_TEMP',
    'width' => '10%',
    'default' => true,
  ),
  'TEMP_EVENT_HIGH_TEMP' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_TEMP_EVENT_HIGH_TEMP',
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
  'TEMP_EVENT_ST' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_TEMP_EVENT_ST',
    'width' => '10%',
    'default' => false,
  ),
  'TEMP_EVENT_ET' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_TEMP_EVENT_ET',
    'width' => '10%',
    'default' => false,
  ),
);
?>
