<?php
$module_name = 'PLT_PartRVIS';
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
            'name' => 'rvis_sections',
            'studio' => 'visible',
            'label' => 'LBL_RVIS_SECTIONS',
          ),
          1 => 
          array (
            'name' => 'rvis_translate',
            'studio' => 'visible',
            'label' => 'LBL_RVIS_TRANSLATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'rvis_language',
            'studio' => 'visible',
            'label' => 'LBL_RVIS_LANGUAGE',
          ),
          1 => 
          array (
            'name' => 'rvis_language_oth',
            'label' => 'LBL_RVIS_LANGUAGE_OTH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'rvis_person',
            'label' => 'LBL_RVIS_PERSON',
          ),
          1 => 
          array (
            'name' => 'rvis_who_consented',
            'studio' => 'visible',
            'label' => 'LBL_RVIS_WHO_CONSENTED',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'time_stamp_1',
            'label' => 'LBL_TIME_STAMP_1',
          ),
          1 => 
          array (
            'name' => 'time_stamp_2',
            'label' => 'LBL_TIME_STAMP_2',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'plt_partrvirticipant_name',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'rvis_during_interv',
            'studio' => 'visible',
            'label' => 'LBL_RVIS_DURING_INTERV',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'rvis_during_bio',
            'studio' => 'visible',
            'label' => 'LBL_RVIS_DURING_BIO',
          ),
          1 => 
          array (
            'name' => 'rvis_bio_cord',
            'studio' => 'visible',
            'label' => 'LBL_RVIS_BIO_CORD',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'rvis_during_env',
            'studio' => 'visible',
            'label' => 'LBL_RVIS_DURING_ENV',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'rvis_during_thanks',
            'studio' => 'visible',
            'label' => 'LBL_RVIS_DURING_THANKS',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'rvis_after_saq',
            'studio' => 'visible',
            'label' => 'LBL_RVIS_AFTER_SAQ',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'rvis_reconsideration',
            'studio' => 'visible',
            'label' => 'LBL_RVIS_RECONSIDERATION',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
