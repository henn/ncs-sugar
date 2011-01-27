<?php
$module_name = 'PLT_LnkPrsHshld';
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
  'IS_ACTIVE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_IS_ACTIVE',
    'sortable' => false,
    'width' => '10%',
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
  'PERSON_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PERSON_ID',
    'width' => '10%',
    'default' => true,
  ),
  'HH_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_HH_ID',
    'width' => '10%',
    'default' => true,
  ),
  'PERSON_HH_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PERSON_HH_ID',
    'width' => '10%',
    'default' => true,
  ),
  'HH_RANK' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_HH_RANK',
    'sortable' => false,
    'width' => '10%',
  ),
  'HH_RANK_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_HH_RANK_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
?>
