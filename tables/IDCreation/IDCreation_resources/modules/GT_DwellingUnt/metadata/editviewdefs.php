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
            'label' => 'Name (DU_ID):',
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
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
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
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'missed_du',
            'studio' => 'visible',
            'label' => 'LBL_MISSED_DU',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'du_access',
            'studio' => 'visible',
            'label' => 'LBL_DU_ACCESS',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'du_ineligible',
            'studio' => 'visible',
            'label' => 'LBL_DU_INELIGIBLE',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'duid_comment',
            'studio' => 'visible',
            'label' => 'LBL_DUID_COMMENT',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'gt_listingunt_ltt_address_name',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'gt_listingunt_gt_listingunt_name',
          ),
        ),
      ),
    ),
  ),
);
?>

