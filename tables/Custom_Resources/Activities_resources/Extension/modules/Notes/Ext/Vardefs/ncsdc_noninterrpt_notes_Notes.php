<?php
// created: 2011-12-13 16:38:09
$dictionary["Note"]["fields"]["ncsdc_noninterrpt_notes"] = array (
  'name' => 'ncsdc_noninterrpt_notes',
  'type' => 'link',
  'relationship' => 'ncsdc_noninterrpt_notes',
  'source' => 'non-db',
  'vname' => 'LBL_NCSDC_NONINTERRPT_NOTES_FROM_NCSDC_NONINTERRPT_TITLE',
);
$dictionary["Note"]["fields"]["ncsdc_noninrpt_notes_name"] = array (
  'name' => 'ncsdc_noninrpt_notes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_NCSDC_NONINTERRPT_NOTES_FROM_NCSDC_NONINTERRPT_TITLE',
  'save' => true,
  'id_name' => 'ncsdc_nonif7cdnterrpt_ida',
  'link' => 'ncsdc_noninterrpt_notes',
  'table' => 'ncsdc_noninterrpt',
  'module' => 'NCSDC_NonInterRpt',
  'rname' => 'name',
);
$dictionary["Note"]["fields"]["ncsdc_nonif7cdnterrpt_ida"] = array (
  'name' => 'ncsdc_nonif7cdnterrpt_ida',
  'type' => 'link',
  'relationship' => 'ncsdc_noninterrpt_notes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_NCSDC_NONINTERRPT_NOTES_FROM_NCSDC_NONINTERRPT_TITLE',
);
