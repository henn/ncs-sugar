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
            'name' => 'instrument_type',
            'studio' => 'visible',
            'label' => 'LBL_INSTRUMENT_TYPE',
          ),
          1 => 
          array (
            'name' => 'instrument_type_oth',
            'label' => 'LBL_INSTRUMENT_TYPE_OTH',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'instrument_version',
            'label' => 'LBL_INSTRUMENT_VERSION',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'ins_status',
            'studio' => 'visible',
            'label' => 'LBL_INS_STATUS',
          ),
          1 => 
          array (
            'name' => 'instrument_repeat_key',
            'label' => 'LBL_INSTRUMENT_REPEAT_KEY',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'ins_method',
            'studio' => 'visible',
            'label' => 'LBL_INS_METHOD',
          ),
          1 => '',
        ),
        5 => 
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
        6 => 
        array (
          0 => 
          array (
            'name' => 'instrument_start_date_time',
            'label' => 'LBL_INSTRUMENT_START_DATE_TIME',
          ),
          1 => 
          array (
            'name' => 'instrument_end_date_time',
            'label' => 'LBL_INSTRUMENT_END_DATE_TIME',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'ins_breakoff',
            'studio' => 'visible',
            'label' => 'LBL_INS_BREAKOFF',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'sup_review',
            'studio' => 'visible',
            'label' => 'LBL_SUP_REVIEW',
          ),
          1 => 
          array (
            'name' => 'data_problem',
            'studio' => 'visible',
            'label' => 'LBL_DATA_PROBLEM',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'instru_comment',
            'studio' => 'visible',
            'label' => 'LBL_INSTRU_COMMENT',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_eventnstrument_name',
            'label' => 'LBL_NCSDC_EVENTINFO_NCSDC_INSTRUMENT_FROM_NCSDC_EVENTINFO_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
