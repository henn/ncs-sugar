<?php
$module_name = 'GT_PrmSampUnt';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'GT_STUDYCNTRMSAMPUNT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'gt_studycnt_gt_prmsampunt',
    'label' => 'LBL_GT_STUDYCNTR_GT_PRMSAMPUNT_FROM_GT_STUDYCNTR_TITLE',
    'width' => '10%',
    'default' => true,
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
  'RECRUIT_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_RECRUIT_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
