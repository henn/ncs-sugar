<?php
$module_name='PLT_LkPrsPrtcpt';
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
      'popup_module' => 'PLT_LkPrsPrtcpt',
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
    'is_active' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_IS_ACTIVE',
      'sortable' => false,
      'width' => '10%',
    ),
    'relation' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_RELATION',
      'sortable' => false,
      'width' => '10%',
    ),
    'assigned_user_name' => 
    array (
      'link' => 'assigned_user_link',
      'type' => 'relate',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
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
      'module' => 'PLT_LkPrsPrtcpt',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'PLT_LkPrsPrtcpt',
      'width' => '5%',
      'default' => true,
    ),
  ),
);