<?php
$module_name = 'PLT_LnkPrsHshld';
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
