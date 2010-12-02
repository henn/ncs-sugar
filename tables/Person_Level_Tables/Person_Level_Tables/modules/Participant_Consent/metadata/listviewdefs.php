<?php
$module_name = 'PLT_Participant_Consent';
$listViewDefs [$module_name] = 
array (
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'modified_user_link',
    'label' => 'LBL_MODIFIED_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'WHO_WTHDRW_CONSENT' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_WHO_WTHDRW_CONSENT',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONSENT_TRANSLATE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_TRANSLATE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PERSON_WTHDRW_CONSENT_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PERSON_WTHDRW_CONSENT_ID',
    'width' => '10%',
    'default' => true,
  ),
  'WHO_CONSENTED' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_WHO_CONSENTED',
    'sortable' => false,
    'width' => '10%',
  ),
  'PERSON_WHO_CONSENTED_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PERSON_WHO_CONSENTED_ID',
    'width' => '10%',
    'default' => true,
  ),
  'CONSENT_LANGUAGE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONSENT_LANGUAGE_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'CONSENT_LANGUAGE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_LANGUAGE',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONSENT_WITHDRAW_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_WITHDRAW_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONSENT_WITHDRAW_DATE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONSENT_WITHDRAW_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'CONSENT_WITHDRAW' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_WITHDRAW',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONSENT_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CONSENT_DATE',
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
  'CONSENT_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PARTICIPANT_CONSENT_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PARTICIPANT_CONSENT_ID',
    'width' => '10%',
    'default' => true,
  ),
  'CONSENT_COMMENTS' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_CONSENT_COMMENTS',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
);
?>
