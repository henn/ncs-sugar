<?php
$module_name = 'LTT_TELEPHONE';
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
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        3 => 
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
        4 => 
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
        5 => 
        array (
          0 => 
          array (
            'name' => 'phone_id',
            'label' => 'LBL_PHONE_ID',
          ),
          1 => '',
        ),
        6 => 
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
        7 => 
        array (
          0 => 
          array (
            'name' => 'phone_ext',
            'label' => 'LBL_PHONE_EXT',
          ),
          1 => '',
        ),
        8 => 
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
        9 => 
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
        10 => 
        array (
          0 => 
          array (
            'name' => 'phone_comment',
            'studio' => 'visible',
            'label' => 'LBL_PHONE_COMMENT',
          ),
          1 => 
          array (
            'name' => 'phone_nbr',
            'label' => 'LBL_PHONE_NBR',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'gt_dwellingunt_ltt_telephone_name',
          ),
        ),
      ),
    ),
  ),
);
?>
