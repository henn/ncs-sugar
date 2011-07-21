<?php
$module_name = 'ST_MSOutTarg';
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
            'name' => 'outreach_target_ms',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_TARGET_MS',
          ),
          1 => 
          array (
            'name' => 'outreach_target_ms_oth',
            'label' => 'LBL_OUTREACH_TARGET_MS_OTH',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'st_msouttart_wkoeact_name',
          ),
        ),
      ),
    ),
  ),
);
?>
