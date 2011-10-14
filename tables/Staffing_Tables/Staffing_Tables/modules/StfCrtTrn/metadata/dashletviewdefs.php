<?php
$dashletData['ST_StfCrtTrnDashlet']['searchFields'] = array (
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
$dashletData['ST_StfCrtTrnDashlet']['columns'] = array (
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
  'cert_train_type' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CERT_TRAIN_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'cert_completed' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CERT_COMPLETED',
    'sortable' => false,
    'width' => '10%',
  ),
  'cert_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CERT_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'staff_bgcheck_lvl' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_STAFF_BGCHECK_LVL',
    'sortable' => false,
    'width' => '10%',
  ),
  'cert_type_frequency' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CERT_TYPE_FREQUENCY',
    'width' => '10%',
    'default' => false,
  ),
  'cert_type_exp_date' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CERT_TYPE_EXP_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'cert_comment' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_CERT_COMMENT',
    'sortable' => false,
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
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'st_staffrststfcrttrn_name' => 
  array (
    'type' => 'relate',
    'link' => 'st_staffrstr_st_stfcrttrn',
    'label' => 'LBL_ST_STAFFRSTR_ST_STFCRTTRN_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => false,
  ),
);
