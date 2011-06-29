<?php
$module_name = 'OLT_MSProvRole';
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
