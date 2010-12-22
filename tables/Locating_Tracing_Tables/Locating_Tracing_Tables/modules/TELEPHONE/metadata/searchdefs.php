<?php
$module_name = 'LTT_TELEPHONE';
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
      'phone_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PHONE_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_id',
      ),
      'phone_info_source' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PHONE_INFO_SOURCE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'phone_info_source',
      ),
      'phone_info_source_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PHONE_INFO_SOURCE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_info_source_oth',
      ),
      'phone_ext' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PHONE_EXT',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_ext',
      ),
      'phone_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PHONE_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'phone_type',
      ),
      'phone_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PHONE_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_type_oth',
      ),
      'phone_rank' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PHONE_RANK',
        'sortable' => false,
        'width' => '10%',
        'name' => 'phone_rank',
      ),
      'phone_rank_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PHONE_RANK_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_rank_oth',
      ),
      'phone_landline' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PHONE_LANDLINE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'phone_landline',
      ),
      'phone_share' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PHONE_SHARE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'phone_share',
      ),
      'cell_permission' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CELL_PERMISSION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'cell_permission',
      ),
      'text_permission' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_TEXT_PERMISSION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'text_permission',
      ),
      'phone_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_PHONE_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'phone_comment',
      ),
      'phone_nbr' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PHONE_NBR',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_nbr',
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
