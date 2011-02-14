<?php
$module_name = 'PLT_PrtcptVstC';
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
  'VIS_CONSENT_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_VIS_CONSENT_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'VIS_CONSENT_RESPONSE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_VIS_CONSENT_RESPONSE',
    'sortable' => false,
    'width' => '10%',
  ),
  'VIS_WHO_CONSENTED' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_VIS_WHO_CONSENTED',
    'sortable' => false,
    'width' => '10%',
  ),
  'VIS_TRANSLATE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_VIS_TRANSLATE',
    'sortable' => false,
    'width' => '10%',
  ),
  'VIS_LANGUAGE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_VIS_LANGUAGE',
    'sortable' => false,
    'width' => '10%',
  ),
  'VIS_COMMENTS' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_VIS_COMMENTS',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'VIS_LANGUAGE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_VIS_LANGUAGE_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
?>
