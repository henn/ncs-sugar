<?php
$module_name = 'ST_WkOEAct';
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
          0 => 
          array (
            'name' => 'title',
            'label' => 'LBL_TITLE',
          ),
          1 => 
          array (
            'name' => 'outreach_event_date',
            'label' => 'LBL_OUTREACH_EVENT_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'st_wkoeact_ecsampunt_name',
          ),
        ),
        3 => 
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
        4 => 
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
        5 => 
        array (
          0 => 
          array (
            'name' => 'outreach_tailored',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_TAILORED',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'st_msouttart_wkoeact_name',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'outreach_lang1',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_LANG1',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'st_msoutlant_wkoeact_name',
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
          1 => '',
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'st_msoutract_wkoeact_name',
          ),
          1 => '',
        ),
        11 => 
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
        12 => 
        array (
          0 => 
          array (
            'name' => 'outreach_culture_oth',
            'label' => 'LBL_OUTREACH_CULTURE_OTH',
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
            'name' => 'outreach_cost',
            'label' => 'LBL_OUTREACH_COST',
          ),
        ),
        14 => 
        array (
          0 => 
          array (
            'name' => 'outreach_quantity',
            'label' => 'LBL_OUTREACH_QUANTITY',
          ),
          1 => '',
        ),
        15 => 
        array (
          0 => 
          array (
            'name' => 'st_msoutevat_wkoeact_name',
          ),
          1 => 
          array (
            'name' => 'outreach_eval_result',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_EVAL_RESULT',
          ),
        ),
        16 => 
        array (
          0 => 
          array (
            'name' => 'outreach_incident',
            'studio' => 'visible',
            'label' => 'LBL_OUTREACH_INCIDENT',
          ),
          1 => '',
        ),
        17 => 
        array (
          0 => 
          array (
            'name' => 'comments',
            'studio' => 'visible',
            'label' => 'LBL_COMMENTS',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
