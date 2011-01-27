<?php
$module_name = 'OLT_PrsnInstLnk';
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
      'person_institute_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PERSON_INSTITUTE_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'person_institute_id',
      ),
      'institute_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTITUTE_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'institute_id',
      ),
      'person_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PERSON_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'person_id',
      ),
      'is_active' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_IS_ACTIVE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'is_active',
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
