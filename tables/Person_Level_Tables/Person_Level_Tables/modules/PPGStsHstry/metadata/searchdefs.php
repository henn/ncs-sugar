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
      'plt_particigstshstry_name' => 
      array (
        'type' => 'relate',
        'link' => 'plt_particilt_ppgstshstry',
        'label' => 'LBL_PLT_PARTICIPANT_PLT_PPGSTSHSTRY_FROM_PLT_PARTICIPANT_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'plt_particigstshstry_name',
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
