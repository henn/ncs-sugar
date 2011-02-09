<?php
$module_name='GT_Household';
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
      'popup_module' => 'GT_Household',
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
    'hh_elig' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_HH_ELIG',
      'sortable' => false,
      'width' => '10%',
    ),
    'hh_structure' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_HH_STRUCTURE',
      'sortable' => false,
      'width' => '10%',
    ),
    'hh_status' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_HH_STATUS',
      'sortable' => false,
      'width' => '10%',
    ),
    'date_modified' => 
    array (
      'vname' => 'LBL_DATE_MODIFIED',
      'width' => '45%',
      'default' => true,
    ),
    'hh_comment' => 
    array (
      'type' => 'text',
      'studio' => 'visible',
      'vname' => 'LBL_HH_COMMENT',
      'sortable' => false,
      'width' => '10%',
      'default' => true,
    ),
    'edit_button' => 
    array (
      'widget_class' => 'SubPanelEditButton',
      'module' => 'GT_Household',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'GT_Household',
      'width' => '5%',
      'default' => true,
    ),
  ),
);