<?php
$module_name = 'GT_PrmSampUnt';
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
  'SC_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SC_ID',
    'width' => '10%',
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
  'PSU_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PSU_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'RECRUIT_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_RECRUIT_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
