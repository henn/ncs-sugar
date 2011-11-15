<?php
$module_name = 'ST_StfWkExpns';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ST_STAFFRSTTFWKEXPNS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'st_staffrst_st_stfwkexpns',
    'label' => 'LBL_ST_STAFFRSTR_ST_STFWKEXPNS_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'STAFF_PAY' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_STAFF_PAY',
    'width' => '10%',
    'default' => true,
  ),
  'STAFF_HOURS' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_STAFF_HOURS',
    'width' => '10%',
    'default' => true,
  ),
  'STAFF_EXPENSES' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_STAFF_EXPENSES',
    'width' => '10%',
    'default' => true,
  ),
  'STAFF_MILES' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_STAFF_MILES',
    'width' => '10%',
    'default' => true,
  ),
  'WEEK_START_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_WEEK_START_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'WEEKLY_EXPENSES_COMMENT' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_WEEKLY_EXPENSES_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
);
?>
