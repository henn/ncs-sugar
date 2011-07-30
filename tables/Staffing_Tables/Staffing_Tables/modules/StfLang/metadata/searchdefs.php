<?php
$module_name = 'ST_StfLang';
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
      'staff_lang' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAFF_LANG',
        'sortable' => false,
        'width' => '10%',
        'name' => 'staff_lang',
      ),
      'staff_lang_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_LANG_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_lang_oth',
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
      'staff_lang' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STAFF_LANG',
        'sortable' => false,
        'width' => '10%',
        'name' => 'staff_lang',
      ),
      'staff_lang_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_LANG_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_lang_oth',
      ),
      'assigned_user_name' => 
      array (
        'link' => 'assigned_user_link',
        'type' => 'relate',
        'label' => 'LBL_ASSIGNED_TO_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'assigned_user_name',
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
