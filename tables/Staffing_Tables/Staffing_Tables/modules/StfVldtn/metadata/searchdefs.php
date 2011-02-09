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
      'staff_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_id',
      ),
      'staff_val_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_STAFF_VAL_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_val_date',
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
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'staff_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_id',
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
      'staff_val_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_VAL_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_val_id',
      ),
      'event_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EVENT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'event_id',
      ),
      'assigned_user_name' => 
      array (
        'link' => 'assigned_user_link',
        'type' => 'relate',
        'label' => 'LBL_ASSIGNED_TO_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'assigned_user_name',
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
