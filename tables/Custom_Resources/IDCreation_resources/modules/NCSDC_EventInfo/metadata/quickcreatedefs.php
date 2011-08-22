<?php
$module_name = 'NCSDC_EventInfo';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
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
            'label' => 'Name (EVENT_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'event_type',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'event_start_date_time',
            'label' => 'LBL_EVENT_START_DATE_TIME',
          ),
          1 => 
          array (
            'name' => 'event_end_date_time',
            'label' => 'LBL_EVENT_END_DATE_TIME',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'event_comment',
            'studio' => 'visible',
            'label' => 'LBL_EVENT_COMMENT',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
