<?php
$module_name = 'ST_StfLang';
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
            'name' => 'staff_lang',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_LANG',
          ),
          1 => 
          array (
            'name' => 'staff_lang_oth',
            'label' => 'LBL_STAFF_LANG_OTH',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'st_staffrstt_stflang_name',
            'label' => 'LBL_ST_STAFFRSTR_ST_STFLANG_FROM_ST_STAFFRSTR_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
