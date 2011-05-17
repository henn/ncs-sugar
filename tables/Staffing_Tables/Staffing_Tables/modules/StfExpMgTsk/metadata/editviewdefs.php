<?php
$module_name = 'ST_StfExpMgTsk';
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
            'label' => 'Name (STAFF_EXP_MGMT_TASK_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
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
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'psu_id',
            'studio' => 'visible',
            'label' => 'LBL_PSU_ID',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'staff_weekly_expense_id',
            'label' => 'LBL_STAFF_WEEKLY_EXPENSE_ID',
          ),
          1 => 
          array (
            'name' => 'mgmt_task_type',
            'studio' => 'visible',
            'label' => 'LBL_MGMT_TASK_TYPE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'mgmt_task_type_oth',
            'label' => 'LBL_MGMT_TASK_TYPE_OTH',
          ),
          1 => 
          array (
            'name' => 'mgmt_task_hrs',
            'label' => 'LBL_MGMT_TASK_HRS',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'mgmt_task_comment',
            'studio' => 'visible',
            'label' => 'LBL_MGMT_TASK_COMMENT',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'st_stfwkexpfexpmgtsk_name',
            'label' => 'LBL_ST_STFWKEXPNS_ST_STFEXPMGTSK_FROM_ST_STFWKEXPNS_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
