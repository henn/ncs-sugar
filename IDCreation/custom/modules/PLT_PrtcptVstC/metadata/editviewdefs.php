<?php
$module_name = 'PLT_PrtcptVstC';
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
            'label' => 'Name (PID_VISIT_CONSENT_ID):',
'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
        1 => 
        array (
          0 => '',
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'vis_consent_type',
            'studio' => 'visible',
            'label' => 'LBL_VIS_CONSENT_TYPE',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'vis_consent_response',
            'studio' => 'visible',
            'label' => 'LBL_VIS_CONSENT_RESPONSE',
          ),
          1 => '',
        ),
        4 => 
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
        5 => 
        array (
          0 => 
          array (
            'name' => 'vis_who_consented',
            'studio' => 'visible',
            'label' => 'LBL_VIS_WHO_CONSENTED',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'vis_translate',
            'studio' => 'visible',
            'label' => 'LBL_VIS_TRANSLATE',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'vis_comments',
            'studio' => 'visible',
            'label' => 'LBL_VIS_COMMENTS',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'plt_participant_plt_participant_visit_consent_name',
          ),
          1 => 
          array (
            'name' => 'plt_participant_plt_prtcptvstc_name',
          ),
        ),
      ),
    ),
  ),
);
?>
