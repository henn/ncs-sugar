<?php
$module_name = 'ST_STAFF_LANGUAGE';
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
  'PSU_ID' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PSU_ID',
    'sortable' => false,
    'width' => '10%',
  ),
  'STAFF_LANGUAGE_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_LANGUAGE_ID',
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
  'STAFF_LANG' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STAFF_LANG',
    'sortable' => false,
    'width' => '10%',
  ),
  'STAFF_LANG_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_LANG_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
?>
