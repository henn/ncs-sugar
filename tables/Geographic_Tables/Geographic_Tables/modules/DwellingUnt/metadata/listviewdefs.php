<?php
$module_name = 'GT_DwellingUnt';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'GT_LISTINGUELLINGUNT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'gt_listingugt_dwellingunt',
    'label' => 'LBL_GT_LISTINGUNT_GT_DWELLINGUNT_FROM_GT_LISTINGUNT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'GT_SECSAMPUELLINGUNT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'gt_secsampugt_dwellingunt',
    'label' => 'LBL_GT_SECSAMPUNT_GT_DWELLINGUNT_FROM_GT_SECSAMPUNT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'DU_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_DU_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'DU_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DU_TYPE_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'DUPLICATE_DU' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_DUPLICATE_DU',
    'sortable' => false,
    'width' => '10%',
  ),
  'MISSED_DU' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_MISSED_DU',
    'sortable' => false,
    'width' => '10%',
  ),
  'DU_ACCESS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_DU_ACCESS',
    'sortable' => false,
    'width' => '10%',
  ),
  'DU_INELIGIBLE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_DU_INELIGIBLE',
    'sortable' => false,
    'width' => '10%',
  ),
  'DUID_COMMENT' => 
  array (
    'type' => 'text',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_DUID_COMMENT',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
