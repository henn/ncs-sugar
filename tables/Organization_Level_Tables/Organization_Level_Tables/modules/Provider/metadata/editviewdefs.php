<?php
$module_name = 'OLT_Provider';
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
            'label' => 'Name (PROVIDER_ID):',
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
          0 => 
          array (
            'name' => 'provider_type',
            'studio' => 'visible',
            'label' => 'LBL_PROVIDER_TYPE',
          ),
          1 => 
          array (
            'name' => 'provider_type_oth',
            'label' => 'LBL_PROVIDER_TYPE_OTH',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'practice_info',
            'studio' => 'visible',
            'label' => 'LBL_PRACTICE_INFO',
          ),
          1 => 
          array (
            'name' => 'practice_patient_load',
            'studio' => 'visible',
            'label' => 'LBL_PRACTICE_PATIENT_LOAD',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'practice_size',
            'studio' => 'visible',
            'label' => 'LBL_PRACTICE_SIZE',
          ),
          1 => 
          array (
            'name' => 'public_practice',
            'studio' => 'visible',
            'label' => 'LBL_PUBLIC_PRACTICE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'provider_info_source',
            'studio' => 'visible',
            'label' => 'LBL_PROVIDER_INFO_SOURCE',
          ),
          1 => 
          array (
            'name' => 'provider_info_source_oth',
            'label' => 'LBL_PROVIDER_INFO_SOURCE_OTH',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'provider_info_date',
            'label' => 'LBL_PROVIDER_INFO_DATE',
          ),
          1 => 
          array (
            'name' => 'provider_info_update',
            'label' => 'LBL_PROVIDER_INFO_UPDATE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'provider_comment',
            'studio' => 'visible',
            'label' => 'LBL_PROVIDER_COMMENT',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
