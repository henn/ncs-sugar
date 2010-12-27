<?php
$module_name = 'ST_STAFF';
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
            'name' => 'psu_id',
            'studio' => 'visible',
            'label' => 'LBL_PSU_ID',
          ),
          1 => 
          array (
            'name' => 'staff_id',
            'label' => 'LBL_STAFF_ID',
          ),
        ),
        3 => 
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
        4 => 
        array (
          0 => 
          array (
            'name' => 'subcontractor',
            'studio' => 'visible',
            'label' => 'LBL_SUBCONTRACTOR',
          ),
          1 => 
          array (
            'name' => 'staff_yob',
            'label' => 'LBL_STAFF_YOB',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'staff_age_range',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_AGE_RANGE',
          ),
          1 => 
          array (
            'name' => 'staff_gender',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_GENDER',
          ),
        ),
        6 => 
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
        7 => 
        array (
          0 => 
          array (
            'name' => 'staff_ethnicity',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_ETHNICITY',
          ),
          1 => 
          array (
            'name' => 'staff_exp',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_EXP',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'staff_comment',
            'studio' => 'visible',
            'label' => 'LBL_STAFF_COMMENT',
          ),
          1 => '',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'gt_study_center_st_staff_name',
          ),
        ),
      ),
    ),
  ),
);
?>
