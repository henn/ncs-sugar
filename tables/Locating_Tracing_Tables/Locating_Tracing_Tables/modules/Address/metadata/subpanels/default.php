<?php
$module_name='LTT_Address';
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
      'popup_module' => 'LTT_Address',
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
    'address_type' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_ADDRESS_TYPE',
      'sortable' => false,
      'width' => '10%',
    ),
    'address_1' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_ADDRESS_1',
      'width' => '10%',
      'default' => true,
    ),
    'address_2' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_ADDRESS_2',
      'width' => '10%',
      'default' => true,
    ),
    'city' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_CITY',
      'width' => '10%',
      'default' => true,
    ),
    'state' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_STATE',
      'sortable' => false,
      'width' => '10%',
    ),
    'zip' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_ZIP',
      'width' => '10%',
      'default' => true,
    ),
    'address_description' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_ADDRESS_DESCRIPTION',
      'sortable' => false,
      'width' => '10%',
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
      'module' => 'LTT_Address',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'LTT_Address',
      'width' => '5%',
      'default' => true,
    ),
  ),
);