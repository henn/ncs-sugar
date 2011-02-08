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
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
      'description' => 
      array (
        'type' => 'text',
        'label' => 'LBL_DESCRIPTION',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'description',
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
