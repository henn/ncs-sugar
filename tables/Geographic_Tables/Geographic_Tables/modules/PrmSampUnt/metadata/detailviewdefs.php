<?php
$module_name = 'GT_PrmSampUnt';
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
            'name' => 'sc_id',
            'label' => 'LBL_SC_ID',
          ),
          1 => 
          array (
            'name' => 'psu_name',
            'studio' => 'visible',
            'label' => 'LBL_PSU_NAME',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'recruit_type',
            'studio' => 'visible',
            'label' => 'LBL_RECRUIT_TYPE',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'gt_studycntrmsampunt_name',
            'label' => 'LBL_GT_STUDYCNTR_GT_PRMSAMPUNT_FROM_GT_STUDYCNTR_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
