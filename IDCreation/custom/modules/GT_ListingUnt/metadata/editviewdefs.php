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
          0 => 
          array (
            'name' => 'list_id',
            'label' => 'LBL_LIST_ID',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'list_line',
            'label' => 'LBL_LIST_LINE',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'list_source',
            'studio' => 'visible',
            'label' => 'LBL_LIST_SOURCE',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'list_comment',
            'studio' => 'visible',
            'label' => 'LBL_LIST_COMMENT',
          ),
          1 => '',
        ),
        6 => 
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
