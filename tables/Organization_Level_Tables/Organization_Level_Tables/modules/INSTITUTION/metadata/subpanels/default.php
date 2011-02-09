<?php
$module_name='OLT_INSTITUTION';
$subpanel_layout = array (
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'popup_module' => 'OLT_INSTITUTION',
    ),
  ),
  'where' => '',
  'list_fields' => 
  array (
    'name' => 
    array (
      'vname' => 'LBL_NAME',
      'widget_class' => 'SubPanelDetailViewLink',
      'width' => '45%',
      'default' => true,
    ),
    'institute_type' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_INSTITUTE_TYPE',
      'sortable' => false,
      'width' => '10%',
    ),
    'institute_info_source' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_INSTITUTE_INFO_SOURCE',
      'sortable' => false,
      'width' => '10%',
    ),
    'institute_comment' => 
    array (
      'type' => 'text',
      'studio' => 'visible',
      'vname' => 'LBL_INSTITUTE_COMMENT',
      'sortable' => false,
      'width' => '10%',
      'default' => true,
    ),
    'date_modified' => 
    array (
      'vname' => 'LBL_DATE_MODIFIED',
      'width' => '45%',
      'default' => true,
    ),
    'edit_button' => 
    array (
      'widget_class' => 'SubPanelEditButton',
      'module' => 'OLT_INSTITUTION',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'OLT_INSTITUTION',
      'width' => '5%',
      'default' => true,
    ),
  ),
);