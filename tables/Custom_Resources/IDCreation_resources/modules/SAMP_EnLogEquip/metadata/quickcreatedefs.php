<?php
$module_name = 'SAMP_EnLogEquip';
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
            'name' => 'equipment_type',
            'studio' => 'visible',
            'label' => 'LBL_EQUIPMENT_TYPE',
          ),
          1 => 
          array (
            'name' => 'equipment_type_oth',
            'label' => 'LBL_EQUIPMENT_TYPE_OTH',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'problem_dt',
            'label' => 'LBL_PROBLEM_DT',
          ),
          1 => 
          array (
            'name' => 'equip_action',
            'studio' => 'visible',
            'label' => 'LBL_EQUIP_ACTION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'equip_issue',
            'studio' => 'visible',
            'label' => 'LBL_EQUIP_ISSUE',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'samp_enloge_srscinfo_name',
            'label' => 'LBL_SAMP_ENLOGEQUIP_SAMP_SRSCINFO_FROM_SAMP_SRSCINFO_TITLE',
          ),
          1 => 
          array (
            'name' => 'samp_enlogep_enequip_name',
            'label' => 'LBL_SAMP_ENLOGEQUIP_SAMP_ENEQUIP_FROM_SAMP_ENEQUIP_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
