<?php
$module_name = 'PLT_PrtcptCnsnt';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'PLT_PARTICITCPTCNSNT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'plt_particilt_prtcptcnsnt',
    'label' => 'LBL_PLT_PARTICIPANT_PLT_PRTCPTCNSNT_FROM_PLT_PARTICIPANT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'CONSENT_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONSENT_FORM_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_FORM_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONSENT_VERSION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONSENT_VERSION',
    'width' => '10%',
    'default' => true,
  ),
  'CONSENT_GIVEN' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_GIVEN',
    'sortable' => false,
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'CONSENT_COMMENTS' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_COMMENTS',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'CONSENT_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CONSENT_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'CONSENT_EXPIRATION' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CONSENT_EXPIRATION',
    'width' => '10%',
    'default' => false,
  ),
  'CONSENT_WITHDRAW_TYPE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_WITHDRAW_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONSENT_WITHDRAW' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_WITHDRAW',
    'sortable' => false,
    'width' => '10%',
  ),
  'PERSON_WHO_CONSENTED_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PERSON_WHO_CONSENTED_ID',
    'width' => '10%',
    'default' => false,
  ),
  'WHO_CONSENTED' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_WHO_CONSENTED',
    'sortable' => false,
    'width' => '10%',
  ),
  'PERSON_WTHDRW_CONSENT_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PERSON_WTHDRW_CONSENT_ID',
    'width' => '10%',
    'default' => false,
  ),
  'RECONSIDERATION_SCRIPT_USE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RECONSIDERATION_SCRIPT_USE',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONSENT_WITHDRAW_REASON' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_WITHDRAW_REASON',
    'sortable' => false,
    'width' => '10%',
  ),
  'WHO_WTHDRW_CONSENT' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_WHO_WTHDRW_CONSENT',
    'sortable' => false,
    'width' => '10%',
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => false,
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'modified_user_link',
    'label' => 'LBL_MODIFIED_NAME',
    'width' => '10%',
    'default' => false,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => false,
  ),
  'CONSENT_WITHDRAW_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CONSENT_WITHDRAW_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'CONSENT_LANGUAGE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_LANGUAGE',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONSENT_TRANSLATE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_TRANSLATE',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONSENT_LANGUAGE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONSENT_LANGUAGE_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
?>
