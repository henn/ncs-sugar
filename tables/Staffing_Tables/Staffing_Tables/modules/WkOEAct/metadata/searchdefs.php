<?php
$module_name = 'ST_WkOEAct';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'psu_id' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PSU_ID',
        'sortable' => false,
        'width' => '10%',
        'name' => 'psu_id',
      ),
      'tsu_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TSU_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'tsu_id',
      ),
      'outreach_event_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OUTREACH_EVENT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_event_id',
      ),
      'outreach_event_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_OUTREACH_EVENT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_event_date',
      ),
      'outreach_target' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OUTREACH_TARGET',
        'sortable' => false,
        'width' => '10%',
        'name' => 'outreach_target',
      ),
      'outreach_target_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OUTREACH_TARGET_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_target_oth',
      ),
      'outreach_mode' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OUTREACH_MODE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'outreach_mode',
      ),
      'outreach_mode_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OUTREACH_MODE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_mode_oth',
      ),
      'outreach_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OUTREACH_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'outreach_type',
      ),
      'outreach_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OUTREACH_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_type_oth',
      ),
      'outreach_tailored' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OUTREACH_TAILORED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'outreach_tailored',
      ),
      'outreach_lang1' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OUTREACH_LANG1',
        'sortable' => false,
        'width' => '10%',
        'name' => 'outreach_lang1',
      ),
      'outreach_lang2' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OUTREACH_LANG2',
        'sortable' => false,
        'width' => '10%',
        'name' => 'outreach_lang2',
      ),
      'outreach_lang_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OUTREACH_LANG_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_lang_oth',
      ),
      'outreach_race1' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OUTREACH_RACE1',
        'sortable' => false,
        'width' => '10%',
        'name' => 'outreach_race1',
      ),
      'outreach_race2' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OUTREACH_RACE2',
        'sortable' => false,
        'width' => '10%',
        'name' => 'outreach_race2',
      ),
      'outreach_race_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OUTREACH_RACE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_race_oth',
      ),
      'outreach_culture1' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OUTREACH_CULTURE1',
        'sortable' => false,
        'width' => '10%',
        'name' => 'outreach_culture1',
      ),
      'outreach_culture2' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OUTREACH_CULTURE2',
        'sortable' => false,
        'width' => '10%',
        'name' => 'outreach_culture2',
      ),
      'outreach_culture_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OUTREACH_CULTURE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_culture_oth',
      ),
      'outreach_quantity' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OUTREACH_QUANTITY',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_quantity',
      ),
      'outreach_cost' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_OUTREACH_COST',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_cost',
      ),
      'outreach_staffing' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OUTREACH_STAFFING',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_staffing',
      ),
      'outreach_incident' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_OUTREACH_INCIDENT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'outreach_incident',
      ),
      'incident_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INCIDENT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'incident_id',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
