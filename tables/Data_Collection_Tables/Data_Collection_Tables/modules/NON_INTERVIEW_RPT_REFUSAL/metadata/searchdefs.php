<?php
$module_name = 'NCSDC_NON_INTERVIEW_RPT_REFUSAL';
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
      'nir_refusal_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NIR_REFUSAL_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'nir_refusal_id',
      ),
      'refusal_reason_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_REFUSAL_REASON_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'refusal_reason_oth',
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
      'nir_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NIR_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'nir_id',
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
