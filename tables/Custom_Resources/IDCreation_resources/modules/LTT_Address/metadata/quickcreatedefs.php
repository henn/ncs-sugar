<?php
$module_name = 'LTT_Address';
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
            'label' => 'Name (ADDRESS_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'address_1',
            'label' => 'LBL_ADDRESS_1',
          ),
          1 => 
          array (
            'name' => 'address_2',
            'label' => 'LBL_ADDRESS_2',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'unit',
            'label' => 'LBL_UNIT',
          ),
          1 => 
          array (
            'name' => 'city',
            'label' => 'LBL_CITY',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'state',
            'studio' => 'visible',
            'label' => 'LBL_STATE',
          ),
          1 => 
          array (
            'name' => 'zip',
            'label' => 'LBL_ZIP',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'address_type',
            'studio' => 'visible',
            'label' => 'LBL_ADDRESS_TYPE',
          ),
          1 => 
          array (
            'name' => 'address_type_oth',
            'label' => 'LBL_ADDRESS_TYPE_OTH',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'address_start_date',
            'label' => 'LBL_ADDRESS_START_DATE',
          ),
          1 => 
          array (
            'name' => 'address_end_date',
            'label' => 'LBL_ADDRESS_END_DATE',
          ),
        ),
      ),
    ),
  ),
);
?>
