<?php
$module_name = 'OLT_PrsnInstLnk';
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
            'name' => 'is_active',
            'studio' => 'visible',
            'label' => 'LBL_IS_ACTIVE',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'olt_prsninstlnk_plt_person_name',
          ),
          1 => 
          array (
            'name' => 'olt_prsninstlnk_olt_institution_name',
          ),
        ),
        3 => 
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
