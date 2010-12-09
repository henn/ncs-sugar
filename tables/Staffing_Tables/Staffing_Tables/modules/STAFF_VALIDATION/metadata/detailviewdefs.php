<?php
$module_name = 'ST_STAFF_VALIDATION';
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
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        2 => 
        array (
          0 => 'description',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'psu_id',
            'studio' => 'visible',
            'label' => 'LBL_PSU_ID',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'staff_val_id',
            'label' => 'LBL_STAFF_VAL_ID',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'staff_id',
            'label' => 'LBL_STAFF_ID',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'event_id',
            'label' => 'LBL_EVENT_ID',
          ),
          1 => '',
        ),
        7 => 
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
        8 => 
        array (
          0 => 
          array (
            'name' => 'staff_val_comment',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_VAL_COMMENT',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
