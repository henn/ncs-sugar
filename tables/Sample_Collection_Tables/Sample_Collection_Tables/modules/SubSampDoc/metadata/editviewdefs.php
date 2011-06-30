<?php
$module_name = 'SAMP_SubSampDoc';
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
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'random_order_no',
            'label' => 'LBL_RANDOM_ORDER_NO',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'samp_subsameventinfo_name',
          ),
        ),
      ),
    ),
  ),
);
?>
