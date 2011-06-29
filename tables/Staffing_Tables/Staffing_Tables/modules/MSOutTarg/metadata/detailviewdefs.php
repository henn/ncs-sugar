<?php
$module_name = 'ST_MSOutTarg';
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
      ),
    ),
  ),
);
?>
