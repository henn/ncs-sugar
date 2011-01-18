<?php
$module_name = 'NCSDC_EVENT';
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
            'name' => 'event_type',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_TYPE',
          ),
          1 => 
          array (
            'name' => 'event_repeat_key',
            'label' => 'LBL_EVENT_REPEAT_KEY',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'event_id',
            'label' => 'LBL_EVENT_ID',
          ),
          1 => 
          array (
            'name' => 'event_disp',
            'label' => 'LBL_EVENT_DISP',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'event_disp_cat',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_DISP_CAT',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'event_start_date',
            'label' => 'LBL_EVENT_START_DATE',
          ),
          1 => 
          array (
            'name' => 'event_end_date',
            'label' => 'LBL_EVENT_END_DATE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'event_start_time',
            'label' => 'LBL_EVENT_START_TIME',
          ),
          1 => 
          array (
            'name' => 'event_end_time',
            'label' => 'LBL_EVENT_END_TIME',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'event_breakoff',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_BREAKOFF',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'event_incentive_type',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_INCENTIVE_TYPE',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'event_incent_cash',
            'label' => 'LBL_EVENT_INCENT_CASH',
          ),
          1 => 
          array (
            'name' => 'event_incent_noncash',
            'label' => 'LBL_EVENT_INCENT_NONCASH',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'event_type_oth',
            'label' => 'LBL_EVENT_TYPE_OTH',
          ),
          1 => '',
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'event_comment',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_COMMENT',
          ),
          1 => '',
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_contact_ncsdc_event_name',
          ),
        ),
      ),
    ),
  ),
);
?>
