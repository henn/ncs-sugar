<?php
$module_name = 'NCSDC_NIntRptVcnt';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'NCSDC_NONINNTRPTVCNT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_nonindc_nintrptvcnt',
    'label' => 'LBL_NCSDC_NONINTERRPT_NCSDC_NINTRPTVCNT_FROM_NCSDC_NONINTERRPT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'NIR_VACANT' => 
  array (
    'type' => 'multienum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_NIR_VACANT',
    'width' => '10%',
  ),
  'NIR_VACANT_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NIR_VACANT_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
);
?>
