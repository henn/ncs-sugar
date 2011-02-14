<?php
$module_name = 'PLT_PrtcptVstC';
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
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
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
