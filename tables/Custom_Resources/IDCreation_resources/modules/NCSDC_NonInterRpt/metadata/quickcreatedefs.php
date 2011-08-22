<?php
$module_name = 'NCSDC_NonInterRpt';
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
            'label' => 'Name (NIR_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'date_available',
            'label' => 'LBL_DATE_AVAILABLE',
          ),
          1 => 
          array (
            'name' => 'perm_ltr',
            'studio' => 'visible',
            'label' => 'LBL_PERM_LTR',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'nir_type_person',
            'studio' => 'visible',
            'label' => 'LBL_NIR_TYPE_PERSON',
          ),
          1 => 
          array (
            'name' => 'nir_type_person_oth',
            'label' => 'LBL_NIR_TYPE_PERSON_OTH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'nir_access_attempt',
            'studio' => 'visible',
            'label' => 'LBL_NIR_ACCESS_ATTEMPT',
          ),
          1 => 
          array (
            'name' => 'nir_access_attempt_oth',
            'label' => 'LBL_NIR_ACCESS_ATTEMPT_OTH',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'nir',
            'studio' => 'visible',
            'label' => 'LBL_NIR',
          ),
          1 => 
          array (
            'name' => 'nir_other',
            'studio' => 'visible',
            'label' => 'LBL_NIR_OTHER',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'cog_inform_relation',
            'studio' => 'visible',
            'label' => 'LBL_COG_INFORM_RELATION',
          ),
          1 => 
          array (
            'name' => 'cog_inform_relation_oth',
            'label' => 'LBL_COG_INFORM_RELATION_OTH',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'perm_disability',
            'studio' => 'visible',
            'label' => 'LBL_PERM_DISABILITY',
          ),
          1 => 
          array (
            'name' => 'who_refused',
            'studio' => 'visible',
            'label' => 'LBL_WHO_REFUSED',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'refuser_strength',
            'studio' => 'visible',
            'label' => 'LBL_REFUSER_STRENGTH',
          ),
          1 => 
          array (
            'name' => 'ref_action',
            'studio' => 'visible',
            'label' => 'LBL_REF_ACTION',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'cog_dis_desc',
            'studio' => 'visible',
            'label' => 'LBL_COG_DIS_DESC',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
