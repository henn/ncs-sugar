<?php
// created: 2011-11-29 06:03:34
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
  'description' => 
  array (
    'type' => 'text',
    'vname' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'receipt_comment' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_RECEIPT_COMMENT',
    'sortable' => false,
    'width' => '10%',
  ),
  'samp_specrespecequip_name' => 
  array (
    'type' => 'relate',
    'link' => 'samp_specresamp_specequip',
    'vname' => 'LBL_SAMP_SPECRECEIPT_SAMP_SPECEQUIP_FROM_SAMP_SPECEQUIP_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'person_centrifuging_id' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_PERSON_CENTRIFUGING_ID',
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
