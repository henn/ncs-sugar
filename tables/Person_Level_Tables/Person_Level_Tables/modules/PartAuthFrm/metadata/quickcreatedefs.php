<?php
$module_name = 'PLT_PartAuthFrm';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
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
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'auth_form_type',
            'studio' => 'visible',
            'label' => 'LBL_AUTH_FORM_TYPE',
          ),
          1 => 
          array (
            'name' => 'auth_type_oth',
            'label' => 'LBL_AUTH_TYPE_OTH',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'auth_status',
            'studio' => 'visible',
            'label' => 'LBL_AUTH_STATUS',
          ),
          1 => 
          array (
            'name' => 'auth_status_oth',
            'label' => 'LBL_AUTH_STATUS_OTH',
          ),
        ),
      ),
    ),
  ),
);
?>
