<?php
$module_name = 'NCSDC_LINK_CONTACT';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'psu_id',
            'studio' => 'visible',
            'label' => 'LBL_PSU_ID',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'contact_link_id',
            'label' => 'LBL_CONTACT_LINK_ID',
          ),
          1 => 
          array (
            'name' => 'contact_id',
            'label' => 'LBL_CONTACT_ID',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'event_id',
            'label' => 'LBL_EVENT_ID',
          ),
          1 => 
          array (
            'name' => 'instrument_id',
            'label' => 'LBL_INSTRUMENT_ID',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'staff_id',
            'label' => 'LBL_STAFF_ID',
          ),
          1 => 
          array (
            'name' => 'specimen_id',
            'label' => 'LBL_SPECIMEN_ID',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'person_id',
            'label' => 'LBL_PERSON_ID',
          ),
          1 => 
          array (
            'name' => 'provider_id',
            'label' => 'LBL_PROVIDER_ID',
          ),
        ),
      ),
    ),
  ),
);
?>
