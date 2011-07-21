<?php
$module_name = 'SAMP_EnLogEquip';
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
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'equipment_type',
            'studio' => 'visible',
            'label' => 'LBL_EQUIPMENT_TYPE',
          ),
          1 => 
          array (
            'name' => 'equipment_type_oth',
            'label' => 'LBL_EQUIPMENT_TYPE_OTH',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'problem_dt',
            'label' => 'LBL_PROBLEM_DT',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'equip_issue',
            'studio' => 'visible',
            'label' => 'LBL_EQUIP_ISSUE',
          ),
          1 => 
          array (
            'name' => 'equip_action',
            'studio' => 'visible',
            'label' => 'LBL_EQUIP_ACTION',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'samp_envequstaffrstr_name',
          ),
          1 => 
          array (
            'name' => 'samp_enlogep_enequip_name',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'samp_enloge_srscinfo_name',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'staff_id_reviewer',
            'label' => 'LBL_STAFF_ID_REVIEWER',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
