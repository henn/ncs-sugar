<?php
$module_name = 'ST_StaffRstr';
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
      'staff_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_id',
      ),
      'staff_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAFF_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'staff_type',
      ),
      'staff_gender' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAFF_GENDER',
        'sortable' => false,
        'width' => '10%',
        'name' => 'staff_gender',
      ),
      'staff_exp' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAFF_EXP',
        'sortable' => false,
        'width' => '10%',
        'name' => 'staff_exp',
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
      'current_user_only' => 
      array (
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
        'name' => 'current_user_only',
      ),
      'staff_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_id',
      ),
      'staff_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAFF_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'staff_type',
      ),
      'staff_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_type_oth',
      ),
      'staff_gender' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAFF_GENDER',
        'sortable' => false,
        'width' => '10%',
        'name' => 'staff_gender',
      ),
      'staff_exp' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAFF_EXP',
        'sortable' => false,
        'width' => '10%',
        'name' => 'staff_exp',
      ),
      'staff_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_STAFF_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'staff_comment',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
      'date_modified' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_MODIFIED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_modified',
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
