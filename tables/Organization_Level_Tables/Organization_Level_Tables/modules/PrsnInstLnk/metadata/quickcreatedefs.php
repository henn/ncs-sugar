<?php
$module_name = 'OLT_PrsnInstLnk';
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
          0 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'olt_prsninslt_person_name',
            'label' => 'LBL_OLT_PRSNINSTLNK_PLT_PERSON_FROM_PLT_PERSON_TITLE',
          ),
          1 => 
          array (
            'name' => 'olt_prsninsstitution_name',
            'label' => 'LBL_OLT_PRSNINSTLNK_OLT_INSTITUTION_FROM_OLT_INSTITUTION_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
