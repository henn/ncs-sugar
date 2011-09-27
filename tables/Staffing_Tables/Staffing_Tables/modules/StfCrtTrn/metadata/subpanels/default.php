<?php
$module_name='ST_StfCrtTrn';
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
      'popup_module' => 'ST_StfCrtTrn',
    ),
  ),
  'where' => '',
  'list_fields' => 
  array (
    'name' => 
    array (
      'vname' => 'LBL_NAME',
      'widget_class' => 'SubPanelDetailViewLink',
      'width' => '20%',
      'default' => true,
    ),
    'cert_train_type' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_CERT_TRAIN_TYPE',
      'sortable' => false,
      'width' => '10%',
    ),
    'cert_completed' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_CERT_COMPLETED',
      'sortable' => false,
      'width' => '10%',
    ),
    'cert_date' => 
    array (
      'type' => 'date',
      'vname' => 'LBL_CERT_DATE',
      'width' => '10%',
      'default' => true,
    ),
    'cert_type_frequency' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_CERT_TYPE_FREQUENCY',
      'width' => '10%',
      'default' => true,
    ),
    'edit_button' => 
    array (
      'widget_class' => 'SubPanelEditButton',
      'module' => 'ST_StfCrtTrn',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'ST_StfCrtTrn',
      'width' => '5%',
      'default' => true,
    ),
  ),
);