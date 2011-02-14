<?php
$module_name = 'NCSDC_INCIDENT';
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
      'useTabs' => false,
    ),
    'panels' => 
    array (
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
            'name' => 'inctype',
            'studio' => 'visible',
            'label' => 'LBL_INCTYPE',
          ),
          1 => 
          array (
            'name' => 'inctype_oth',
            'label' => 'LBL_INCTYPE_OTH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'inc_contact_person',
            'label' => 'LBL_INC_CONTACT_PERSON',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'inc_action',
            'studio' => 'visible',
            'label' => 'LBL_INC_ACTION',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'incident_date',
            'label' => 'LBL_INCIDENT_DATE',
          ),
          1 => 
          array (
            'name' => 'incident_time',
            'label' => 'LBL_INCIDENT_TIME',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'inc_staff_reporter_id',
            'label' => 'LBL_INC_STAFF_REPORTER_ID',
          ),
          1 => 
          array (
            'name' => 'inc_staff_supervisor_id',
            'label' => 'LBL_INC_STAFF_SUPERVISOR_ID',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'inc_report_date',
            'label' => 'LBL_INC_REPORT_DATE',
          ),
          1 => 
          array (
            'name' => 'inc_report_time',
            'label' => 'LBL_INC_REPORT_TIME',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'inc_recip_is_staff',
            'label' => 'LBL_INC_RECIP_IS_STAFF',
          ),
          1 => 
          array (
            'name' => 'inc_recip_is_du',
            'label' => 'LBL_INC_RECIP_IS_DU',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'inc_recip_is_participant',
            'label' => 'LBL_INC_RECIP_IS_PARTICIPANT',
          ),
          1 => 
          array (
            'name' => 'inc_recip_is_family',
            'label' => 'LBL_INC_RECIP_IS_FAMILY',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'inc_recip_is_acquaintance',
            'label' => 'LBL_INC_RECIP_IS_ACQUAINTANCE',
          ),
          1 => 
          array (
            'name' => 'inc_recip_is_other',
            'studio' => 'visible',
            'label' => 'LBL_INC_RECIP_IS_OTHER',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'incloss_cmptr_model',
            'label' => 'LBL_INCLOSS_CMPTR_MODEL',
          ),
          1 => 
          array (
            'name' => 'incloss_cmptr_sn',
            'label' => 'LBL_INCLOSS_CMPTR_SN',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'incloss_cmptr_decal',
            'label' => 'LBL_INCLOSS_CMPTR_DECAL',
          ),
          1 => 
          array (
            'name' => 'incloss_rem_media',
            'label' => 'LBL_INCLOSS_REM_MEDIA',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'incloss_paper',
            'label' => 'LBL_INCLOSS_PAPER',
          ),
          1 => 
          array (
            'name' => 'incloss_oth',
            'label' => 'LBL_INCLOSS_OTH',
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'inc_reported',
            'studio' => 'visible',
            'label' => 'LBL_INC_REPORTED',
          ),
          1 => '',
        ),
        15 => 
        array (
          0 => 
          array (
            'name' => 'inc_description',
            'studio' => 'visible',
            'label' => 'LBL_INC_DESCRIPTION',
          ),
        ),
        16 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_event_ncsdc_incident_name',
          ),
        ),
      ),
    ),
  ),
);
?>
