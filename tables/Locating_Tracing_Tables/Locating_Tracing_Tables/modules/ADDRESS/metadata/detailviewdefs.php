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
          0 => '',
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'address_1',
            'label' => 'LBL_ADDRESS_1',
          ),
          1 => 
          array (
            'name' => 'address_2',
            'label' => 'LBL_ADDRESS_2',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'unit',
            'label' => 'LBL_UNIT',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'city',
            'label' => 'LBL_CITY',
          ),
          1 => 
          array (
            'name' => 'state',
            'studio' => 'visible',
            'label' => 'LBL_STATE',
          ),
        ),
        5 => 
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
        6 => 
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
        7 => 
        array (
          0 => 
          array (
            'name' => 'address_type',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESS_TYPE',
          ),
          1 => 
          array (
            'name' => 'address_type_oth',
            'label' => 'LBL_ADDRESS_TYPE_OTH',
          ),
        ),
        8 => 
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
        9 => 
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
        10 => 
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
        11 => 
        array (
          0 => 
          array (
            'name' => 'address_start_date',
            'label' => 'LBL_ADDRESS_START_DATE',
          ),
          1 => 
          array (
            'name' => 'address_end_date',
            'label' => 'LBL_ADDRESS_END_DATE',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'address_info_date',
            'label' => 'LBL_ADDRESS_INFO_DATE',
          ),
          1 => 
          array (
            'name' => 'address_info_update',
            'label' => 'LBL_ADDRESS_INFO_UPDATE',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'address_comment',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESS_COMMENT',
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'gt_dwellingunt_ltt_address_name',
          ),
        ),
      ),
    ),
  ),
);
?>
