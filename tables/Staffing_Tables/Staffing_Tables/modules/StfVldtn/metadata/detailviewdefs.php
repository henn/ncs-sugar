<?php
$module_name = 'ST_StfVldtn';
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
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        2 => 
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
        3 => 
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
        4 => 
        array (
          0 => 
          array (
            'name' => 'staff_val_comment',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_VAL_COMMENT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'event_id',
            'label' => 'LBL_EVENT_ID',
          ),
          1 => 
          array (
            'name' => 'st_staffrstr_st_stfvldtn_name',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'st_staff_st_staff_validation_name',
          ),
        ),
      ),
    ),
  ),
);
?>
