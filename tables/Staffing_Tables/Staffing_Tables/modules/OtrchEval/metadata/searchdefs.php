<?php
$module_name = 'ST_OtrchEval';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'psu_id' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PSU_ID',
        'sortable' => false,
        'width' => '10%',
        'name' => 'psu_id',
      ),
      'outreach_event_eval_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OUTREACH_EVENT_EVAL_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_event_eval_id',
      ),
      'outreach_event_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OUTREACH_EVENT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_event_id',
      ),
      'outreach_eval' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OUTREACH_EVAL',
        'sortable' => false,
        'width' => '10%',
        'name' => 'outreach_eval',
      ),
      'outreach_eval_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OUTREACH_EVAL_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_eval_oth',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
