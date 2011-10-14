<?php
$dashletData['ST_StaffRstrDashlet']['searchFields'] = array (
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
$dashletData['ST_StaffRstrDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'staff_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STAFF_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'staff_yob' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_YOB',
    'width' => '10%',
    'default' => true,
  ),
  'staff_exp' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STAFF_EXP',
    'sortable' => false,
    'width' => '10%',
  ),
  'subcontractor' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SUBCONTRACTOR',
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
  'staff_type_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'staff_age_range' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_STAFF_AGE_RANGE',
    'sortable' => false,
    'width' => '10%',
  ),
  'staff_gender' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_STAFF_GENDER',
    'sortable' => false,
    'width' => '10%',
  ),
  'staff_race_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_RACE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'staff_race' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_STAFF_RACE',
    'sortable' => false,
    'width' => '10%',
  ),
  'staff_ethnicity' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_STAFF_ETHNICITY',
    'sortable' => false,
    'width' => '10%',
  ),
  'staff_comment' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_STAFF_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'staff_zip' => 
  array (
    'type' => 'int',
    'label' => 'LBL_STAFF_ZIP',
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
