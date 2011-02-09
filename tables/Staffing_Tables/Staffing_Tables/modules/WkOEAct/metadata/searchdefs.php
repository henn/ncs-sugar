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
      'outreach_staffing' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OUTREACH_STAFFING',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_staffing',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
      'outreach_staffing' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_OUTREACH_STAFFING',
        'width' => '10%',
        'default' => true,
        'name' => 'outreach_staffing',
      ),
      'incident_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INCIDENT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'incident_id',
      ),
      'assigned_user_id' => 
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
        'default' => true,
        'width' => '10%',
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
