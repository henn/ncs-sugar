<?php
$module_name = 'NCSDC_NIRRfsMltS';
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
      'nir_refusal_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NIR_REFUSAL_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'nir_refusal_id',
      ),
      'nir_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NIR_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'nir_id',
      ),
      'refusal_reason' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REFUSAL_REASON',
        'sortable' => false,
        'width' => '10%',
        'name' => 'refusal_reason',
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
      'nir_refusal_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NIR_REFUSAL_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'nir_refusal_id',
      ),
      'nir_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NIR_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'nir_id',
      ),
      'refusal_reason' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REFUSAL_REASON',
        'sortable' => false,
        'width' => '10%',
        'name' => 'refusal_reason',
      ),
      'refusal_reason_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_REFUSAL_REASON_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'refusal_reason_oth',
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
