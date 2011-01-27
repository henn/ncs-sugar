<?php
$module_name = 'PLT_PrtcptCnsnt';
$viewdefs [$module_name] = 
array (
  'EditView' => 
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
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'date_entered',
            'comment' => 'Date record created',
            'label' => 'LBL_DATE_ENTERED',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'modified_by_name',
            'label' => 'LBL_MODIFIED_NAME',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'comment' => 'Date record last modified',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'plt_participant_plt_participant_consent_name',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'participant_consent_id',
            'label' => 'LBL_PARTICIPANT_CONSENT_ID',
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
            'name' => 'consent_given',
            'studio' => 'visible',
            'label' => 'LBL_CONSENT_GIVEN',
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
        ),
        3 => 
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
        4 => 
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
        7 => 
        array (
          0 => 
          array (
            'name' => 'consent_translate',
            'studio' => 'visible',
            'label' => 'LBL_CONSENT_TRANSLATE',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'consent_withdraw_type',
            'studio' => 'visible',
            'label' => 'LBL_CONSENT_WITHDRAW_TYPE',
          ),
          1 => 
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
