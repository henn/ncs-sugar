<?php
$module_name = 'ST_OUTREACH';
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
          1 => 
          array (
            'name' => 'tsu_id',
            'label' => 'LBL_TSU_ID',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'outreach_event_id',
            'label' => 'LBL_OUTREACH_EVENT_ID',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'outreach_event_date',
            'label' => 'LBL_OUTREACH_EVENT_DATE',
          ),
          1 => '',
        ),
        6 => 
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
        7 => 
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
        8 => 
        array (
          0 => 
          array (
            'name' => 'outreach_tailored',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_TAILORED',
          ),
          1 => '',
        ),
        9 => 
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
        10 => 
        array (
          0 => 
          array (
            'name' => 'outreach_lang1',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_LANG1',
          ),
          1 => 
          array (
            'name' => 'outreach_lang2',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_LANG2',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'outreach_lang_oth',
            'label' => 'LBL_OUTREACH_LANG_OTH',
          ),
          1 => '',
        ),
        12 => 
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
        13 => 
        array (
          0 => 
          array (
            'name' => 'outreach_race_oth',
            'label' => 'LBL_OUTREACH_RACE_OTH',
          ),
          1 => '',
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'outreach_culture1',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_CULTURE1',
          ),
          1 => 
          array (
            'name' => 'outreach_culture2',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_CULTURE2',
          ),
        ),
        15 => 
        array (
          0 => 
          array (
            'name' => 'outreach_culture_oth',
            'label' => 'LBL_OUTREACH_CULTURE_OTH',
          ),
          1 => '',
        ),
        16 => 
        array (
          0 => 
          array (
            'name' => 'outreach_quantity',
            'label' => 'LBL_OUTREACH_QUANTITY',
          ),
          1 => '',
        ),
        17 => 
        array (
          0 => 
          array (
            'name' => 'outreach_cost',
            'label' => 'LBL_OUTREACH_COST',
          ),
          1 => '',
        ),
        18 => 
        array (
          0 => 
          array (
            'name' => 'outreach_staffing',
            'label' => 'LBL_OUTREACH_STAFFING',
          ),
          1 => '',
        ),
        19 => 
        array (
          0 => 
          array (
            'name' => 'outreach_incident',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_INCIDENT',
          ),
          1 => '',
        ),
        20 => 
        array (
          0 => 
          array (
            'name' => 'incident_id',
            'label' => 'LBL_INCIDENT_ID',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
