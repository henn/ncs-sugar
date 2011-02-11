<?php
$module_name = 'PLT_PrtcptCnsnt';
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
      'consent_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CONSENT_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'consent_type',
      ),
      'consent_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_CONSENT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'consent_date',
      ),
      'consent_given' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CONSENT_GIVEN',
        'sortable' => false,
        'width' => '10%',
        'name' => 'consent_given',
      ),
      'consent_language' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CONSENT_LANGUAGE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'consent_language',
      ),
      'consent_withdraw' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CONSENT_WITHDRAW',
        'sortable' => false,
        'width' => '10%',
        'name' => 'consent_withdraw',
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
      'consent_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CONSENT_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'consent_type',
      ),
      'consent_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_CONSENT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'consent_date',
      ),
      'consent_given' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CONSENT_GIVEN',
        'sortable' => false,
        'width' => '10%',
        'name' => 'consent_given',
      ),
      'person_who_consented_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PERSON_WHO_CONSENTED_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'person_who_consented_id',
      ),
      'consent_withdraw' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CONSENT_WITHDRAW',
        'sortable' => false,
        'width' => '10%',
        'name' => 'consent_withdraw',
      ),
      'consent_withdraw_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CONSENT_WITHDRAW_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'consent_withdraw_type',
      ),
      'consent_withdraw_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_CONSENT_WITHDRAW_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'consent_withdraw_date',
      ),
      'person_wthdrw_consent_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PERSON_WTHDRW_CONSENT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'person_wthdrw_consent_id',
      ),
      'consent_language' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CONSENT_LANGUAGE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'consent_language',
      ),
      'who_consented' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_WHO_CONSENTED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'who_consented',
      ),
      'participant_consent_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PARTICIPANT_CONSENT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'participant_consent_id',
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
