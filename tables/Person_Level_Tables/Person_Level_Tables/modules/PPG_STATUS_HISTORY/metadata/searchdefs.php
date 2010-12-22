<?php
$module_name = 'PLT_PPG_STATUS_HISTORY';
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
      'ppg_history_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PPG_HISTORY_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'ppg_history_id',
      ),
      'ppg_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PPG_STATUS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'ppg_status',
      ),
      'ppg_info_source' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PPG_INFO_SOURCE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'ppg_info_source',
      ),
      'ppg_info_mode' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PPG_INFO_MODE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'ppg_info_mode',
      ),
      'ppg_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_PPG_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'ppg_comment',
      ),
      'ppg_status_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_PPG_STATUS_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'ppg_status_date',
      ),
      'ppg_info_source_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PPG_INFO_SOURCE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'ppg_info_source_oth',
      ),
      'ppg_info_mode_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PPG_INFO_MODE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'ppg_info_mode_oth',
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
