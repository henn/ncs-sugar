<?php
$dashletData['PLT_PARTICIPANTDashlet']['searchFields'] = array (
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
$dashletData['PLT_PARTICIPANTDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'p_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_P_ID',
    'width' => '10%',
    'default' => true,
  ),
  'enroll_status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ENROLL_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  'enroll_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_ENROLL_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'p_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_P_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
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
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
    'name' => 'date_entered',
  ),
  'pid_comment' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_PID_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'status_info_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_STATUS_INFO_DATE',
    'width' => '10%',
    'default' => false,
  ),
);
