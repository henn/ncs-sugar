<?php
$module_name = 'SAMP_SPECReceipt';
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
      'receipt_comment' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RECEIPT_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'receipt_comment',
      ),
      'monitor_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MONITOR_STATUS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'monitor_status',
      ),
      'centrifuge_comment' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CENTRIFUGE_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'centrifuge_comment',
      ),
      'centrifuge_staff_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CENTRIFUGE_STAFF_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'centrifuge_staff_id',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
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
      'receipt_comment' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RECEIPT_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'receipt_comment',
      ),
      'monitor_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MONITOR_STATUS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'monitor_status',
      ),
      'upper_trigger' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_UPPER_TRIGGER',
        'sortable' => false,
        'width' => '10%',
        'name' => 'upper_trigger',
      ),
      'lower_trigger_cold' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_LOWER_TRIGGER_COLD',
        'sortable' => false,
        'width' => '10%',
        'name' => 'lower_trigger_cold',
      ),
      'lower_trigger_ambient' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_LOWER_TRIGGER_AMBIENT ',
        'sortable' => false,
        'width' => '10%',
        'name' => 'lower_trigger_ambient',
      ),
      'centrifuge_comment' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CENTRIFUGE_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'centrifuge_comment',
      ),
      'centrifuge_staff_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CENTRIFUGE_STAFF_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'centrifuge_staff_id',
      ),
      'assigned_user_id' => 
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
        'default' => true,
        'width' => '10%',
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
