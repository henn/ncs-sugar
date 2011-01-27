<?php
$module_name = 'PLT_PersonRace';
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
      'person_race_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PERSON_RACE_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'person_race_id',
      ),
      'race' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RACE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'race',
      ),
      'race_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_RACE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'race_oth',
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
