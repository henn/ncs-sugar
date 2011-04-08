<?php
$module_name = 'LTT_Telephone';
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
            'label' => 'Name (PHONE_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
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
            'name' => 'phone_nbr',
            'label' => 'LBL_PHONE_NBR',
          ),
          1 => 
          array (
            'name' => 'phone_ext',
            'label' => 'LBL_PHONE_EXT',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'phone_type',
            'studio' => 'visible',
            'label' => 'LBL_PHONE_TYPE',
          ),
          1 => 
          array (
            'name' => 'phone_type_oth',
            'label' => 'LBL_PHONE_TYPE_OTH',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'phone_landline',
            'studio' => 'visible',
            'label' => 'LBL_PHONE_LANDLINE',
          ),
          1 => 
          array (
            'name' => 'phone_share',
            'studio' => 'visible',
            'label' => 'LBL_PHONE_SHARE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'cell_permission',
            'studio' => 'visible',
            'label' => 'LBL_CELL_PERMISSION',
          ),
          1 => 
          array (
            'name' => 'text_permission',
            'studio' => 'visible',
            'label' => 'LBL_TEXT_PERMISSION',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'phone_rank',
            'studio' => 'visible',
            'label' => 'LBL_PHONE_RANK',
          ),
          1 => 
          array (
            'name' => 'phone_rank_oth',
            'label' => 'LBL_PHONE_RANK_OTH',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'phone_info_source',
            'studio' => 'visible',
            'label' => 'LBL_PHONE_INFO_SOURCE',
          ),
          1 => 
          array (
            'name' => 'phone_info_source_oth',
            'label' => 'LBL_PHONE_INFO_SOURCE_OTH',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'phone_comment',
            'studio' => 'visible',
            'label' => 'LBL_PHONE_COMMENT',
          ),
          1 => '',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'plt_person_ltt_telephone_name',
          ),
          1 => 
          array (
            'name' => 'olt_provider_ltt_telephone_name',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'olt_institution_ltt_telephone_name',
          ),
        ),
      ),
    ),
  ),
);
?>
