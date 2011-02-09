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
      'assigned_user_name' => 
      array (
        'link' => 'assigned_user_link',
        'type' => 'relate',
        'label' => 'LBL_ASSIGNED_TO_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'assigned_user_name',
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
