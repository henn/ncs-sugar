<?php
$module_name = 'SAMP_SPECPickup';
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
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'specimen_pickup_dt',
            'label' => 'LBL_SPECIMEN_PICKUP_DT',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'specimen_pickup_comment',
            'studio' => 'visible',
            'label' => 'LBL_SPECIMEN_PICKUP_COMMENT',
          ),
          1 => 
          array (
            'name' => 'specimen_pickup_cmt_oth',
            'label' => 'LBL_SPECIMEN_PICKUP_CMT_OTH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'specimen_trans_temp',
            'label' => 'LBL_SPECIMEN_TRANS_TEMP',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
