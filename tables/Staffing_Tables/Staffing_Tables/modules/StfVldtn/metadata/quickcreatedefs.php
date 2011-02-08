<?php
$module_name = 'ST_StfVldtn';
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
            'name' => 'staff_val_id',
            'label' => 'LBL_STAFF_VAL_ID',
          ),
          1 => 
          array (
            'name' => 'staff_id',
            'label' => 'LBL_STAFF_ID',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'staff_validate',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_VALIDATE',
          ),
          1 => 
          array (
            'name' => 'staff_val_date',
            'label' => 'LBL_STAFF_VAL_DATE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'event_id',
            'label' => 'LBL_EVENT_ID',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'staff_val_comment',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_VAL_COMMENT',
          ),
        ),
      ),
    ),
  ),
);
?>
