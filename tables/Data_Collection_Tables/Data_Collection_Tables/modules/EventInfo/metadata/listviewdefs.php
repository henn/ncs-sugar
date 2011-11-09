<?php
$module_name = 'NCSDC_EventInfo';
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
  'EVENT_DISP_CAT' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EVENT_DISP_CAT',
    'sortable' => false,
    'width' => '10%',
  ),
  'EVENT_INCENTIVE_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EVENT_INCENTIVE_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'EVENT_INCENT_CASH' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_EVENT_INCENT_CASH',
    'width' => '10%',
    'default' => true,
  ),
  'EVENT_COMMENT' => 
  array (
    'type' => 'text',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_EVENT_COMMENT',
    'sortable' => false,
    'width' => '10%',
  ),
  'EVENT_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EVENT_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'EVENT_BREAKOFF' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_EVENT_BREAKOFF',
    'sortable' => false,
    'width' => '10%',
  ),
  'EVENT_INCENT_NONCASH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EVENT_INCENT_NONCASH',
    'width' => '10%',
    'default' => false,
  ),
  'EVENT_TYPE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_EVENT_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'EVENT_DISP' => 
  array (
    'type' => 'int',
    'label' => 'LBL_EVENT_DISP',
    'width' => '10%',
    'default' => false,
  ),
  'EVENT_REPEAT_KEY' => 
  array (
    'type' => 'int',
    'label' => 'LBL_EVENT_REPEAT_KEY',
    'width' => '10%',
    'default' => false,
  ),
);
?>
