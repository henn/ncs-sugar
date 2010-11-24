<?php
$module_name = 'LTT_ADDRESS';
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
            'name' => 'city',
            'label' => 'LBL_CITY',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'zip',
            'label' => 'LBL_ZIP',
          ),
          1 => 
          array (
            'name' => 'zip4',
            'label' => 'LBL_ZIP4',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'address_description',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESS_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'address_description_oth',
            'label' => 'LBL_ADDRESS_DESCRIPTION_OTH',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'address_type',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESS_TYPE',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'address_rank',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESS_RANK',
          ),
          1 => 
          array (
            'name' => 'address_rank_oth',
            'label' => 'LBL_ADDRESS_RANK_OTH',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'address_info_mode',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESS_INFO_MODE',
          ),
          1 => 
          array (
            'name' => 'address_info_mode_oth',
            'label' => 'LBL_ADDRESS_INFO_MODE_OTH',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'address_info_source',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESS_INFO_SOURCE',
          ),
          1 => 
          array (
            'name' => 'address_info_source_oth',
            'label' => 'LBL_ADDRESS_INFO_SOURCE_OTH',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'address_comment',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESS_COMMENT',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
