<?php
$module_name = 'PLT_PrtcptVstC';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
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
            'label' => 'Name (Visit Consent ID):',            
			'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),          
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'vis_consent_type',
            'studio' => 'visible',
            'label' => 'LBL_VIS_CONSENT_TYPE',
          ),
          1 => 
          array (
            'name' => 'vis_consent_response',
            'studio' => 'visible',
            'label' => 'LBL_VIS_CONSENT_RESPONSE',
          ),
        ),
        2 => 
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
        3 => 
        array (
          0 => 
          array (
            'name' => 'vis_who_consented',
            'studio' => 'visible',
            'label' => 'LBL_VIS_WHO_CONSENTED',
          ),
          1 => 
          array (
            'name' => 'vis_translate',
            'studio' => 'visible',
            'label' => 'LBL_VIS_TRANSLATE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'vis_comments',
            'studio' => 'visible',
            'label' => 'LBL_VIS_COMMENTS',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
