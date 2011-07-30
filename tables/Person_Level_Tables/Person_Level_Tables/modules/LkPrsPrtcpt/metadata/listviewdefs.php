<?php
$module_name = 'PLT_LkPrsPrtcpt';
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
  'RELATION' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_RELATION',
    'sortable' => false,
    'width' => '10%',
  ),
  'IS_ACTIVE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_IS_ACTIVE',
    'sortable' => false,
    'width' => '10%',
  ),
  'RELATION_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RELATION_OTH',
    'width' => '10%',
    'default' => false,
  ),
);
?>
