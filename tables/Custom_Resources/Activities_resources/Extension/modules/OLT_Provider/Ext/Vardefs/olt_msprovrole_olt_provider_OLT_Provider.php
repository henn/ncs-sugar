<?php
// created: 2011-12-08 15:46:05
$dictionary["OLT_Provider"]["fields"]["olt_msprovre_olt_provider"] = array (
  'name' => 'olt_msprovre_olt_provider',
  'type' => 'link',
  'relationship' => 'olt_msprovrole_olt_provider',
  'source' => 'non-db',
  'vname' => 'LBL_OLT_MSPROVROLE_OLT_PROVIDER_FROM_OLT_MSPROVROLE_TITLE',
);
$dictionary["OLT_Provider"]["fields"]["olt_msprovr_provider_name"] = array (
  'name' => 'olt_msprovr_provider_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_OLT_MSPROVROLE_OLT_PROVIDER_FROM_OLT_MSPROVROLE_TITLE',
  'save' => true,
  'id_name' => 'olt_msprov6c98rovrole_ida',
  'link' => 'olt_msprovre_olt_provider',
  'table' => 'olt_msprovrole',
  'module' => 'OLT_MSProvRole',
  'rname' => 'name',
);
$dictionary["OLT_Provider"]["fields"]["olt_msprov6c98rovrole_ida"] = array (
  'name' => 'olt_msprov6c98rovrole_ida',
  'type' => 'link',
  'relationship' => 'olt_msprovrole_olt_provider',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_OLT_MSPROVROLE_OLT_PROVIDER_FROM_OLT_MSPROVROLE_TITLE',
);
