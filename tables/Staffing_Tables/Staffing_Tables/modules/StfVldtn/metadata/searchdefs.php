<?php
$module_name = 'ST_StfVldtn';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'psu_id' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PSU_ID',
        'sortable' => false,
        'width' => '10%',
        'name' => 'psu_id',
      ),
      'staff_val_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_VAL_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_val_id',
      ),
      'staff_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_id',
      ),
      'event_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EVENT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'event_id',
      ),
      'staff_validate' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_STAFF_VALIDATE',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'staff_validate',
      ),
      'staff_val_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_STAFF_VAL_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_val_date',
      ),
      'staff_val_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_STAFF_VAL_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'staff_val_comment',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
