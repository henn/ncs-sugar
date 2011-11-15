<?php
$module_name = 'NCSDC_NIRDUTpMltS';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'NCSDC_NONINRDUTPMLTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_nonindc_nirdutpmlts',
    'label' => 'LBL_NCSDC_NONINTERRPT_NCSDC_NIRDUTPMLTS_FROM_NCSDC_NONINTERRPT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'NIR_TYPE_DU' => 
  array (
    'type' => 'multienum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_NIR_TYPE_DU',
    'width' => '10%',
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
