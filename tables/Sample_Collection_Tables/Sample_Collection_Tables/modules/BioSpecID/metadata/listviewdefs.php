<?php
$module_name = 'SAMP_BioSpecID';
$listViewDefs [$module_name] = 
array (
  'COLLECTION_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COLLECTION_ID',
    'width' => '10%',
    'default' => true,
  ),
  'ITEM_TYPE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ITEM_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'ITEM_PROMPT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ITEM_PROMPT',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => false,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
?>
