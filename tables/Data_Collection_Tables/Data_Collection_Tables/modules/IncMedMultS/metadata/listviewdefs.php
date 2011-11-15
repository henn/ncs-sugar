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
  'NCSDC_INCIDCMEDMULTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_inciddc_incmedmults',
    'label' => 'LBL_NCSDC_INCIDENT_NCSDC_INCMEDMULTS_FROM_NCSDC_INCIDENT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'INCLOSS_MEDIA' => 
  array (
    'type' => 'multienum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INCLOSS_MEDIA',
    'width' => '10%',
  ),
  'INCLOSS_MEDIA_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCLOSS_MEDIA_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'INSSEV' => 
  array (
    'type' => 'multienum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INSSEV',
    'width' => '10%',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
);
?>
