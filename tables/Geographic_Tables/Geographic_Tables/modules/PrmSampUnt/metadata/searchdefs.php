<?php
$module_name = 'GT_PrmSampUnt';
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
      'sc_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SC_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'sc_id',
      ),
      'psu_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PSU_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'psu_name',
      ),
      'recruit_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RECRUIT_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'recruit_type',
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
      'sc_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SC_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'sc_id',
      ),
      'psu_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PSU_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'psu_name',
      ),
      'recruit_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_RECRUIT_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'recruit_type',
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
