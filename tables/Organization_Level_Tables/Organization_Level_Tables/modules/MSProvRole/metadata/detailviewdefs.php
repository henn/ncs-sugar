<?php
$module_name = 'OLT_MSProvRole';
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
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
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
        2 => 
        array (
          0 => 
          array (
            'name' => 'olt_providesprovrole_name',
          ),
        ),
      ),
    ),
  ),
);
?>
