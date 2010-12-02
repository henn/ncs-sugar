<?php
$module_name = 'PLT_LINK_PERSON_PARTICIPANT';
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
  'PERSON_PID_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PERSON_PID_ID',
    'width' => '10%',
    'default' => true,
  ),
  'P_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_P_ID',
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
  'RELATION' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_RELATION',
    'sortable' => false,
    'width' => '10%',
  ),
  'RELATION_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RELATION_OTH',
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
