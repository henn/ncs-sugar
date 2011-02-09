<?php
$module_name = 'GT_StudyCntr';
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
      'sc_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SC_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'sc_name',
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
      'sc_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SC_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'sc_id',
      ),
      'sc_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SC_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'sc_name',
      ),
      'comments' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_COMMENTS',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'comments',
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
