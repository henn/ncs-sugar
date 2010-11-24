<?php
$module_name = 'GT_Household';
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
  'HH_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_HH_ID',
    'width' => '10%',
    'default' => true,
  ),
  'HH_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_HH_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  'HH_ELIG' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_HH_ELIG',
    'sortable' => false,
    'width' => '10%',
  ),
  'HH_STRUCTURE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_HH_STRUCTURE_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'NUM_AGE_ELIG' => 
  array (
    'type' => 'int',
    'label' => 'LBL_NUM_AGE_ELIG',
    'width' => '10%',
    'default' => true,
  ),
  'NUM_PREG' => 
  array (
    'type' => 'int',
    'label' => 'LBL_NUM_PREG',
    'width' => '10%',
    'default' => true,
  ),
  'NUM_PREG_ADULT' => 
  array (
    'type' => 'int',
    'label' => 'LBL_NUM_PREG_ADULT',
    'width' => '10%',
    'default' => true,
  ),
  'NUM_PREG_MINOR' => 
  array (
    'type' => 'int',
    'label' => 'LBL_NUM_PREG_MINOR',
    'width' => '10%',
    'default' => true,
  ),
  'HH_COMMENT' => 
  array (
    'type' => 'text',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_HH_COMMENT',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
