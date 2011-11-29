<?php
// created: 2011-11-29 06:15:12
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
	'widget_class' => 'SubPanelDetailViewLink',     
    'vname' => 'LBL_NAME',
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
  'storage_comment' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_STORAGE_COMMENT',
    'width' => '10%',
    'default' => true,
  ),
  'samp_specststaffrstr_name' => 
  array (
    'type' => 'relate',
    'link' => 'samp_specste_st_staffrstr',
    'vname' => 'LBL_SAMP_SPECSTORAGE_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'removed_from_storage_dt' => 
  array (
    'type' => 'datetimecombo',
    'vname' => 'LBL_REMOVED_FROM_STORAGE_DT',
    'width' => '10%',
    'default' => true,
  ),
  'placed_in_storage_dt' => 
  array (
    'type' => 'datetimecombo',
    'vname' => 'LBL_PLACED_IN_STORAGE_DT',
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
