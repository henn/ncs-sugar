<?php
$module_name = 'OLT_PrsnPrvdLnk';
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
            'label' => 'Name (PERSON_PROVIDER_ID):',
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
