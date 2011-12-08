<?php
// created: 2011-12-08 15:46:03
$dictionary["OLT_Provider"]["fields"]["olt_provideolt_msprovrole"] = array (
  'name' => 'olt_provideolt_msprovrole',
  'type' => 'link',
  'relationship' => 'olt_provider_olt_msprovrole',
  'source' => 'non-db',
  'vname' => 'LBL_OLT_PROVIDER_OLT_MSPROVROLE_FROM_OLT_MSPROVROLE_TITLE',
);
$dictionary["OLT_Provider"]["fields"]["olt_providesprovrole_name"] = array (
  'name' => 'olt_providesprovrole_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_OLT_PROVIDER_OLT_MSPROVROLE_FROM_OLT_MSPROVROLE_TITLE',
  'save' => true,
  'id_name' => 'olt_providdbd7rovrole_idb',
  'link' => 'olt_provideolt_msprovrole',
  'table' => 'olt_msprovrole',
  'module' => 'OLT_MSProvRole',
  'rname' => 'name',
);
$dictionary["OLT_Provider"]["fields"]["olt_providdbd7rovrole_idb"] = array (
  'name' => 'olt_providdbd7rovrole_idb',
  'type' => 'link',
  'relationship' => 'olt_provider_olt_msprovrole',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_OLT_PROVIDER_OLT_MSPROVROLE_FROM_OLT_MSPROVROLE_TITLE',
);
