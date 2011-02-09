<?php
$module_name='LTT_TELEPHONE';
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
      'popup_module' => 'LTT_TELEPHONE',
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
    'phone_type' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_PHONE_TYPE',
      'sortable' => false,
      'width' => '10%',
    ),
    'phone_landline' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_PHONE_LANDLINE',
      'sortable' => false,
      'width' => '10%',
    ),
    'phone_nbr' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_PHONE_NBR',
      'width' => '10%',
      'default' => true,
    ),
    'phone_ext' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_PHONE_EXT',
      'width' => '10%',
      'default' => true,
    ),
    'cell_permission' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_CELL_PERMISSION',
      'sortable' => false,
      'width' => '10%',
    ),
    'text_permission' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_TEXT_PERMISSION',
      'sortable' => false,
      'width' => '10%',
    ),
    'phone_comment' => 
    array (
      'type' => 'text',
      'studio' => 'visible',
      'vname' => 'LBL_PHONE_COMMENT',
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
      'module' => 'LTT_TELEPHONE',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'LTT_TELEPHONE',
      'width' => '5%',
      'default' => true,
    ),
  ),
);