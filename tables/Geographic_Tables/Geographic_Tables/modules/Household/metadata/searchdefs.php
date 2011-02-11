<?php
$module_name = 'GT_Household';
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
      'hh_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_HH_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'hh_id',
      ),
      'hh_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_HH_STATUS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'hh_status',
      ),
      'hh_elig' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_HH_ELIG',
        'sortable' => false,
        'width' => '10%',
        'name' => 'hh_elig',
      ),
      'hh_structure' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_HH_STRUCTURE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'hh_structure',
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
      'hh_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_HH_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'hh_id',
      ),
      'num_preg' => 
      array (
        'type' => 'int',
        'label' => 'LBL_NUM_PREG',
        'width' => '10%',
        'default' => true,
        'name' => 'num_preg',
      ),
      'hh_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_HH_STATUS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'hh_status',
      ),
      'hh_elig' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_HH_ELIG',
        'sortable' => false,
        'width' => '10%',
        'name' => 'hh_elig',
      ),
      'hh_structure' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_HH_STRUCTURE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'hh_structure',
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
