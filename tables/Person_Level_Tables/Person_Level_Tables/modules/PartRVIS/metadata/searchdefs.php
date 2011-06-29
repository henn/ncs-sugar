<?php
$module_name = 'PLT_PartRVIS';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'rvis_person' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_RVIS_PERSON',
        'width' => '10%',
        'default' => true,
        'name' => 'rvis_person',
      ),
      'rvis_sections' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RVIS_SECTIONS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'rvis_sections',
      ),
      'rvis_translate' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RVIS_TRANSLATE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'rvis_translate',
      ),
      'rvis_language' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RVIS_LANGUAGE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'rvis_language',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'rvis_person' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_RVIS_PERSON',
        'width' => '10%',
        'default' => true,
        'name' => 'rvis_person',
      ),
      'rvis_who_consented' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RVIS_WHO_CONSENTED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'rvis_who_consented',
      ),
      'rvis_sections' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RVIS_SECTIONS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'rvis_sections',
      ),
      'rvis_translate' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RVIS_TRANSLATE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'rvis_translate',
      ),
      'rvis_language' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RVIS_LANGUAGE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'rvis_language',
      ),
      'time_stamp_1' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_TIME_STAMP_1',
        'width' => '10%',
        'default' => true,
        'name' => 'time_stamp_1',
      ),
      'time_stamp_2' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_TIME_STAMP_2',
        'width' => '10%',
        'default' => true,
        'name' => 'time_stamp_2',
      ),
      'rvis_during_interv' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RVIS_DURING_INTERV',
        'sortable' => false,
        'width' => '10%',
        'name' => 'rvis_during_interv',
      ),
      'rvis_during_bio' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RVIS_DURING_BIO',
        'sortable' => false,
        'width' => '10%',
        'name' => 'rvis_during_bio',
      ),
      'rvis_bio_cord' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RVIS_BIO_CORD',
        'sortable' => false,
        'width' => '10%',
        'name' => 'rvis_bio_cord',
      ),
      'rvis_during_env' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RVIS_DURING_ENV',
        'sortable' => false,
        'width' => '10%',
        'name' => 'rvis_during_env',
      ),
      'rvis_during_thanks' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RVIS_DURING_THANKS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'rvis_during_thanks',
      ),
      'rvis_after_saq' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RVIS_AFTER_SAQ',
        'sortable' => false,
        'width' => '10%',
        'name' => 'rvis_after_saq',
      ),
      'rvis_reconsideration' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RVIS_RECONSIDERATION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'rvis_reconsideration',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
