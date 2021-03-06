<?php
$module_name = 'PLT_PersonRace';
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
            'label' => 'Name (PERSON_RACE_ID):',
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
          0 => 
          array (
            'name' => 'race',
            'studio' => 'visible',
            'label' => 'LBL_RACE',
          ),
          1 => 
          array (
            'name' => 'race_oth',
            'label' => 'LBL_RACE_OTH',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'plt_person_ersonrace_name',
            'label' => 'LBL_PLT_PERSON_PLT_PERSONRACE_FROM_PLT_PERSON_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
