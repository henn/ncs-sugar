<?php
$module_name = 'ST_OUTREACH';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'PSU_ID' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PSU_ID',
    'sortable' => false,
    'width' => '10%',
  ),
  'TSU_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TSU_ID',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_EVENT_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_EVENT_ID',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_EVENT_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_OUTREACH_EVENT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_TARGET' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_TARGET',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_TARGET_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_TARGET_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_MODE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_MODE',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_MODE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_MODE_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_TYPE_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_TAILORED' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_TAILORED',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_LANG1' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_LANG1',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_LANG2' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_LANG2',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_LANG_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_LANG_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_RACE1' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_RACE1',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_RACE2' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_RACE2',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_RACE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_RACE_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_CULTURE1' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_CULTURE1',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_CULTURE2' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_CULTURE2',
    'sortable' => false,
    'width' => '10%',
  ),
  'OUTREACH_CULTURE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_CULTURE_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_QUANTITY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_QUANTITY',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_COST' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_OUTREACH_COST',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_STAFFING' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OUTREACH_STAFFING',
    'width' => '10%',
    'default' => true,
  ),
  'OUTREACH_INCIDENT' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_OUTREACH_INCIDENT',
    'sortable' => false,
    'width' => '10%',
  ),
  'INCIDENT_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCIDENT_ID',
    'width' => '10%',
    'default' => true,
  ),
);
?>
