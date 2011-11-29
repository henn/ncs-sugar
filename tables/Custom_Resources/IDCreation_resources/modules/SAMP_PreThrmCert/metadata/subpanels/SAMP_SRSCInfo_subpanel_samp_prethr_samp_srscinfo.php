<?php
// created: 2011-11-29 05:27:15
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
	'vname' => 'LBL_NAME',
	'widget_class' => 'SubPanelDetailViewLink',     
    'width' => '10%',
    'default' => true,
  ),
  'certification_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_CERTIFICATION_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'description' => 
  array (
    'type' => 'text',
    'vname' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'certification_expire_dt' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_CERTIFICATION_EXPIRE_DT',
    'width' => '10%',
    'default' => true,
  ),
  'samp_prethrp_enequip_name' => 
  array (
    'type' => 'relate',
    'link' => 'samp_prethrt_samp_enequip',
    'vname' => 'LBL_SAMP_PRETHRMCERT_SAMP_ENEQUIP_FROM_SAMP_ENEQUIP_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'samp_prethrstaffrstr_name' => 
  array (
    'type' => 'relate',
    'link' => 'samp_prethrt_st_staffrstr',
    'vname' => 'LBL_SAMP_PRETHRMCERT_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'precision_cert_status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_PRECISION_CERT_STATUS',
    'sortable' => false,
    'width' => '10%',
  ),
  'date_modified' => 
  array (
    'type' => 'datetime',
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
	'edit_button'=>array(
		'widget_class' => 'SubPanelEditButton',
		'module' => $module_name,
		'width' => '4%',
	),
	'remove_button'=>array(
		'widget_class' => 'SubPanelRemoveButton',
		'module' => $module_name,
		'width' => '5%',
	),    
);
?>
