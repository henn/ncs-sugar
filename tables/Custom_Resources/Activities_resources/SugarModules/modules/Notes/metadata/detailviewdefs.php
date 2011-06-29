<?php
$viewdefs ['Notes'] = 
array (
  'DetailView' => 
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
      'lbl_note_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_SUBJECT',
          ),
          1 => 
          array (
            'name' => 'parent_name',
            'customLabel' => '{sugar_translate label=\'LBL_MODULE_NAME\' module=$fields.parent_type.value}',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_eventnfo_notes_name',
            'label' => 'LBL_NCSDC_EVENTINFO_NOTES_FROM_NCSDC_EVENTINFO_TITLE',
          ),
        ),
        2 => 
        array (
          0 => 'assigned_user_name',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'start_date_time_c',
            'label' => 'LBL_START_DATE_TIME',
          ),
          1 => 
          array (
            'name' => 'end_date_time_c',
            'label' => 'LBL_END_DATE_TIME',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'contact_type_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_TYPE',
          ),
          1 => 
          array (
            'name' => 'contact_type_other_c',
            'label' => 'LBL_CONTACT_TYPE_OTHER',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'contact_language_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_LANGUAGE',
          ),
          1 => 
          array (
            'name' => 'contact_lang_oth_c',
            'label' => 'LBL_CONTACT_LANG_OTH',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'contact_interpret_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_INTERPRET',
          ),
          1 => 
          array (
            'name' => 'contact_interpret_oth_c',
            'label' => 'LBL_CONTACT_INTERPRET_OTH',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'contact_location_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_LOCATION',
          ),
          1 => 
          array (
            'name' => 'contact_location_oth_c',
            'label' => 'LBL_CONTACT_LOCATION_OTH',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'contact_private_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_PRIVATE',
          ),
          1 => 
          array (
            'name' => 'contact_private_detail_c',
            'label' => 'LBL_CONTACT_PRIVATE_DETAIL',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'who_contacted_c',
            'studio' => 'visible',
            'label' => 'LBL_WHO_CONTACTED',
          ),
          1 => 
          array (
            'name' => 'who_contact_oth_c',
            'label' => 'LBL_WHO_CONTACT_OTH',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'contact_distance_c',
            'label' => 'LBL_CONTACT_DISTANCE',
          ),
          1 => 
          array (
            'name' => 'contact_disp_c',
            'label' => 'LBL_CONTACT_DISP',
          ),
        ),
        11 => 
//         array (
//           0 => 
//           array (
//             'name' => 'plt_participant_activities_notes_name',
//           ),
//           1 => 
//           array (
//             'name' => 'ncsdc_eventinfo_activities_notes_name',
//           ),
//         ),
//         12 => 
        array (
          0 => 
          array (
            'name' => 'filename',
            'type' => 'file',
            'displayParams' => 
            array (
              'id' => 'id',
              'link' => 'filename',
            ),
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_NOTE_STATUS',
          ),
        ),
      ),
    ),
  ),
);
?>
