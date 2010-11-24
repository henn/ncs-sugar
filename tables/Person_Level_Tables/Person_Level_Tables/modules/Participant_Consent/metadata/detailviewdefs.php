<?php
$module_name = 'PLT_Participant_Consent';
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
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'consent_type',
            'studio' => 'visible',
            'label' => 'LBL_CONSENT_TYPE',
          ),
          1 => 
          array (
            'name' => 'participant_consent_id',
            'label' => 'LBL_PARTICIPANT_CONSENT_ID',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'consent_given',
            'studio' => 'visible',
            'label' => 'LBL_CONSENT_GIVEN',
          ),
          1 => 
          array (
            'name' => 'consent_date',
            'label' => 'LBL_CONSENT_DATE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'consent_withdraw',
            'studio' => 'visible',
            'label' => 'LBL_CONSENT_WITHDRAW',
          ),
          1 => 
          array (
            'name' => 'consent_withdraw_date',
            'label' => 'LBL_CONSENT_WITHDRAW_DATE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'consent_language',
            'studio' => 'visible',
            'label' => 'LBL_CONSENT_LANGUAGE',
          ),
          1 => 
          array (
            'name' => 'consent_language_oth',
            'label' => 'LBL_CONSENT_LANGUAGE_OTH',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'person_who_consented_id',
            'label' => 'LBL_PERSON_WHO_CONSENTED_ID',
          ),
          1 => 
          array (
            'name' => 'who_consented',
            'studio' => 'visible',
            'label' => 'LBL_WHO_CONSENTED',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'person_wthdrw_consent_id',
            'label' => 'LBL_PERSON_WTHDRW_CONSENT_ID',
          ),
          1 => 
          array (
            'name' => 'who_wthdrw_consent',
            'studio' => 'visible',
            'label' => 'LBL_WHO_WTHDRW_CONSENT',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'consent_translate',
            'studio' => 'visible',
            'label' => 'LBL_CONSENT_TRANSLATE',
          ),
          1 => '',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'consent_comments',
            'studio' => 'visible',
            'label' => 'LBL_CONSENT_COMMENTS',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
