<?php
$module_name = 'LTT_Telephone';
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
      'phone_nbr' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PHONE_NBR',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_nbr',
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
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'phone_nbr' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PHONE_NBR',
        'width' => '10%',
        'default' => true,
        'name' => 'phone_nbr',
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
