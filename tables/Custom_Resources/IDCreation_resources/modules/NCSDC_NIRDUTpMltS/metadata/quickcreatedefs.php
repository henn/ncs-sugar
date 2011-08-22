<?php
$module_name = 'NCSDC_NIRDUTpMltS';
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
          0 => 
          array (
            'name' => 'name',
            'label' => 'Name (NIR_DUTYPE_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'nir_type_du',
            'studio' => 'visible',
            'label' => 'LBL_NIR_TYPE_DU',
          ),
          1 => 
          array (
            'name' => 'nir_type_du_oth',
            'label' => 'LBL_NIR_TYPE_DU_OTH',
          ),
        ),
      ),
    ),
  ),
);
?>
