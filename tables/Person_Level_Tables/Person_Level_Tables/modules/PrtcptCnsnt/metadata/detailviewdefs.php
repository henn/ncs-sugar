<?php
$module_name = 'PLT_PrtcptCnsnt';
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
      'lbl_detailview_panel1' => 
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
            'name' => 'plt_particitcptcnsnt_name',
            'label' => 'LBL_PLT_PARTICIPANT_PLT_PRTCPTCNSNT_FROM_PLT_PARTICIPANT_TITLE',
          ),
          1 => '',
        ),
      ),
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'consent_form_type',
            'studio' => 'visible',
            'label' => 'LBL_CONSENT_FORM_TYPE',
          ),
          1 => 
          array (
            'name' => 'consent_date',
            'label' => 'LBL_CONSENT_DATE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'consent_version',
            'label' => 'LBL_CONSENT_VERSION',
          ),
          1 => 
          array (
            'name' => 'consent_expiration',
            'label' => 'LBL_CONSENT_EXPIRATION',
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
            'name' => 'consent_given',
            'studio' => 'visible',
            'label' => 'LBL_CONSENT_GIVEN',
          ),
        ),
        3 => 
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
        4 => 
        array (
          0 => 
          array (
            'name' => 'consent_translate',
            'studio' => 'visible',
            'label' => 'LBL_CONSENT_TRANSLATE',
          ),
          1 => '',
        ),
        5 => 
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
        6 => 
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
        7 => 
        array (
          0 => 
          array (
            'name' => 'consent_withdraw_type',
            'studio' => 'visible',
            'label' => 'LBL_CONSENT_WITHDRAW_TYPE',
          ),
          1 => 
          array (
            'name' => 'consent_withdraw_reason',
            'studio' => 'visible',
            'label' => 'LBL_CONSENT_WITHDRAW_REASON',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'who_wthdrw_consent',
            'studio' => 'visible',
            'label' => 'LBL_WHO_WTHDRW_CONSENT',
          ),
          1 => 
          array (
            'name' => 'person_wthdrw_consent_id',
            'label' => 'LBL_PERSON_WTHDRW_CONSENT_ID',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'reconsideration_script_use',
            'studio' => 'visible',
            'label' => 'LBL_RECONSIDERATION_SCRIPT_USE',
          ),
          1 => '',
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'consent_comments',
            'studio' => 'visible',
            'label' => 'LBL_CONSENT_COMMENTS',
          ),
        ),
      ),
    ),
  ),
);
?>
