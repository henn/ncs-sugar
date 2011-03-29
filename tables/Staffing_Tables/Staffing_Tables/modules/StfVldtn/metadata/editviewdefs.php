<?php
$module_name = 'ST_StfVldtn';
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
            'label' => 'Name (STAFF_VAL_ID):',
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
          0 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'staff_id',
            'label' => 'LBL_STAFF_ID',
          ),
          1 => 
          array (
            'name' => 'event_id',
            'label' => 'LBL_EVENT_ID',
          ),
        ),
        4 => 
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
        5 => 
        array (
          0 => 
          array (
            'name' => 'staff_val_comment',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_VAL_COMMENT',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'st_staffrstr_st_stfvldtn_name',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_eventinfo_st_stfvldtn_name',
          ),
        ),
      ),
    ),
  ),
);
?>
