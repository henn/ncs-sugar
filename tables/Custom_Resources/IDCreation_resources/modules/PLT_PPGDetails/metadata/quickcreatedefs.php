<?php
$module_name = 'PLT_PPGDetails';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
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
            'label' => 'PPG Details ID:',            
			'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'ppg_pid_status',
            'studio' => 'visible',
            'label' => 'LBL_PPG_PID_STATUS',
          ),
          1 => 
          array (
            'name' => 'orig_due_date',
            'label' => 'LBL_ORIG_DUE_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'due_date_2',
            'label' => 'LBL_DUE_DATE_2',
          ),
          1 => 
          array (
            'name' => 'due_date_3',
            'label' => 'LBL_DUE_DATE_3',
          ),
        ),
      ),
    ),
  ),
);
?>
