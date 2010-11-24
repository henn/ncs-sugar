<?php
$module_name = 'NCSDC_NON_INTERVIEW_RPT_NOACCESS';
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
  'NIR_NOACCESS_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NIR_NOACCESS_ID',
    'width' => '10%',
    'default' => true,
  ),
  'NIR_NOACCESS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_NIR_NOACCESS',
    'sortable' => false,
    'width' => '10%',
  ),
  'NIR_NOACCESS_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NIR_NOACCESS_OTH',
    'width' => '10%',
    'default' => true,
  ),
);
?>
