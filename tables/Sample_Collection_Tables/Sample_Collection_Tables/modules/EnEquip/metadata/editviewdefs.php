<?php
$module_name = 'SAMP_EnEquip';
$viewdefs [$module_name] = 
array (
  'EditView' => 
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
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'equipment_type',
            'studio' => 'visible',
            'label' => 'LBL_EQUIPMENT_TYPE ',
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
          0 => 
          array (
            'name' => 'samp_envequ_enequip_name',
          ),
          1 => 
          array (
            'name' => 'samp_prethr_enequip_name',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'samp_reffre_enequip_name',
          ),
          1 => 
          array (
            'name' => 'samp_sampre_enequip_name',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'samp_trhmet_enequip_name',
          ),
          1 => 
          array (
            'name' => 'samp_drfthe_enequip_name',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'samp_enequi_srscinfo_name',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'retired_reason',
            'studio' => 'visible',
            'label' => 'LBL_RETIRED_REASON ',
          ),
          1 => 
          array (
            'name' => 'retired_reason_oth',
            'label' => 'LBL_RETIRED_REASON_OTH',
          ),
        ),
      ),
    ),
  ),
);
?>
