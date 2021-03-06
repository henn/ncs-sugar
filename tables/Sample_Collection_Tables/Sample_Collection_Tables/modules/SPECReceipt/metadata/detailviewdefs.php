<?php
$module_name = 'SAMP_SPECReceipt';
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
            'name' => 'samp_specre_spscinfo_name',
          ),
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'samp_specrestaffrstr_name',
            'label' => 'LBL_SAMP_SPECRECEIPT_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'cbr_barcode_id',
            'label' => 'LBL_CBR_BARCODE_ID',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'receipt_dt',
            'label' => 'LBL_RECEIPT_DT',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'receipt_comment',
            'studio' => 'visible',
            'label' => 'LBL_RECEIPT_COMMENT',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'receipt_comment_oth',
            'label' => 'LBL_RECEIPT_COMMENT_OTH',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'samp_spscinecreceipt_name',
            'label' => 'LBL_SAMP_SPSCINFO_SAMP_SPECRECEIPT_FROM_SAMP_SPSCINFO_TITLE',
          ),
        ),
      ),
      'lbl_detailview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'cooler_temp',
            'label' => 'LBL_COOLER_TEMP',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'monitor_status',
            'studio' => 'visible',
            'label' => 'LBL_MONITOR_STATUS',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'upper_trigger',
            'studio' => 'visible',
            'label' => 'LBL_UPPER_TRIGGER',
          ),
          1 => 
          array (
            'name' => 'upper_trigger_lvl',
            'studio' => 'visible',
            'label' => 'LBL_UPPER_TRIGGER_LVL',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'lower_trigger_cold',
            'studio' => 'visible',
            'label' => 'LBL_LOWER_TRIGGER_COLD',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'lower_trigger_ambient',
            'studio' => 'visible',
            'label' => 'LBL_LOWER_TRIGGER_AMBIENT',
          ),
          1 => '',
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'centrifuge_staff_id',
            'label' => 'LBL_CENTRIFUGE_STAFF_ID',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'person_centrifuging_id',
            'studio' => 'visible',
            'label' => 'LBL_PERSON_CENTRIFUGING_ID',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'samp_specrespecequip_name',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'centrifuge_st',
            'label' => 'LBL_CENTRIFUGE_ST',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'centrifuge_et',
            'label' => 'LBL_CENTRIFUGE_ET',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'centrifuge_temperature',
            'label' => 'LBL_CENTRIFUGE_TEMPERATURE',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'centrifuge_comment',
            'studio' => 'visible',
            'label' => 'LBL_CENTRIFUGE_COMMENT',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'centrifuge_comment_oth',
            'label' => 'LBL_CENTRIFUGE_COMMENT_OTH',
          ),
          1 => '',
        ),
      ),
      'lbl_detailview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'samp_specreecstorage_name',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
