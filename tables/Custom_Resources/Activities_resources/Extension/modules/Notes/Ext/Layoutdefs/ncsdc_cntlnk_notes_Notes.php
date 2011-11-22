<?php
// created: 2011-11-21 14:21:06
$layout_defs["Notes"]["subpanel_setup"]["ncsdc_cntlnk_notes"] = array (
  'order' => 100,
  'module' => 'NCSDC_CntLnk',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_NCSDC_CNTLNK_NOTES_FROM_NCSDC_CNTLNK_TITLE',
  'get_subpanel_data' => 'ncsdc_cntlnk_notes',
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
