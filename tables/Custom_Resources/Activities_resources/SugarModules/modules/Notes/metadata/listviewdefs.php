<?php
$listViewDefs ['Notes'] = 
array (
  'NAME' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_SUBJECT',
    'link' => true,
    'default' => true,
  ),
  'START_DATE_TIME_C' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_START_DATE_TIME',
    'width' => '10%',
  ),
  'END_DATE_TIME_C' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_END_DATE_TIME',
    'width' => '10%',
  ),
  'CONTACT_LANGUAGE_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONTACT_LANGUAGE',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONTACT_INTERPRET_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONTACT_INTERPRET',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONTACT_LOCATION_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONTACT_LOCATION',
    'sortable' => false,
    'width' => '10%',
  ),
  'WHO_CONTACTED_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_WHO_CONTACTED',
    'sortable' => false,
    'width' => '10%',
  ),
  'CONTACT_NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_CONTACT',
    'link' => true,
    'id' => 'CONTACT_ID',
    'module' => 'Contacts',
    'default' => true,
    'ACLTag' => 'CONTACT',
    'related_fields' => 
    array (
      0 => 'contact_id',
    ),
    'NOTES_SUBJECT_C' => 
    array (
      'type' => 'varchar',
      'default' => true,
      'label' => 'LBL_NOTES_SUBJECT',
      'width' => '10%',
    ),
    'CONTACT_TYPE_C' => 
    array (
      'type' => 'enum',
      'default' => true,
      'studio' => 'visible',
      'label' => 'LBL_CONTACT_TYPE',
      'sortable' => false,
      'width' => '10%',
    ),
    'NCSDC_EVENTNFO_NOTES_NAME' => 
    array (
      'type' => 'relate',
      'link' => 'ncsdc_eventinfo_notes',
      'label' => 'LBL_NCSDC_EVENTINFO_NOTES_FROM_NCSDC_EVENTINFO_TITLE',
      'width' => '10%',
      'default' => true,
    ),
    'PARENT_NAME' => 
    array (
      'width' => '20%',
      'label' => 'LBL_LIST_RELATED_TO',
      'dynamic_module' => 'PARENT_TYPE',
      'id' => 'PARENT_ID',
      'link' => true,
      'default' => true,
      'sortable' => false,
      'ACLTag' => 'PARENT',
      'related_fields' => 
      array (
        0 => 'parent_id',
        1 => 'parent_type',
      ),
    ),
    'FILENAME' => 
    array (
      'width' => '20%',
      'label' => 'LBL_LIST_FILENAME',
      'link' => false,
      'default' => true,
      'related_fields' => 
      array (
        0 => 'file_url',
        1 => 'id',
      ),
      'customCode' => '<a href="index.php?entryPoint=download&id={$ID}&type=Notes" >{$FILENAME}</a>',
    ),
    'FILE_URL' => 
    array (
      'type' => 'function',
      'label' => 'LBL_FILE_URL',
      'width' => '10%',
      'default' => true,
    ),
    'DESCRIPTION' => 
    array (
      'type' => 'text',
      'label' => 'LBL_DESCRIPTION',
      'sortable' => false,
      'width' => '10%',
      'default' => true,
    ),
    'DATE_ENTERED' => 
    array (
      'type' => 'datetime',
      'label' => 'LBL_DATE_ENTERED',
      'width' => '10%',
      'default' => false,
    ),
    'DATE_MODIFIED' => 
    array (
      'width' => '20%',
      'label' => 'LBL_DATE_MODIFIED',
      'link' => false,
      'default' => false,
    ),
    'CREATED_BY_NAME' => 
    array (
      'type' => 'relate',
      'label' => 'LBL_CREATED_BY',
      'width' => '10%',
      'default' => false,
      'related_fields' => 
      array (
        0 => 'created_by',
      ),
    ),
    'PLT_PARTICIANT_NOTES_NAME' => 
    array (
      'type' => 'relate',
      'link' => 'plt_participant_notes',
      'label' => 'LBL_PLT_PARTICIPANT_NOTES_FROM_PLT_PARTICIPANT_TITLE',
      'width' => '10%',
      'default' => false,
    ),
  ),
);
?>
