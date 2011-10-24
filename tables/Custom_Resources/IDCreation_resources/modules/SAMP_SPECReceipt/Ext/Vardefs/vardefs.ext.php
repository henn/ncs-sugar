<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-10-03 17:10:04
$dictionary["SAMP_SPECReceipt"]["fields"]["samp_specre_samp_spscinfo"] = array (
  'name' => 'samp_specre_samp_spscinfo',
  'type' => 'link',
  'relationship' => 'samp_specreceipt_samp_spscinfo',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SPECRECEIPT_SAMP_SPSCINFO_FROM_SAMP_SPSCINFO_TITLE',
);
$dictionary["SAMP_SPECReceipt"]["fields"]["samp_specre_spscinfo_name"] = array (
  'name' => 'samp_specre_spscinfo_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SPECRECEIPT_SAMP_SPSCINFO_FROM_SAMP_SPSCINFO_TITLE',
  'save' => true,
  'id_name' => 'samp_specre60bpscinfo_ida',
  'link' => 'samp_specre_samp_spscinfo',
  'table' => 'samp_spscinfo',
  'module' => 'SAMP_SPSCInfo',
  'rname' => 'name',
);
$dictionary["SAMP_SPECReceipt"]["fields"]["samp_specre60bpscinfo_ida"] = array (
  'name' => 'samp_specre60bpscinfo_ida',
  'type' => 'link',
  'relationship' => 'samp_specreceipt_samp_spscinfo',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SAMP_SPECRECEIPT_SAMP_SPSCINFO_FROM_SAMP_SPECRECEIPT_TITLE',
);


// created: 2011-10-03 17:10:04
$dictionary["SAMP_SPECReceipt"]["fields"]["samp_specremp_specstorage"] = array (
  'name' => 'samp_specremp_specstorage',
  'type' => 'link',
  'relationship' => 'samp_specreceipt_samp_specstorage',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SPECRECEIPT_SAMP_SPECSTORAGE_FROM_SAMP_SPECSTORAGE_TITLE',
);
$dictionary["SAMP_SPECReceipt"]["fields"]["samp_specreecstorage_name"] = array (
  'name' => 'samp_specreecstorage_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SPECRECEIPT_SAMP_SPECSTORAGE_FROM_SAMP_SPECSTORAGE_TITLE',
  'save' => true,
  'id_name' => 'samp_specr1e5cstorage_ida',
  'link' => 'samp_specremp_specstorage',
  'table' => 'samp_specstorage',
  'module' => 'SAMP_SPECStorage',
  'rname' => 'name',
);
$dictionary["SAMP_SPECReceipt"]["fields"]["samp_specr1e5cstorage_ida"] = array (
  'name' => 'samp_specr1e5cstorage_ida',
  'type' => 'link',
  'relationship' => 'samp_specreceipt_samp_specstorage',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SAMP_SPECRECEIPT_SAMP_SPECSTORAGE_FROM_SAMP_SPECRECEIPT_TITLE',
);


// created: 2011-10-03 17:10:04
$dictionary["SAMP_SPECReceipt"]["fields"]["samp_specresamp_specequip"] = array (
  'name' => 'samp_specresamp_specequip',
  'type' => 'link',
  'relationship' => 'samp_specreceipt_samp_specequip',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SPECRECEIPT_SAMP_SPECEQUIP_FROM_SAMP_SPECEQUIP_TITLE',
);
$dictionary["SAMP_SPECReceipt"]["fields"]["samp_specrespecequip_name"] = array (
  'name' => 'samp_specrespecequip_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SPECRECEIPT_SAMP_SPECEQUIP_FROM_SAMP_SPECEQUIP_TITLE',
  'save' => true,
  'id_name' => 'samp_specr09f0ecequip_ida',
  'link' => 'samp_specresamp_specequip',
  'table' => 'samp_specequip',
  'module' => 'SAMP_SPECEquip',
  'rname' => 'name',
);
$dictionary["SAMP_SPECReceipt"]["fields"]["samp_specr09f0ecequip_ida"] = array (
  'name' => 'samp_specr09f0ecequip_ida',
  'type' => 'link',
  'relationship' => 'samp_specreceipt_samp_specequip',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SAMP_SPECRECEIPT_SAMP_SPECEQUIP_FROM_SAMP_SPECRECEIPT_TITLE',
);


// created: 2011-10-03 17:10:03
$dictionary["SAMP_SPECReceipt"]["fields"]["samp_specret_st_staffrstr"] = array (
  'name' => 'samp_specret_st_staffrstr',
  'type' => 'link',
  'relationship' => 'samp_specreceipt_st_staffrstr',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SPECRECEIPT_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
);
$dictionary["SAMP_SPECReceipt"]["fields"]["samp_specrestaffrstr_name"] = array (
  'name' => 'samp_specrestaffrstr_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SPECRECEIPT_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
  'save' => true,
  'id_name' => 'samp_specr703daffrstr_ida',
  'link' => 'samp_specret_st_staffrstr',
  'table' => 'st_staffrstr',
  'module' => 'ST_StaffRstr',
  'rname' => 'name',
);
$dictionary["SAMP_SPECReceipt"]["fields"]["samp_specr703daffrstr_ida"] = array (
  'name' => 'samp_specr703daffrstr_ida',
  'type' => 'link',
  'relationship' => 'samp_specreceipt_st_staffrstr',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SAMP_SPECRECEIPT_ST_STAFFRSTR_FROM_SAMP_SPECRECEIPT_TITLE',
);


$dictionary['SAMP_SPECReceipt']['unified_search'] = true;
$dictionary['SAMP_SPECReceipt']['unified_search_default_enabled'] = true;
$dictionary['SAMP_SPECReceipt']['fields']['name']['unified_search'] = true;




 $dictionary["SAMP_SPECReceipt"]["indices"][] = 
        array("name" =>"idx_name_del", "type"=>"index", "fields"=>array("name","deleted"));
 
?>