<?php
$module_name='SAMP_SPECStorage';
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
      'popup_module' => 'SAMP_SPECStorage',
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
    'storage_fill' => 
    array (
      'type' => 'enum',
      'studio' => 'visible',
      'vname' => 'LBL_STORAGE_FILL',
      'sortable' => false,
      'width' => '10%',
      'default' => true,
    ),
    'master_storage_unit' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_MASTER_STORAGE_UNIT',
      'sortable' => false,
      'width' => '10%',
    ),
    'storage_comment' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_STORAGE_COMMENT',
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
      'module' => 'SAMP_SPECStorage',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'SAMP_SPECStorage',
      'width' => '5%',
      'default' => true,
    ),
  ),
);

?>