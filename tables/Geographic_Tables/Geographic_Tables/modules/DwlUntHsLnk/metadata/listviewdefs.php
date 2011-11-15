<?php
$module_name = 'GT_DwlUntHsLnk';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'GT_DWLUNTHSELLINGUNT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'gt_dwlunthsgt_dwellingunt',
    'label' => 'LBL_GT_DWLUNTHSLNK_GT_DWELLINGUNT_FROM_GT_DWELLINGUNT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'GT_DWLUNTHSHOUSEHOLD_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'gt_dwlunthsk_gt_household',
    'label' => 'LBL_GT_DWLUNTHSLNK_GT_HOUSEHOLD_FROM_GT_HOUSEHOLD_TITLE',
    'width' => '10%',
    'default' => true,
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
