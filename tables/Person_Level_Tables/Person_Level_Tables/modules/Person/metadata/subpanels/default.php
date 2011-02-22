<?php
$module_name='PLT_PERSON';
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
      'popup_module' => 'PLT_PERSON',
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
    'first_name' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_FIRST_NAME',
      'width' => '10%',
      'default' => true,
    ),
    'last_name' => 
    array (
      'type' => 'varchar',
      'vname' => 'LBL_LAST_NAME',
      'width' => '10%',
      'default' => true,
    ),
    'person_dob' => 
    array (
      'type' => 'date',
      'studio' => 'visible',
      'vname' => 'LBL_PERSON_DOB',
      'width' => '10%',
      'default' => true,
    ),
    'maristat' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_MARISTAT',
      'sortable' => false,
      'width' => '10%',
    ),
    'pref_contact' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_PREF_CONTACT',
      'sortable' => false,
      'width' => '10%',
    ),
    'move_info' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'vname' => 'LBL_MOVE_INFO',
      'sortable' => false,
      'width' => '10%',
    ),
    'person_comment' => 
    array (
      'type' => 'text',
      'studio' => 'visible',
      'vname' => 'LBL_PERSON_COMMENT',
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
      'module' => 'PLT_PERSON',
      'width' => '4%',
      'default' => true,
    ),
    'remove_button' => 
    array (
      'widget_class' => 'SubPanelRemoveButton',
      'module' => 'PLT_PERSON',
      'width' => '5%',
      'default' => true,
    ),
  ),
);