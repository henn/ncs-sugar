<?php
// created: 2011-11-21 15:38:00
$layout_defs["Notes"]["subpanel_setup"]["notes_ncsdc_eventinfo"] = array (
  'order' => 100,
  'module' => 'NCSDC_EventInfo',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_NOTES_NCSDC_EVENTINFO_FROM_NCSDC_EVENTINFO_TITLE',
  'get_subpanel_data' => 'notes_ncsdc_eventinfo',
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
