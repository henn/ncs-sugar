<?php
// created: 2011-06-15 12:33:01
$dictionary["Meeting"]["fields"]["plt_participant_meetings"] = array (
  'name' => 'plt_participant_meetings',
  'type' => 'link',
  'relationship' => 'plt_participant_meetings',
  'source' => 'non-db',
  'vname' => 'LBL_PLT_PARTICIPANT_MEETINGS_FROM_PLT_PARTICIPANT_TITLE',
);
$dictionary["Meeting"]["fields"]["plt_partici_meetings_name"] = array (
  'name' => 'plt_partici_meetings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PLT_PARTICIPANT_MEETINGS_FROM_PLT_PARTICIPANT_TITLE',
  'save' => true,
  'id_name' => 'plt_particcdb9icipant_ida',
  'link' => 'plt_participant_meetings',
  'table' => 'plt_participant',
  'module' => 'PLT_Participant',
  'rname' => 'name',
);
$dictionary["Meeting"]["fields"]["plt_particcdb9icipant_ida"] = array (
  'name' => 'plt_particcdb9icipant_ida',
  'type' => 'link',
  'relationship' => 'plt_participant_meetings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PLT_PARTICIPANT_MEETINGS_FROM_MEETINGS_TITLE',
);
