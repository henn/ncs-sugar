<?php
$module_name = 'PLT_PERSON';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'FIRST_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_FIRST_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'MIDDLE_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MIDDLE_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'LAST_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LAST_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'PERSON_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PERSON_ID',
    'width' => '10%',
    'default' => true,
  ),
  'SEX' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SEX',
    'sortable' => false,
    'width' => '10%',
  ),
  'PERSON_DOB' => 
  array (
    'type' => 'date',
    'studio' => 'visible',
    'label' => 'LBL_PERSON_DOB',
    'width' => '10%',
    'default' => true,
  ),
  'PREF_CONTACT' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PREF_CONTACT',
    'sortable' => false,
    'width' => '10%',
  ),
  'MOVE_INFO' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_MOVE_INFO',
    'sortable' => false,
    'width' => '10%',
  ),
  'NEW_ADDRESS_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NEW_ADDRESS_ID',
    'width' => '10%',
    'default' => true,
  ),
  'P_INFO_SOURCE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_P_INFO_SOURCE',
    'sortable' => false,
    'width' => '10%',
  ),
  'P_INFO_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_P_INFO_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'AGE' => 
  array (
    'type' => 'int',
    'label' => 'LBL_AGE',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_MOVE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DATE_MOVE',
    'width' => '10%',
    'default' => false,
  ),
  'WHEN_MOVE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_WHEN_MOVE',
    'sortable' => false,
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => false,
  ),
  'SUFFIX' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_SUFFIX',
    'sortable' => false,
    'width' => '10%',
  ),
  'AGE_RANGE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_AGE_RANGE',
    'sortable' => false,
    'width' => '10%',
  ),
  'PERSON_COMMENT' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_PERSON_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'P_INFO_UPDATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_P_INFO_UPDATE',
    'width' => '10%',
    'default' => false,
  ),
  'P_INFO_SOURCE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_P_INFO_SOURCE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'P_TRACING' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_P_TRACING',
    'sortable' => false,
    'width' => '10%',
  ),
  'TITLE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'PREFIX' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PREFIX',
    'sortable' => false,
    'width' => '10%',
  ),
  'MAIDEN_NAME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MAIDEN_NAME',
    'width' => '10%',
    'default' => false,
  ),
  'DECEASED' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_DECEASED',
    'sortable' => false,
    'width' => '10%',
  ),
  'PREF_CONTACT_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PREF_CONTACT_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'PERSON_LANG' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PERSON_LANG',
    'sortable' => false,
    'width' => '10%',
  ),
  'PERSON_LANG_OTHER' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PERSON_LANG_OTHER',
    'width' => '10%',
    'default' => false,
  ),
  'MARISTAT' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_MARISTAT',
    'sortable' => false,
    'width' => '10%',
  ),
  'MARISTAT_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MARISTAT_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'PLAN_MOVE' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PLAN_MOVE',
    'sortable' => false,
    'width' => '10%',
  ),
  'ETHNIC_GROUP' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_ETHNIC_GROUP',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
