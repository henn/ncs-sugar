<?php
$module_name = 'OLT_Institution';
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
            'name' => 'institute_id',
            'label' => 'LBL_INSTITUTE_ID',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'institute_type',
            'studio' => 'visible',
            'label' => 'LBL_INSTITUTE_TYPE',
          ),
          1 => 
          array (
            'name' => 'institute_type_oth',
            'label' => 'LBL_INSTITUTE_TYPE_OTH',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'institute_relation',
            'studio' => 'visible',
            'label' => 'LBL_INSTITUTE_RELATION',
          ),
          1 => 
          array (
            'name' => 'institute_relation_oth',
            'label' => 'LBL_INSTITUTE_RELATION_OTH',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'institute_owner',
            'studio' => 'visible',
            'label' => 'LBL_INSTITUTE_OWNER',
          ),
          1 => 
          array (
            'name' => 'institute_owner_oth',
            'label' => 'LBL_INSTITUTE_OWNER_OTH',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'institute_size',
            'label' => 'LBL_INSTITUTE_SIZE',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'institute_unit',
            'studio' => 'visible',
            'label' => 'LBL_INSTITUTE_UNIT',
          ),
          1 => 
          array (
            'name' => 'institute_unit_oth',
            'label' => 'LBL_INSTITUTE_UNIT_OTH',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'institute_info_source',
            'studio' => 'visible',
            'label' => 'LBL_INSTITUTE_INFO_SOURCE',
          ),
          1 => 
          array (
            'name' => 'institute_info_source_oth',
            'label' => 'LBL_INSTITUTE_INFO_SOURCE_OTH',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'institute_info_date',
            'label' => 'LBL_INSTITUTE_INFO_DATE',
          ),
          1 => 
          array (
            'name' => 'institute_info_update',
            'label' => 'LBL_INSTITUTE_INFO_UPDATE',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'institute_comment',
            'studio' => 'visible',
            'label' => 'LBL_INSTITUTE_COMMENT',
          ),
        ),
      ),
    ),
  ),
);
?>
