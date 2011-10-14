<?php
$dashletData['PLT_PPGDetailsDashlet']['searchFields'] = array (
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
$dashletData['PLT_PPGDetailsDashlet']['columns'] = array (
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
  'ppg_pid_status' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PPG_PID_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  'ppg_first' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PPG_FIRST',
    'sortable' => false,
    'width' => '10%',
  ),
  'orig_due_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_ORIG_DUE_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'due_date_2' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DUE_DATE_2',
    'width' => '10%',
    'default' => false,
  ),
  'due_date_3' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DUE_DATE_3',
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
  'plt_participgdetails_name' => 
  array (
    'type' => 'relate',
    'link' => 'plt_participlt_ppgdetails',
    'label' => 'LBL_PLT_PARTICIPANT_PLT_PPGDETAILS_FROM_PLT_PARTICIPANT_TITLE',
    'width' => '10%',
    'default' => false,
  ),
);
