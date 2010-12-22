<?php
$module_name = 'OLT_PROVIDER';
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
      'psu_id' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PSU_ID',
        'sortable' => false,
        'width' => '10%',
        'name' => 'psu_id',
      ),
      'provider_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PROVIDER_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'provider_id',
      ),
      'provider_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PROVIDER_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'provider_type',
      ),
      'provider_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PROVIDER_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'provider_type_oth',
      ),
      'provider_ncs_role' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PROVIDER_NCS_ROLE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'provider_ncs_role',
      ),
      'provider_ncs_role_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PROVIDER_NCS_ROLE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'provider_ncs_role_oth',
      ),
      'practice_info' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PRACTICE_INFO',
        'sortable' => false,
        'width' => '10%',
        'name' => 'practice_info',
      ),
      'practice_patient_load' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PRACTICE_PATIENT_LOAD',
        'sortable' => false,
        'width' => '10%',
        'name' => 'practice_patient_load',
      ),
      'practice_size' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PRACTICE_SIZE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'practice_size',
      ),
      'provider_info_source' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PROVIDER_INFO_SOURCE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'provider_info_source',
      ),
      'provider_info_source_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PROVIDER_INFO_SOURCE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'provider_info_source_oth',
      ),
      'provider_info_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_PROVIDER_INFO_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'provider_info_date',
      ),
      'public_practice' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PUBLIC_PRACTICE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'public_practice',
      ),
      'provider_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_PROVIDER_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'provider_comment',
      ),
      'provider_info_update' => 
      array (
        'type' => 'date',
        'label' => 'LBL_PROVIDER_INFO_UPDATE',
        'width' => '10%',
        'default' => true,
        'name' => 'provider_info_update',
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
