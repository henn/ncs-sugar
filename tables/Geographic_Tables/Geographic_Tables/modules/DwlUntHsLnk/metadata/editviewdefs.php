<?php
$module_name = 'GT_DwlUntHsLnk';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'hh_du_id',
            'label' => 'LBL_HH_DU_ID',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'is_active',
            'studio' => 'visible',
            'label' => 'LBL_IS_ACTIVE',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'du_rank',
            'studio' => 'visible',
            'label' => 'LBL_DU_RANK',
          ),
          1 => 
          array (
            'name' => 'du_rank_oth',
            'label' => 'LBL_DU_RANK_OTH',
          ),
        ),
      ),
    ),
  ),
);
?>
