<?php
$module_name = 'PLT_PartAuthFrm';
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
      'auth_form_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_AUTH_FORM_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'auth_form_type',
      ),
      'auth_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_AUTH_STATUS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'auth_status',
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
      'auth_form_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_AUTH_FORM_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'auth_form_type',
      ),
      'auth_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_AUTH_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'auth_type_oth',
      ),
      'auth_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_AUTH_STATUS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'auth_status',
      ),
      'auth_status_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_AUTH_STATUS_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'auth_status_oth',
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
