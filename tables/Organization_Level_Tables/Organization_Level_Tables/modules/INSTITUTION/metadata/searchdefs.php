<?php
$module_name = 'OLT_INSTITUTION';
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
      'institute_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTITUTE_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'institute_id',
      ),
      'institute_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INSTITUTE_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'institute_type',
      ),
      'institute_relation' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INSTITUTE_RELATION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'institute_relation',
      ),
      'institute_owner' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'default' => true,
        'label' => 'LBL_INSTITUTE_OWNER',
        'sortable' => false,
        'width' => '10%',
        'name' => 'institute_owner',
      ),
      'institute_info_source' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INSTITUTE_INFO_SOURCE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'institute_info_source',
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
      'institute_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTITUTE_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'institute_id',
      ),
      'institute_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INSTITUTE_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'institute_type',
      ),
      'institute_relation' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INSTITUTE_RELATION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'institute_relation',
      ),
      'institute_owner' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'default' => true,
        'label' => 'LBL_INSTITUTE_OWNER',
        'sortable' => false,
        'width' => '10%',
        'name' => 'institute_owner',
      ),
      'institute_size' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTITUTE_SIZE',
        'width' => '10%',
        'default' => true,
        'name' => 'institute_size',
      ),
      'institute_unit' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INSTITUTE_UNIT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'institute_unit',
      ),
      'institute_info_source' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INSTITUTE_INFO_SOURCE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'institute_info_source',
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
