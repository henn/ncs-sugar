<?php
$dashletData['ST_StfWkExpnsDashlet']['searchFields'] = array (
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
$dashletData['ST_StfWkExpnsDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'week_start_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_WEEK_START_DATE',
    'width' => '10%',
    'default' => true,
    'name' => 'week_start_date',
  ),
  'staff_pay' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_STAFF_PAY',
    'width' => '10%',
    'default' => true,
    'name' => 'staff_pay',
  ),
  'staff_hours' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_STAFF_HOURS',
    'width' => '10%',
    'default' => true,
    'name' => 'staff_hours',
  ),
  'staff_expenses' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_STAFF_EXPENSES',
    'width' => '10%',
    'default' => true,
    'name' => 'staff_expenses',
  ),
  'staff_miles' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_STAFF_MILES',
    'width' => '10%',
    'default' => true,
    'name' => 'staff_miles',
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
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'weekly_expenses_comment' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_WEEKLY_EXPENSES_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
    'name' => 'weekly_expenses_comment',
  ),
  'st_staffrsttfwkexpns_name' => 
  array (
    'type' => 'relate',
    'link' => 'st_staffrst_st_stfwkexpns',
    'label' => 'LBL_ST_STAFFRSTR_ST_STFWKEXPNS_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => false,
  ),
);
