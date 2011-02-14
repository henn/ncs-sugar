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
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
