<?php
// created: 2011-11-21 14:19:56
$dictionary["Note"]["fields"]["plt_participant_notes"] = array (
  'name' => 'plt_participant_notes',
  'type' => 'link',
  'relationship' => 'plt_participant_notes',
  'source' => 'non-db',
  'vname' => 'LBL_PLT_PARTICIPANT_NOTES_FROM_PLT_PARTICIPANT_TITLE',
);
$dictionary["Note"]["fields"]["plt_particiant_notes_name"] = array (
  'name' => 'plt_particiant_notes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PLT_PARTICIPANT_NOTES_FROM_PLT_PARTICIPANT_TITLE',
  'save' => true,
  'id_name' => 'plt_particbff3icipant_ida',
  'link' => 'plt_participant_notes',
  'table' => 'plt_participant',
  'module' => 'PLT_Participant',
  'rname' => 'name',
);
$dictionary["Note"]["fields"]["plt_particbff3icipant_ida"] = array (
  'name' => 'plt_particbff3icipant_ida',
  'type' => 'link',
  'relationship' => 'plt_participant_notes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PLT_PARTICIPANT_NOTES_FROM_NOTES_TITLE',
);
