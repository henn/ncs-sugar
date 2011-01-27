<?php
$module_name = 'NCSDC_Instrument';
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
            'name' => 'instrument_id',
            'label' => 'LBL_INSTRUMENT_ID',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'ins_status',
            'studio' => 'visible',
            'label' => 'LBL_INS_STATUS',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'instrument_version',
            'label' => 'LBL_INSTRUMENT_VERSION',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'ins_method',
            'studio' => 'visible',
            'label' => 'LBL_INS_METHOD',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'ins_mode',
            'studio' => 'visible',
            'label' => 'LBL_INS_MODE',
          ),
          1 => 
          array (
            'name' => 'ins_mode_oth',
            'label' => 'LBL_INS_MODE_OTH',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'ins_date_start',
            'label' => 'LBL_INS_DATE_START',
          ),
          1 => 
          array (
            'name' => 'ins_date_end',
            'label' => 'LBL_INS_DATE_END',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'ins_start_time',
            'label' => 'LBL_INS_START_TIME',
          ),
          1 => 
          array (
            'name' => 'ins_end_time',
            'label' => 'LBL_INS_END_TIME',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'ins_breakoff',
            'studio' => 'visible',
            'label' => 'LBL_INS_BREAKOFF',
          ),
          1 => '',
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'instrument_type_oth',
            'label' => 'LBL_INSTRUMENT_TYPE_OTH',
          ),
          1 => '',
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'sup_review',
            'studio' => 'visible',
            'label' => 'LBL_SUP_REVIEW',
          ),
          1 => '',
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'data_problem',
            'studio' => 'visible',
            'label' => 'LBL_DATA_PROBLEM',
          ),
          1 => '',
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'instru_comment',
            'studio' => 'visible',
            'label' => 'LBL_INSTRU_COMMENT',
          ),
          1 => '',
        ),
        15 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_event_ncsdc_instrument_name',
          ),
        ),
      ),
    ),
  ),
);
?>
