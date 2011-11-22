<?php
// created: 2011-11-21 15:45:38
$layout_defs["Notes"]["subpanel_setup"]["notes_plt_partauthfrm"] = array (
  'order' => 100,
  'module' => 'PLT_PartAuthFrm',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_NOTES_PLT_PARTAUTHFRM_FROM_PLT_PARTAUTHFRM_TITLE',
  'get_subpanel_data' => 'notes_plt_partauthfrm',
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
