<?php
$module_name='PLT_PPGStsHstry';
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
      'popup_module' => 'PLT_PPGStsHstry',
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
    'ppg_status' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_PPG_STATUS',
      'sortable' => false,
      'width' => '10%',
    ),
    'ppg_status_date' => 
    array (
      'type' => 'date',
      'vname' => 'LBL_PPG_STATUS_DATE',
      'width' => '10%',
      'default' => true,
    ),
    'ppg_history_id' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_PPG_HISTORY_ID',
      'width' => '10%',
      'default' => true,
    ),
    'ppg_info_source' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_PPG_INFO_SOURCE',
      'sortable' => false,
      'width' => '10%',
    ),
    'ppg_comment' => 
    array (
      'type' => 'text',
      'studio' => 'visible',
      'vname' => 'LBL_PPG_COMMENT',
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
      'module' => 'PLT_PPGStsHstry',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'PLT_PPGStsHstry',
      'width' => '5%',
      'default' => true,
    ),
  ),
);