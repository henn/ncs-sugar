<?php
$module_name = 'GT_ListingUnt';
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
            'label' => 'Name (LIST_ID):',
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
          0 => '',
          1 => 
          array (
            'name' => 'list_line',
            'label' => 'LBL_LIST_LINE',
          ),
        ),
        3 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'list_source',
            'studio' => 'visible',
            'label' => 'LBL_LIST_SOURCE',
          ),
        ),
        4 => 
        array (
          0 => '',
          1 => 
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
            'name' => 'gt_listinguellingunt_name',
            'label' => 'LBL_GT_LISTINGUNT_GT_DWELLINGUNT_FROM_GT_DWELLINGUNT_TITLE',
          ),
          1 => 
          array (
            'name' => 'gt_secsampuistingunt_name',
            'label' => 'LBL_GT_SECSAMPUNT_GT_LISTINGUNT_FROM_GT_SECSAMPUNT_TITLE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'gt_tersampuistingunt_name',
            'label' => 'LBL_GT_TERSAMPUNT_GT_LISTINGUNT_FROM_GT_TERSAMPUNT_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
