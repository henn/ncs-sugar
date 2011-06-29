<?php
$dashletData['OLT_MSProvRoleDashlet']['searchFields'] = array (
  'name' => 
  array (
    'default' => '',
  ),
  'provider_ncs_role' => 
  array (
    'default' => '',
  ),
  'provider_ncs_role_oth' => 
  array (
    'default' => '',
  ),
);
$dashletData['OLT_MSProvRoleDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'provider_ncs_role' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PROVIDER_NCS_ROLE',
    'sortable' => false,
    'width' => '10%',
    'name' => 'provider_ncs_role',
  ),
  'provider_ncs_role_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PROVIDER_NCS_ROLE_OTH',
    'width' => '10%',
    'default' => true,
    'name' => 'provider_ncs_role_oth',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
    'name' => 'date_entered',
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
);
