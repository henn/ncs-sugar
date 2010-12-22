<?php
$module_name = 'NCSDC_INCIDENT_MEDIA';
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
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'incident_media_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INCIDENT_MEDIA_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'incident_media_id',
      ),
      'incloss_media' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INCLOSS_MEDIA',
        'sortable' => false,
        'width' => '10%',
        'name' => 'incloss_media',
      ),
      'incloss_media_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INCLOSS_MEDIA_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'incloss_media_oth',
      ),
      'inssev' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INSSEV',
        'sortable' => false,
        'width' => '10%',
        'name' => 'inssev',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
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
