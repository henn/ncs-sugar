<?php
$module_name = 'SAMP_SPECPickup';
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
      'specimen_pickup_comment' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SPECIMEN_PICKUP_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'specimen_pickup_comment',
      ),
      'specimen_trans_temp' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_SPECIMEN_TRANS_TEMP',
        'width' => '10%',
        'default' => true,
        'name' => 'specimen_trans_temp',
      ),
      'specimen_pickup_dt' => 
      array (
        'type' => 'datetimecombo',
        'label' => 'LBL_SPECIMEN_PICKUP_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'specimen_pickup_dt',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'specimen_pickup_comment' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SPECIMEN_PICKUP_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'specimen_pickup_comment',
      ),
      'specimen_pickup_cmt_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SPECIMEN_PICKUP_CMT_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'specimen_pickup_cmt_oth',
      ),
      'specimen_trans_temp' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_SPECIMEN_TRANS_TEMP',
        'width' => '10%',
        'default' => true,
        'name' => 'specimen_trans_temp',
      ),
      'assigned_user_id' => 
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
        'default' => true,
        'width' => '10%',
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
