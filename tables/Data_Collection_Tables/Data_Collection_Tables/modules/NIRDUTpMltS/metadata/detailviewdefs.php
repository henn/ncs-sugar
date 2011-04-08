<?php
$module_name = 'NCSDC_NIRDUTpMltS';
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
          0 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'nir_type_du',
            'studio' => 'visible',
            'label' => 'LBL_NIR_TYPE_DU',
          ),
          1 => 
          array (
            'name' => 'nir_type_du_oth',
            'label' => 'LBL_NIR_TYPE_DU_OTH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_event_ncsdc_non_interview_rpt_dutype_name',
          ),
          1 => 
          array (
            'name' => 'ncsdc_event_ncsdc_non_interview_rpt_dutype_1_name',
          ),
        ),
      ),
    ),
  ),
);
?>
