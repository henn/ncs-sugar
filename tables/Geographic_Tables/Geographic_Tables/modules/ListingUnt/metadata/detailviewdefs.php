<?php
$module_name = 'GT_ListingUnt';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
        ),
      ),
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
            'name' => 'list_line',
            'label' => 'LBL_LIST_LINE',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'list_source',
            'studio' => 'visible',
            'label' => 'LBL_LIST_SOURCE',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'list_comment',
            'studio' => 'visible',
            'label' => 'LBL_LIST_COMMENT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'gt_listing_unit_gt_dwelling_unit_name',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'gt_listingunt_gt_dwellingunt_name',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'gt_sndsampunt_gt_listingunt_name',
          ),
          1 => 
          array (
            'name' => 'gt_secsampunt_gt_listingunt_name',
          ),
        ),
      ),
    ),
  ),
);
?>
