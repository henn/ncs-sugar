<?php
$module_name = 'PLT_PARTICIPANT';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'modified_user_link',
    'label' => 'LBL_MODIFIED_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'P_TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_P_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'STATUS_INFO_SOURCE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS_INFO_SOURCE',
    'sortable' => false,
    'width' => '10%',
  ),
  'STATUS_INFO_MODE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_STATUS_INFO_MODE',
    'sortable' => false,
    'width' => '10%',
  ),
  'STATUS_INFO_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_STATUS_INFO_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'ENROLL_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ENROLL_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  'ENROLL_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_ENROLL_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'PID_ENTRY' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PID_ENTRY',
    'sortable' => false,
    'width' => '10%',
  ),
  'PID_AGE_ELIG' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PID_AGE_ELIG',
    'sortable' => false,
    'width' => '10%',
  ),
  'PID_COMMENT' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_PID_COMMENT',
    'sortable' => false,
    'width' => '10%',
    'default' => false,
  ),
  'PID_ENTRY_OTHER' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_PID_ENTRY_OTHER',
    'width' => '10%',
  ),
  'STATUS_INFO_MODE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STATUS_INFO_MODE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'STATUS_INFO_SOURCE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_STATUS_INFO_SOURCE_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'P_TYPE_OTH' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_P_TYPE_OTH',
    'width' => '10%',
  ),
);
?>
