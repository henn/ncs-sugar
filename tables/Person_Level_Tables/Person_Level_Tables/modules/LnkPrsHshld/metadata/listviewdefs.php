<?php
$module_name = 'PLT_LnkPrsHshld';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'PLT_LNKPRSHLT_PERSON_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'plt_lnkprshhld_plt_person',
    'label' => 'LBL_PLT_LNKPRSHSHLD_PLT_PERSON_FROM_PLT_PERSON_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'PLT_LNKPRSHHOUSEHOLD_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'plt_lnkprshd_gt_household',
    'label' => 'LBL_PLT_LNKPRSHSHLD_GT_HOUSEHOLD_FROM_GT_HOUSEHOLD_TITLE',
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
  'HH_RANK' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_HH_RANK',
    'sortable' => false,
    'width' => '10%',
  ),
  'HH_RANK_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_HH_RANK_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
?>
