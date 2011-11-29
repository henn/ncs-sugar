<?php
// created: 2011-11-29 06:32:42
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
	'widget_class' => 'SubPanelDetailViewLink',  
    'vname' => 'LBL_NAME',
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
  'equipment_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_EQUIPMENT_TYPE',
    'sortable' => false,
    'width' => '10%',
  ),
  'samp_enloge_srscinfo_name' => 
  array (
    'type' => 'relate',
    'link' => 'samp_enloge_samp_srscinfo',
    'vname' => 'LBL_SAMP_ENLOGEQUIP_SAMP_SRSCINFO_FROM_SAMP_SRSCINFO_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'equip_issue' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_EQUIP_ISSUE',
    'sortable' => false,
    'width' => '10%',
  ),
  'samp_enlogestaffrstr_name' => 
  array (
    'type' => 'relate',
    'link' => 'samp_enlogep_st_staffrstr',
    'vname' => 'LBL_SAMP_ENLOGEQUIP_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
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
