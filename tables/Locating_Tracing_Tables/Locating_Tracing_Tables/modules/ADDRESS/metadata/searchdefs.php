<?php
$module_name = 'LTT_Address';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'address_rank' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ADDRESS_RANK',
        'sortable' => false,
        'width' => '10%',
        'name' => 'address_rank',
      ),
      'address_rank_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS_RANK_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'address_rank_oth',
      ),
      'address_info_source' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ADDRESS_INFO_SOURCE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'address_info_source',
      ),
      'address_info_source_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS_INFO_SOURCE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'address_info_source_oth',
      ),
      'address_info_mode' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ADDRESS_INFO_MODE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'address_info_mode',
      ),
      'address_info_mode_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS_INFO_MODE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'address_info_mode_oth',
      ),
      'address_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ADDRESS_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'address_type',
      ),
      'address_description' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ADDRESS_DESCRIPTION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'address_description',
      ),
      'address_description_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS_DESCRIPTION_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'address_description_oth',
      ),
      'city' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CITY',
        'width' => '10%',
        'default' => true,
        'name' => 'city',
      ),
      'zip' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ZIP',
        'width' => '10%',
        'default' => true,
        'name' => 'zip',
      ),
      'zip4' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ZIP4',
        'width' => '10%',
        'default' => true,
        'name' => 'zip4',
      ),
      'address_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_ADDRESS_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'address_comment',
      ),
      'address_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'address_id',
      ),
      'address_info_update' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS_INFO_UPDATE',
        'width' => '10%',
        'default' => true,
        'name' => 'address_info_update',
      ),
      'address_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'address_type_oth',
      ),
      'address_1' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS_1',
        'width' => '10%',
        'default' => true,
        'name' => 'address_1',
      ),
      'address_2' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_ADDRESS_2',
        'width' => '10%',
        'default' => true,
        'name' => 'address_2',
      ),
      'unit' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_UNIT',
        'width' => '10%',
        'default' => true,
        'name' => 'unit',
      ),
      'state' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STATE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'state',
      ),
      'address_start_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_ADDRESS_START_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'address_start_date',
      ),
      'address_end_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_ADDRESS_END_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'address_end_date',
      ),
      'address_info_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_ADDRESS_INFO_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'address_info_date',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
