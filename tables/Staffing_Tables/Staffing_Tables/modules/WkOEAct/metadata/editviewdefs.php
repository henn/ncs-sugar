<?php
$module_name = 'ST_WkOEAct';
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
            'name' => 'tsu_id',
            'label' => 'LBL_TSU_ID',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'outreach_event_id',
            'label' => 'LBL_OUTREACH_EVENT_ID',
          ),
          1 => 
          array (
            'name' => 'outreach_event_date',
            'label' => 'LBL_OUTREACH_EVENT_DATE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'outreach_target',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_TARGET',
          ),
          1 => 
          array (
            'name' => 'outreach_target_oth',
            'label' => 'LBL_OUTREACH_TARGET_OTH',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'outreach_mode',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_MODE',
          ),
          1 => 
          array (
            'name' => 'outreach_mode_oth',
            'label' => 'LBL_OUTREACH_MODE_OTH',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'outreach_type',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_TYPE',
          ),
          1 => 
          array (
            'name' => 'outreach_type_oth',
            'label' => 'LBL_OUTREACH_TYPE_OTH',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'outreach_tailored',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_TAILORED',
          ),
          1 => 
          array (
            'name' => 'outreach_lang1',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_LANG1',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'outreach_lang2',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_LANG2',
          ),
          1 => 
          array (
            'name' => 'outreach_lang_oth',
            'label' => 'LBL_OUTREACH_LANG_OTH',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'outreach_race1',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_RACE1',
          ),
          1 => 
          array (
            'name' => 'outreach_race2',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_RACE2',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'outreach_race_oth',
            'label' => 'LBL_OUTREACH_RACE_OTH',
          ),
          1 => 
          array (
            'name' => 'outreach_culture1',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_CULTURE1',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'outreach_culture2',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_CULTURE2',
          ),
          1 => 
          array (
            'name' => 'outreach_culture_oth',
            'label' => 'LBL_OUTREACH_CULTURE_OTH',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'outreach_quantity',
            'label' => 'LBL_OUTREACH_QUANTITY',
          ),
          1 => 
          array (
            'name' => 'outreach_cost',
            'label' => 'LBL_OUTREACH_COST',
          ),
        ),
        13 => 
        array (
          0 => 
          array (
            'name' => 'outreach_staffing',
            'label' => 'LBL_OUTREACH_STAFFING',
          ),
          1 => 
          array (
            'name' => 'outreach_incident',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_INCIDENT',
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'incident_id',
            'label' => 'LBL_INCIDENT_ID',
          ),
          1 => '',
        ),
        15 => 
        array (
          0 => '',
        ),
        16 => 
        array (
          0 => 
          array (
            'name' => 'st_staff_st_outreach_name',
          ),
        ),
      ),
    ),
  ),
);
?>
