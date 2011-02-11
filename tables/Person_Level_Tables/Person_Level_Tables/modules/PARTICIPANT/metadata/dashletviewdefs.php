<?php
$dashletData['PLT_PARTICIPANTDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'p_id' => 
  array (
    'default' => '',
  ),
  'p_type' => 
  array (
    'default' => '',
  ),
  'enroll_status' => 
  array (
    'default' => '',
  ),
  'date_entered' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
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
    'name' => 'p_id',
  ),
  'enroll_status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ENROLL_STATUS',
    'sortable' => false,
    'width' => '10%',
    'name' => 'enroll_status',
  ),
  'enroll_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_ENROLL_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'enroll_date',
  ),
  'p_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_P_TYPE',
    'sortable' => false,
    'width' => '10%',
    'name' => 'p_type',
  ),
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
    'name' => 'description',
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
    'name' => 'pid_comment',
  ),
  'status_info_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_STATUS_INFO_DATE',
    'width' => '10%',
    'default' => false,
    'name' => 'status_info_date',
  ),
);
