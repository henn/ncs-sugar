<?php
$module_name = 'LTT_Email';
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
      'email_rank' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EMAIL_RANK',
        'sortable' => false,
        'width' => '10%',
        'name' => 'email_rank',
      ),
      'email_rank_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL_RANK_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'email_rank_oth',
      ),
      'email_info_source' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EMAIL_INFO_SOURCE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'email_info_source',
      ),
      'email' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL',
        'width' => '10%',
        'default' => true,
        'name' => 'email',
      ),
      'email_info_source_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL_INFO_SOURCE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'email_info_source_oth',
      ),
      'email_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EMAIL_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'email_type',
      ),
      'email_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'email_type_oth',
      ),
      'email_share' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EMAIL_SHARE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'email_share',
      ),
      'email_active' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EMAIL_ACTIVE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'email_active',
      ),
      'email_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_EMAIL_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'email_comment',
      ),
      'email_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'email_id',
      ),
      'email_info_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_EMAIL_INFO_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'email_info_date',
      ),
      'email_info_update' => 
      array (
        'type' => 'date',
        'label' => 'LBL_EMAIL_INFO_UPDATE',
        'width' => '10%',
        'default' => true,
        'name' => 'email_info_update',
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
