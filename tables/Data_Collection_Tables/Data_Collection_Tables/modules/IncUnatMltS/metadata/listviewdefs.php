<?php
$module_name = 'NCSDC_IncUnatMltS';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'NCSDC_INCIDCUNATMLTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_inciddc_incunatmlts',
    'label' => 'LBL_NCSDC_INCIDENT_NCSDC_INCUNATMLTS_FROM_NCSDC_INCIDENT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'INC_UNANTICIPATED' => 
  array (
    'type' => 'multienum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INC_UNANTICIPATED',
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
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
);
?>
