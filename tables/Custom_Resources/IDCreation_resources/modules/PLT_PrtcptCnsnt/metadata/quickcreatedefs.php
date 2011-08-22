<?php
$module_name = 'PLT_PrtcptCnsnt';
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
            'label' => 'Participant Consent ID:',            
			'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ), 
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'consent_type',
            'studio' => 'visible',
            'label' => 'LBL_CONSENT_TYPE',
          ),
          1 => 
          array (
            'name' => 'consent_date',
            'label' => 'LBL_CONSENT_DATE',
          ),
        ),
        2 => 
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
        3 => 
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
