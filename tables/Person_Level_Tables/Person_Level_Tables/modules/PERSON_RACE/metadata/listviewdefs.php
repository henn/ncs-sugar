<?php
$module_name = 'PLT_PERSON_RACE';
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
  'RACE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_RACE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PERSON_RACE_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PERSON_RACE_ID',
    'width' => '10%',
    'default' => true,
  ),
  'RACE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RACE_OTH',
    'width' => '10%',
    'default' => true,
  ),
);
?>
