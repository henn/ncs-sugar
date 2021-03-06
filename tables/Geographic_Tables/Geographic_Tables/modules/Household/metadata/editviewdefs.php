<?php
$module_name = 'GT_Household';
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
            'label' => 'Name (HH_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
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
            'name' => 'hh_status',
            'studio' => 'visible',
            'label' => 'LBL_HH_STATUS',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'hh_elig',
            'studio' => 'visible',
            'label' => 'LBL_HH_ELIG',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'hh_structure',
            'studio' => 'visible',
            'label' => 'LBL_HH_STRUCTURE',
          ),
          1 => 
          array (
            'name' => 'hh_structure_oth',
            'label' => 'LBL_HH_STRUCTURE_OTH',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'num_preg_over49',
            'label' => 'LBL_NUM_PREG_OVER49',
          ),
          1 => 
          array (
            'name' => 'num_age_elig',
            'label' => 'LBL_NUM_AGE_ELIG',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'num_preg',
            'label' => 'LBL_NUM_PREG',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'num_preg_adult',
            'label' => 'LBL_NUM_PREG_ADULT',
          ),
          1 => 
          array (
            'name' => 'num_preg_minor',
            'label' => 'LBL_NUM_PREG_MINOR',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'hh_comment',
            'studio' => 'visible',
            'label' => 'LBL_HH_COMMENT',
          ),
        ),
      ),
    ),
  ),
);
?>
