<?php
$module_name = 'SAMP_PreThrmCert';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'PRECISION_CERT_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PRECISION_CERT_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  'CERTIFICATION_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CERTIFICATION_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'CERTIFICATION_EXPIRE_DT' => 
  array (
    'type' => 'date',
    'label' => 'LBL_CERTIFICATION_EXPIRE_DT',
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
