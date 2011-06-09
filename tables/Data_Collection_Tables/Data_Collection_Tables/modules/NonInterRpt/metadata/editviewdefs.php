<?php
$module_name = 'NCSDC_NonInterRpt';
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
            'label' => 'Name (NIR_ID):',
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
          0 => '',
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_available',
            'label' => 'LBL_DATE_AVAILABLE',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'perm_ltr',
            'studio' => 'visible',
            'label' => 'LBL_PERM_LTR',
          ),
          1 => '',
        ),
        4 => 
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
        5 => 
        array (
          0 => 
          array (
            'name' => 'nir_vac_info',
            'studio' => 'visible',
            'label' => 'LBL_NIR_VAC_INFO',
          ),
          1 => 
          array (
            'name' => 'nir_vac_info_oth',
            'label' => 'LBL_NIR_VAC_INFO_OTH',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'nir_noaccess',
            'studio' => 'visible',
            'label' => 'LBL_NIR_NOACCESS',
          ),
          1 => 
          array (
            'name' => 'nir_noaccess_oth',
            'label' => 'LBL_NIR_NOACCESS_OTH',
          ),
        ),
        7 => 
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
        8 => 
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
        9 => 
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
        10 => 
        array (
          0 => 
          array (
            'name' => 'perm_disability',
            'studio' => 'visible',
            'label' => 'LBL_PERM_DISABILITY',
          ),
          1 => '',
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'who_refused',
            'studio' => 'visible',
            'label' => 'LBL_WHO_REFUSED',
          ),
          1 => 
          array (
            'name' => 'who_refused_oth',
            'label' => 'LBL_WHO_REFUSED_OTH',
          ),
        ),
        12 => 
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
        13 => 
        array (
          0 => 
          array (
            'name' => 'cog_dis_desc',
            'studio' => 'visible',
            'label' => 'LBL_COG_DIS_DESC',
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'deceased_inform_relation',
            'studio' => 'visible',
            'label' => 'LBL_DECEASED_INFORM_RELATION',
          ),
          1 => 
          array (
            'name' => 'deceased_inform_oth',
            'label' => 'LBL_DECEASED_INFORM_OTH',
          ),
        ),
        15 => 
        array (
          0 => 
          array (
            'name' => 'yod',
            'label' => 'LBL_YOD',
          ),
          1 => 
          array (
            'name' => 'state_death',
            'studio' => 'visible',
            'label' => 'LBL_STATE_DEATH',
          ),
        ),
        16 => 
        array (
          0 => 
          array (
            'name' => 'reason_unavail',
            'studio' => 'visible',
            'label' => 'LBL_REASON_UNAVAIL',
          ),
          1 => 
          array (
            'name' => 'reason_unavail_oth',
            'label' => 'LBL_REASON_UNAVAIL_OTH',
          ),
        ),
        17 => 
        array (
          0 => 
          array (
            'name' => 'date_moved',
            'label' => 'LBL_DATE_MOVED',
          ),
          1 => 
          array (
            'name' => 'moved_unit',
            'studio' => 'visible',
            'label' => 'LBL_MOVED_UNIT',
          ),
        ),
        18 => 
        array (
          0 => 
          array (
            'name' => 'moved_inform_relation',
            'studio' => 'visible',
            'label' => 'LBL_MOVED_INFORM_RELATION',
          ),
          1 => 
          array (
            'name' => 'moved_relation_oth',
            'label' => 'LBL_MOVED_RELATION_OTH',
          ),
        ),
        19 => 
        array (
          0 => '',
          1 => '',
        ),
        20 => 
        array (
          0 => 
          array (
            'name' => 'lt_illness_desc',
            'studio' => 'visible',
            'label' => 'LBL_LT_ILLNESS_DESC',
          ),
          1 => '',
        ),
        21 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_noninlt_person_name',
          ),
          1 => 
          array (
            'name' => 'ncsdc_cntctninterrpt_name',
            'label' => 'LBL_NCSDC_CNTCTINFO_NCSDC_NONINTERRPT_FROM_NCSDC_CNTCTINFO_TITLE',
          ),
        ),
        22 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_noninellingunt_name',
          ),
        ),
      ),
    ),
  ),
);
?>
