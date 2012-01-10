<?php
$module_name='NCSDC_Instrument';
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
      'popup_module' => 'NCSDC_Instrument',
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
    'instrument_start_date_time' => 
    array (
      'type' => 'datetimecombo',
      'vname' => 'LBL_INSTRUMENT_START_DATE_TIME',
      'width' => '10%',
      'default' => true,
    ),
    'instrument_end_date_time' => 
    array (
      'type' => 'datetimecombo',
      'vname' => 'LBL_INSTRUMENT_END_DATE_TIME',
      'width' => '10%',
      'default' => true,
    ),
    'instrument_type' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_INSTRUMENT_TYPE',
      'sortable' => false,
      'width' => '10%',
    ),
    'instrument_type_oth' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_INSTRUMENT_TYPE_OTH',
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
      'module' => 'NCSDC_Instrument',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'NCSDC_Instrument',
      'width' => '5%',
      'default' => true,
    ),
  ),
);