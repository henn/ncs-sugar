<?php
$module_name = 'OLT_PrsnPrvdLnk';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'OLT_PRSNPRVLT_PERSON_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'olt_prsnprvlnk_plt_person',
    'label' => 'LBL_OLT_PRSNPRVDLNK_PLT_PERSON_FROM_PLT_PERSON_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'OLT_PRSNPRV_PROVIDER_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'olt_prsnprvk_olt_provider',
    'label' => 'LBL_OLT_PRSNPRVDLNK_OLT_PROVIDER_FROM_OLT_PROVIDER_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'IS_ACTIVE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_IS_ACTIVE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PROV_INTRO_OUTCOME' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PROV_INTRO_OUTCOME',
    'sortable' => false,
    'width' => '10%',
  ),
  'PROV_INTRO_OUTCOME_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PROV_INTRO_OUTCOME_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
?>
