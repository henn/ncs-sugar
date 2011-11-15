<?php
$dashletData['LTT_TelephoneDashlet']['searchFields'] = array (
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
$dashletData['LTT_TelephoneDashlet']['columns'] = array (
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
  'phone_info_source' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PHONE_INFO_SOURCE',
    'sortable' => false,
    'width' => '10%',
  ),
  'phone_info_source_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PHONE_INFO_SOURCE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'phone_ext' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PHONE_EXT',
    'width' => '10%',
    'default' => false,
  ),
  'phone_type' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PHONE_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'phone_type_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PHONE_TYPE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'phone_rank' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PHONE_RANK',
    'sortable' => false,
    'width' => '10%',
  ),
  'phone_rank_oth' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PHONE_RANK_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'phone_landline' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PHONE_LANDLINE',
    'sortable' => false,
    'width' => '10%',
  ),
  'phone_share' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PHONE_SHARE',
    'sortable' => false,
    'width' => '10%',
  ),
  'cell_permission' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_CELL_PERMISSION',
    'sortable' => false,
    'width' => '10%',
  ),
  'text_permission' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_TEXT_PERMISSION',
    'sortable' => false,
    'width' => '10%',
  ),
  'phone_comment' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_PHONE_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'phone_nbr' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PHONE_NBR',
    'width' => '10%',
    'default' => false,
  ),
  'phone_start_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PHONE_START_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'phone_end_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PHONE_END_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'phone_info_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PHONE_INFO_DATE',
    'width' => '10%',
    'default' => false,
  ),
  'phone_info_update' => 
  array (
    'type' => 'date',
    'label' => 'LBL_PHONE_INFO_UPDATE',
    'width' => '10%',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
);
