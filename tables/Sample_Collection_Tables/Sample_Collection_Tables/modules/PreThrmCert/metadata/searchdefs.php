<?php
$module_name = 'SAMP_PreThrmCert';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'precision_cert_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PRECISION_CERT_STATUS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'precision_cert_status',
      ),
      'certification_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_CERTIFICATION_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'certification_date',
      ),
      'certification_expire_dt' => 
      array (
        'type' => 'date',
        'label' => 'LBL_CERTIFICATION_EXPIRE_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'certification_expire_dt',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'precision_cert_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PRECISION_CERT_STATUS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'precision_cert_status',
      ),
      'certification_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_CERTIFICATION_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'certification_date',
      ),
      'certification_expire_dt' => 
      array (
        'type' => 'date',
        'label' => 'LBL_CERTIFICATION_EXPIRE_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'certification_expire_dt',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
