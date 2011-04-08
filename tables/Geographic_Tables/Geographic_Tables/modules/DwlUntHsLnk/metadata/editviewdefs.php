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
            'label' => 'Name (HH_DU_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
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
            'name' => 'is_active',
            'studio' => 'visible',
            'label' => 'LBL_IS_ACTIVE',
          ),
          1 => '',
        ),
        2 => 
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
        3 => 
        array (
          0 => 
          array (
            'name' => 'gt_dwlunthslnk_gt_dwellingunt_name',
          ),
          1 => 
          array (
            'name' => 'gt_dwlunthslnk_gt_household_name',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'gt_dwlunthsellingunt_name',
            'label' => 'LBL_GT_DWLUNTHSLNK_GT_DWELLINGUNT_FROM_GT_DWELLINGUNT_TITLE',
          ),
          1 => 
          array (
            'name' => 'gt_dwlunthshousehold_name',
            'label' => 'LBL_GT_DWLUNTHSLNK_GT_HOUSEHOLD_FROM_GT_HOUSEHOLD_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
