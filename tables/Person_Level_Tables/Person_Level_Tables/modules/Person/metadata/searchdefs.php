<?php
$module_name = 'PLT_Person';
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
      'first_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_FIRST_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'first_name',
      ),
      'last_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_LAST_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'last_name',
      ),
      'person_dob' => 
      array (
        'type' => 'date',
        'studio' => 'visible',
        'label' => 'LBL_PERSON_DOB',
        'width' => '10%',
        'default' => true,
        'name' => 'person_dob',
      ),
      'age' => 
      array (
        'type' => 'int',
        'label' => 'LBL_AGE',
        'width' => '10%',
        'default' => true,
        'name' => 'age',
      ),
      'age_range' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_AGE_RANGE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'age_range',
      ),
      'person_lang' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PERSON_LANG',
        'sortable' => false,
        'width' => '10%',
        'name' => 'person_lang',
      ),
      'pref_contact' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PREF_CONTACT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'pref_contact',
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
      'first_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_FIRST_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'first_name',
      ),
      'last_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_LAST_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'last_name',
      ),
      'maiden_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_MAIDEN_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'maiden_name',
      ),
      'sex' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SEX',
        'sortable' => false,
        'width' => '10%',
        'name' => 'sex',
      ),
      'person_dob' => 
      array (
        'type' => 'date',
        'studio' => 'visible',
        'label' => 'LBL_PERSON_DOB',
        'width' => '10%',
        'default' => true,
        'name' => 'person_dob',
      ),
      'age' => 
      array (
        'type' => 'int',
        'label' => 'LBL_AGE',
        'width' => '10%',
        'default' => true,
        'name' => 'age',
      ),
      'age_range' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_AGE_RANGE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'age_range',
      ),
      'pref_contact' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PREF_CONTACT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'pref_contact',
      ),
      'ethnic_group' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ETHNIC_GROUP',
        'sortable' => false,
        'width' => '10%',
        'name' => 'ethnic_group',
      ),
      'person_lang' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PERSON_LANG',
        'sortable' => false,
        'width' => '10%',
        'name' => 'person_lang',
      ),
      'plan_move' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PLAN_MOVE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'plan_move',
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
