<?php
$module_name = 'NCSDC_Incident';
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
      'inc_report_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_INC_REPORT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_report_date',
      ),
      'inc_staff_reporter_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_STAFF_REPORTER_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_staff_reporter_id',
      ),
      'inctype' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INCTYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'inctype',
      ),
      'incident_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_INCIDENT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'incident_date',
      ),
      'inc_action' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_INC_ACTION',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'inc_action',
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
      'inc_staff_reporter_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_STAFF_REPORTER_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_staff_reporter_id',
      ),
      'inc_staff_supervisor_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_STAFF_SUPERVISOR_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_staff_supervisor_id',
      ),
      'incident_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_INCIDENT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'incident_date',
      ),
      'inc_report_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_INC_REPORT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_report_date',
      ),
      'inctype' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INCTYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'inctype',
      ),
      'inc_recip_is_staff' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_RECIP_IS_STAFF',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_recip_is_staff',
      ),
      'inc_recip_is_du' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_RECIP_IS_DU',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_recip_is_du',
      ),
      'inc_recip_is_participant' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_RECIP_IS_PARTICIPANT',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_recip_is_participant',
      ),
      'inc_recip_is_family' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_RECIP_IS_FAMILY',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_recip_is_family',
      ),
      'inc_recip_is_acquaintance' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INC_RECIP_IS_ACQUAINTANCE',
        'width' => '10%',
        'default' => true,
        'name' => 'inc_recip_is_acquaintance',
      ),
      'inc_recip_is_other' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INC_RECIP_IS_OTHER',
        'sortable' => false,
        'width' => '10%',
        'name' => 'inc_recip_is_other',
      ),
      'inc_action' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_INC_ACTION',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'inc_action',
      ),
      'inc_reported' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_INC_REPORTED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'inc_reported',
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
