<?php
$module_name = 'GT_Dwelling_Unit_Household_Linkage';
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
      'hh_du_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_HH_DU_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'hh_du_id',
      ),
      'du_rank_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_DU_RANK_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'du_rank_oth',
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
      'du_rank' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_DU_RANK',
        'sortable' => false,
        'width' => '10%',
        'name' => 'du_rank',
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
