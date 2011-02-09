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
      'assigned_user_name' => 
      array (
        'link' => 'assigned_user_link',
        'type' => 'relate',
        'label' => 'LBL_ASSIGNED_TO_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'assigned_user_name',
      ),
      'staff_cert_list_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_CERT_LIST_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_cert_list_id',
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
