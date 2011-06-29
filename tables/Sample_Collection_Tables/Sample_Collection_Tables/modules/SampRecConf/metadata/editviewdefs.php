<?php
$module_name = 'SAMP_SampRecConf';
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
      'lbl_editview_panel2' => 
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
            'name' => 'shipment_receipt_dt',
            'label' => 'LBL_SHIPMENT_RECEIPT_DT',
          ),
          1 => 
          array (
            'name' => 'shipment_receipt_confirmed',
            'studio' => 'visible',
            'label' => 'LBL_SHIPMENT_RECEIPT_CONFIRMED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'shipment_tracking_no',
            'label' => 'LBL_SHIPMENT_TRACKING_NO',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'shipment_condition',
            'studio' => 'visible',
            'label' => 'LBL_SHIPMENT_CONDITION',
          ),
          1 => 
          array (
            'name' => 'shipment_damaged_reason',
            'studio' => 'visible',
            'label' => 'LBL_SHIPMENT_DAMAGED_REASON',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'shipment_received_by',
            'label' => 'LBL_SHIPMENT_RECEIVED_BY',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'sample_condition',
            'studio' => 'visible',
            'label' => 'LBL_SAMPLE_CONDITION',
          ),
          1 => 
          array (
            'name' => 'sample_receipt_temp',
            'label' => 'LBL_SAMPLE_RECEIPT_TEMP',
          ),
        ),
      ),
    ),
  ),
);
?>
