<?php
$module_name = 'GT_TerSampUnt';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'GT_SECSAMPUERSAMPUNT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'gt_secsampu_gt_tersampunt',
    'label' => 'LBL_GT_SECSAMPUNT_GT_TERSAMPUNT_FROM_GT_SECSAMPUNT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
