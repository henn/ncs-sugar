<?php
$module_name = 'OLT_Institution';
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
      'institute_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTITUTE_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'institute_type_oth',
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
      'institute_relation_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTITUTE_RELATION_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'institute_relation_oth',
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
      'institute_owner_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTITUTE_OWNER_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'institute_owner_oth',
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
      'institute_unit_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTITUTE_UNIT_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'institute_unit_oth',
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
      'institute_info_source_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTITUTE_INFO_SOURCE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'institute_info_source_oth',
      ),
      'institute_info_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_INSTITUTE_INFO_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'institute_info_date',
      ),
      'institute_info_update' => 
      array (
        'type' => 'date',
        'label' => 'LBL_INSTITUTE_INFO_UPDATE',
        'width' => '10%',
        'default' => true,
        'name' => 'institute_info_update',
      ),
      'institute_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_INSTITUTE_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'institute_comment',
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
