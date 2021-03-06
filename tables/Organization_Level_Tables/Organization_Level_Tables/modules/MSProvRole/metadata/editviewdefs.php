<?php
$module_name = 'OLT_MSProvRole';
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
            'label' => 'Name:',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
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
          0 => '',
          1 => 
          array (
            'name' => 'olt_msprovr_provider_name',
            'label' => 'LBL_OLT_MSPROVROLE_OLT_PROVIDER_FROM_OLT_PROVIDER_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
