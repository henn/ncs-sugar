<?php
$dashletData['PLT_PERSONDashlet']['searchFields'] = array (
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
$dashletData['PLT_PERSONDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'person_dob' => 
  array (
    'type' => 'date',
    'studio' => 'visible',
    'label' => 'LBL_PERSON_DOB',
    'width' => '10%',
    'default' => true,
    'name' => 'person_dob',
  ),
  'person_lang' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PERSON_LANG',
    'sortable' => false,
    'width' => '10%',
    'name' => 'person_lang',
  ),
  'pref_contact' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PREF_CONTACT',
    'sortable' => false,
    'width' => '10%',
    'name' => 'pref_contact',
  ),
  'p_info_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_P_INFO_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'p_info_date',
  ),
  'p_info_update' => 
  array (
    'type' => 'date',
    'label' => 'LBL_P_INFO_UPDATE',
    'width' => '10%',
    'default' => true,
    'name' => 'p_info_update',
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
  'person_comment' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_PERSON_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'age' => 
  array (
    'type' => 'int',
    'label' => 'LBL_AGE',
    'width' => '10%',
    'default' => false,
  ),
  'last_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LAST_NAME',
    'width' => '10%',
    'default' => false,
  ),
  'first_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_FIRST_NAME',
    'width' => '10%',
    'default' => false,
  ),
);
