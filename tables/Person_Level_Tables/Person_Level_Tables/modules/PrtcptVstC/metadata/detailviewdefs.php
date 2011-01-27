<?php
$module_name = 'PLT_PrtcptVstC';
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
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'pid_visit_consent_id',
            'label' => 'LBL_PID_VISIT_CONSENT_ID',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'vis_consent_type',
            'studio' => 'visible',
            'label' => 'LBL_VIS_CONSENT_TYPE',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'vis_consent_response',
            'studio' => 'visible',
            'label' => 'LBL_VIS_CONSENT_RESPONSE',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'vis_language',
            'studio' => 'visible',
            'label' => 'LBL_VIS_LANGUAGE',
          ),
          1 => 
          array (
            'name' => 'vis_language_oth',
            'label' => 'LBL_VIS_LANGUAGE_OTH',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'vis_who_consented',
            'studio' => 'visible',
            'label' => 'LBL_VIS_WHO_CONSENTED',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'vis_translate',
            'studio' => 'visible',
            'label' => 'LBL_VIS_TRANSLATE',
          ),
          1 => '',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'vis_comments',
            'studio' => 'visible',
            'label' => 'LBL_VIS_COMMENTS',
          ),
          1 => '',
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'plt_participant_plt_participant_visit_consent_name',
          ),
        ),
      ),
    ),
  ),
);
?>
