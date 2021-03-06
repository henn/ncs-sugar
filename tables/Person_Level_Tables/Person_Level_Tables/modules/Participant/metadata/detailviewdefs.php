<?php
$module_name = 'PLT_Participant';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => true,
    ),
    'panels' => 
    array (
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'person_info_c',
            'studio' => 'visible',
            'label' => 'LBL_PERSON_INFO_C',
          ),
          1 => '',
        ),
      ),
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
        1 => 
        array (
          0 => '',
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'p_type',
            'studio' => 'visible',
            'label' => 'LBL_P_TYPE',
          ),
          1 => 
          array (
            'name' => 'p_type_oth',
            'label' => 'LBL_P_TYPE_OTH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'status_info_source',
            'studio' => 'visible',
            'label' => 'LBL_STATUS_INFO_SOURCE',
          ),
          1 => 
          array (
            'name' => 'status_info_source_oth',
            'label' => 'LBL_STATUS_INFO_SOURCE_OTH',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'status_info_mode',
            'studio' => 'visible',
            'label' => 'LBL_STATUS_INFO_MODE',
          ),
          1 => 
          array (
            'name' => 'status_info_mode_oth',
            'label' => 'LBL_STATUS_INFO_MODE_OTH',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'status_info_date',
            'label' => 'LBL_STATUS_INFO_DATE',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'enroll_status',
            'studio' => 'visible',
            'label' => 'LBL_ENROLL_STATUS',
          ),
          1 => 
          array (
            'name' => 'enroll_date',
            'label' => 'LBL_ENROLL_DATE',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'pid_entry',
            'studio' => 'visible',
            'label' => 'LBL_PID_ENTRY',
          ),
          1 => 
          array (
            'name' => 'pid_entry_other',
            'label' => 'LBL_PID_ENTRY_OTHER',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'pid_age_elig',
            'studio' => 'visible',
            'label' => 'LBL_PID_AGE_ELIG',
          ),
          1 => '',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'pid_comment',
            'studio' => 'visible',
            'label' => 'LBL_PID_COMMENT',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_eventinfo_plt_participant_name',
          ),
        ),
      ),
    ),
  ),
);
?>
