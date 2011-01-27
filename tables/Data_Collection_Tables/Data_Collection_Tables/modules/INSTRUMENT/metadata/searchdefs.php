<?php
$module_name = 'NCSDC_Instrument';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'instrument_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTRUMENT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'instrument_id',
      ),
      'instrument_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTRUMENT_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'instrument_type_oth',
      ),
      'instrument_version' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTRUMENT_VERSION',
        'width' => '10%',
        'default' => true,
        'name' => 'instrument_version',
      ),
      'ins_start_time' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_INS_START_TIME',
        'width' => '10%',
        'default' => true,
        'name' => 'ins_start_time',
      ),
      'ins_end_time' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_INS_END_TIME',
        'width' => '10%',
        'default' => true,
        'name' => 'ins_end_time',
      ),
      'ins_date_start' => 
      array (
        'type' => 'date',
        'label' => 'LBL_INS_DATE_START',
        'width' => '10%',
        'default' => true,
        'name' => 'ins_date_start',
      ),
      'ins_date_end' => 
      array (
        'type' => 'date',
        'label' => 'LBL_INS_DATE_END',
        'width' => '10%',
        'default' => true,
        'name' => 'ins_date_end',
      ),
      'ins_breakoff' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_INS_BREAKOFF',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'ins_breakoff',
      ),
      'ins_status' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_INS_STATUS',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'ins_status',
      ),
      'ins_mode' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_INS_MODE',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'ins_mode',
      ),
      'ins_mode_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INS_MODE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'ins_mode_oth',
      ),
      'ins_method' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_INS_METHOD',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'ins_method',
      ),
      'data_problem' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_DATA_PROBLEM',
        'sortable' => false,
        'width' => '10%',
        'name' => 'data_problem',
      ),
      'sup_review' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SUP_REVIEW',
        'sortable' => false,
        'width' => '10%',
        'name' => 'sup_review',
      ),
      'instru_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_INSTRU_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'instru_comment',
      ),
      'instrument_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INSTRUMENT_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'instrument_type',
      ),
      'instrument_repeat_key' => 
      array (
        'type' => 'int',
        'label' => 'LBL_INSTRUMENT_REPEAT_KEY',
        'width' => '10%',
        'default' => true,
        'name' => 'instrument_repeat_key',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
