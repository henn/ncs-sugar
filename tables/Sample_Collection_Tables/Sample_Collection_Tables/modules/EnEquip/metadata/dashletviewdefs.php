<?php
$dashletData['SAMP_EnEquipDashlet']['searchFields'] = array (
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
$dashletData['SAMP_EnEquipDashlet']['columns'] = array (
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
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
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
    'name' => 'equipment_type',
  ),
  'equipment_type_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EQUIPMENT_TYPE_OTH',
    'width' => '10%',
    'default' => false,
    'name' => 'equipment_type_oth',
  ),
  'serial_no' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SERIAL_NO',
    'width' => '10%',
    'default' => false,
    'name' => 'serial_no',
  ),
  'government_asset_tag_no' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_GOVERNMENT_ASSET_TAG_NO',
    'width' => '10%',
    'default' => false,
    'name' => 'government_asset_tag_no',
  ),
  'retired_reason' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_RETIRED_REASON',
    'sortable' => false,
    'width' => '10%',
    'name' => 'retired_reason',
  ),
  'retired_reason_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RETIRED_REASON_OTH',
    'width' => '10%',
    'default' => false,
    'name' => 'retired_reason_oth',
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'samp_enequi_srscinfo_name' => 
  array (
    'type' => 'relate',
    'link' => 'samp_enequi_samp_srscinfo',
    'label' => 'LBL_SAMP_ENEQUIP_SAMP_SRSCINFO_FROM_SAMP_SRSCINFO_TITLE',
    'width' => '10%',
    'default' => false,
    'name' => 'samp_enequi_srscinfo_name',
  ),
);
