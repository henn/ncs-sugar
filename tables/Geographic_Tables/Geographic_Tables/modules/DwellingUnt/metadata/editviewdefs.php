<?php
$module_name = 'GT_DwellingUnt';
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
          0 => '',
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'du_type',
            'studio' => 'visible',
            'label' => 'LBL_DU_TYPE',
          ),
          1 => 
          array (
            'name' => 'du_type_oth',
            'label' => 'LBL_DU_TYPE_OTH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'duplicate_du',
            'studio' => 'visible',
            'label' => 'LBL_DUPLICATE_DU',
          ),
          1 => 
          array (
            'name' => 'missed_du',
            'studio' => 'visible',
            'label' => 'LBL_MISSED_DU',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'du_access',
            'studio' => 'visible',
            'label' => 'LBL_DU_ACCESS',
          ),
          1 => 
          array (
            'name' => 'du_ineligible',
            'studio' => 'visible',
            'label' => 'LBL_DU_INELIGIBLE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'duid_comment',
            'studio' => 'visible',
            'label' => 'LBL_DUID_COMMENT',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'gt_dwelling_unit_ltt_address_name',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'gt_listing_unit_gt_dwelling_unit_name',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'gt_listingunt_gt_dwellingunt_name',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'gt_dwellingunt_ltt_address_name',
          ),
        ),
      ),
    ),
  ),
);
?>
