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
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'psu_id',
            'studio' => 'visible',
            'label' => 'LBL_PSU_ID',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'staff_cert_list_id',
            'label' => 'LBL_STAFF_CERT_LIST_ID',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'staff_id',
            'label' => 'LBL_STAFF_ID',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'cert_train_type',
            'studio' => 'visible',
            'label' => 'LBL_CERT_TRAIN_TYPE',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'cert_completed',
            'studio' => 'visible',
            'label' => 'LBL_CERT_COMPLETED',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'cert_date',
            'label' => 'LBL_CERT_DATE',
          ),
          1 => '',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'staff_bgcheck_lvl',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_BGCHECK_LVL',
          ),
          1 => '',
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'cert_type_frequency',
            'label' => 'LBL_CERT_TYPE_FREQUENCY',
          ),
          1 => '',
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'cert_type_exp_date',
            'label' => 'LBL_CERT_TYPE_EXP_DATE',
          ),
          1 => '',
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'cert_comment',
            'studio' => 'visible',
            'label' => 'LBL_CERT_COMMENT',
          ),
          1 => '',
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'st_staff_st_staff_cert_training_name',
          ),
          1 => 
          array (
            'name' => 'st_staffrstr_st_stfcrttrn_name',
          ),
        ),
      ),
    ),
  ),
);
?>
