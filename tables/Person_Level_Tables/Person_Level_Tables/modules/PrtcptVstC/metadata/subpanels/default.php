<?php
$module_name='PLT_PrtcptVstC';
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
      'popup_module' => 'PLT_PrtcptVstC',
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
    'vis_consent_type' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_VIS_CONSENT_TYPE',
      'sortable' => false,
      'width' => '10%',
    ),
    'vis_who_consented' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_VIS_WHO_CONSENTED',
      'sortable' => false,
      'width' => '10%',
    ),
    'vis_comments' => 
    array (
      'type' => 'text',
      'studio' => 'visible',
      'vname' => 'LBL_VIS_COMMENTS',
      'sortable' => false,
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
      'module' => 'PLT_PrtcptVstC',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'PLT_PrtcptVstC',
      'width' => '5%',
      'default' => true,
    ),
  ),
);