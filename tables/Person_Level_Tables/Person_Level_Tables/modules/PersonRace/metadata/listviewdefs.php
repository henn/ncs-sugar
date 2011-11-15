<?php
$module_name = 'PLT_PersonRace';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'PLT_PERSON_ERSONRACE_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'plt_person_plt_personrace',
    'label' => 'LBL_PLT_PERSON_PLT_PERSONRACE_FROM_PLT_PERSON_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'RACE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_RACE',
    'sortable' => false,
    'width' => '10%',
  ),
  'RACE_OTH' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_RACE_OTH',
    'width' => '10%',
    'default' => true,
  ),
);
?>
