<?php
$module_name = 'PLT_PARTICIPANT_VISIT_CONSENT';
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
      'pid_visit_consent_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PID_VISIT_CONSENT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'pid_visit_consent_id',
      ),
      'vis_consent_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_VIS_CONSENT_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'vis_consent_type',
      ),
      'vis_consent_response' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_VIS_CONSENT_RESPONSE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'vis_consent_response',
      ),
      'vis_language_oth' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_VIS_LANGUAGE_OTH',
        'width' => '10%',
        'default' => true,
        'name' => 'vis_language_oth',
      ),
      'vis_who_consented' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_VIS_WHO_CONSENTED',
        'sortable' => false,
        'width' => '10%',
        'name' => 'vis_who_consented',
      ),
      'vis_translate' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_VIS_TRANSLATE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'vis_translate',
      ),
      'vis_comments' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_VIS_COMMENTS',
        'sortable' => false,
        'width' => '10%',
        'default' => true,
        'name' => 'vis_comments',
      ),
      'vis_language' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_VIS_LANGUAGE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'vis_language',
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
