<?php
$dashletData['NCSDC_EventInfoDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'event_type' => 
  array (
    'default' => '',
  ),
  'event_disp' => 
  array (
    'default' => '',
  ),
);
$dashletData['NCSDC_EventInfoDashlet']['columns'] = array (
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
  'event_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EVENT_TYPE',
    'sortable' => false,
    'width' => '10%',
    'name' => 'event_type',
  ),
  'visit_window_starttime_c' => 
  array (
    'type' => 'date',
    'label' => 'LBL_VISIT_WINDOW_STARTDATE',
    'width' => '10%',
    'default' => true,
    'name' => 'visit_window_starttime_c',
  ),
  'visit_window_endtime_c' => 
  array (
    'type' => 'date',
    'label' => 'LBL_VISIT_WINDOW_ENDDATE',
    'width' => '10%',
    'default' => true,
    'name' => 'visit_window_endtime_c',
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
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
    'name' => 'description',
  ),
  'event_disp_cat' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_EVENT_DISP_CAT',
    'sortable' => false,
    'width' => '10%',
    'name' => 'event_disp_cat',
  ),
  'event_disp' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EVENT_DISP',
    'width' => '10%',
    'default' => false,
  ),
  'event_type_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EVENT_TYPE_OTH',
    'width' => '10%',
    'default' => false,
    'name' => 'event_type_oth',
  ),
  'event_start_date_time' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_EVENT_START_DATE_TIME',
    'width' => '10%',
    'default' => false,
    'name' => 'event_start_date_time',
  ),
  'event_end_date_time' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_EVENT_END_DATE_TIME',
    'width' => '10%',
    'default' => false,
    'name' => 'event_end_date_time',
  ),
  'event_breakoff' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_EVENT_BREAKOFF',
    'sortable' => false,
    'width' => '10%',
    'name' => 'event_breakoff',
  ),
  'event_incentive_type' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_EVENT_INCENTIVE_TYPE',
    'sortable' => false,
    'width' => '10%',
    'name' => 'event_incentive_type',
  ),
  'incentive_checked_out' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_INCENTIVE_CHECKED_OUT',
    'sortable' => false,
    'width' => '10%',
    'name' => 'incentive_checked_out',
  ),
  'event_incent_cash' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_EVENT_INCENT_CASH',
    'width' => '10%',
    'default' => false,
    'name' => 'event_incent_cash',
  ),
  'event_comment' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_EVENT_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
    'name' => 'event_comment',
  ),
  'event_repeat_key' => 
  array (
    'type' => 'int',
    'label' => 'LBL_EVENT_REPEAT_KEY',
    'width' => '10%',
    'default' => false,
    'name' => 'event_repeat_key',
  ),
  'event_incent_noncash' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EVENT_INCENT_NONCASH',
    'width' => '10%',
    'default' => false,
    'name' => 'event_incent_noncash',
  ),
  'ncsdc_eventrticipant_name' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_eventlt_participant',
    'label' => 'LBL_NCSDC_EVENTINFO_PLT_PARTICIPANT_FROM_PLT_PARTICIPANT_TITLE',
    'width' => '10%',
    'default' => false,
    'name' => 'ncsdc_eventrticipant_name',
  ),
);
