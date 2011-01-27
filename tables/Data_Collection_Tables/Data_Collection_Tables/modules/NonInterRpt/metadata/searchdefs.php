<?php
$module_name = 'NCSDC_NonInterRpt';
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
      'nir_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NIR_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'nir_id',
      ),
      'nir_vac_info' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_NIR_VAC_INFO',
        'sortable' => false,
        'width' => '10%',
        'name' => 'nir_vac_info',
      ),
      'nir_vac_info_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NIR_VAC_INFO_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'nir_vac_info_oth',
      ),
      'nir_noaccess' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_NIR_NOACCESS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'nir_noaccess',
      ),
      'nir_noaccess_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NIR_NOACCESS_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'nir_noaccess_oth',
      ),
      'nir_access_attempt' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_NIR_ACCESS_ATTEMPT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'nir_access_attempt',
      ),
      'nir_access_attempt_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NIR_ACCESS_ATTEMPT_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'nir_access_attempt_oth',
      ),
      'nir_type_person' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_NIR_TYPE_PERSON',
        'sortable' => false,
        'width' => '10%',
        'name' => 'nir_type_person',
      ),
      'nir_type_person_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_NIR_TYPE_PERSON_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'nir_type_person_oth',
      ),
      'cog_inform_relation' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_COG_INFORM_RELATION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'cog_inform_relation',
      ),
      'cog_inform_relation_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_COG_INFORM_RELATION_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'cog_inform_relation_oth',
      ),
      'perm_disability' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PERM_DISABILITY',
        'sortable' => false,
        'width' => '10%',
        'name' => 'perm_disability',
      ),
      'deceased_inform_relation' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_DECEASED_INFORM_RELATION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'deceased_inform_relation',
      ),
      'deceased_inform_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_DECEASED_INFORM_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'deceased_inform_oth',
      ),
      'who_refused' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_WHO_REFUSED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'who_refused',
      ),
      'who_refused_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_WHO_REFUSED_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'who_refused_oth',
      ),
      'yod' => 
      array (
        'type' => 'int',
        'label' => 'LBL_YOD',
        'width' => '10%',
        'default' => true,
        'name' => 'yod',
      ),
      'refuser_strength' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REFUSER_STRENGTH',
        'sortable' => false,
        'width' => '10%',
        'name' => 'refuser_strength',
      ),
      'ref_action' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REF_ACTION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'ref_action',
      ),
      'perm_ltr' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PERM_LTR',
        'sortable' => false,
        'width' => '10%',
        'name' => 'perm_ltr',
      ),
      'reason_unavail' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_REASON_UNAVAIL',
        'sortable' => false,
        'width' => '10%',
        'name' => 'reason_unavail',
      ),
      'reason_unavail_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_REASON_UNAVAIL_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'reason_unavail_oth',
      ),
      'date_available' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DATE_AVAILABLE',
        'width' => '10%',
        'default' => true,
        'name' => 'date_available',
      ),
      'date_moved' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DATE_MOVED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_moved',
      ),
      'moved_length_time' => 
      array (
        'type' => 'decimal',
        'label' => 'LBL_MOVED_LENGTH_TIME',
        'width' => '10%',
        'default' => true,
        'name' => 'moved_length_time',
      ),
      'moved_unit' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MOVED_UNIT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'moved_unit',
      ),
      'moved_relation_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_MOVED_RELATION_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'moved_relation_oth',
      ),
      'moved_inform_relation' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_MOVED_INFORM_RELATION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'moved_inform_relation',
      ),
      'nir' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_NIR',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'nir',
      ),
      'cog_dis_desc' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_COG_DIS_DESC',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'cog_dis_desc',
      ),
      'lt_illness_desc' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_LT_ILLNESS_DESC',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'lt_illness_desc',
      ),
      'nir_other' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_NIR_OTHER',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'nir_other',
      ),
      'non_interview_rpt' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_NON_INTERVIEW_RPT',
        'sortable' => false,
        'width' => '10%',
        'name' => 'non_interview_rpt',
      ),
      'state_death' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_STATE_DEATH',
        'sortable' => false,
        'width' => '10%',
        'name' => 'state_death',
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
