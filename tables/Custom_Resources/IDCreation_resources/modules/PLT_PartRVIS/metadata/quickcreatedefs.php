<?php
$module_name = 'PLT_PartRVIS';
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
            'label' => 'Record Of Visit ID:',            
			'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ), 
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'rvis_sections',
            'studio' => 'visible',
            'label' => 'LBL_RVIS_SECTIONS',
          ),
          1 => 
          array (
            'name' => 'rvis_translate',
            'studio' => 'visible',
            'label' => 'LBL_RVIS_TRANSLATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'rvis_language',
            'studio' => 'visible',
            'label' => 'LBL_RVIS_LANGUAGE',
          ),
          1 => 
          array (
            'name' => 'rvis_language_oth',
            'label' => 'LBL_RVIS_LANGUAGE_OTH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'rvis_person',
            'label' => 'LBL_RVIS_PERSON',
          ),
          1 => 
          array (
            'name' => 'rvis_who_consented',
            'studio' => 'visible',
            'label' => 'LBL_RVIS_WHO_CONSENTED',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'time_stamp_1',
            'label' => 'LBL_TIME_STAMP_1',
          ),
          1 => 
          array (
            'name' => 'time_stamp_2',
            'label' => 'LBL_TIME_STAMP_2',
          ),
        ),
      ),
    ),
  ),
);
?>
