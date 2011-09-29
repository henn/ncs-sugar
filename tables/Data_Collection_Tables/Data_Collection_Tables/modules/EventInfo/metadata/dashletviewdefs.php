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
  'assigned_user_id' => 
  array (
    'type' => 'assigned_user_name',
    'default' => 'Administrator',
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
  ),
  'visit_window_starttime_c' => 
  array (
    'type' => 'date',
    'label' => 'LBL_VISIT_WINDOW_STARTDATE',
    'width' => '10%',
    'default' => true,
  ),
  'visit_window_endtime_c' => 
  array (
    'type' => 'date',
    'label' => 'LBL_VISIT_WINDOW_ENDDATE',
    'width' => '10%',
    'default' => true,
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
  'event_type_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EVENT_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'ncsdc_eventrticipant_name' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_eventlt_participant',
    'label' => 'LBL_NCSDC_EVENTINFO_PLT_PARTICIPANT_FROM_PLT_PARTICIPANT_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'ncsdc_cntcteventinfo_name' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_cntctcsdc_eventinfo',
    'label' => 'LBL_NCSDC_CNTCTINFO_NCSDC_EVENTINFO_FROM_NCSDC_CNTCTINFO_TITLE',
    'width' => '10%',
    'default' => false,
  ),
);
