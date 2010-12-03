<?php
$module_name = 'NCSDC_NON_INTERVIEW_RPT_DUTYPE';
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
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'nir_dutype_id',
            'label' => 'LBL_NIR_DUTYPE_ID',
          ),
          1 => 
          array (
            'name' => 'nir_type_du',
            'studio' => 'visible',
            'label' => 'LBL_NIR_TYPE_DU',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'nir_type_du_oth',
            'label' => 'LBL_NIR_TYPE_DU_OTH',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
