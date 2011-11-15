<?php
$module_name = 'PLT_PartSampCon';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'PLT_PARTSAMRTICIPANT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'plt_partsamlt_participant',
    'label' => 'LBL_PLT_PARTSAMPCON_PLT_PARTICIPANT_FROM_PLT_PARTICIPANT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'PLT_PARTSAMTCPTCNSNT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'plt_partsamlt_prtcptcnsnt',
    'label' => 'LBL_PLT_PARTSAMPCON_PLT_PRTCPTCNSNT_FROM_PLT_PRTCPTCNSNT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'SAMPLE_CONSENT_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SAMPLE_CONSENT_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'SAMPLE_CONSENT_GIVEN' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SAMPLE_CONSENT_GIVEN',
    'sortable' => false,
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
