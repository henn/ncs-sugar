<?php
$module_name = 'SAMP_SPECStorage';
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
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'master_storage_unit',
            'studio' => 'visible',
            'label' => 'LBL_MASTER_STORAGE_UNIT',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'placed_in_storage_dt',
            'label' => 'LBL_PLACED_IN_STORAGE_DT',
          ),
          1 => 
          array (
            'name' => 'removed_from_storage_dt',
            'label' => 'LBL_REMOVED_FROM_STORAGE_DT',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'storage_comment',
            'label' => 'LBL_STORAGE_COMMENT',
          ),
          1 => 
          array (
            'name' => 'storage_comment_oth',
            'label' => 'LBL_STORAGE_COMMENT_OTH',
          ),
        ),
        4 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'samp_specststaffrstr_name',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'samp_specstspecequip_name',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'samp_specst_spscinfo_name',
            'label' => 'LBL_SAMP_SPECSTORAGE_SAMP_SPSCINFO_FROM_SAMP_SPSCINFO_TITLE',
          ),
        ),
      ),
      'lbl_detailview_panel1' => 
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
