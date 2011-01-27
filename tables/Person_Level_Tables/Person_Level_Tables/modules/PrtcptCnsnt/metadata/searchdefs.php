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
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
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
      'participant_consent_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PARTICIPANT_CONSENT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'participant_consent_id',
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
      'consent_language_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CONSENT_LANGUAGE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'consent_language_oth',
      ),
      'consent_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_CONSENT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'consent_date',
      ),
      'assigned_user_name' => 
      array (
        'link' => 'assigned_user_link',
        'type' => 'relate',
        'label' => 'LBL_ASSIGNED_TO_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'assigned_user_name',
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
      'person_who_consented_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PERSON_WHO_CONSENTED_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'person_who_consented_id',
      ),
      'person_wthdrw_consent_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PERSON_WTHDRW_CONSENT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'person_wthdrw_consent_id',
      ),
      'who_wthdrw_consent' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_WHO_WTHDRW_CONSENT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'who_wthdrw_consent',
      ),
      'consent_translate' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CONSENT_TRANSLATE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'consent_translate',
      ),
      'consent_comments' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_CONSENT_COMMENTS',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'consent_comments',
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
