<?php
$module_name = 'ST_StfLang';
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
