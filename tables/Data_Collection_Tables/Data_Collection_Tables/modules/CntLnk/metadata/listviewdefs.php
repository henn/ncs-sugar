<?php
$module_name = 'NCSDC_CntctLnk';
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
  'CONTACT_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_ID',
    'width' => '10%',
    'default' => true,
  ),
  'EVENT_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EVENT_ID',
    'width' => '10%',
    'default' => true,
  ),
  'INSTRUMENT_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INSTRUMENT_ID',
    'width' => '10%',
    'default' => true,
  ),
  'STAFF_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_ID',
    'width' => '10%',
    'default' => true,
  ),
  'SPECIMEN_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SPECIMEN_ID',
    'width' => '10%',
    'default' => true,
  ),
  'PERSON_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PERSON_ID',
    'width' => '10%',
    'default' => true,
  ),
  'PROVIDER_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PROVIDER_ID',
    'width' => '10%',
    'default' => true,
  ),
);
?>
