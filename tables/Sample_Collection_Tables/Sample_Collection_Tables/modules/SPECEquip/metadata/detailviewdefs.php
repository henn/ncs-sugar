<?php
$module_name = 'SAMP_SPECEquip';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
        ),
      ),
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
          0 => 'name',
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
            'name' => 'serial_no',
            'label' => 'LBL_SERIAL_NO',
          ),
          1 => 
          array (
            'name' => 'government_asset_tag_no',
            'label' => 'LBL_GOVERNMENT_ASSET_TAG_NO',
          ),
        ),
        3 => 
        array (
          0 => '',
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'samp_speceq_spscinfo_name',
            'label' => 'LBL_SAMP_SPECEQUIP_SAMP_SPSCINFO_FROM_SAMP_SPSCINFO_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
