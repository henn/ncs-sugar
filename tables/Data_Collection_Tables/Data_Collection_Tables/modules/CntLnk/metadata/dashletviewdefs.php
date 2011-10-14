<?php
$dashletData['NCSDC_CntLnkDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'type' => 'assigned_user_name',
    'default' => 'Administrator',
  ),
);
$dashletData['NCSDC_CntLnkDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'name' => 'date_entered',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'ncsdc_cntlnstaffrstr_name' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_cntlnk_st_staffrstr',
    'label' => 'LBL_NCSDC_CNTLNK_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'ncsdc_cntlncntctinfo_name' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_cntlncsdc_cntctinfo',
    'label' => 'LBL_NCSDC_CNTLNK_NCSDC_CNTCTINFO_FROM_NCSDC_CNTCTINFO_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'ncsdc_cntlneventinfo_name' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_cntlncsdc_eventinfo',
    'label' => 'LBL_NCSDC_CNTLNK_NCSDC_EVENTINFO_FROM_NCSDC_EVENTINFO_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'ncsdc_cntlnnstrument_name' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_cntlnsdc_instrument',
    'label' => 'LBL_NCSDC_CNTLNK_NCSDC_INSTRUMENT_FROM_NCSDC_INSTRUMENT_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'ncsdc_cntlnlt_person_name' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_cntlnk_plt_person',
    'label' => 'LBL_NCSDC_CNTLNK_PLT_PERSON_FROM_PLT_PERSON_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'ncsdc_cntln_provider_name' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_cntlnk_olt_provider',
    'label' => 'LBL_NCSDC_CNTLNK_OLT_PROVIDER_FROM_OLT_PROVIDER_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'ncsdc_cntlnk_notes_name' => 
  array (
    'type' => 'relate',
    'link' => 'ncsdc_cntlnk_notes',
    'label' => 'LBL_NCSDC_CNTLNK_NOTES_FROM_NOTES_TITLE',
    'width' => '10%',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
);
