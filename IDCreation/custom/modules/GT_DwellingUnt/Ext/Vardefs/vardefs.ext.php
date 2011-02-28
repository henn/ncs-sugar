<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2010-12-15 00:02:47
$dictionary["GT_Dwelling_Unt"]["fields"]["gt_listingunt_ltt_email"] = array (
  'name' => 'gt_listingunt_ltt_email',
  'type' => 'link',
  'relationship' => 'gt_listingunt_ltt_email',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_GT_DWELLING_UNT_LTT_EMAIL_FROM_LTT_EMAIL_TITLE',
);


// created: 2010-12-15 00:02:47
$dictionary["GT_Dwelling_Unt"]["fields"]["gt_listingunt_gt_household"] = array (
  'name' => 'gt_listingunt_gt_household',
  'type' => 'link',
  'relationship' => 'gt_listingunt_gt_household',
  'source' => 'non-db',
  'vname' => 'LBL_GT_DWELLING_UNT_GT_HOUSEHOLD_FROM_GT_HOUSEHOLD_TITLE',
);


// created: 2010-12-15 00:02:46
$dictionary["GT_Dwelling_Unt"]["fields"]["gt_listingunt_gt_listingunt"] = array (
  'name' => 'gt_listingunt_gt_listingunt',
  'type' => 'link',
  'relationship' => 'gt_listingunt_gt_listingunt',
  'source' => 'non-db',
  'vname' => 'LBL_GT_LISTINGUNT_GT_DWELLING_UNT_FROM_GT_LISTINGUNT_TITLE',
);
$dictionary["GT_Dwelling_Unt"]["fields"]["gt_listingunt_gt_listingunt_name"] = array (
  'name' => 'gt_listingunt_gt_listingunt_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GT_LISTINGUNT_GT_DWELLING_UNT_FROM_GT_LISTINGUNT_TITLE',
  'save' => true,
  'id_name' => 'gt_listing0ef9ng_unit_ida',
  'link' => 'gt_listingunt_gt_listingunt',
  'table' => 'gt_listingunt',
  'module' => 'GT_LISTINGUNT',
  'rname' => 'name',
);
$dictionary["GT_Dwelling_Unt"]["fields"]["gt_listing0ef9ng_unit_ida"] = array (
  'name' => 'gt_listing0ef9ng_unit_ida',
  'type' => 'link',
  'relationship' => 'gt_listingunt_gt_listingunt',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GT_LISTINGUNT_GT_DWELLING_UNT_FROM_GT_LISTINGUNT_TITLE',
);


// created: 2010-12-15 00:02:47
$dictionary["GT_Dwelling_Unt"]["fields"]["gt_listingunt_ltt_address"] = array (
  'name' => 'gt_listingunt_ltt_address',
  'type' => 'link',
  'relationship' => 'gt_listingunt_ltt_address',
  'source' => 'non-db',
  'vname' => 'LBL_GT_DWELLING_UNT_LTT_ADDRESS_FROM_LTT_ADDRESS_TITLE',
);
$dictionary["GT_Dwelling_Unt"]["fields"]["gt_listingunt_ltt_address_name"] = array (
  'name' => 'gt_listingunt_ltt_address_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GT_DWELLING_UNT_LTT_ADDRESS_FROM_LTT_ADDRESS_TITLE',
  'save' => true,
  'id_name' => 'gt_dwellinf358address_idb',
  'link' => 'gt_listingunt_ltt_address',
  'table' => 'ltt_address',
  'module' => 'LTT_ADDRESS',
  'rname' => 'name',
);
$dictionary["GT_Dwelling_Unt"]["fields"]["gt_dwellinf358address_idb"] = array (
  'name' => 'gt_dwellinf358address_idb',
  'type' => 'link',
  'relationship' => 'gt_listingunt_ltt_address',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GT_DWELLING_UNT_LTT_ADDRESS_FROM_LTT_ADDRESS_TITLE',
);


// created: 2010-12-15 00:02:47
$dictionary["GT_Dwelling_Unt"]["fields"]["gt_listingunt_ltt_telephone"] = array (
  'name' => 'gt_listingunt_ltt_telephone',
  'type' => 'link',
  'relationship' => 'gt_listingunt_ltt_telephone',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_GT_DWELLING_UNT_LTT_TELEPHONE_FROM_LTT_TELEPHONE_TITLE',
);

?>