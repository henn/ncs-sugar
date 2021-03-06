<?php
$module_name = 'NCSDC_EventInfo';
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
            'name' => 'event_type',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_TYPE',
          ),
          1 => 
          array (
            'name' => 'event_type_oth',
            'label' => 'LBL_EVENT_TYPE_OTH',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'event_repeat_key',
            'label' => 'LBL_EVENT_REPEAT_KEY',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'event_disp_cat',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_DISP_CAT',
          ),
          1 => 
          array (
            'name' => 'event_disp',
            'label' => 'LBL_EVENT_DISP',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'event_start_date_time',
            'label' => 'LBL_EVENT_START_DATE_TIME',
          ),
          1 => 
          array (
            'name' => 'event_end_date_time',
            'label' => 'LBL_EVENT_END_DATE_TIME',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'event_breakoff',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_BREAKOFF',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'event_incentive_type',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_INCENTIVE_TYPE',
          ),
          1 => 
          array (
            'name' => 'incentive_checked_out',
            'studio' => 'visible',
            'label' => 'LBL_INCENTIVE_CHECKED_OUT',
          ),
        ),
        7 => 
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
        8 => 
        array (
          0 => 
          array (
            'name' => 'event_comment',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_COMMENT',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_eventrticipant_name',
            'label' => 'LBL_NCSDC_EVENTINFO_PLT_PARTICIPANT_FROM_PLT_PARTICIPANT_TITLE',
          ),
          1 => '',
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'visit_window_starttime_c',
            'label' => 'LBL_VISIT_WINDOW_STARTDATE',
          ),
          1 => 
          array (
            'name' => 'visit_window_endtime_c',
            'label' => 'LBL_VISIT_WINDOW_ENDDATE',
          ),
        ),
      ),
    ),
  ),
);
?>
