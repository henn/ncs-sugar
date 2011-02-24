<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2010-12-15 00:02:46
$dictionary["GT_LISTINGUNT"]["fields"]["gt_listingunt_gt_listingunt"] = array (
  'name' => 'gt_listingunt_gt_listingunt',
  'type' => 'link',
  'relationship' => 'gt_listingunt_gt_listingunt',
  'source' => 'non-db',
  'vname' => 'LBL_GT_LISTINGUNT_GT_DWELLING_UNT_FROM_GT_DWELLING_UNT_TITLE',
);
$dictionary["GT_LISTINGUNT"]["fields"]["gt_listingunt_gt_listingunt_name"] = array (
  'name' => 'gt_listingunt_gt_listingunt_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GT_LISTINGUNT_GT_DWELLING_UNT_FROM_GT_DWELLING_UNT_TITLE',
  'save' => true,
  'id_name' => 'gt_listingb971ng_unit_idb',
  'link' => 'gt_listingunt_gt_listingunt',
  'table' => 'gt_listingunt',
  'module' => 'GT_Dwelling_Unt',
  'rname' => 'name',
);
$dictionary["GT_LISTINGUNT"]["fields"]["gt_listingb971ng_unit_idb"] = array (
  'name' => 'gt_listingb971ng_unit_idb',
  'type' => 'link',
  'relationship' => 'gt_listingunt_gt_listingunt',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GT_LISTINGUNT_GT_DWELLING_UNT_FROM_GT_DWELLING_UNT_TITLE',
);

?>