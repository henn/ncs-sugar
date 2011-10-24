<?php
$popupMeta = array (
    'moduleMain' => 'SAMP_BioSpecID',
    'varName' => 'SAMP_BioSpecID',
    'orderBy' => 'samp_biospecid.name',
    'whereClauses' => array (
  'name' => 'samp_biospecid.name',
  'item_type' => 'samp_biospecid.item_type',
  'item_prompt' => 'samp_biospecid.item_prompt',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'item_type',
  5 => 'item_prompt',
),
    'searchdefs' => array (
  'name' => 
  array (
    'type' => 'name',
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
  ),
  'item_type' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ITEM_TYPE',
    'width' => '10%',
    'name' => 'item_type',
  ),
  'item_prompt' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ITEM_PROMPT',
    'width' => '10%',
    'name' => 'item_prompt',
  ),
),
);
