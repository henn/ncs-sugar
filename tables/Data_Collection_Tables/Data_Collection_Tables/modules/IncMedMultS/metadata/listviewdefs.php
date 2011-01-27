<?php
$module_name = 'NCSDC_IncMedMultS';
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
  'INCIDENT_MEDIA_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCIDENT_MEDIA_ID',
    'width' => '10%',
    'default' => true,
  ),
  'INSSEV' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INSSEV',
    'sortable' => false,
    'width' => '10%',
  ),
  'INCLOSS_MEDIA' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INCLOSS_MEDIA',
    'sortable' => false,
    'width' => '10%',
  ),
  'INCLOSS_MEDIA_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCLOSS_MEDIA_OTH',
    'width' => '10%',
    'default' => true,
  ),
);
?>
