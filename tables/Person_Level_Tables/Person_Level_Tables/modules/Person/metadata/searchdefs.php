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
      'first_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_FIRST_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'first_name',
      ),
      'last_name' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_LAST_NAME',
        'width' => '10%',
        'default' => true,
        'name' => 'last_name',
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
      'age' => 
      array (
        'type' => 'int',
        'label' => 'LBL_AGE',
        'width' => '10%',
        'default' => true,
        'name' => 'age',
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
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
      'age' => 
      array (
        'type' => 'int',
        'label' => 'LBL_AGE',
        'width' => '10%',
        'default' => true,
        'name' => 'age',
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
