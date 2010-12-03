<?php
$module_name = 'NCSDC_NON_INTERVIEW_RPT_DUTYPE';
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
  'NIR_DUTYPE_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NIR_DUTYPE_ID',
    'width' => '10%',
    'default' => true,
  ),
  'NIR_TYPE_DU' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_NIR_TYPE_DU',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'NIR_TYPE_DU_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NIR_TYPE_DU_OTH',
    'width' => '10%',
    'default' => true,
  ),
);
?>
