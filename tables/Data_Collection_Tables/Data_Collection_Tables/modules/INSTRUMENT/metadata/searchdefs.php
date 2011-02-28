<?php
$module_name = 'NCSDC_INSTRUMENT';
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
      'instrument_version' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTRUMENT_VERSION',
        'width' => '10%',
        'default' => true,
        'name' => 'instrument_version',
      ),
      'ins_date_start' => 
      array (
        'type' => 'date',
        'label' => 'LBL_INS_DATE_START',
        'width' => '10%',
        'default' => true,
        'name' => 'ins_date_start',
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
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
      'instrument_version' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTRUMENT_VERSION',
        'width' => '10%',
        'default' => true,
        'name' => 'instrument_version',
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
      'assigned_user_id' => 
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
        'default' => true,
        'width' => '10%',
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
