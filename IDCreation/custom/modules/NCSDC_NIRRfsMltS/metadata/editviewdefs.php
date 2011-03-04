<?php
$module_name = 'NCSDC_NIRRfsMltS';
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
            'label' => 'Name (NIR_REFUSAL_ID):',
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
          1 => 
          array (
            'name' => 'nir_id',
            'label' => 'LBL_NIR_ID',
          ),
        ),
        2 => 
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
        3 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_event_ncsdc_non_interview_rpt_refusal_name',
          ),
          1 => 
          array (
            'name' => 'ncsdc_eventinfo_ncsdc_nirrfsmlts_name',
          ),
        ),
      ),
    ),
  ),
);
?>
