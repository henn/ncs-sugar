<?php
$module_name = 'NCSDC_INCIDENT';
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
      'incident_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INCIDENT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'incident_id',
      ),
      'incident_time' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_INCIDENT_TIME',
        'width' => '10%',
        'default' => true,
        'name' => 'incident_time',
      ),
      'inc_report_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_INC_REPORT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_report_date',
      ),
      'inc_report_time' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_INC_REPORT_TIME',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_report_time',
      ),
      'inc_staff_reporter_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_STAFF_REPORTER_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_staff_reporter_id',
      ),
      'inc_staff_supervisor_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_STAFF_SUPERVISOR_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_staff_supervisor_id',
      ),
      'inc_recip_is_participant' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_RECIP_IS_PARTICIPANT',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_recip_is_participant',
      ),
      'inc_recip_is_du' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_RECIP_IS_DU',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_recip_is_du',
      ),
      'inc_recip_is_staff' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_RECIP_IS_STAFF',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_recip_is_staff',
      ),
      'inc_recip_is_acquaintance' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_RECIP_IS_ACQUAINTANCE',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_recip_is_acquaintance',
      ),
      'inc_recip_is_family' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_RECIP_IS_FAMILY',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_recip_is_family',
      ),
      'inc_contact_person' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_CONTACT_PERSON',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_contact_person',
      ),
      'inctype' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INCTYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'inctype',
      ),
      'inctype_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INCTYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'inctype_oth',
      ),
      'incloss_cmptr_model' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INCLOSS_CMPTR_MODEL',
        'width' => '10%',
        'default' => true,
        'name' => 'incloss_cmptr_model',
      ),
      'incloss_cmptr_sn' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INCLOSS_CMPTR_SN',
        'width' => '10%',
        'default' => true,
        'name' => 'incloss_cmptr_sn',
      ),
      'incloss_cmptr_decal' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INCLOSS_CMPTR_DECAL',
        'width' => '10%',
        'default' => true,
        'name' => 'incloss_cmptr_decal',
      ),
      'incloss_rem_media' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INCLOSS_REM_MEDIA',
        'width' => '10%',
        'default' => true,
        'name' => 'incloss_rem_media',
      ),
      'incloss_paper' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INCLOSS_PAPER',
        'width' => '10%',
        'default' => true,
        'name' => 'incloss_paper',
      ),
      'incloss_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INCLOSS_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'incloss_oth',
      ),
      'inc_reported' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INC_REPORTED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'inc_reported',
      ),
      'inc_description' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_INC_DESCRIPTION',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'inc_description',
      ),
      'inc_action' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_INC_ACTION',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'inc_action',
      ),
      'incident_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_INCIDENT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'incident_date',
      ),
      'inc_recip_is_other' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INC_RECIP_IS_OTHER',
        'sortable' => false,
        'width' => '10%',
        'name' => 'inc_recip_is_other',
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
