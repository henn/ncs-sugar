<?php
$module_name = 'LTT_Email';
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
            'label' => 'Name (EMAIL_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'email',
            'label' => 'LBL_EMAIL',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'email_type',
            'studio' => 'visible',
            'label' => 'LBL_EMAIL_TYPE',
          ),
          1 => 
          array (
            'name' => 'email_type_oth',
            'label' => 'LBL_EMAIL_TYPE_OTH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'email_share',
            'studio' => 'visible',
            'label' => 'LBL_EMAIL_SHARE',
          ),
          1 => 
          array (
            'name' => 'email_active',
            'studio' => 'visible',
            'label' => 'LBL_EMAIL_ACTIVE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'email_start_date',
            'label' => 'LBL_EMAIL_START_DATE',
          ),
          1 => 
          array (
            'name' => 'email_end_date',
            'label' => 'LBL_EMAIL_END_DATE',
          ),
        ),
      ),
    ),
  ),
);
?>
