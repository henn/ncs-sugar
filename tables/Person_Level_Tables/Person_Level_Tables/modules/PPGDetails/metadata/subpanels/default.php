<?php
$module_name='PLT_PPGDetails';
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
      'popup_module' => 'PLT_PPGDetails',
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
    'ppg_details_id' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_PPG_DETAILS_ID',
      'width' => '10%',
      'default' => true,
    ),
    'orig_due_date' => 
    array (
      'type' => 'date',
      'vname' => 'LBL_ORIG_DUE_DATE',
      'width' => '10%',
      'default' => true,
    ),
    'ppg_first' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_PPG_FIRST',
      'sortable' => false,
      'width' => '10%',
    ),
    'ppg_pid_status' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_PPG_PID_STATUS',
      'sortable' => false,
      'width' => '10%',
    ),
    'description' => 
    array (
      'type' => 'text',
      'vname' => 'LBL_DESCRIPTION',
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
      'module' => 'PLT_PPGDetails',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'PLT_PPGDetails',
      'width' => '5%',
      'default' => true,
    ),
  ),
);