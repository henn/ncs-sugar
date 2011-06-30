<?php
$module_name = 'SAMP_SampShip';
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
            'name' => 'shipper_destination',
            'studio' => 'visible',
            'label' => 'LBL_SHIPPER_DESTINATION',
          ),
          1 => 
          array (
            'name' => 'shipment_date',
            'label' => 'LBL_SHIPMENT_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'shipment_coolant',
            'studio' => 'visible',
            'label' => 'LBL_SHIPMENT_COOLANT',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'sample_shipped_by',
            'studio' => 'visible',
            'label' => 'LBL_SAMPLE_SHIPPED_BY',
          ),
          1 => 
          array (
            'name' => 'staff_id_track',
            'label' => 'LBL_STAFF_ID_TRACK',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'shipment_tracking_no',
            'label' => 'LBL_SHIPMENT_TRACKING_NO',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'shipment_issues_oth',
            'label' => 'LBL_SHIPMENT_ISSUES_OTH',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'samp_specsh_sampship_name',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'samp_sampshstaffrstr_name',
            'label' => 'LBL_SAMP_SAMPSHIP_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
