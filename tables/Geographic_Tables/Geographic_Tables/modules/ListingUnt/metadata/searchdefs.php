<?php
$module_name = 'GT_ListingUnt';
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
      'list_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_LIST_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'list_id',
      ),
      'list_line' => 
      array (
        'type' => 'int',
        'label' => 'LBL_LIST_LINE',
        'width' => '10%',
        'default' => true,
        'name' => 'list_line',
      ),
      'list_source' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_LIST_SOURCE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'list_source',
      ),
      'list_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_LIST_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'list_comment',
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
