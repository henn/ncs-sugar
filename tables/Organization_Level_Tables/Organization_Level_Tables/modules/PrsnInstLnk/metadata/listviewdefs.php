<?php
$module_name = 'OLT_PrsnInstLnk';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'OLT_PRSNINSLT_PERSON_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'olt_prsninslnk_plt_person',
    'label' => 'LBL_OLT_PRSNINSTLNK_PLT_PERSON_FROM_PLT_PERSON_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'OLT_PRSNINSSTITUTION_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'olt_prsninslt_institution',
    'label' => 'LBL_OLT_PRSNINSTLNK_OLT_INSTITUTION_FROM_OLT_INSTITUTION_TITLE',
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
);
?>
