<?php
$module_name = 'LTT_Address';
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
      'address_1' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS_1',
        'width' => '10%',
        'default' => true,
        'name' => 'address_1',
      ),
      'address_2' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS_2',
        'width' => '10%',
        'default' => true,
        'name' => 'address_2',
      ),
      'unit' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_UNIT',
        'width' => '10%',
        'default' => true,
        'name' => 'unit',
      ),
      'city' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CITY',
        'width' => '10%',
        'default' => true,
        'name' => 'city',
      ),
      'state' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STATE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'state',
      ),
      'zip' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ZIP',
        'width' => '10%',
        'default' => true,
        'name' => 'zip',
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
      'address_1' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS_1',
        'width' => '10%',
        'default' => true,
        'name' => 'address_1',
      ),
      'address_2' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS_2',
        'width' => '10%',
        'default' => true,
        'name' => 'address_2',
      ),
      'unit' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_UNIT',
        'width' => '10%',
        'default' => true,
        'name' => 'unit',
      ),
      'city' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CITY',
        'width' => '10%',
        'default' => true,
        'name' => 'city',
      ),
      'state' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STATE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'state',
      ),
      'zip' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ZIP',
        'width' => '10%',
        'default' => true,
        'name' => 'zip',
      ),
      'address_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ADDRESS_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'address_type',
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
