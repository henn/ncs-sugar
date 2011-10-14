<?php
$dashletData['PLT_PersonDashlet']['searchFields'] = array (
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
$dashletData['PLT_PersonDashlet']['columns'] = array (
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
    'name' => 'person_comment',
  ),
  'age' => 
  array (
    'type' => 'int',
    'label' => 'LBL_AGE',
    'width' => '10%',
    'default' => false,
    'name' => 'age',
  ),
  'last_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LAST_NAME',
    'width' => '10%',
    'default' => false,
    'name' => 'last_name',
  ),
  'middle_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MIDDLE_NAME',
    'width' => '10%',
    'default' => false,
  ),
  'first_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_FIRST_NAME',
    'width' => '10%',
    'default' => false,
    'name' => 'first_name',
  ),
  'maiden_name' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MAIDEN_NAME',
    'width' => '10%',
    'default' => false,
  ),
  'prefix' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PREFIX',
    'sortable' => false,
    'width' => '10%',
  ),
  'suffix' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_SUFFIX',
    'sortable' => false,
    'width' => '10%',
  ),
  'title' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'sex' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_SEX',
    'sortable' => false,
    'width' => '10%',
  ),
  'person_lang_other' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PERSON_LANG_OTHER',
    'width' => '10%',
    'default' => false,
  ),
  'maristat' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_MARISTAT',
    'sortable' => false,
    'width' => '10%',
  ),
  'maristat_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MARISTAT_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'pref_contact_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PREF_CONTACT_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'ethnic_group' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_ETHNIC_GROUP',
    'sortable' => false,
    'width' => '10%',
  ),
  'plan_move' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PLAN_MOVE',
    'sortable' => false,
    'width' => '10%',
  ),
  'deceased' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_DECEASED',
    'sortable' => false,
    'width' => '10%',
  ),
  'move_info' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_MOVE_INFO',
    'sortable' => false,
    'width' => '10%',
  ),
  'new_address_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NEW_ADDRESS_ID',
    'width' => '10%',
    'default' => false,
  ),
  'when_move' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_WHEN_MOVE',
    'sortable' => false,
    'width' => '10%',
  ),
  'date_move' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DATE_MOVE',
    'width' => '10%',
    'default' => false,
  ),
  'p_tracing' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_P_TRACING',
    'sortable' => false,
    'width' => '10%',
  ),
  'p_info_source' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_P_INFO_SOURCE',
    'sortable' => false,
    'width' => '10%',
  ),
  'p_info_source_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_P_INFO_SOURCE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'age_range' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_AGE_RANGE',
    'sortable' => false,
    'width' => '10%',
  ),
);
