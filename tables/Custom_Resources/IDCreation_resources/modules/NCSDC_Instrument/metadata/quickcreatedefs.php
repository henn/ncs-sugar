<?php
$module_name = 'NCSDC_Instrument';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
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
            'label' => 'Name (INSTRUMENT_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => 'assigned_user_name',
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
          1 => 
          array (
            'name' => 'ins_status',
            'studio' => 'visible',
            'label' => 'LBL_INS_STATUS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'instrument_repeat_key',
            'label' => 'LBL_INSTRUMENT_REPEAT_KEY',
          ),
          1 => 
          array (
            'name' => 'ins_method',
            'studio' => 'visible',
            'label' => 'LBL_INS_METHOD',
          ),
        ),
        4 => 
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
        5 => 
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
        6 => 
        array (
          0 => 
          array (
            'name' => 'ins_breakoff',
            'studio' => 'visible',
            'label' => 'LBL_INS_BREAKOFF',
          ),
          1 => 
          array (
            'name' => 'sup_review',
            'studio' => 'visible',
            'label' => 'LBL_SUP_REVIEW',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'instru_comment',
            'studio' => 'visible',
            'label' => 'LBL_INSTRU_COMMENT',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
