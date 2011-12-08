<?php
// created: 2011-12-08 15:46:03
$layout_defs["OLT_Provider"]["subpanel_setup"]["olt_provider_ltt_email"] = array (
  'order' => 100,
  'module' => 'LTT_Email',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_OLT_PROVIDER_LTT_EMAIL_FROM_LTT_EMAIL_TITLE',
  'get_subpanel_data' => 'olt_provider_ltt_email',
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
?>
