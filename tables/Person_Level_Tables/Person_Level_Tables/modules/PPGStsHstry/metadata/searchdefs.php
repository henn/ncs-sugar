<?php
$module_name = 'PLT_PPGStsHstry';
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
      'ppg_status_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_PPG_STATUS_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'ppg_status_date',
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
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
      'ppg_status_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_PPG_STATUS_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'ppg_status_date',
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
      'ppg_history_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PPG_HISTORY_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'ppg_history_id',
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
