<?php
$module_name = 'SAMP_BioSpecID';
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
            'name' => 'collection_id',
            'label' => 'LBL_COLLECTION_ID',
          ),
          1 => 
          array (
            'name' => 'item_type',
            'label' => 'LBL_ITEM_TYPE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'item_prompt',
            'label' => 'LBL_ITEM_PROMPT',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
