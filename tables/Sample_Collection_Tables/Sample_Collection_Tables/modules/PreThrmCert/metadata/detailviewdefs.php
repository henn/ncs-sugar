<?php
$module_name = 'SAMP_PreThrmCert';
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
            'name' => 'precision_cert_status',
            'studio' => 'visible',
            'label' => 'LBL_PRECISION_CERT_STATUS',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'certification_date',
            'label' => 'LBL_CERTIFICATION_DATE',
          ),
          1 => 
          array (
            'name' => 'certification_expire_dt',
            'label' => 'LBL_CERTIFICATION_EXPIRE_DT',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'samp_prethrstaffrstr_name',
            'label' => 'LBL_SAMP_PRETHRMCERT_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
          ),
          1 => 
          array (
            'name' => 'samp_prethr_srscinfo_name',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'samp_prethrp_enequip_name',
          ),
          1 => 
          array (
            'name' => 'samp_srscinethrmcert_name',
          ),
        ),
      ),
    ),
  ),
);
?>
