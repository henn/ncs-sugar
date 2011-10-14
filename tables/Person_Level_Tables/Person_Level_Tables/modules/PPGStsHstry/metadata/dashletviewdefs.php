<?php
$dashletData['PLT_PPGStsHstryDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'type' => 'assigned_user_name',
    'default' => 'Administrator',
  ),
);
$dashletData['PLT_PPGStsHstryDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'name' => 'date_entered',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'ppg_status' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PPG_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  'ppg_info_source' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PPG_INFO_SOURCE',
    'sortable' => false,
    'width' => '10%',
  ),
  'ppg_info_mode' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PPG_INFO_MODE',
    'sortable' => false,
    'width' => '10%',
  ),
  'ppg_comment' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_PPG_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'ppg_status_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PPG_STATUS_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'ppg_info_source_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PPG_INFO_SOURCE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'ppg_info_mode_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PPG_INFO_MODE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'plt_particigstshstry_name' => 
  array (
    'type' => 'relate',
    'link' => 'plt_particilt_ppgstshstry',
    'label' => 'LBL_PLT_PARTICIPANT_PLT_PPGSTSHSTRY_FROM_PLT_PARTICIPANT_TITLE',
    'width' => '10%',
    'default' => false,
  ),
);
