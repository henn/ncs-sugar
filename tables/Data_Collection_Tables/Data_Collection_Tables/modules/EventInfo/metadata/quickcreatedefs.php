<?php
$module_name = 'NCSDC_EventInfo';
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
          0 => 'name',
          1 => 'assigned_user_name',
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
            'name' => 'event_disp_cat',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_DISP_CAT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'event_disp',
            'label' => 'LBL_EVENT_DISP',
          ),
        ),
        3 => 
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