<?php
$module_name = 'NCSDC_CntLnk';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'NCSDC_CNTLNSTAFFRSTR_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_cntlnk_st_staffrstr',
    'label' => 'LBL_NCSDC_CNTLNK_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  /*
  'NCSDC_CNTLNCNTCTINFO_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_cntlncsdc_cntctinfo',
    'label' => 'LBL_NCSDC_CNTLNK_NCSDC_CNTCTINFO_FROM_NCSDC_CNTCTINFO_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  */
  'NCSDC_CNTLNEVENTINFO_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_cntlncsdc_eventinfo',
    'label' => 'LBL_NCSDC_CNTLNK_NCSDC_EVENTINFO_FROM_NCSDC_EVENTINFO_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'NCSDC_CNTLNNSTRUMENT_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_cntlnsdc_instrument',
    'label' => 'LBL_NCSDC_CNTLNK_NCSDC_INSTRUMENT_FROM_NCSDC_INSTRUMENT_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'NCSDC_CNTLNLT_PERSON_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_cntlnk_plt_person',
    'label' => 'LBL_NCSDC_CNTLNK_PLT_PERSON_FROM_PLT_PERSON_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'NCSDC_CNTLN_PROVIDER_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_cntlnk_olt_provider',
    'label' => 'LBL_NCSDC_CNTLNK_OLT_PROVIDER_FROM_OLT_PROVIDER_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'NCSDC_CNTLNK_NOTES_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_cntlnk_notes',
    'label' => 'LBL_NCSDC_CNTLNK_NOTES_FROM_NOTES_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'default' => true,
  ),
);
?>
