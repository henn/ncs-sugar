<?php
$module_name = 'SAMP_RecStor';
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
      'lbl_editview_panel3' => 
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
            'name' => 'receipt_dt',
            'label' => 'LBL_RECEIPT_DT',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'sample_condition',
            'studio' => 'visible',
            'label' => 'LBL_SAMPLE_CONDITION',
          ),
          1 => 
          array (
            'name' => 'receipt_comment_oth',
            'label' => 'LBL_RECEIPT_COMMENT_OTH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'cooler_temp_cond',
            'studio' => 'visible',
            'label' => 'LBL_COOLER_TEMP_COND',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'samp_samprestaffrstr_name',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
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
        1 => 
        array (
          0 => 
          array (
            'name' => 'storage_compartment_area',
            'studio' => 'visible',
            'label' => 'LBL_STORAGE_COMPARTMENT_AREA',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'storage_comment_oth',
            'label' => 'LBL_STORAGE_COMMENT_OTH',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'temp_event_occurred',
            'studio' => 'visible',
            'label' => 'LBL_TEMP_EVENT_OCCURRED',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'temp_event_action',
            'studio' => 'visible',
            'label' => 'LBL_TEMP_EVENT_ACTION',
          ),
          1 => 
          array (
            'name' => 'temp_event_action_oth',
            'label' => 'LBL_TEMP_EVENT_ACTION_OTH',
          ),
        ),
      ),
    ),
  ),
);
?>