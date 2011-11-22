<?php
// created: 2011-11-21 15:43:31
$layout_defs["Notes"]["subpanel_setup"]["notes_ncsdc_incident"] = array (
  'order' => 100,
  'module' => 'NCSDC_Incident',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_NOTES_NCSDC_INCIDENT_FROM_NCSDC_INCIDENT_TITLE',
  'get_subpanel_data' => 'notes_ncsdc_incident',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
