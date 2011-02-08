<?php
$module_name = 'ST_StfCrtTrn';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'STAFF_CERT_LIST_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_CERT_LIST_ID',
    'width' => '10%',
    'default' => true,
  ),
  'STAFF_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_ID',
    'width' => '10%',
    'default' => true,
  ),
  'CERT_COMPLETED' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CERT_COMPLETED',
    'sortable' => false,
    'width' => '10%',
  ),
  'CERT_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CERT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'STAFF_BGCHECK_LVL' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STAFF_BGCHECK_LVL',
    'sortable' => false,
    'width' => '10%',
  ),
  'CERT_TRAIN_TYPE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CERT_TRAIN_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'CERT_TYPE_FREQUENCY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CERT_TYPE_FREQUENCY',
    'width' => '10%',
    'default' => false,
  ),
  'CERT_TYPE_EXP_DATE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CERT_TYPE_EXP_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'CERT_COMMENT' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_CERT_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
);
?>
