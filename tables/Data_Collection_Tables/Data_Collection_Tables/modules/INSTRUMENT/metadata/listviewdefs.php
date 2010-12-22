<?php
$module_name = 'NCSDC_INSTRUMENT';
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
  'INSTRUMENT_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INSTRUMENT_ID',
    'width' => '10%',
    'default' => true,
  ),
  'INS_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INS_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  'INS_DATE_START' => 
  array (
    'type' => 'date',
    'label' => 'LBL_INS_DATE_START',
    'width' => '10%',
    'default' => true,
  ),
  'INS_DATE_END' => 
  array (
    'type' => 'date',
    'label' => 'LBL_INS_DATE_END',
    'width' => '10%',
    'default' => true,
  ),
  'INS_START_TIME' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_INS_START_TIME',
    'width' => '10%',
    'default' => true,
  ),
  'INS_END_TIME' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_INS_END_TIME',
    'width' => '10%',
    'default' => true,
  ),
  'SUP_REVIEW' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SUP_REVIEW',
    'sortable' => false,
    'width' => '10%',
  ),
  'DATA_PROBLEM' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_DATA_PROBLEM',
    'sortable' => false,
    'width' => '10%',
  ),
  'INSTRU_COMMENT' => 
  array (
    'type' => 'text',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_INSTRU_COMMENT',
    'sortable' => false,
    'width' => '10%',
  ),
  'INSTRUMENT_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INSTRUMENT_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'INS_BREAKOFF' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_INS_BREAKOFF',
    'sortable' => false,
    'width' => '10%',
  ),
  'INS_MODE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INS_MODE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'INS_MODE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_INS_MODE',
    'sortable' => false,
    'width' => '10%',
  ),
  'INS_METHOD' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_INS_METHOD',
    'sortable' => false,
    'width' => '10%',
  ),
  'INSTRUMENT_VERSION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INSTRUMENT_VERSION',
    'width' => '10%',
    'default' => false,
  ),
);
?>
