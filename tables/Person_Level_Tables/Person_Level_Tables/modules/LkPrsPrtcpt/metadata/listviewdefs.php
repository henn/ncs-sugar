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
  'PLT_LKPRSPRLT_PERSON_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'plt_lkprsprcpt_plt_person',
    'label' => 'LBL_PLT_LKPRSPRTCPT_PLT_PERSON_FROM_PLT_PERSON_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'PLT_LKPRSPRRTICIPANT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'plt_lkprsprlt_participant',
    'label' => 'LBL_PLT_LKPRSPRTCPT_PLT_PARTICIPANT_FROM_PLT_PARTICIPANT_TITLE',
    'width' => '10%',
    'default' => true,
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
