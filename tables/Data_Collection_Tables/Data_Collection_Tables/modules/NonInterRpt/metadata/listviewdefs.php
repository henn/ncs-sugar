<?php
$module_name = 'NCSDC_NonInterRpt';
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
  'DATE_AVAILABLE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DATE_AVAILABLE',
    'width' => '10%',
    'default' => true,
  ),
  'PERM_LTR' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PERM_LTR',
    'sortable' => false,
    'width' => '10%',
  ),
  'NIR_VAC_INFO' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_NIR_VAC_INFO',
    'sortable' => false,
    'width' => '10%',
  ),
  'NIR_NOACCESS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_NIR_NOACCESS',
    'sortable' => false,
    'width' => '10%',
  ),
  'NIR_ACCESS_ATTEMPT' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_NIR_ACCESS_ATTEMPT',
    'sortable' => false,
    'width' => '10%',
  ),
  'COG_INFORM_RELATION' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_COG_INFORM_RELATION',
    'sortable' => false,
    'width' => '10%',
  ),
  'COG_DIS_DESC' => 
  array (
    'type' => 'text',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_COG_DIS_DESC',
    'sortable' => false,
    'width' => '10%',
  ),
  'PERM_DISABILITY' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PERM_DISABILITY',
    'sortable' => false,
    'width' => '10%',
  ),
  'LT_ILLNESS_DESC' => 
  array (
    'type' => 'text',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_LT_ILLNESS_DESC',
    'sortable' => false,
    'width' => '10%',
  ),
  'WHO_REFUSED' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_WHO_REFUSED',
    'sortable' => false,
    'width' => '10%',
  ),
  'REFUSER_STRENGTH' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_REFUSER_STRENGTH',
    'sortable' => false,
    'width' => '10%',
  ),
  'REASON_UNAVAIL' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_REASON_UNAVAIL',
    'sortable' => false,
    'width' => '10%',
  ),
  'DATE_MOVED' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DATE_MOVED',
    'width' => '10%',
    'default' => true,
  ),
  'MOVED_UNIT' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_MOVED_UNIT',
    'sortable' => false,
    'width' => '10%',
  ),
  'STATE_DEATH' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_STATE_DEATH',
    'sortable' => false,
    'width' => '10%',
  ),
  'MOVED_LENGTH_TIME' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_MOVED_LENGTH_TIME',
    'width' => '10%',
    'default' => false,
  ),
  'MOVED_RELATION_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MOVED_RELATION_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'MOVED_INFORM_RELATION' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_MOVED_INFORM_RELATION',
    'sortable' => false,
    'width' => '10%',
  ),
  'REASON_UNAVAIL_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_REASON_UNAVAIL_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'YOD' => 
  array (
    'type' => 'int',
    'label' => 'LBL_YOD',
    'width' => '10%',
    'default' => false,
  ),
  'DECEASED_INFORM_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DECEASED_INFORM_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'DECEASED_INFORM_RELATION' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_DECEASED_INFORM_RELATION',
    'sortable' => false,
    'width' => '10%',
  ),
  'REF_ACTION' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_REF_ACTION',
    'sortable' => false,
    'width' => '10%',
  ),
  'WHO_REFUSED_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_WHO_REFUSED_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'NIR' => 
  array (
    'type' => 'text',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_NIR',
    'sortable' => false,
    'width' => '10%',
  ),
  'COG_INFORM_RELATION_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COG_INFORM_RELATION_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'NIR_OTHER' => 
  array (
    'type' => 'text',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_NIR_OTHER',
    'sortable' => false,
    'width' => '10%',
  ),
  'NIR_ACCESS_ATTEMPT_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NIR_ACCESS_ATTEMPT_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'NIR_NOACCESS_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NIR_NOACCESS_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'NIR_VAC_INFO_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NIR_VAC_INFO_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'NIR_TYPE_PERSON_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_NIR_TYPE_PERSON_OTH',
    'width' => '10%',
    'default' => false,
  ),
  'NIR_TYPE_PERSON' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_NIR_TYPE_PERSON',
    'sortable' => false,
    'width' => '10%',
  ),
);
?>
