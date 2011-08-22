<?php
$module_name = 'NCSDC_NIRRfsMltS';
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
            'label' => 'Name (NIR_REFUSAL_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'refusal_reason',
            'studio' => 'visible',
            'label' => 'LBL_REFUSAL_REASON',
          ),
          1 => 
          array (
            'name' => 'refusal_reason_oth',
            'label' => 'LBL_REFUSAL_REASON_OTH',
          ),
        ),
      ),
    ),
  ),
);
?>
