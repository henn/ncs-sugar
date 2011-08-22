<?php
$module_name = 'NCSDC_Incident';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
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
            'label' => 'Incident ID:',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => 'assigned_user_name',
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
          1 => 
          array (
            'name' => 'incident_date_time',
            'label' => 'LBL_INCIDENT_DATE_TIME',
          ),
        ),
        4 => 
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
        5 => 
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
        6 => 
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
        7 => 
        array (
          0 => 
          array (
            'name' => 'inc_description',
            'studio' => 'visible',
            'label' => 'LBL_INC_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'incident_report_date_time',
            'label' => 'LBL_INCIDENT_REPORT_DATE_TIME',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_incidlt_person_name',
            'label' => 'LBL_NCSDC_INCIDENT_PLT_PERSON_FROM_PLT_PERSON_TITLE',
          ),
          1 => 
          array (
            'name' => 'ncsdc_incidstaffrstr_name',
            'label' => 'LBL_NCSDC_INCIDENT_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
