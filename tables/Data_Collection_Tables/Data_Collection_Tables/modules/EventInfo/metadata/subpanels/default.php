<?php
$module_name='NCSDC_EventInfo';
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
      'popup_module' => 'NCSDC_EventInfo',
    ),
  ),
  'where' => '',
  'list_fields' => 
  array (
    'name' => 
    array (
      'vname' => 'LBL_NAME',
      'widget_class' => 'SubPanelDetailViewLink',
      'width' => '15%',
      'default' => true,
    ),
    'event_type' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_EVENT_TYPE',
      'sortable' => false,
      'width' => '15%',
    ),
    'event_type_oth' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_EVENT_TYPE_OTH',
      'width' => '10%',
      'default' => true,
    ),
    'event_disp' => 
    array (
      'type' => 'int',
      'vname' => 'LBL_EVENT_DISP',
      'width' => '10%',
      'default' => true,
    ),
    'event_start_date_time' => 
    array (
      'type' => 'datetimecombo',
      'vname' => 'LBL_EVENT_START_DATE_TIME',
      'width' => '15%',
      'default' => true,
    ),
    'event_end_date_time' => 
    array (
      'type' => 'datetimecombo',
      'vname' => 'LBL_EVENT_END_DATE_TIME',
      'width' => '15%',
      'default' => true,
    ),
    'date_modified' => 
    array (
      'vname' => 'LBL_DATE_MODIFIED',
      'width' => '15%',
      'default' => true,
    ),
    'edit_button' => 
    array (
      'widget_class' => 'SubPanelEditButton',
      'module' => 'NCSDC_EventInfo',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'NCSDC_EventInfo',
      'width' => '5%',
      'default' => true,
    ),
  ),
);