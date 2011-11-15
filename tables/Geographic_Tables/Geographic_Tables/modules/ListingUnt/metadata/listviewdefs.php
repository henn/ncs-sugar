<?php
$module_name = 'GT_ListingUnt';
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
    'label' => 'LBL_GT_LISTINGUNT_GT_DWELLINGUNT_FROM_GT_DWELLINGUNT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'GT_SECSAMPUISTINGUNT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'gt_secsampu_gt_listingunt',
    'label' => 'LBL_GT_SECSAMPUNT_GT_LISTINGUNT_FROM_GT_SECSAMPUNT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'GT_TERSAMPUISTINGUNT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'gt_tersampu_gt_listingunt',
    'label' => 'LBL_GT_TERSAMPUNT_GT_LISTINGUNT_FROM_GT_TERSAMPUNT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'LIST_LINE' => 
  array (
    'type' => 'int',
    'label' => 'LBL_LIST_LINE',
    'width' => '10%',
    'default' => true,
  ),
  'LIST_SOURCE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_LIST_SOURCE',
    'sortable' => false,
    'width' => '10%',
  ),
  'LIST_COMMENT' => 
  array (
    'type' => 'text',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_LIST_COMMENT',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
