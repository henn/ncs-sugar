<?php
$module_name = 'ST_StfCrtTrn';
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
            'name' => 'cert_train_type',
            'studio' => 'visible',
            'label' => 'LBL_CERT_TRAIN_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'cert_completed',
            'studio' => 'visible',
            'label' => 'LBL_CERT_COMPLETED',
          ),
          1 => 
          array (
            'name' => 'cert_date',
            'label' => 'LBL_CERT_DATE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'cert_type_exp_date',
            'label' => 'LBL_CERT_TYPE_EXP_DATE',
          ),
          1 => 
          array (
            'name' => 'cert_type_frequency',
            'label' => 'LBL_CERT_TYPE_FREQUENCY',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'cert_comment',
            'studio' => 'visible',
            'label' => 'LBL_CERT_COMMENT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'staff_bgcheck_lvl',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_BGCHECK_LVL',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'st_staffrststfcrttrn_name',
            'label' => 'LBL_ST_STAFFRSTR_ST_STFCRTTRN_FROM_ST_STAFFRSTR_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
