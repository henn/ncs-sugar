<?php
$module_name = 'PLT_Person';
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
      'prefix' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PREFIX',
        'sortable' => false,
        'width' => '10%',
        'name' => 'prefix',
      ),
      'first_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_FIRST_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'first_name',
      ),
      'middle_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_MIDDLE_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'middle_name',
      ),
      'last_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_LAST_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'last_name',
      ),
      'maiden_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_MAIDEN_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'maiden_name',
      ),
      'suffix' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SUFFIX',
        'sortable' => false,
        'width' => '10%',
        'name' => 'suffix',
      ),
      'title' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_TITLE',
        'width' => '10%',
        'default' => true,
        'name' => 'title',
      ),
      'sex' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SEX',
        'sortable' => false,
        'width' => '10%',
        'name' => 'sex',
      ),
      'person_dob' => 
      array (
        'type' => 'date',
        'studio' => 'visible',
        'label' => 'LBL_PERSON_DOB',
        'width' => '10%',
        'default' => true,
        'name' => 'person_dob',
      ),
      'deceased' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_DECEASED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'deceased',
      ),
      'ethnic_group' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_ETHNIC_GROUP',
        'sortable' => false,
        'width' => '10%',
        'name' => 'ethnic_group',
      ),
      'person_lang' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PERSON_LANG',
        'sortable' => false,
        'width' => '10%',
        'name' => 'person_lang',
      ),
      'person_lang_other' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PERSON_LANG_OTHER',
        'width' => '10%',
        'default' => true,
        'name' => 'person_lang_other',
      ),
      'maristat' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MARISTAT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'maristat',
      ),
      'maristat_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_MARISTAT_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'maristat_oth',
      ),
      'pref_contact' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PREF_CONTACT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'pref_contact',
      ),
      'pref_contact_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PREF_CONTACT_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'pref_contact_oth',
      ),
      'plan_move' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PLAN_MOVE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'plan_move',
      ),
      'move_info' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MOVE_INFO',
        'sortable' => false,
        'width' => '10%',
        'name' => 'move_info',
      ),
      'new_address_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NEW_ADDRESS_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'new_address_id',
      ),
      'when_move' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_WHEN_MOVE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'when_move',
      ),
      'date_move' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DATE_MOVE',
        'width' => '10%',
        'default' => true,
        'name' => 'date_move',
      ),
      'p_tracing' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_P_TRACING',
        'sortable' => false,
        'width' => '10%',
        'name' => 'p_tracing',
      ),
      'p_info_source' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_P_INFO_SOURCE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'p_info_source',
      ),
      'p_info_source_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_P_INFO_SOURCE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'p_info_source_oth',
      ),
      'p_info_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_P_INFO_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'p_info_date',
      ),
      'p_info_update' => 
      array (
        'type' => 'date',
        'label' => 'LBL_P_INFO_UPDATE',
        'width' => '10%',
        'default' => true,
        'name' => 'p_info_update',
      ),
      'person_comment' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_PERSON_COMMENT',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'person_comment',
      ),
      'age_range' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_AGE_RANGE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'age_range',
      ),
      'age' => 
      array (
        'type' => 'int',
        'label' => 'LBL_AGE',
        'width' => '10%',
        'default' => true,
        'name' => 'age',
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
