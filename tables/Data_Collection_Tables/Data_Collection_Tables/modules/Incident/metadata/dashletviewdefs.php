<?php
$dashletData['NCSDC_IncidentDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'type' => 'assigned_user_name',
    'default' => 'Administrator',
  ),
);
$dashletData['NCSDC_IncidentDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'name' => 'date_entered',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'inctype' => 
  array (
    'type' => 'enum',
    'default' => false,
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
    'default' => false,
    'name' => 'inctype_oth',
  ),
  'incident_date_time' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_INCIDENT_DATE_TIME',
    'width' => '10%',
    'default' => false,
    'name' => 'incident_date_time',
  ),
  'incident_report_date_time' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_INCIDENT_REPORT_DATE_TIME',
    'width' => '10%',
    'default' => false,
    'name' => 'incident_report_date_time',
  ),
  'inc_staff_reporter_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_STAFF_REPORTER_ID',
    'width' => '10%',
    'default' => false,
    'name' => 'inc_staff_reporter_id',
  ),
  'inc_staff_supervisor_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_STAFF_SUPERVISOR_ID',
    'width' => '10%',
    'default' => false,
    'name' => 'inc_staff_supervisor_id',
  ),
  'inc_recip_is_participant' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_RECIP_IS_PARTICIPANT',
    'width' => '10%',
    'default' => false,
    'name' => 'inc_recip_is_participant',
  ),
  'inc_recip_is_du' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_RECIP_IS_DU',
    'width' => '10%',
    'default' => false,
    'name' => 'inc_recip_is_du',
  ),
  'inc_recip_is_staff' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_RECIP_IS_STAFF',
    'width' => '10%',
    'default' => false,
    'name' => 'inc_recip_is_staff',
  ),
  'inc_recip_is_family' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_RECIP_IS_FAMILY',
    'width' => '10%',
    'default' => false,
    'name' => 'inc_recip_is_family',
  ),
  'inc_recip_is_acquaintance' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_RECIP_IS_ACQUAINTANCE',
    'width' => '10%',
    'default' => false,
    'name' => 'inc_recip_is_acquaintance',
  ),
  'inc_recip_is_other' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_INC_RECIP_IS_OTHER',
    'sortable' => false,
    'width' => '10%',
    'name' => 'inc_recip_is_other',
  ),
  'inc_contact_person' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_CONTACT_PERSON',
    'width' => '10%',
    'default' => false,
    'name' => 'inc_contact_person',
  ),
  'incloss_cmptr_model' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCLOSS_CMPTR_MODEL',
    'width' => '10%',
    'default' => false,
    'name' => 'incloss_cmptr_model',
  ),
  'incloss_cmptr_sn' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCLOSS_CMPTR_SN',
    'width' => '10%',
    'default' => false,
    'name' => 'incloss_cmptr_sn',
  ),
  'incloss_cmptr_decal' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCLOSS_CMPTR_DECAL',
    'width' => '10%',
    'default' => false,
    'name' => 'incloss_cmptr_decal',
  ),
  'incloss_rem_media' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCLOSS_REM_MEDIA',
    'width' => '10%',
    'default' => false,
    'name' => 'incloss_rem_media',
  ),
  'incloss_paper' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCLOSS_PAPER',
    'width' => '10%',
    'default' => false,
    'name' => 'incloss_paper',
  ),
  'incloss_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INCLOSS_OTH',
    'width' => '10%',
    'default' => false,
    'name' => 'incloss_oth',
  ),
  'inc_reported' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_INC_REPORTED',
    'sortable' => false,
    'width' => '10%',
    'name' => 'inc_reported',
  ),
  'inc_action' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_INC_ACTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
    'name' => 'inc_action',
  ),
  'inc_description' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_INC_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
    'name' => 'inc_description',
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'ncsdc_incidlt_person_name' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_incident_plt_person',
    'label' => 'LBL_NCSDC_INCIDENT_PLT_PERSON_FROM_PLT_PERSON_TITLE',
    'width' => '10%',
    'default' => false,
    'name' => 'ncsdc_incidlt_person_name',
  ),
  'ncsdc_incidellingunt_name' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_incidgt_dwellingunt',
    'label' => 'LBL_NCSDC_INCIDENT_GT_DWELLINGUNT_FROM_GT_DWELLINGUNT_TITLE',
    'width' => '10%',
    'default' => false,
    'name' => 'ncsdc_incidellingunt_name',
  ),
  'ncsdc_incidrticipant_name' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_incidlt_participant',
    'label' => 'LBL_NCSDC_INCIDENT_PLT_PARTICIPANT_FROM_PLT_PARTICIPANT_TITLE',
    'width' => '10%',
    'default' => false,
    'name' => 'ncsdc_incidrticipant_name',
  ),
  'ncsdc_incidstaffrstr_name' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_incidt_st_staffrstr',
    'label' => 'LBL_NCSDC_INCIDENT_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => false,
    'name' => 'ncsdc_incidstaffrstr_name',
  ),
  /*
  'ncsdc_cntct_incident_name' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_cntctncsdc_incident',
    'label' => 'LBL_NCSDC_CNTCTINFO_NCSDC_INCIDENT_FROM_NCSDC_CNTCTINFO_TITLE',
    'width' => '10%',
    'default' => false,
    'name' => 'ncsdc_cntct_incident_name',
  ),
  */
);
