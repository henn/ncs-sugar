<?php
$module_name = 'ST_StfExpDCTsk';
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
            'label' => 'Name:',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),          
          1 => 'assigned_user_name',
        ),
        1 => 
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
        2 => 
        array (
          0 => 
          array (
            'name' => 'data_coll_tasks_hrs',
            'label' => 'LBL_DATA_COLL_TASKS_HRS',
          ),
          1 => 
          array (
            'name' => 'data_coll_task_cases',
            'label' => 'LBL_DATA_COLL_TASK_CASES',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'data_coll_transmit',
            'label' => 'LBL_DATA_COLL_TRANSMIT',
          ),
          1 => 
          array (
            'name' => 'st_stfwkexpfexpdctsk_name',
            'label' => 'LBL_ST_STFWKEXPNS_ST_STFEXPDCTSK_FROM_ST_STFWKEXPNS_TITLE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'data_coll_task_comment',
            'studio' => 'visible',
            'label' => 'LBL_DATA_COLL_TASK_COMMENT',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
