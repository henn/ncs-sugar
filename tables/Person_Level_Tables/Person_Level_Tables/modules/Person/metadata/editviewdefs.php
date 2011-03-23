<?php
$module_name = 'PLT_Person';
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
            'label' => 'Name (PERSON_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => '',
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
            'name' => 'prefix',
            'studio' => 'visible',
            'label' => 'LBL_PREFIX',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'label' => 'LBL_FIRST_NAME',
          ),
          1 => 
          array (
            'name' => 'last_name',
            'label' => 'LBL_LAST_NAME',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'middle_name',
            'label' => 'LBL_MIDDLE_NAME',
          ),
          1 => 
          array (
            'name' => 'maiden_name',
            'label' => 'LBL_MAIDEN_NAME',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'suffix',
            'studio' => 'visible',
            'label' => 'LBL_SUFFIX',
          ),
          1 => 
          array (
            'name' => 'title',
            'label' => 'LBL_TITLE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'sex',
            'studio' => 'visible',
            'label' => 'LBL_SEX',
          ),
          1 => 
          array (
            'name' => 'age',
            'label' => 'LBL_AGE',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'age_range',
            'studio' => 'visible',
            'label' => 'LBL_AGE_RANGE',
          ),
          1 => 
          array (
            'name' => 'person_dob',
            'studio' => 'visible',
            'label' => 'LBL_PERSON_DOB',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'deceased',
            'studio' => 'visible',
            'label' => 'LBL_DECEASED',
          ),
          1 => '',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'ethnic_group',
            'studio' => 'visible',
            'label' => 'LBL_ETHNIC_GROUP',
          ),
          1 => '',
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'person_lang',
            'studio' => 'visible',
            'label' => 'LBL_PERSON_LANG',
          ),
          1 => 
          array (
            'name' => 'person_lang_other',
            'label' => 'LBL_PERSON_LANG_OTHER',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'maristat',
            'studio' => 'visible',
            'label' => 'LBL_MARISTAT',
          ),
          1 => 
          array (
            'name' => 'maristat_oth',
            'label' => 'LBL_MARISTAT_OTH',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'pref_contact',
            'studio' => 'visible',
            'label' => 'LBL_PREF_CONTACT',
          ),
          1 => 
          array (
            'name' => 'pref_contact_oth',
            'label' => 'LBL_PREF_CONTACT_OTH',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'plan_move',
            'studio' => 'visible',
            'label' => 'LBL_PLAN_MOVE',
          ),
          1 => 
          array (
            'name' => 'move_info',
            'studio' => 'visible',
            'label' => 'LBL_MOVE_INFO',
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'new_address_id',
            'label' => 'LBL_NEW_ADDRESS_ID',
          ),
          1 => 
          array (
            'name' => 'when_move',
            'studio' => 'visible',
            'label' => 'LBL_WHEN_MOVE',
          ),
        ),
        15 => 
        array (
          0 => 
          array (
            'name' => 'date_move',
            'label' => 'LBL_DATE_MOVE',
          ),
          1 => 
          array (
            'name' => 'p_tracing',
            'studio' => 'visible',
            'label' => 'LBL_P_TRACING',
          ),
        ),
        16 => 
        array (
          0 => 
          array (
            'name' => 'p_info_source',
            'studio' => 'visible',
            'label' => 'LBL_P_INFO_SOURCE',
          ),
          1 => 
          array (
            'name' => 'p_info_source_oth',
            'label' => 'LBL_P_INFO_SOURCE_OTH',
          ),
        ),
        17 => 
        array (
          0 => 
          array (
            'name' => 'p_info_date',
            'label' => 'LBL_P_INFO_DATE',
          ),
          1 => 
          array (
            'name' => 'p_info_update',
            'label' => 'LBL_P_INFO_UPDATE',
          ),
        ),
        18 => 
        array (
          0 => 
          array (
            'name' => 'person_comment',
            'studio' => 'visible',
            'label' => 'LBL_PERSON_COMMENT',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
