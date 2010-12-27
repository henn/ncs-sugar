<?php
$module_name = 'NCSDC_INCIDENT_UNANTICIPATED';
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
            'name' => 'inc_unanticipated_id',
            'label' => 'LBL_INC_UNANTICIPATED_ID',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'inc_unanticipated',
            'studio' => 'visible',
            'label' => 'LBL_INC_UNANTICIPATED',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_event_ncsdc_incident_unanticipated_name',
          ),
        ),
      ),
    ),
  ),
);
?>
