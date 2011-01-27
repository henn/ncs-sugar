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
      'contact_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CONTACT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'contact_id',
      ),
      'contact_disp' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CONTACT_DISP',
        'width' => '10%',
        'default' => true,
        'name' => 'contact_disp',
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
      'contact_type_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CONTACT_TYPE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'contact_type_oth',
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
      'contact_lang_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CONTACT_LANG_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'contact_lang_oth',
      ),
      'contact_interpret' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_CONTACT_INTERPRET',
        'sortable' => false,
        'width' => '10%',
        'name' => 'contact_interpret',
      ),
      'contact_interpret_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CONTACT_INTERPRET_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'contact_interpret_oth',
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
      'contact_location_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CONTACT_LOCATION_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'contact_location_oth',
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
      'contact_private_detail' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CONTACT_PRIVATE_DETAIL',
        'width' => '10%',
        'default' => true,
        'name' => 'contact_private_detail',
      ),
      'contact_distance' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_CONTACT_DISTANCE',
        'width' => '10%',
        'default' => true,
        'name' => 'contact_distance',
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
      'who_contact_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_WHO_CONTACT_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'who_contact_oth',
      ),
      'contact_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_CONTACT_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'contact_comment',
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
