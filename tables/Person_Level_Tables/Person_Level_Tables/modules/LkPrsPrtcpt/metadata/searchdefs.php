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
      'p_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_P_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'p_id',
      ),
      'person_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PERSON_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'person_id',
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
      'p_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_P_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'p_id',
      ),
      'person_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PERSON_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'person_id',
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
