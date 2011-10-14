<?php
$dashletData['LTT_EmailDashlet']['searchFields'] = array (
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
$dashletData['LTT_EmailDashlet']['columns'] = array (
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
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'email_rank' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_EMAIL_RANK',
    'sortable' => false,
    'width' => '10%',
  ),
  'email_rank_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL_RANK_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'email_info_source' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_EMAIL_INFO_SOURCE',
    'sortable' => false,
    'width' => '10%',
  ),
  'email' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL',
    'width' => '10%',
    'default' => false,
  ),
  'email_info_source_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL_INFO_SOURCE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'email_type' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_EMAIL_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'email_type_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'email_share' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_EMAIL_SHARE',
    'sortable' => false,
    'width' => '10%',
  ),
  'email_active' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_EMAIL_ACTIVE',
    'sortable' => false,
    'width' => '10%',
  ),
  'email_comment' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_EMAIL_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'email_info_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_EMAIL_INFO_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'email_info_update' => 
  array (
    'type' => 'date',
    'label' => 'LBL_EMAIL_INFO_UPDATE',
    'width' => '10%',
    'default' => false,
  ),
  'email_start_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_EMAIL_START_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'email_end_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_EMAIL_END_DATE',
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
);
