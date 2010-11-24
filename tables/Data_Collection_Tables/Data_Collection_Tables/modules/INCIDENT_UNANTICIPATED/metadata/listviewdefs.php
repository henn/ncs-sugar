<?php
$module_name = 'NCSDC_INCIDENT_UNANTICIPATED';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'INC_UNANTICIPATED_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INC_UNANTICIPATED_ID',
    'width' => '10%',
    'default' => true,
  ),
  'INC_UNANTICIPATED' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_INC_UNANTICIPATED',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
