<?php
$module_name = 'ST_StaffRstr';
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
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'staff_type',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_TYPE',
          ),
          1 => 
          array (
            'name' => 'staff_type_oth',
            'label' => 'LBL_STAFF_TYPE_OTH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'staff_exp',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_EXP',
          ),
          1 => 
          array (
            'name' => 'subcontractor',
            'studio' => 'visible',
            'label' => 'LBL_SUBCONTRACTOR',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'ncs_active_date',
            'label' => 'LBL_NCS_ACTIVE_DATE',
          ),
          1 => 
          array (
            'name' => 'ncs_inactive_date',
            'label' => 'LBL_NCS_INACTIVE_DATE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'staff_comment',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_COMMENT',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'gt_study_center_st_staff_name',
          ),
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'staff_gender',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_GENDER',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'staff_yob',
            'label' => 'LBL_STAFF_YOB',
          ),
          1 => 
          array (
            'name' => 'staff_age_range',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_AGE_RANGE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'staff_ethnicity',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_ETHNICITY',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'staff_race',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_RACE',
          ),
          1 => 
          array (
            'name' => 'staff_race_oth',
            'label' => 'LBL_STAFF_RACE_OTH',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'staff_zip',
            'label' => 'LBL_STAFF_ZIP',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
