<?php
$module_name = 'ST_StfCrtTrn';
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
      'staff_cert_list_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_CERT_LIST_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_cert_list_id',
      ),
      'staff_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_id',
      ),
      'cert_train_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CERT_TRAIN_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'cert_train_type',
      ),
      'cert_completed' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CERT_COMPLETED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'cert_completed',
      ),
      'cert_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_CERT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'cert_date',
      ),
      'staff_bgcheck_lvl' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAFF_BGCHECK_LVL',
        'sortable' => false,
        'width' => '10%',
        'name' => 'staff_bgcheck_lvl',
      ),
      'cert_type_frequency' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CERT_TYPE_FREQUENCY',
        'width' => '10%',
        'default' => true,
        'name' => 'cert_type_frequency',
      ),
      'cert_type_exp_date' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CERT_TYPE_EXP_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'cert_type_exp_date',
      ),
      'cert_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_CERT_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'cert_comment',
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
