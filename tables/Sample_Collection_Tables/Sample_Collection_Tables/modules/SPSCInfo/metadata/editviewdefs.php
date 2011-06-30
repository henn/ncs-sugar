<?php
$module_name = 'SAMP_SPSCInfo';
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
            'name' => 'samp_speceqcspscinfo_name',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'samp_specpicspscinfo_name',
          ),
          1 => 
          array (
            'name' => 'samp_specrecspscinfo_name',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'samp_specshcspscinfo_name',
          ),
          1 => 
          array (
            'name' => 'samp_specstcspscinfo_name',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'samp_spscint_address_name',
          ),
        ),
      ),
    ),
  ),
);
?>
