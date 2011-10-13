<?php
// created: 2011-06-20 11:47:53
$dictionary["Note"]["fields"]["ncsdc_eventinfo_notes"] = array (
  'name' => 'ncsdc_eventinfo_notes',
  'type' => 'link',
  'relationship' => 'ncsdc_eventinfo_activities_notes',
  'source' => 'non-db',
  'vname' => 'LBL_NCSDC_EVENTINFO_NOTES_FROM_NCSDC_EVENTINFO_TITLE',
);
$dictionary["Note"]["fields"]["ncsdc_eventnfo_notes_name"] = array (
  'name' => 'ncsdc_eventnfo_notes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NCSDC_EVENTINFO_NOTES_FROM_NCSDC_EVENTINFO_TITLE',
  'save' => true,
  'id_name' => 'ncsdc_even18c0entinfo_ida',
  'link' => 'ncsdc_eventinfo_activities_notes',
  'table' => 'ncsdc_eventinfo',
  'module' => 'NCSDC_EventInfo',
  'rname' => 'name',
);
$dictionary["Note"]["fields"]["ncsdc_even18c0entinfo_ida"] = array (
  'name' => 'ncsdc_even18c0entinfo_ida',
  'type' => 'link',
  'relationship' => 'ncsdc_eventinfo_activities_notes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_NCSDC_EVENTINFO_NOTES_FROM_NOTES_TITLE',
);
