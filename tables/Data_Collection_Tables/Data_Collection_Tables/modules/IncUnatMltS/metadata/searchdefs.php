<?php
$module_name = 'NCSDC_IncUnatMltS';
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
      'inc_unanticipated_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_UNANTICIPATED_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_unanticipated_id',
      ),
      'inc_unanticipated' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INC_UNANTICIPATED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'inc_unanticipated',
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
      'inc_unanticipated_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_UNANTICIPATED_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_unanticipated_id',
      ),
      'inc_unanticipated' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INC_UNANTICIPATED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'inc_unanticipated',
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
