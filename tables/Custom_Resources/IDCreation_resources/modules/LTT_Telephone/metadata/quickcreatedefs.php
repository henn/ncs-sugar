<?php
$module_name = 'LTT_Telephone';
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
            'label' => 'Name (PHONE_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'phone_nbr',
            'label' => 'LBL_PHONE_NBR',
          ),
          1 => 
          array (
            'name' => 'phone_ext',
            'label' => 'LBL_PHONE_EXT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'phone_type',
            'studio' => 'visible',
            'label' => 'LBL_PHONE_TYPE',
          ),
          1 => 
          array (
            'name' => 'phone_type_oth',
            'label' => 'LBL_PHONE_TYPE_OTH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'phone_landline',
            'studio' => 'visible',
            'label' => 'LBL_PHONE_LANDLINE',
          ),
          1 => 
          array (
            'name' => 'phone_share',
            'studio' => 'visible',
            'label' => 'LBL_PHONE_SHARE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'cell_permission',
            'studio' => 'visible',
            'label' => 'LBL_CELL_PERMISSION',
          ),
          1 => 
          array (
            'name' => 'text_permission',
            'studio' => 'visible',
            'label' => 'LBL_TEXT_PERMISSION',
          ),
        ),
      ),
    ),
  ),
);
?>
