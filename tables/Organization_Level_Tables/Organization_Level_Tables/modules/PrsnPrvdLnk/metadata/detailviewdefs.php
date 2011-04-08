<?php
$module_name = 'OLT_PrsnPrvdLnk';
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
            'name' => 'prov_intro_outcome',
            'studio' => 'visible',
            'label' => 'LBL_PROV_INTRO_OUTCOME',
          ),
          1 => 
          array (
            'name' => 'prov_intro_outcome_oth',
            'label' => 'LBL_PROV_INTRO_OUTCOME_OTH',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'is_active',
            'studio' => 'visible',
            'label' => 'LBL_IS_ACTIVE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'olt_prsnprvdlnk_plt_person_name',
          ),
          1 => 
          array (
            'name' => 'olt_prsnprvdlnk_olt_provider_name',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'olt_prsnprvlt_person_name',
            'label' => 'LBL_OLT_PRSNPRVDLNK_PLT_PERSON_FROM_PLT_PERSON_TITLE',
          ),
          1 => 
          array (
            'name' => 'olt_prsnprv_provider_name',
            'label' => 'LBL_OLT_PRSNPRVDLNK_OLT_PROVIDER_FROM_OLT_PROVIDER_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
