<?php
$module_name = 'NCSDC_NIRNAccMltS';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'NCSDC_NONINRNACCMLTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_nonindc_nirnaccmlts',
    'label' => 'LBL_NCSDC_NONINTERRPT_NCSDC_NIRNACCMLTS_FROM_NCSDC_NONINTERRPT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'NIR_NOACCESS' => 
  array (
    'type' => 'multienum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_NIR_NOACCESS',
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
