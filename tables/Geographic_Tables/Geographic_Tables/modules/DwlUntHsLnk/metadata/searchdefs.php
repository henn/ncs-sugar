<?php
$module_name = 'GT_DwlUntHsLnk';
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
      'hh_du_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_HH_DU_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'hh_du_id',
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
      'hh_du_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_HH_DU_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'hh_du_id',
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
