<?php
$module_name = 'NCSDC_NonInterRpt';
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
      'who_refused' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_WHO_REFUSED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'who_refused',
      ),
      'nir_type_person' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_NIR_TYPE_PERSON',
        'sortable' => false,
        'width' => '10%',
        'name' => 'nir_type_person',
      ),
      'perm_disability' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PERM_DISABILITY',
        'sortable' => false,
        'width' => '10%',
        'name' => 'perm_disability',
      ),
      'reason_unavail' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REASON_UNAVAIL',
        'sortable' => false,
        'width' => '10%',
        'name' => 'reason_unavail',
      ),
      'refuser_strength' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REFUSER_STRENGTH',
        'sortable' => false,
        'width' => '10%',
        'name' => 'refuser_strength',
      ),
      'ref_action' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REF_ACTION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'ref_action',
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
      'who_refused' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_WHO_REFUSED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'who_refused',
      ),
      'nir_type_person' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_NIR_TYPE_PERSON',
        'sortable' => false,
        'width' => '10%',
        'name' => 'nir_type_person',
      ),
      'perm_disability' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PERM_DISABILITY',
        'sortable' => false,
        'width' => '10%',
        'name' => 'perm_disability',
      ),
      'date_available' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DATE_AVAILABLE',
        'width' => '10%',
        'default' => true,
        'name' => 'date_available',
      ),
      'reason_unavail' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REASON_UNAVAIL',
        'sortable' => false,
        'width' => '10%',
        'name' => 'reason_unavail',
      ),
      'refuser_strength' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REFUSER_STRENGTH',
        'sortable' => false,
        'width' => '10%',
        'name' => 'refuser_strength',
      ),
      'ref_action' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REF_ACTION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'ref_action',
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
