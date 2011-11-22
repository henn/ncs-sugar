<?php
$module_name = 'NCSDC_Incident';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
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
            'label' => 'Name (INCIDENT_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
        1 => 
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
        2 => 
        array (
          0 => 
          array (
            'name' => 'inc_contact_person',
            'label' => 'LBL_INC_CONTACT_PERSON',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'inc_action',
            'studio' => 'visible',
            'label' => 'LBL_INC_ACTION',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'incident_date_time',
            'label' => 'LBL_INCIDENT_DATE_TIME',
          ),
          1 => '',
        ),
        5 => 
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
        6 => 
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
        7 => 
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
        8 => 
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
        9 => 
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
        10 => 
        array (
          0 => 
          array (
            'name' => 'incloss_cmptr_decal',
            'label' => 'LBL_INCLOSS_CMPTR_DECAL',
          ),
          1 => '',
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'incloss_rem_media',
            'label' => 'LBL_INCLOSS_REM_MEDIA',
          ),
          1 => '',
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'incloss_paper',
            'label' => 'LBL_INCLOSS_PAPER',
          ),
          1 => '',
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'incloss_oth',
            'label' => 'LBL_INCLOSS_OTH',
          ),
          1 => '',
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'inc_reported',
            'studio' => 'visible',
            'label' => 'LBL_INC_REPORTED',
          ),
          1 => 
          array (
            'name' => 'incident_report_date_time',
            'label' => 'LBL_INCIDENT_REPORT_DATE_TIME',
          ),
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
          0 => '',
          1 => 
          array (
            'name' => 'ncsdc_incidstaffrstr_name',
          ),
        ),
        17 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_incidrticipant_name',
          ),
          1 => 
          array (
            'name' => 'ncsdc_incidellingunt_name',
          ),
        ),
        18 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_incidlt_person_name',
          ),
        ),
      ),
    ),
  ),
);
?>
