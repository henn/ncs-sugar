<?php
$module_name = 'ST_StfWkExpns';
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
            'label' => 'Name (WEEKLY_EXP_ID):',
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
          0 => '',
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'week_start_date',
            'label' => 'LBL_WEEK_START_DATE',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'staff_pay',
            'label' => 'LBL_STAFF_PAY',
          ),
          1 => 
          array (
            'name' => 'staff_hours',
            'label' => 'LBL_STAFF_HOURS',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'staff_expenses',
            'label' => 'LBL_STAFF_EXPENSES',
          ),
          1 => 
          array (
            'name' => 'staff_miles',
            'label' => 'LBL_STAFF_MILES',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'weekly_expenses_comment',
            'studio' => 'visible',
            'label' => 'LBL_WEEKLY_EXPENSES_COMMENT',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'st_staffrsttfwkexpns_name',
            'label' => 'LBL_ST_STAFFRSTR_ST_STFWKEXPNS_FROM_ST_STAFFRSTR_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
