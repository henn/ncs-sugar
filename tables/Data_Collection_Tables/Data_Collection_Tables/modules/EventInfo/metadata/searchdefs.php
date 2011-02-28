<?php
$module_name = 'NCSDC_EventInfo';
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
      'event_disp' => 
      array (
        'type' => 'int',
        'label' => 'LBL_EVENT_DISP',
        'width' => '10%',
        'default' => true,
        'name' => 'event_disp',
      ),
      'event_start_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_EVENT_START_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'event_start_date',
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
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
      'event_disp' => 
      array (
        'type' => 'int',
        'label' => 'LBL_EVENT_DISP',
        'width' => '10%',
        'default' => true,
        'name' => 'event_disp',
      ),
      'event_repeat_key' => 
      array (
        'type' => 'int',
        'label' => 'LBL_EVENT_REPEAT_KEY',
        'width' => '10%',
        'default' => true,
        'name' => 'event_repeat_key',
      ),
      'event_start_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_EVENT_START_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'event_start_date',
      ),
      'event_end_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_EVENT_END_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'event_end_date',
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
      'event_incent_noncash' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EVENT_INCENT_NONCASH',
        'width' => '10%',
        'default' => true,
        'name' => 'event_incent_noncash',
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
