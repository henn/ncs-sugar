<?php
$module_name = 'OLT_Institution';
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
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'institute_name',
            'label' => 'LBL_INSTITUTE_NAME',
          ),
          1 => '',
        ),
        2 => 
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
        3 => 
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
        4 => 
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
        5 => 
        array (
          0 => 
          array (
            'name' => 'institute_size',
            'label' => 'LBL_INSTITUTE_SIZE',
          ),
          1 => '',
        ),
        6 => 
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
        7 => 
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
        8 => 
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
        9 => 
        array (
          0 => 
          array (
            'name' => 'institute_comment',
            'studio' => 'visible',
            'label' => 'LBL_INSTITUTE_COMMENT',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
