<?php
$module_name = 'NCSDC_LINK_CONTACT';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      'psu_id' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PSU_ID',
        'sortable' => false,
        'width' => '10%',
        'name' => 'psu_id',
      ),
      'contact_link_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CONTACT_LINK_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'contact_link_id',
      ),
      'contact_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CONTACT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'contact_id',
      ),
      'event_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_EVENT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'event_id',
      ),
      'instrument_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_INSTRUMENT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'instrument_id',
      ),
      'staff_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_id',
      ),
      'specimen_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SPECIMEN_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'specimen_id',
      ),
      'person_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PERSON_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'person_id',
      ),
      'provider_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PROVIDER_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'provider_id',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
