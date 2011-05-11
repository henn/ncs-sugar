<?php
$module_name = 'PLT_LnkPrsHshld';
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
            'label' => 'Name (PERSON_HH_ID):',
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
            'name' => 'is_active',
            'studio' => 'visible',
            'label' => 'LBL_IS_ACTIVE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'hh_rank',
            'studio' => 'visible',
            'label' => 'LBL_HH_RANK',
          ),
          1 => 
          array (
            'name' => 'hh_rank_oth',
            'label' => 'LBL_HH_RANK_OTH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'plt_lnkprshlt_person_name',
            'label' => 'LBL_PLT_LNKPRSHSHLD_PLT_PERSON_FROM_PLT_PERSON_TITLE',
          ),
          1 => 
          array (
            'name' => 'plt_lnkprshhousehold_name',
            'label' => 'LBL_PLT_LNKPRSHSHLD_GT_HOUSEHOLD_FROM_GT_HOUSEHOLD_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
