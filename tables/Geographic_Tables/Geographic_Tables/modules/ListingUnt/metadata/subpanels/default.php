<?php
$module_name='GT_ListingUnt';
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
      'popup_module' => 'GT_ListingUnt',
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
    'list_line' => 
    array (
      'type' => 'int',
      'vname' => 'LBL_LIST_LINE',
      'width' => '10%',
      'default' => true,
    ),
    'list_source' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_LIST_SOURCE',
      'sortable' => false,
      'width' => '10%',
    ),
    'list_comment' => 
    array (
      'type' => 'text',
      'studio' => 'visible',
      'vname' => 'LBL_LIST_COMMENT',
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
    'edit_button' => 
    array (
      'widget_class' => 'SubPanelEditButton',
      'module' => 'GT_ListingUnt',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'GT_ListingUnt',
      'width' => '5%',
      'default' => true,
    ),
  ),
);