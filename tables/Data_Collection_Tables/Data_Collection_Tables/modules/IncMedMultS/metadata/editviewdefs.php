<?php
$module_name = 'NCSDC_IncMedMultS';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
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
            'label' => 'Name (INCIDENT_MEDIA_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
        1 => 
        array (
          0 => '',
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'inssev',
            'studio' => 'visible',
            'label' => 'LBL_INSSEV',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'incloss_media',
            'studio' => 'visible',
            'label' => 'LBL_INCLOSS_MEDIA',
          ),
          1 => 
          array (
            'name' => 'incloss_media_oth',
            'label' => 'LBL_INCLOSS_MEDIA_OTH',
          ),
        ),
        4 => 
        array (
          0 => '',
        ),
        5 => 
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
