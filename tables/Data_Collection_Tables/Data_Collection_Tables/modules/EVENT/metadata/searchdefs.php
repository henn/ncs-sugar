<?php
$module_name = 'NCSDC_EVENT';
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
      'event_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EVENT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'event_id',
      ),
      'event_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EVENT_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'event_type_oth',
      ),
      'event_disp_cat' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EVENT_DISP_CAT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'event_disp_cat',
      ),
      'event_start_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_EVENT_START_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'event_start_date',
      ),
      'event_start_time' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_EVENT_START_TIME',
        'width' => '10%',
        'default' => true,
        'name' => 'event_start_time',
      ),
      'event_end_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_EVENT_END_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'event_end_date',
      ),
      'event_end_time' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_EVENT_END_TIME',
        'width' => '10%',
        'default' => true,
        'name' => 'event_end_time',
      ),
      'event_breakoff' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EVENT_BREAKOFF',
        'sortable' => false,
        'width' => '10%',
        'name' => 'event_breakoff',
      ),
      'event_incentive_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EVENT_INCENTIVE_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'event_incentive_type',
      ),
      'event_incent_cash' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_EVENT_INCENT_CASH',
        'width' => '10%',
        'default' => true,
        'name' => 'event_incent_cash',
      ),
      'event_inc_nocash' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EVENT_INC_NOCASH',
        'width' => '10%',
        'default' => true,
        'name' => 'event_inc_nocash',
      ),
      'event_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_EVENT_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'event_comment',
      ),
      'event_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EVENT_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'event_type',
      ),
      'event_repeat_key' => 
      array (
        'type' => 'int',
        'label' => 'LBL_EVENT_REPEAT_KEY',
        'width' => '10%',
        'default' => true,
        'name' => 'event_repeat_key',
      ),
      'event_disp' => 
      array (
        'type' => 'int',
        'label' => 'LBL_EVENT_DISP',
        'width' => '10%',
        'default' => true,
        'name' => 'event_disp',
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
