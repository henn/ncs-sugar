<?php
$module_name = 'ST_MSOutTarg';
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
      'outreach_target_ms' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OUTREACH_TARGET_MS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'outreach_target_ms',
      ),
      'outreach_target_ms_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OUTREACH_TARGET_MS_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_target_ms_oth',
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
      'outreach_target_ms' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OUTREACH_TARGET_MS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'outreach_target_ms',
      ),
      'outreach_target_ms_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OUTREACH_TARGET_MS_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_target_ms_oth',
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
