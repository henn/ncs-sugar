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
      'subcontractor' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SUBCONTRACTOR',
        'sortable' => false,
        'width' => '10%',
        'name' => 'subcontractor',
      ),
      'staff_yob' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_YOB',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_yob',
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
      'staff_race_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_RACE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_race_oth',
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
