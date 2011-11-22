<?php
// created: 2011-11-21 15:38:26
$layout_defs["Notes"]["subpanel_setup"]["notes_plt_prtcptcnsnt"] = array (
  'order' => 100,
  'module' => 'PLT_PrtcptCnsnt',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_NOTES_PLT_PRTCPTCNSNT_FROM_PLT_PRTCPTCNSNT_TITLE',
  'get_subpanel_data' => 'notes_plt_prtcptcnsnt',
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
