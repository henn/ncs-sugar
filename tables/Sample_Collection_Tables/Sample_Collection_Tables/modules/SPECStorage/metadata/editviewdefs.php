<?php
$module_name = 'SAMP_SPECStorage';
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
            'name' => 'samp_specst_spscinfo_name',
            'label' => 'LBL_SAMP_SPECSTORAGE_SAMP_SPSCINFO_FROM_SAMP_SPSCINFO_TITLE',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'samp_specststaffrstr_name',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 'name',
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'samp_specstspecequip_name',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'master_storage_unit',
            'studio' => 'visible',
            'label' => 'LBL_MASTER_STORAGE_UNIT',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'placed_in_storage_dt',
            'label' => 'LBL_PLACED_IN_STORAGE_DT',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'storage_comment',
            'label' => 'LBL_STORAGE_COMMENT',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'storage_comment_oth',
            'label' => 'LBL_STORAGE_COMMENT_OTH',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'storage_fill',
            'studio' => 'visible',
            'label' => 'LBL_STORAGE_FILL',
          ),
          1 => '',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'removed_from_storage',
            'studio' => 'visible',
            'label' => 'LBL_REMOVED_FROM_STORAGE',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'removed_from_storage_dt',
            'label' => 'LBL_REMOVED_FROM_STORAGE_DT',
          ),
          1 => 
          array (
            'name' => 'samp_specshecstorage_name',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'temp_event_st',
            'label' => 'LBL_TEMP_EVENT_ST',
          ),
          1 => 
          array (
            'name' => 'temp_event_et',
            'label' => 'LBL_TEMP_EVENT_ET',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'temp_event_low_temp',
            'label' => 'LBL_TEMP_EVENT_LOW_TEMP',
          ),
          1 => 
          array (
            'name' => 'temp_event_high_temp',
            'label' => 'LBL_TEMP_EVENT_HIGH_TEMP',
          ),
        ),
      ),
    ),
  ),
);
?>
