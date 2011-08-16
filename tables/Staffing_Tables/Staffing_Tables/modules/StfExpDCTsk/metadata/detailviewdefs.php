<?php
$module_name = 'ST_StfExpDCTsk';
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
          0 => '',
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'data_coll_task_type',
            'studio' => 'visible',
            'label' => 'LBL_DATA_COLL_TASK_TYPE',
          ),
          1 => 
          array (
            'name' => 'data_coll_task_type_oth',
            'label' => 'LBL_DATA_COLL_TASK_TYPE_OTH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'data_coll_tasks_hrs',
            'label' => 'LBL_DATA_COLL_TASKS_HRS',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'data_coll_task_cases',
            'label' => 'LBL_DATA_COLL_TASK_CASES',
          ),
          1 => 
          array (
            'name' => 'data_coll_transmit',
            'label' => 'LBL_DATA_COLL_TRANSMIT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'data_coll_task_comment',
            'studio' => 'visible',
            'label' => 'LBL_DATA_COLL_TASK_COMMENT',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'st_stfwkexpfexpdctsk_name',
            'label' => 'LBL_ST_STFWKEXPNS_ST_STFEXPDCTSK_FROM_ST_STFWKEXPNS_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
