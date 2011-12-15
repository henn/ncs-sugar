<?php
$module_name = 'PLT_Participant';
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
	  
	  //*** JL (cross module search) ******
	  'participant_first_name' => 
      array (
        'name' => 'participant_first_name',
		'label' => 'Participant First Name',
        'default' => true,
        'width' => '10%',		
      ),
	  	  
	  'participant_last_name' => 
      array (
        'name' => 'participant_last_name',
		'label' => 'Participant Last Name',
        'default' => true,
        'width' => '10%',		
      ),
	  
	  //******* end cross module search *******	
	  
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
      'p_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_P_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'p_type_oth',
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
        'label' => 'LBL_PID_ENTRY_OTHER',
        'width' => '10%',
        'default' => true,
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
      'person_info_c' => 
      array (
        'type' => 'html',
        'studio' => 'visible',
        'label' => 'LBL_PERSON_INFO_C',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'person_info_c',
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
