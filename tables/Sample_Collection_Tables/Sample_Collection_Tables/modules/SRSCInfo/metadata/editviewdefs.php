<?php
$module_name = 'SAMP_SRSCInfo';
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
          0 => 'description',
          1 => 
          array (
            'name' => 'samp_envequ_srscinfo_name',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'samp_envequ_srscinfo_name',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'samp_sampre_srscinfo_name',
          ),
        ),
        4 => 
        array (
          0 => '',
          1 => '',
        ),
        5 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'samp_sampre_srscinfo_name',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'samp_srscint_address_name',
          ),
        ),
      ),
    ),
  ),
);
?>
