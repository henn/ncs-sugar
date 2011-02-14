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
      'staff_age_range' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAFF_AGE_RANGE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'staff_age_range',
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
      'staff_race' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAFF_RACE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'staff_race',
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
      'staff_age_range' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAFF_AGE_RANGE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'staff_age_range',
      ),
      'staff_race' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAFF_RACE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'staff_race',
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
      'staff_ethnicity' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAFF_ETHNICITY',
        'sortable' => false,
        'width' => '10%',
        'name' => 'staff_ethnicity',
      ),
      'current_user_only' => 
      array (
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
        'name' => 'current_user_only',
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
