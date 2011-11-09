<?php
$module_name='ST_WkOEAct';
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
      'popup_module' => 'ST_WkOEAct',
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
    'title' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_TITLE',
      'width' => '10%',
      'default' => true,
    ),
    'outreach_type' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_OUTREACH_TYPE',
      'sortable' => false,
      'width' => '10%',
    ),
    'outreach_event_date' => 
    array (
      'type' => 'date',
      'vname' => 'LBL_OUTREACH_EVENT_DATE',
      'width' => '10%',
      'default' => true,
    ),
    'outreach_quantity' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_OUTREACH_QUANTITY',
      'width' => '10%',
      'default' => true,
    ),
    'outreach_staffing' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_OUTREACH_STAFFING',
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
      'module' => 'ST_WkOEAct',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'ST_WkOEAct',
      'width' => '5%',
      'default' => true,
    ),
  ),
);

?>