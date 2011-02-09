<?php
$module_name = 'NCSDC_CntctInfo';
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
            'name' => 'contact_id',
            'label' => 'LBL_CONTACT_ID',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'contact_disp',
            'label' => 'LBL_CONTACT_DISP',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'contact_type',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_TYPE',
          ),
          1 => 
          array (
            'name' => 'contact_type_oth',
            'label' => 'LBL_CONTACT_TYPE_OTH',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'contact_date',
            'label' => 'LBL_CONTACT_DATE',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'contact_start_time',
            'label' => 'LBL_CONTACT_START_TIME',
          ),
          1 => 
          array (
            'name' => 'contact_end_time',
            'label' => 'LBL_CONTACT_END_TIME',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'contact_lang',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_LANG',
          ),
          1 => 
          array (
            'name' => 'contact_lang_oth',
            'label' => 'LBL_CONTACT_LANG_OTH',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'contact_interpret',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_INTERPRET',
          ),
          1 => 
          array (
            'name' => 'contact_interpret_oth',
            'label' => 'LBL_CONTACT_INTERPRET_OTH',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'contact_location',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_LOCATION',
          ),
          1 => 
          array (
            'name' => 'contact_location_oth',
            'label' => 'LBL_CONTACT_LOCATION_OTH',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'contact_private',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_PRIVATE',
          ),
          1 => '',
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'contact_private_detail',
            'label' => 'LBL_CONTACT_PRIVATE_DETAIL',
          ),
          1 => '',
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'contact_distance',
            'label' => 'LBL_CONTACT_DISTANCE',
          ),
          1 => '',
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'who_contacted',
            'studio' => 'visible',
            'label' => 'LBL_WHO_CONTACTED',
          ),
          1 => 
          array (
            'name' => 'who_contact_oth',
            'label' => 'LBL_WHO_CONTACT_OTH',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'contact_comment',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_COMMENT',
          ),
        ),
      ),
    ),
  ),
);
?>
