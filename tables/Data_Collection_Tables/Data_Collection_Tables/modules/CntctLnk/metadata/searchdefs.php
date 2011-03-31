<?php
$module_name = 'NCSDC_CntctLnk';
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
      'person_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PERSON_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'person_id',
      ),
      'staff_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_id',
      ),
      'provider_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PROVIDER_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'provider_id',
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
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'person_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PERSON_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'person_id',
      ),
      'staff_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_id',
      ),
      'provider_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PROVIDER_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'provider_id',
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
      'specimen_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_SPECIMEN_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'specimen_id',
      ),
      'assigned_user_id' => 
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
        'default' => true,
        'width' => '10%',
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
