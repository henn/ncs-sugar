<?php
$module_name = 'ST_StfExpMgTsk';
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
            'label' => 'Name:',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'mgmt_task_type',
            'studio' => 'visible',
            'label' => 'LBL_MGMT_TASK_TYPE',
          ),
          1 => 
          array (
            'name' => 'mgmt_task_type_oth',
            'label' => 'LBL_MGMT_TASK_TYPE_OTH',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'mgmt_task_hrs',
            'label' => 'LBL_MGMT_TASK_HRS',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'mgmt_task_comment',
            'studio' => 'visible',
            'label' => 'LBL_MGMT_TASK_COMMENT',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
