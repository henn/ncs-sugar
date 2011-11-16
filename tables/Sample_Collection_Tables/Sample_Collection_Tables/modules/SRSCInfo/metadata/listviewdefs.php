<?php
$module_name = 'SAMP_SRSCInfo';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SAMP_RECCON_SRSCINFO_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_reccon_samp_srscinfo',
    'label' => 'LBL_SAMP_RECCONF_SAMP_SRSCINFO_FROM_SAMP_RECCONF_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'SAMP_SRSCINT_ADDRESS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_srscinfo_ltt_address',
    'label' => 'LBL_SAMP_SRSCINFO_LTT_ADDRESS_FROM_LTT_ADDRESS_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
);
?>
