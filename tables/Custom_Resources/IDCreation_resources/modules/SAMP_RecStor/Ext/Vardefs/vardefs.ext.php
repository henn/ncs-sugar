<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-10-12 09:32:10
$dictionary["SAMP_RecStor"]["fields"]["samp_recstor_samp_enequip"] = array (
  'name' => 'samp_recstor_samp_enequip',
  'type' => 'link',
  'relationship' => 'samp_recstor_samp_enequip',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_RECSTOR_SAMP_ENEQUIP_FROM_SAMP_ENEQUIP_TITLE',
);
$dictionary["SAMP_RecStor"]["fields"]["samp_recstop_enequip_name"] = array (
  'name' => 'samp_recstop_enequip_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_RECSTOR_SAMP_ENEQUIP_FROM_SAMP_ENEQUIP_TITLE',
  'save' => true,
  'id_name' => 'samp_recst9958enequip_ida',
  'link' => 'samp_recstor_samp_enequip',
  'table' => 'samp_enequip',
  'module' => 'SAMP_EnEquip',
  'rname' => 'name',
);
$dictionary["SAMP_RecStor"]["fields"]["samp_recst9958enequip_ida"] = array (
  'name' => 'samp_recst9958enequip_ida',
  'type' => 'link',
  'relationship' => 'samp_recstor_samp_enequip',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SAMP_RECSTOR_SAMP_ENEQUIP_FROM_SAMP_RECSTOR_TITLE',
);


// created: 2011-10-12 09:32:09
$dictionary["SAMP_RecStor"]["fields"]["samp_recsto_samp_srscinfo"] = array (
  'name' => 'samp_recsto_samp_srscinfo',
  'type' => 'link',
  'relationship' => 'samp_recstor_samp_srscinfo',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_RECSTOR_SAMP_SRSCINFO_FROM_SAMP_SRSCINFO_TITLE',
);
$dictionary["SAMP_RecStor"]["fields"]["samp_recsto_srscinfo_name"] = array (
  'name' => 'samp_recsto_srscinfo_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_RECSTOR_SAMP_SRSCINFO_FROM_SAMP_SRSCINFO_TITLE',
  'save' => true,
  'id_name' => 'samp_recst289brscinfo_ida',
  'link' => 'samp_recsto_samp_srscinfo',
  'table' => 'samp_srscinfo',
  'module' => 'SAMP_SRSCInfo',
  'rname' => 'name',
);
$dictionary["SAMP_RecStor"]["fields"]["samp_recst289brscinfo_ida"] = array (
  'name' => 'samp_recst289brscinfo_ida',
  'type' => 'link',
  'relationship' => 'samp_recstor_samp_srscinfo',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SAMP_RECSTOR_SAMP_SRSCINFO_FROM_SAMP_RECSTOR_TITLE',
);


// created: 2011-10-12 09:32:08
$dictionary["SAMP_RecStor"]["fields"]["samp_recstor_st_staffrstr"] = array (
  'name' => 'samp_recstor_st_staffrstr',
  'type' => 'link',
  'relationship' => 'samp_recstor_st_staffrstr',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_RECSTOR_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
);
$dictionary["SAMP_RecStor"]["fields"]["samp_recstostaffrstr_name"] = array (
  'name' => 'samp_recstostaffrstr_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_RECSTOR_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
  'save' => true,
  'id_name' => 'samp_recst8938affrstr_ida',
  'link' => 'samp_recstor_st_staffrstr',
  'table' => 'st_staffrstr',
  'module' => 'ST_StaffRstr',
  'rname' => 'name',
);
$dictionary["SAMP_RecStor"]["fields"]["samp_recst8938affrstr_ida"] = array (
  'name' => 'samp_recst8938affrstr_ida',
  'type' => 'link',
  'relationship' => 'samp_recstor_st_staffrstr',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SAMP_RECSTOR_ST_STAFFRSTR_FROM_SAMP_RECSTOR_TITLE',
);


// created: 2011-10-12 09:32:26
$dictionary["SAMP_RecStor"]["fields"]["samp_sampshp_samp_recstor"] = array (
  'name' => 'samp_sampshp_samp_recstor',
  'type' => 'link',
  'relationship' => 'samp_sampship_samp_recstor',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SAMPSHIP_SAMP_RECSTOR_FROM_SAMP_SAMPSHIP_TITLE',
);
$dictionary["SAMP_RecStor"]["fields"]["samp_sampshp_recstor_name"] = array (
  'name' => 'samp_sampshp_recstor_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SAMPSHIP_SAMP_RECSTOR_FROM_SAMP_SAMPSHIP_TITLE',
  'save' => true,
  'id_name' => 'samp_samps913eampship_ida',
  'link' => 'samp_sampshp_samp_recstor',
  'table' => 'samp_sampship',
  'module' => 'SAMP_SampShip',
  'rname' => 'name',
);
$dictionary["SAMP_RecStor"]["fields"]["samp_samps913eampship_ida"] = array (
  'name' => 'samp_samps913eampship_ida',
  'type' => 'link',
  'relationship' => 'samp_sampship_samp_recstor',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SAMP_SAMPSHIP_SAMP_RECSTOR_FROM_SAMP_RECSTOR_TITLE',
);

?>