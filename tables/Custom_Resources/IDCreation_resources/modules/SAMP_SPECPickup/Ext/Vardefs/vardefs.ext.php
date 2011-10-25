<?php 
 //WARNING: The contents of this file are auto-generated


 $dictionary["SAMP_SPECPickup"]["indices"][] = 
        array("name" =>"idx_name_del", "type"=>"index", "fields"=>array("name","deleted"));
 

// created: 2011-10-12 09:32:34
$dictionary["SAMP_SPECPickup"]["fields"]["samp_specpicsdc_eventinfo"] = array (
  'name' => 'samp_specpicsdc_eventinfo',
  'type' => 'link',
  'relationship' => 'samp_specpickup_ncsdc_eventinfo',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SPECPICKUP_NCSDC_EVENTINFO_FROM_NCSDC_EVENTINFO_TITLE',
);
$dictionary["SAMP_SPECPickup"]["fields"]["samp_specpieventinfo_name"] = array (
  'name' => 'samp_specpieventinfo_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SPECPICKUP_NCSDC_EVENTINFO_FROM_NCSDC_EVENTINFO_TITLE',
  'save' => true,
  'id_name' => 'samp_specped0bentinfo_ida',
  'link' => 'samp_specpicsdc_eventinfo',
  'table' => 'ncsdc_eventinfo',
  'module' => 'NCSDC_EventInfo',
  'rname' => 'name',
);
$dictionary["SAMP_SPECPickup"]["fields"]["samp_specped0bentinfo_ida"] = array (
  'name' => 'samp_specped0bentinfo_ida',
  'type' => 'link',
  'relationship' => 'samp_specpickup_ncsdc_eventinfo',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SAMP_SPECPICKUP_NCSDC_EVENTINFO_FROM_SAMP_SPECPICKUP_TITLE',
);


// created: 2011-10-12 09:32:34
$dictionary["SAMP_SPECPickup"]["fields"]["samp_specpisdc_instrument"] = array (
  'name' => 'samp_specpisdc_instrument',
  'type' => 'link',
  'relationship' => 'samp_specpickup_ncsdc_instrument',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SPECPICKUP_NCSDC_INSTRUMENT_FROM_NCSDC_INSTRUMENT_TITLE',
);
$dictionary["SAMP_SPECPickup"]["fields"]["samp_specpinstrument_name"] = array (
  'name' => 'samp_specpinstrument_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SPECPICKUP_NCSDC_INSTRUMENT_FROM_NCSDC_INSTRUMENT_TITLE',
  'save' => true,
  'id_name' => 'samp_specp5f0ctrument_ida',
  'link' => 'samp_specpisdc_instrument',
  'table' => 'ncsdc_instrument',
  'module' => 'NCSDC_Instrument',
  'rname' => 'name',
);
$dictionary["SAMP_SPECPickup"]["fields"]["samp_specp5f0ctrument_ida"] = array (
  'name' => 'samp_specp5f0ctrument_ida',
  'type' => 'link',
  'relationship' => 'samp_specpickup_ncsdc_instrument',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SAMP_SPECPICKUP_NCSDC_INSTRUMENT_FROM_SAMP_SPECPICKUP_TITLE',
);


// created: 2011-10-12 09:32:36
$dictionary["SAMP_SPECPickup"]["fields"]["samp_specpi_samp_spscinfo"] = array (
  'name' => 'samp_specpi_samp_spscinfo',
  'type' => 'link',
  'relationship' => 'samp_specpickup_samp_spscinfo',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SPECPICKUP_SAMP_SPSCINFO_FROM_SAMP_SPSCINFO_TITLE',
);
$dictionary["SAMP_SPECPickup"]["fields"]["samp_specpi_spscinfo_name"] = array (
  'name' => 'samp_specpi_spscinfo_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SPECPICKUP_SAMP_SPSCINFO_FROM_SAMP_SPSCINFO_TITLE',
  'save' => true,
  'id_name' => 'samp_specp5bc3pscinfo_ida',
  'link' => 'samp_specpi_samp_spscinfo',
  'table' => 'samp_spscinfo',
  'module' => 'SAMP_SPSCInfo',
  'rname' => 'name',
);
$dictionary["SAMP_SPECPickup"]["fields"]["samp_specp5bc3pscinfo_ida"] = array (
  'name' => 'samp_specp5bc3pscinfo_ida',
  'type' => 'link',
  'relationship' => 'samp_specpickup_samp_spscinfo',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SAMP_SPECPICKUP_SAMP_SPSCINFO_FROM_SAMP_SPECPICKUP_TITLE',
);


// created: 2011-10-12 09:32:35
$dictionary["SAMP_SPECPickup"]["fields"]["samp_specpip_st_staffrstr"] = array (
  'name' => 'samp_specpip_st_staffrstr',
  'type' => 'link',
  'relationship' => 'samp_specpickup_st_staffrstr',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SPECPICKUP_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
);
$dictionary["SAMP_SPECPickup"]["fields"]["samp_specpistaffrstr_name"] = array (
  'name' => 'samp_specpistaffrstr_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SAMP_SPECPICKUP_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
  'save' => true,
  'id_name' => 'samp_specpeb90affrstr_ida',
  'link' => 'samp_specpip_st_staffrstr',
  'table' => 'st_staffrstr',
  'module' => 'ST_StaffRstr',
  'rname' => 'name',
);
$dictionary["SAMP_SPECPickup"]["fields"]["samp_specpeb90affrstr_ida"] = array (
  'name' => 'samp_specpeb90affrstr_ida',
  'type' => 'link',
  'relationship' => 'samp_specpickup_st_staffrstr',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SAMP_SPECPICKUP_ST_STAFFRSTR_FROM_SAMP_SPECPICKUP_TITLE',
);


$dictionary['SAMP_SPECPickup']['unified_search'] = true;
$dictionary['SAMP_SPECPickup']['unified_search_default_enabled'] = true;
$dictionary['SAMP_SPECPickup']['fields']['name']['unified_search'] = true;



?>