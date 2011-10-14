<?php
$dashletData['LTT_AddressDashlet']['searchFields'] = array (
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
$dashletData['LTT_AddressDashlet']['columns'] = array (
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
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'address_rank' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_RANK',
    'sortable' => false,
    'width' => '10%',
  ),
  'address_rank_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_RANK_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'address_info_source' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_INFO_SOURCE',
    'sortable' => false,
    'width' => '10%',
  ),
  'address_info_source_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_INFO_SOURCE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'address_info_mode' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_INFO_MODE',
    'sortable' => false,
    'width' => '10%',
  ),
  'address_info_mode_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_INFO_MODE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'address_description' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
  ),
  'address_type' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'address_start_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_ADDRESS_START_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'address_end_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_ADDRESS_END_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'address_info_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_ADDRESS_INFO_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'unit' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_UNIT',
    'width' => '10%',
    'default' => false,
  ),
  'address_description_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_DESCRIPTION_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'address_1' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_1',
    'width' => '10%',
    'default' => false,
  ),
  'address_2' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_2',
    'width' => '10%',
    'default' => false,
  ),
  'city' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CITY',
    'width' => '10%',
    'default' => false,
  ),
  'state' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_STATE',
    'sortable' => false,
    'width' => '10%',
  ),
  'zip' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ZIP',
    'width' => '10%',
    'default' => false,
  ),
  'zip4' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ZIP4',
    'width' => '10%',
    'default' => false,
  ),
  'address_info_update' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_INFO_UPDATE',
    'width' => '10%',
    'default' => false,
  ),
  'address_type_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ADDRESS_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'address_comment' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_ADDRESS_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
);
