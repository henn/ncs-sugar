<?php
$module_name = 'OLT_PrsnPrvdLnk';
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
      'psu_id' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PSU_ID',
        'sortable' => false,
        'width' => '10%',
        'name' => 'psu_id',
      ),
      'person_provider_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PERSON_PROVIDER_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'person_provider_id',
      ),
      'provider_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PROVIDER_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'provider_id',
      ),
      'person_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PERSON_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'person_id',
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
      'prov_intro_outcome' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PROV_INTRO_OUTCOME',
        'sortable' => false,
        'width' => '10%',
        'name' => 'prov_intro_outcome',
      ),
      'prov_intro_outcome_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PROV_INTRO_OUTCOME_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'prov_intro_outcome_oth',
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
