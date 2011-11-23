<?php
$module_name = 'PLT_PartRVIS';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'RVIS_PERSON' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RVIS_PERSON',
    'width' => '10%',
    'default' => true,
  ),
  'RVIS_LANGUAGE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_LANGUAGE',
    'sortable' => false,
    'width' => '10%',
  ),
  'RVIS_SECTIONS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_SECTIONS',
    'sortable' => false,
    'width' => '10%',
  ),
  'PLT_PARTRVIRTICIPANT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'plt_partrvilt_participant',
    'label' => 'LBL_PLT_PARTRVIS_PLT_PARTICIPANT_FROM_PLT_PARTICIPANT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  /*
  'PLT_PARTRVICNTCTINFO_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'plt_partrvicsdc_cntctinfo',
    'label' => 'LBL_PLT_PARTRVIS_NCSDC_CNTCTINFO_FROM_NCSDC_CNTCTINFO_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  */
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'RVIS_TRANSLATE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_TRANSLATE',
    'sortable' => false,
    'width' => '10%',
  ),
  'RVIS_LANGUAGE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RVIS_LANGUAGE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'RVIS_WHO_CONSENTED' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_WHO_CONSENTED',
    'sortable' => false,
    'width' => '10%',
  ),
  'TIME_STAMP_1' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_TIME_STAMP_1',
    'width' => '10%',
    'default' => false,
  ),
  'TIME_STAMP_2' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_TIME_STAMP_2',
    'width' => '10%',
    'default' => false,
  ),
  'RVIS_DURING_INTERV' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_DURING_INTERV',
    'sortable' => false,
    'width' => '10%',
  ),
  'RVIS_DURING_BIO' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_DURING_BIO',
    'sortable' => false,
    'width' => '10%',
  ),
  'RVIS_BIO_CORD' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_BIO_CORD',
    'sortable' => false,
    'width' => '10%',
  ),
  'RVIS_DURING_ENV' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_DURING_ENV',
    'sortable' => false,
    'width' => '10%',
  ),
  'RVIS_AFTER_SAQ' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_AFTER_SAQ',
    'sortable' => false,
    'width' => '10%',
  ),
  'RVIS_DURING_THANKS' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_DURING_THANKS',
    'sortable' => false,
    'width' => '10%',
  ),
  'RVIS_RECONSIDERATION' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_RECONSIDERATION',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
