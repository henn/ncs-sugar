<?php
$module_name = 'OLT_Provider';
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
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
