<?php
$module_name = 'OLT_LINK_PERSON_INSTITUTE';
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
  'PERSON_INSTITUTE_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PERSON_INSTITUTE_ID',
    'width' => '10%',
    'default' => true,
  ),
  'INSTITUTE_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INSTITUTE_ID',
    'width' => '10%',
    'default' => true,
  ),
  'PERSON_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PERSON_ID',
    'width' => '10%',
    'default' => true,
  ),
  'IS_ACTIVE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_IS_ACTIVE',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
