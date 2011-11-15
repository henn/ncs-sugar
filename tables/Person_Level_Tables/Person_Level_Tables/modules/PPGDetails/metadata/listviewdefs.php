<?php
$module_name = 'PLT_PPGDetails';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'PLT_PARTICIPGDETAILS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'plt_participlt_ppgdetails',
    'label' => 'LBL_PLT_PARTICIPANT_PLT_PPGDETAILS_FROM_PLT_PARTICIPANT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
  'PPG_PID_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PPG_PID_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  'PPG_FIRST' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PPG_FIRST',
    'sortable' => false,
    'width' => '10%',
  ),
  'ORIG_DUE_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_ORIG_DUE_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'DUE_DATE_2' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DUE_DATE_2',
    'width' => '10%',
    'default' => true,
  ),
  'DUE_DATE_3' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DUE_DATE_3',
    'width' => '10%',
    'default' => true,
  ),
);
?>
