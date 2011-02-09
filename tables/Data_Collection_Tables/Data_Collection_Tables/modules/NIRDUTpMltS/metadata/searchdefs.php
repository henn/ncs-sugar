<?php
$module_name = 'NCSDC_NIRDUTpMltS';
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
