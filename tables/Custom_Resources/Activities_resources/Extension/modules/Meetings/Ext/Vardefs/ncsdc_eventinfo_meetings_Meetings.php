<?php
// created: 2011-06-20 11:47:53
$dictionary["Meeting"]["fields"]["ncsdc_eventinfo_meetings"] = array (
  'name' => 'ncsdc_eventinfo_meetings',
  'type' => 'link',
  'relationship' => 'ncsdc_eventinfo_activities_meetings',
  'source' => 'non-db',
  'vname' => 'LBL_NCSDC_EVENTINFO_MEETINGS_FROM_NCSDC_EVENTINFO_TITLE',
);
$dictionary["Meeting"]["fields"]["ncsdc_event_meetings_name"] = array (
  'name' => 'ncsdc_event_meetings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NCSDC_EVENTINFO_MEETINGS_FROM_NCSDC_EVENTINFO_TITLE',
  'save' => true,
  'id_name' => 'ncsdc_even1af6entinfo_ida',
  'link' => 'ncsdc_eventinfo_activities_meetings',
  'table' => 'ncsdc_eventinfo',
  'module' => 'NCSDC_EventInfo',
  'rname' => 'name',
);
$dictionary["Meeting"]["fields"]["ncsdc_even1af6entinfo_ida"] = array (
  'name' => 'ncsdc_even1af6entinfo_ida',
  'type' => 'link',
  'relationship' => 'ncsdc_eventinfo_activities_meetings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NCSDC_EVENTINFO_MEETINGS_FROM_MEETINGS_TITLE',
);
