<?php
$module_name = 'ST_STAFF';
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
  'STAFF_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_ID',
    'width' => '10%',
    'default' => true,
  ),
  'STAFF_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STAFF_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'STAFF_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_TYPE_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'SUBCONTRACTOR' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SUBCONTRACTOR',
    'sortable' => false,
    'width' => '10%',
  ),
  'STAFF_AGE_RANGE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STAFF_AGE_RANGE',
    'sortable' => false,
    'width' => '10%',
  ),
  'STAFF_YOB' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_YOB',
    'width' => '10%',
    'default' => true,
  ),
  'STAFF_GENDER' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STAFF_GENDER',
    'sortable' => false,
    'width' => '10%',
  ),
  'STAFF_RACE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STAFF_RACE',
    'sortable' => false,
    'width' => '10%',
  ),
  'STAFF_RACE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_RACE_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'STAFF_ETHNICITY' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STAFF_ETHNICITY',
    'sortable' => false,
    'width' => '10%',
  ),
  'STAFF_EXP' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STAFF_EXP',
    'sortable' => false,
    'width' => '10%',
  ),
  'STAFF_COMMENT' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_STAFF_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
);
?>
