<?php
$module_name = 'GT_Study_Center';
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
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'sc_id',
            'label' => 'LBL_SC_ID',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'sc_name',
            'label' => 'LBL_SC_NAME',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'comments',
            'studio' => 'visible',
            'label' => 'LBL_COMMENTS',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
