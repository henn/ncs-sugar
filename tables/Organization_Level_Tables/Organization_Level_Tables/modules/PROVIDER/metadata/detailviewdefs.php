<?php
$module_name = 'OLT_Provider';
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
          0 => '',
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'psu_id',
            'studio' => 'visible',
            'label' => 'LBL_PSU_ID',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'provider_id',
            'label' => 'LBL_PROVIDER_ID',
          ),
          1 => 
          array (
            'name' => 'provider_type',
            'studio' => 'visible',
            'label' => 'LBL_PROVIDER_TYPE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'provider_type_oth',
            'label' => 'LBL_PROVIDER_TYPE_OTH',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'provider_ncs_role',
            'studio' => 'visible',
            'label' => 'LBL_PROVIDER_NCS_ROLE',
          ),
          1 => 
          array (
            'name' => 'provider_ncs_role_oth',
            'label' => 'LBL_PROVIDER_NCS_ROLE_OTH',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'practice_info',
            'studio' => 'visible',
            'label' => 'LBL_PRACTICE_INFO',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'practice_patient_load',
            'studio' => 'visible',
            'label' => 'LBL_PRACTICE_PATIENT_LOAD',
          ),
          1 => 
          array (
            'name' => 'practice_size',
            'studio' => 'visible',
            'label' => 'LBL_PRACTICE_SIZE',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'public_practice',
            'studio' => 'visible',
            'label' => 'LBL_PUBLIC_PRACTICE',
          ),
          1 => '',
        ),
        10 => 
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
        11 => 
        array (
          0 => 
          array (
            'name' => 'provider_info_date',
            'label' => 'LBL_PROVIDER_INFO_DATE',
          ),
          1 => '',
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'provider_comment',
            'studio' => 'visible',
            'label' => 'LBL_PROVIDER_COMMENT',
          ),
          1 => '',
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'provider_info_update',
            'label' => 'LBL_PROVIDER_INFO_UPDATE',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
