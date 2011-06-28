<?php
// created: 2011-06-07 15:14:17
$layout_defs["Meetings"]["subpanel_setup"]["meetings_olt_provider"] = array (
  'order' => 100,
  'module' => 'OLT_Provider',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_MEETINGS_OLT_PROVIDER_FROM_OLT_PROVIDER_TITLE',
  'get_subpanel_data' => 'meetings_olt_provider',
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
