<?php
$module_name = 'NCSDC_CONTACT';
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
          0 => 'name',
          1 => 'assigned_user_name',
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
          0 => 'description',
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
            'name' => 'contact_id',
            'label' => 'LBL_CONTACT_ID',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'contact_disp',
            'label' => 'LBL_CONTACT_DISP',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'contact_type',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_TYPE',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'contact_type_oth',
            'label' => 'LBL_CONTACT_TYPE_OTH',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'contact_date',
            'label' => 'LBL_CONTACT_DATE',
          ),
          1 => '',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'contact_start_time',
            'label' => 'LBL_CONTACT_START_TIME',
          ),
          1 => '',
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'contact_end_time',
            'label' => 'LBL_CONTACT_END_TIME',
          ),
          1 => '',
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'contact_lang',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_LANG',
          ),
          1 => '',
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'contact_lang_oth',
            'label' => 'LBL_CONTACT_LANG_OTH',
          ),
          1 => '',
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'contact_interpret',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_INTERPRET',
          ),
          1 => '',
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'contact_interpret_oth',
            'label' => 'LBL_CONTACT_INTERPRET_OTH',
          ),
          1 => '',
        ),
        15 => 
        array (
          0 => 
          array (
            'name' => 'contact_location',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_LOCATION',
          ),
          1 => '',
        ),
        16 => 
        array (
          0 => 
          array (
            'name' => 'contact_location_oth',
            'label' => 'LBL_CONTACT_LOCATION_OTH',
          ),
          1 => '',
        ),
        17 => 
        array (
          0 => 
          array (
            'name' => 'contact_private',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_PRIVATE',
          ),
          1 => '',
        ),
        18 => 
        array (
          0 => 
          array (
            'name' => 'contact_private_detail',
            'label' => 'LBL_CONTACT_PRIVATE_DETAIL',
          ),
          1 => '',
        ),
        19 => 
        array (
          0 => 
          array (
            'name' => 'contact_distance',
            'label' => 'LBL_CONTACT_DISTANCE',
          ),
          1 => '',
        ),
        20 => 
        array (
          0 => 
          array (
            'name' => 'who_contacted',
            'studio' => 'visible',
            'label' => 'LBL_WHO_CONTACTED',
          ),
          1 => '',
        ),
        21 => 
        array (
          0 => 
          array (
            'name' => 'who_contact_oth',
            'label' => 'LBL_WHO_CONTACT_OTH',
          ),
          1 => '',
        ),
        22 => 
        array (
          0 => 
          array (
            'name' => 'contact_comment',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_COMMENT',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
