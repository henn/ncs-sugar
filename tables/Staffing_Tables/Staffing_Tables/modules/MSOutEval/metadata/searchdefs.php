<?php
$module_name = 'ST_MSOutEval';
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
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
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
