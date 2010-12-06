<?php
$module_name = 'LTT_EMAIL';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'EMAIL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL',
    'width' => '10%',
    'default' => true,
  ),
  'EMAIL_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EMAIL_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'EMAIL_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL_TYPE_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'EMAIL_SHARE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EMAIL_SHARE',
    'sortable' => false,
    'width' => '10%',
  ),
  'EMAIL_ACTIVE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EMAIL_ACTIVE',
    'sortable' => false,
    'width' => '10%',
  ),
  'EMAIL_INFO_SOURCE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EMAIL_INFO_SOURCE',
    'sortable' => false,
    'width' => '10%',
  ),
  'EMAIL_INFO_SOURCE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL_INFO_SOURCE_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'EMAIL_RANK' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EMAIL_RANK',
    'sortable' => false,
    'width' => '10%',
  ),
  'EMAIL_RANK_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL_RANK_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'EMAIL_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL_ID',
    'width' => '10%',
    'default' => true,
  ),
  'EMAIL_COMMENT' => 
  array (
    'type' => 'text',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_EMAIL_COMMENT',
    'sortable' => false,
    'width' => '10%',
  ),
  'EMAIL_INFO_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_EMAIL_INFO_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'EMAIL_INFO_UPDATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_EMAIL_INFO_UPDATE',
    'width' => '10%',
    'default' => true,
  ),
);
?>
