<?php
$module_name = 'PLT_PPGStsHstry';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'PLT_PARTICIGSTSHSTRY_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'plt_particilt_ppgstshstry',
    'label' => 'LBL_PLT_PARTICIPANT_PLT_PPGSTSHSTRY_FROM_PLT_PARTICIPANT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'PPG_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PPG_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  'PPG_INFO_MODE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PPG_INFO_MODE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PPG_INFO_SOURCE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PPG_INFO_SOURCE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PPG_STATUS_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PPG_STATUS_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'PPG_COMMENT' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_PPG_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'PPG_INFO_SOURCE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PPG_INFO_SOURCE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'PPG_INFO_MODE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PPG_INFO_MODE_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
?>
