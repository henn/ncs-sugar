<?php
$module_name = 'SAMP_SampShip';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SAMP_SAMPSHSTAFFRSTR_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_sampshp_st_staffrstr',
    'label' => 'LBL_SAMP_SAMPSHIP_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'SAMP_SAMPSH_SRSCINFO_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_sampsh_samp_srscinfo',
    'label' => 'LBL_SAMP_SAMPSHIP_SAMP_SRSCINFO_FROM_SAMP_SRSCINFO_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'SHIPPER_DESTINATION' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SHIPPER_DESTINATION',
    'sortable' => false,
    'width' => '10%',
  ),
  'SHIPMENT_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_SHIPMENT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'SHIPMENT_COOLANT' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SHIPMENT_COOLANT',
    'sortable' => false,
    'width' => '10%',
  ),
  'SAMPLE_SHIPPED_BY' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SAMPLE_SHIPPED_BY',
    'sortable' => false,
    'width' => '10%',
  ),
  'STAFF_ID_TRACK' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_ID_TRACK',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
