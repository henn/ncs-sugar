<?php
// created: 2011-12-08 15:46:04
$layout_defs["OLT_Provider"]["subpanel_setup"]["olt_prsnprvk_olt_provider"] = array (
  'order' => 100,
  'module' => 'OLT_PrsnPrvdLnk',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_OLT_PRSNPRVDLNK_OLT_PROVIDER_FROM_OLT_PRSNPRVDLNK_TITLE',
  'get_subpanel_data' => 'olt_prsnprvk_olt_provider',
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
