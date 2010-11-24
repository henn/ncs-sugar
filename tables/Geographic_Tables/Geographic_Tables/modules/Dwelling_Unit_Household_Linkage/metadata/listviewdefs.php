<?php
$module_name = 'GT_Dwelling_Unit_Household_Linkage';
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
  'HH_DU_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_HH_DU_ID',
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
  'DU_RANK' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_DU_RANK',
    'sortable' => false,
    'width' => '10%',
  ),
  'DU_RANK_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DU_RANK_OTH',
    'width' => '10%',
    'default' => true,
  ),
);
?>
