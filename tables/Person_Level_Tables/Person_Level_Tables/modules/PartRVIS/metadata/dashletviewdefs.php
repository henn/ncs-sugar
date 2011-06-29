<?php
$dashletData['PLT_PartRVISDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'type' => 'assigned_user_name',
    'default' => 'Administrator',
  ),
);
$dashletData['PLT_PartRVISDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'rvis_person' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RVIS_PERSON',
    'width' => '10%',
    'default' => true,
  ),
  'rvis_sections' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_SECTIONS',
    'sortable' => false,
    'width' => '10%',
  ),
  'rvis_language' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_LANGUAGE',
    'sortable' => false,
    'width' => '10%',
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'name' => 'date_entered',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'rvis_language_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RVIS_LANGUAGE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'time_stamp_1' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_TIME_STAMP_1',
    'width' => '10%',
    'default' => false,
  ),
  'rvis_who_consented' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_WHO_CONSENTED',
    'sortable' => false,
    'width' => '10%',
  ),
  'rvis_translate' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_TRANSLATE',
    'sortable' => false,
    'width' => '10%',
  ),
  'rvis_during_interv' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_DURING_INTERV',
    'sortable' => false,
    'width' => '10%',
  ),
  'rvis_during_bio' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_DURING_BIO',
    'sortable' => false,
    'width' => '10%',
  ),
  'rvis_bio_cord' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_BIO_CORD',
    'sortable' => false,
    'width' => '10%',
  ),
  'rvis_during_env' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_DURING_ENV',
    'sortable' => false,
    'width' => '10%',
  ),
  'rvis_during_thanks' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_DURING_THANKS',
    'sortable' => false,
    'width' => '10%',
  ),
  'rvis_after_saq' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_AFTER_SAQ',
    'sortable' => false,
    'width' => '10%',
  ),
  'rvis_reconsideration' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RVIS_RECONSIDERATION',
    'sortable' => false,
    'width' => '10%',
  ),
  'time_stamp_2' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_TIME_STAMP_2',
    'width' => '10%',
    'default' => false,
  ),
);
