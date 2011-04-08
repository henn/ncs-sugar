<?php
$module_name = 'PLT_LkPrsPrtcpt';
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
      'relation' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RELATION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'relation',
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
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'relation' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RELATION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'relation',
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
