<?php
$module_name = 'PLT_PartSampCon';
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
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'sample_consent_type',
            'studio' => 'visible',
            'label' => 'LBL_SAMPLE_CONSENT_TYPE',
          ),
          1 => 
          array (
            'name' => 'sample_consent_given',
            'studio' => 'visible',
            'label' => 'LBL_SAMPLE_CONSENT_GIVEN',
          ),
        ),
      ),
    ),
  ),
);
?>
