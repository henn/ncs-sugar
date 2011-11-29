<?php
// created: 2011-11-29 06:29:22
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
	'widget_class' => 'SubPanelDetailViewLink',   
    'vname' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'rf_thermometer_equip_id' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_RF_THERMOMETER_EQUIP_ID',
    'width' => '10%',
    'default' => true,
  ),
  'date_modified' => 
  array (
    'type' => 'datetime',
    'vname' => 'LBL_DATE_MODIFIED',
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
  'assigned_user_name' => 
  array (
    'link' => 'assigned_user_link',
    'type' => 'relate',
    'vname' => 'LBL_ASSIGNED_TO_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'samp_reffrestaffrstr_name' => 
  array (
    'type' => 'relate',
    'link' => 'samp_reffrer_st_staffrstr',
    'vname' => 'LBL_SAMP_REFFREEZVER_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
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
