<?php
$module_name='PLT_PrtcptCnsnt';
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
      'popup_module' => 'PLT_PrtcptCnsnt',
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
    'participant_consent_id' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_PARTICIPANT_CONSENT_ID',
      'width' => '10%',
      'default' => true,
    ),
    'consent_type' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_CONSENT_TYPE',
      'sortable' => false,
      'width' => '10%',
    ),
    'consent_given' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_CONSENT_GIVEN',
      'sortable' => false,
      'width' => '10%',
    ),
    'consent_comments' => 
    array (
      'type' => 'text',
      'studio' => 'visible',
      'vname' => 'LBL_CONSENT_COMMENTS',
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
      'module' => 'PLT_PrtcptCnsnt',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'PLT_PrtcptCnsnt',
      'width' => '5%',
      'default' => true,
    ),
  ),
);