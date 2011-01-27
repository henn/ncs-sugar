<?php
$module_name = 'GT_DwellingUnt';
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
      'du_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_DU_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'du_id',
      ),
      'du_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_DU_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'du_type',
      ),
      'du_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_DU_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'du_type_oth',
      ),
      'duplicate_du' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_DUPLICATE_DU',
        'sortable' => false,
        'width' => '10%',
        'name' => 'duplicate_du',
      ),
      'missed_du' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MISSED_DU',
        'sortable' => false,
        'width' => '10%',
        'name' => 'missed_du',
      ),
      'du_access' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_DU_ACCESS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'du_access',
      ),
      'du_ineligible' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_DU_INELIGIBLE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'du_ineligible',
      ),
      'duid_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_DUID_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'duid_comment',
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
