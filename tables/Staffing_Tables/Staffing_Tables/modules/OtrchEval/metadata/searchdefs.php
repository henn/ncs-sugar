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
      'assigned_user_name' => 
      array (
        'link' => 'assigned_user_link',
        'type' => 'relate',
        'label' => 'LBL_ASSIGNED_TO_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'assigned_user_name',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
      'assigned_user_id' => 
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
        'default' => true,
        'width' => '10%',
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
