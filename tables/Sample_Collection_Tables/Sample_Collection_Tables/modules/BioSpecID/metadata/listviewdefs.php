<?php
$module_name = 'SAMP_BioSpecID';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
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
