<?php
$module_name = 'SAMP_EnLogEquip';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'SAMP_ENLOGESTAFFRSTR_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_enlogep_st_staffrstr',
    'label' => 'LBL_SAMP_ENLOGEQUIP_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'SAMP_ENLOGEP_ENEQUIP_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_enlogep_samp_enequip',
    'label' => 'LBL_SAMP_ENLOGEQUIP_SAMP_ENEQUIP_FROM_SAMP_ENEQUIP_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'SAMP_ENLOGE_SRSCINFO_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'samp_enloge_samp_srscinfo',
    'label' => 'LBL_SAMP_ENLOGEQUIP_SAMP_SRSCINFO_FROM_SAMP_SRSCINFO_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'EQUIPMENT_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EQUIPMENT_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'EQUIP_ISSUE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EQUIP_ISSUE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PROBLEM_DT' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PROBLEM_DT',
    'width' => '10%',
    'default' => true,
  ),
  'EQUIP_ACTION' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EQUIP_ACTION',
    'sortable' => false,
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'EQUIPMENT_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EQUIPMENT_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'STAFF_ID_REVIEWER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_ID_REVIEWER',
    'width' => '10%',
    'default' => false,
  ),
);
?>
