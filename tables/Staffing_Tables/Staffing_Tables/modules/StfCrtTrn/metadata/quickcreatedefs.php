<?php
$module_name = 'ST_StfCrtTrn';
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
            'name' => 'staff_cert_list_id',
            'label' => 'LBL_STAFF_CERT_LIST_ID',
          ),
          1 => 
          array (
            'name' => 'staff_id',
            'label' => 'LBL_STAFF_ID',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'cert_train_type',
            'studio' => 'visible',
            'label' => 'LBL_CERT_TRAIN_TYPE',
          ),
          1 => '',
        ),
        3 => 
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
        4 => 
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
        5 => 
        array (
          0 => 
          array (
            'name' => 'cert_comment',
            'studio' => 'visible',
            'label' => 'LBL_CERT_COMMENT',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'staff_bgcheck_lvl',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_BGCHECK_LVL',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
