<?php
$module_name = 'NCSDC_NON_INTERVIEW_RPT_DUTYPE';
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
      'nir_dutype_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NIR_DUTYPE_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'nir_dutype_id',
      ),
      'nir_type_du' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'label' => 'LBL_NIR_TYPE_DU',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'nir_type_du',
      ),
      'nir_type_du_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NIR_TYPE_DU_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'nir_type_du_oth',
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
