<?php
$module_name = 'ST_OtrchEval';
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
            'label' => 'Name (OUTREACH_EVENT_EVAL_ID):',
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
            'name' => 'psu_id',
            'studio' => 'visible',
            'label' => 'LBL_PSU_ID',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'outreach_event_id',
            'label' => 'LBL_OUTREACH_EVENT_ID',
          ),
          1 => 
          array (
            'name' => 'outreach_eval',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_EVAL',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'outreach_eval_oth',
            'label' => 'LBL_OUTREACH_EVAL_OTH',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
