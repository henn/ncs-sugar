<?php
// created: 2011-12-08 15:46:32
$layout_defs["OLT_Provider"]["subpanel_setup"]["ncsdc_cntlnk_olt_provider"] = array (
  'order' => 100,
  'module' => 'NCSDC_CntLnk',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_NCSDC_CNTLNK_OLT_PROVIDER_FROM_NCSDC_CNTLNK_TITLE',
  'get_subpanel_data' => 'ncsdc_cntlnk_olt_provider',
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
