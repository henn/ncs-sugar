<?php
$module_name = 'NCSDC_CntctInfo';
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
      'contact_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CONTACT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'contact_id',
      ),
      'contact_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CONTACT_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'contact_type',
      ),
      'contact_disp' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CONTACT_DISP',
        'width' => '10%',
        'default' => true,
        'name' => 'contact_disp',
      ),
      'contact_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_CONTACT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'contact_date',
      ),
      'contact_location' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CONTACT_LOCATION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'contact_location',
      ),
      'who_contacted' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_WHO_CONTACTED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'who_contacted',
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
      'contact_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CONTACT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'contact_id',
      ),
      'contact_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CONTACT_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'contact_type',
      ),
      'contact_disp' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CONTACT_DISP',
        'width' => '10%',
        'default' => true,
        'name' => 'contact_disp',
      ),
      'contact_lang' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CONTACT_LANG',
        'sortable' => false,
        'width' => '10%',
        'name' => 'contact_lang',
      ),
      'contact_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_CONTACT_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'contact_date',
      ),
      'contact_location' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CONTACT_LOCATION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'contact_location',
      ),
      'contact_private' => 
      array (
        'type' => 'enum',
        'studio' => 'visible',
        'default' => true,
        'label' => 'LBL_CONTACT_PRIVATE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'contact_private',
      ),
      'who_contacted' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_WHO_CONTACTED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'who_contacted',
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
