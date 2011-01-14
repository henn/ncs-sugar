<?php
$module_name = 'PLT_PARTICIPANT';
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
      'p_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_P_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'p_id',
      ),
      'p_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_P_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'p_type',
      ),
      'p_type_oth' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_P_TYPE_OTH',
        'width' => '10%',
        'name' => 'p_type_oth',
      ),
      'status_info_source' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STATUS_INFO_SOURCE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'status_info_source',
      ),
      'status_info_source_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STATUS_INFO_SOURCE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'status_info_source_oth',
      ),
      'status_info_mode' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STATUS_INFO_MODE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'status_info_mode',
      ),
      'status_info_mode_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STATUS_INFO_MODE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'status_info_mode_oth',
      ),
      'status_info_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_STATUS_INFO_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'status_info_date',
      ),
      'enroll_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ENROLL_STATUS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'enroll_status',
      ),
      'enroll_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_ENROLL_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'enroll_date',
      ),
      'pid_entry' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PID_ENTRY',
        'sortable' => false,
        'width' => '10%',
        'name' => 'pid_entry',
      ),
      'pid_entry_other' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_PID_ENTRY_OTHER',
        'width' => '10%',
        'name' => 'pid_entry_other',
      ),
      'pid_age_elig' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PID_AGE_ELIG',
        'sortable' => false,
        'width' => '10%',
        'name' => 'pid_age_elig',
      ),
      'pid_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_PID_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'pid_comment',
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
