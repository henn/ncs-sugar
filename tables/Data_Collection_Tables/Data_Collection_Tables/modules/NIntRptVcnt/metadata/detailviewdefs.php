<?php
$module_name = 'NCSDC_NIntRptVcnt';
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
            'name' => 'nir_vacant',
            'studio' => 'visible',
            'label' => 'LBL_NIR_VACANT',
          ),
          1 => 
          array (
            'name' => 'nir_vacant_oth',
            'label' => 'LBL_NIR_VACANT_OTH',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_event_ncsdc_non_interview_rpt_vacant_name',
          ),
          1 => 
          array (
            'name' => 'ncsdc_noninntrptvcnt_name',
          ),
        ),
      ),
    ),
  ),
);
?>
