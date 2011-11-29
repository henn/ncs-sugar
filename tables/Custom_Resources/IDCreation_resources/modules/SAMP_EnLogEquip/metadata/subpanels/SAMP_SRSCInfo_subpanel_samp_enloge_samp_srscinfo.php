<?php
// created: 2011-11-29 05:14:41
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
	'vname' => 'LBL_NAME',
	'widget_class' => 'SubPanelDetailViewLink',  
    'width' => '10%',
    'default' => true,
  ),
  'equip_action' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_EQUIP_ACTION',
    'sortable' => false,
    'width' => '10%',
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
  'equipment_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_EQUIPMENT_TYPE',
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
  'samp_enlogestaffrstr_name' => 
  array (
    'type' => 'relate',
    'link' => 'samp_enlogep_st_staffrstr',
    'vname' => 'LBL_SAMP_ENLOGEQUIP_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'staff_id_reviewer' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_STAFF_ID_REVIEWER',
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
