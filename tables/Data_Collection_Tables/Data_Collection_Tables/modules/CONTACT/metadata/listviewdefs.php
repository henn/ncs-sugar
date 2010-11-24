<?php
$module_name = 'NCSDC_CONTACT';
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
  'PSU_ID' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PSU_ID',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONTACT_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_ID',
    'width' => '10%',
    'default' => true,
  ),
  'CONTACT_DISP' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_DISP',
    'width' => '10%',
    'default' => true,
  ),
  'CONTACT_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONTACT_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONTACT_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_TYPE_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'CONTACT_DATE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'CONTACT_START_TIME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_START_TIME',
    'width' => '10%',
    'default' => true,
  ),
  'CONTACT_END_TIME' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_END_TIME',
    'width' => '10%',
    'default' => true,
  ),
  'CONTACT_LANG' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONTACT_LANG',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONTACT_LANG_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_LANG_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'CONTACT_INTERPRET_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_INTERPRET_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'CONTACT_INTERPRET' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONTACT_INTERPRET',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONTACT_LOCATION' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONTACT_LOCATION',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONTACT_LOCATION_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_LOCATION_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'CONTACT_PRIVATE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'default' => true,
    'label' => 'LBL_CONTACT_PRIVATE',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONTACT_PRIVATE_DETAIL' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_PRIVATE_DETAIL',
    'width' => '10%',
    'default' => true,
  ),
  'CONTACT_DISTANCE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CONTACT_DISTANCE',
    'width' => '10%',
    'default' => true,
  ),
  'WHO_CONTACT_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WHO_CONTACT_OTH',
    'width' => '10%',
    'default' => true,
  ),
  'WHO_CONTACTED' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_WHO_CONTACTED',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONTACT_COMMENT' => 
  array (
    'type' => 'text',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONTACT_COMMENT',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
