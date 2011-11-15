<?php
$module_name = 'NCSDC_NIRRfsMltS';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'NCSDC_NONINIRRFSMLTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_noninsdc_nirrfsmlts',
    'label' => 'LBL_NCSDC_NONINTERRPT_NCSDC_NIRRFSMLTS_FROM_NCSDC_NONINTERRPT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'REFUSAL_REASON' => 
  array (
    'type' => 'multienum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_REFUSAL_REASON',
    'width' => '10%',
  ),
  'REFUSAL_REASON_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_REFUSAL_REASON_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'NIR_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NIR_ID',
    'width' => '10%',
    'default' => true,
  ),
);
?>
