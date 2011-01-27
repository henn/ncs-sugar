<?php
$module_name = 'GT_StudyCntr';
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
  'SC_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SC_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'COMMENTS' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_COMMENTS',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
);
?>
