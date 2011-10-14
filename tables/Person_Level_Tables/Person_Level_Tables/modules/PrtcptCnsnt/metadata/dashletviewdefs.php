<?php
$dashletData['PLT_PrtcptCnsntDashlet']['searchFields'] = array (
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
$dashletData['PLT_PrtcptCnsntDashlet']['columns'] = array (
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
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'consent_type' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'consent_given' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_GIVEN',
    'sortable' => false,
    'width' => '10%',
  ),
  'consent_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CONSENT_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'consent_withdraw' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_WITHDRAW',
    'sortable' => false,
    'width' => '10%',
  ),
  'consent_language' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_LANGUAGE',
    'sortable' => false,
    'width' => '10%',
  ),
  'consent_language_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONSENT_LANGUAGE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'person_who_consented_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PERSON_WHO_CONSENTED_ID',
    'width' => '10%',
    'default' => false,
  ),
  'who_consented' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_WHO_CONSENTED',
    'sortable' => false,
    'width' => '10%',
  ),
  'person_wthdrw_consent_id' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PERSON_WTHDRW_CONSENT_ID',
    'width' => '10%',
    'default' => false,
  ),
  'who_wthdrw_consent' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_WHO_WTHDRW_CONSENT',
    'sortable' => false,
    'width' => '10%',
  ),
  'consent_translate' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_TRANSLATE',
    'sortable' => false,
    'width' => '10%',
  ),
  'consent_comments' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_COMMENTS',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'consent_withdraw_type' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_WITHDRAW_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'consent_withdraw_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CONSENT_WITHDRAW_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'consent_version' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONSENT_VERSION',
    'width' => '10%',
    'default' => false,
  ),
  'consent_expiration' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CONSENT_EXPIRATION',
    'width' => '10%',
    'default' => false,
  ),
  'consent_withdraw_reason' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_WITHDRAW_REASON',
    'sortable' => false,
    'width' => '10%',
  ),
  'consent_form_type' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_FORM_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'reconsideration_script_use' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RECONSIDERATION_SCRIPT_USE',
    'sortable' => false,
    'width' => '10%',
  ),
  'plt_particitcptcnsnt_name' => 
  array (
    'type' => 'relate',
    'link' => 'plt_particilt_prtcptcnsnt',
    'label' => 'LBL_PLT_PARTICIPANT_PLT_PRTCPTCNSNT_FROM_PLT_PARTICIPANT_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
);
