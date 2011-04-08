<?php
$module_name = 'NCSDC_Incident';
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
  'INCTYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INCTYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'INC_CONTACT_PERSON' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_CONTACT_PERSON',
    'width' => '10%',
    'default' => true,
  ),
  'INC_ACTION' => 
  array (
    'type' => 'text',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INC_ACTION',
    'sortable' => false,
    'width' => '10%',
  ),
  'INCIDENT_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_INCIDENT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'INCIDENT_TIME' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_INCIDENT_TIME',
    'width' => '10%',
    'default' => true,
  ),
  'INC_STAFF_REPORTER_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_STAFF_REPORTER_ID',
    'width' => '10%',
    'default' => true,
  ),
  'INC_REPORT_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_INC_REPORT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'INC_REPORT_TIME' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_INC_REPORT_TIME',
    'width' => '10%',
    'default' => true,
  ),
  'INC_STAFF_SUPERVISOR_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_STAFF_SUPERVISOR_ID',
    'width' => '10%',
    'default' => true,
  ),
  'INC_REPORTED' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INC_REPORTED',
    'sortable' => false,
    'width' => '10%',
  ),
  'INCLOSS_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCLOSS_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'INCLOSS_PAPER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCLOSS_PAPER',
    'width' => '10%',
    'default' => false,
  ),
  'INCLOSS_CMPTR_DECAL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCLOSS_CMPTR_DECAL',
    'width' => '10%',
    'default' => false,
  ),
  'INCLOSS_REM_MEDIA' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCLOSS_REM_MEDIA',
    'width' => '10%',
    'default' => false,
  ),
  'INCLOSS_CMPTR_SN' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCLOSS_CMPTR_SN',
    'width' => '10%',
    'default' => false,
  ),
  'INC_RECIP_IS_STAFF' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_RECIP_IS_STAFF',
    'width' => '10%',
    'default' => false,
  ),
  'INCLOSS_CMPTR_MODEL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCLOSS_CMPTR_MODEL',
    'width' => '10%',
    'default' => false,
  ),
  'INC_RECIP_IS_ACQUAINTANCE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_RECIP_IS_ACQUAINTANCE',
    'width' => '10%',
    'default' => false,
  ),
  'INC_RECIP_IS_FAMILY' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_RECIP_IS_FAMILY',
    'width' => '10%',
    'default' => false,
  ),
  'INC_RECIP_IS_DU' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_RECIP_IS_DU',
    'width' => '10%',
    'default' => false,
  ),
  'INC_RECIP_IS_PARTICIPANT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_RECIP_IS_PARTICIPANT',
    'width' => '10%',
    'default' => false,
  ),
  'INC_RECIP_IS_OTHER' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_INC_RECIP_IS_OTHER',
    'sortable' => false,
    'width' => '10%',
  ),
  'INCTYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCTYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'INC_DESCRIPTION' => 
  array (
    'type' => 'text',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_INC_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
