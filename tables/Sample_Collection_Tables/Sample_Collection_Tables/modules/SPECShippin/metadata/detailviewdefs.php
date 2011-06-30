<?php
$module_name = 'SAMP_SPECShippin';
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
            'name' => 'shipment_date',
            'label' => 'LBL_SHIPMENT_DATE',
          ),
          1 => 
          array (
            'name' => 'shipment_temperature',
            'studio' => 'visible',
            'label' => 'LBL_SHIPMENT_TEMPERATURE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'shipper_destination',
            'label' => 'LBL_SHIPPER_DESTINATION',
          ),
          1 => 
          array (
            'name' => 'shipment_tracking_no',
            'label' => 'LBL_SHIPMENT_TRACKING_NO',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'samp_specshstaffrstr_name',
            'label' => 'LBL_SAMP_SPECSHIPPIN_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
          ),
        ),
      ),
      'lbl_detailview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'shipment_receipt_confirmed',
            'studio' => 'visible',
            'label' => 'LBL_SHIPMENT_RECEIPT_CONFIRMED',
          ),
          1 => 
          array (
            'name' => 'shipment_receipt_dt',
            'label' => 'LBL_SHIPMENT_RECEIPT_DT',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'shipment_issues',
            'studio' => 'visible',
            'label' => 'LBL_SHIPMENT_ISSUES',
          ),
          1 => 
          array (
            'name' => 'shipment_issues_oth',
            'label' => 'LBL_SHIPMENT_ISSUES_OTH',
          ),
        ),
      ),
    ),
  ),
);
?>
