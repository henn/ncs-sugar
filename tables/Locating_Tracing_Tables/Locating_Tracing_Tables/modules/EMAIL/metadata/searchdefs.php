<?php
$module_name = 'LTT_EMAIL';
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
      'email_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'email_id',
      ),
      'email' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL',
        'width' => '10%',
        'default' => true,
        'name' => 'email',
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
      'email_info_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_EMAIL_INFO_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'email_info_date',
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
      'email_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'email_id',
      ),
      'email' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EMAIL',
        'width' => '10%',
        'default' => true,
        'name' => 'email',
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
      'email_info_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_EMAIL_INFO_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'email_info_date',
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
