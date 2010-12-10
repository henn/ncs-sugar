<?php
$module_name = 'LTT_ADDRESS';
$listViewDefs [$module_name] = 
array (
  'ADDRESS_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_ID',
    'width' => '10%',
    'default' => true,
  ),
  'ADDRESS_1' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_1',
    'width' => '25%',
    'default' => true,
  ),
  'ADDRESS_2' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_2',
    'width' => '10%',
    'default' => true,
  ),
  'UNIT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_UNIT',
    'width' => '10%',
    'default' => true,
  ),
  'CITY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CITY',
    'width' => '20%',
    'default' => true,
  ),
  'STATE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATE',
    'sortable' => false,
    'width' => '20%',
  ),
  'ZIP' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ZIP',
    'width' => '10%',
    'default' => true,
  ),
  'ZIP4' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ZIP4',
    'width' => '10%',
    'default' => true,
  ),
  'ADDRESS_DESCRIPTION' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
  ),
  'ADDRESS_DESCRIPTION_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_DESCRIPTION_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'ADDRESS_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'ADDRESS_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_TYPE_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'ADDRESS_COMMENT' => 
  array (
    'type' => 'text',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_COMMENT',
    'sortable' => false,
    'width' => '25%',
  ),
  'ADDRESS_START_DATE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_START_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'ADDRESS_END_DATE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_END_DATE',
    'width' => '10%',
    'default' => true,
  ),
);
?>
