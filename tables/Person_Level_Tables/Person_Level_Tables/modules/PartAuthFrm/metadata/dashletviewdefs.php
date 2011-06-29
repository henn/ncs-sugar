<?php
$dashletData['PLT_PartAuthFrmDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'auth_form_type' => 
  array (
    'default' => '',
  ),
  'auth_type_oth' => 
  array (
    'default' => '',
  ),
  'auth_status' => 
  array (
    'default' => '',
  ),
  'auth_status_oth' => 
  array (
    'default' => '',
  ),
  'assigned_user_name' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
);
$dashletData['PLT_PartAuthFrmDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'auth_form_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_AUTH_FORM_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'auth_status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_AUTH_STATUS',
    'sortable' => false,
    'width' => '10%',
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
  'auth_type_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_AUTH_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'auth_status_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_AUTH_STATUS_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
