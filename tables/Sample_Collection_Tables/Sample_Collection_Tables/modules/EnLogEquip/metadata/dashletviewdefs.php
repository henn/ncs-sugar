<?php
$dashletData['SAMP_EnLogEquipDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'type' => 'assigned_user_name',
    'default' => 'Administrator',
  ),
);
$dashletData['SAMP_EnLogEquipDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'name' => 'date_entered',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'equipment_type' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_EQUIPMENT_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'equipment_type_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EQUIPMENT_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'problem_dt' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PROBLEM_DT',
    'width' => '10%',
    'default' => false,
  ),
  'equip_issue' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_EQUIP_ISSUE',
    'sortable' => false,
    'width' => '10%',
  ),
  'equip_action' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_EQUIP_ACTION',
    'sortable' => false,
    'width' => '10%',
  ),
  'staff_id_reviewer' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STAFF_ID_REVIEWER',
    'width' => '10%',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'samp_enlogestaffrstr_name' => 
  array (
    'type' => 'relate',
    'link' => 'samp_enlogep_st_staffrstr',
    'label' => 'LBL_SAMP_ENLOGEQUIP_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => false,
  ),
);
