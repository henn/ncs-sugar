<?php
$module_name = 'NCSDC_INCIDENT_MEDIA';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'incident_media_id',
            'label' => 'LBL_INCIDENT_MEDIA_ID',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'inssev',
            'studio' => 'visible',
            'label' => 'LBL_INSSEV',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'incloss_media',
            'studio' => 'visible',
            'label' => 'LBL_INCLOSS_MEDIA',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'incloss_media_oth',
            'label' => 'LBL_INCLOSS_MEDIA_OTH',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_event_ncsdc_incident_media_name',
          ),
        ),
      ),
    ),
  ),
);
?>
