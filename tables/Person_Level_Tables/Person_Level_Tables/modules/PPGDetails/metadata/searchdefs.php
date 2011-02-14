<?php
$module_name = 'PLT_PPGDetails';
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
      'ppg_pid_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PPG_PID_STATUS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'ppg_pid_status',
      ),
      'ppg_first' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PPG_FIRST',
        'sortable' => false,
        'width' => '10%',
        'name' => 'ppg_first',
      ),
      'orig_due_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_ORIG_DUE_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'orig_due_date',
      ),
      'due_date_2' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DUE_DATE_2',
        'width' => '10%',
        'default' => true,
        'name' => 'due_date_2',
      ),
      'due_date_3' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DUE_DATE_3',
        'width' => '10%',
        'default' => true,
        'name' => 'due_date_3',
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
      'ppg_pid_status' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PPG_PID_STATUS',
        'sortable' => false,
        'width' => '10%',
        'name' => 'ppg_pid_status',
      ),
      'ppg_first' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_PPG_FIRST',
        'sortable' => false,
        'width' => '10%',
        'name' => 'ppg_first',
      ),
      'orig_due_date' => 
      array (
        'type' => 'date',
        'label' => 'LBL_ORIG_DUE_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'orig_due_date',
      ),
      'due_date_2' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DUE_DATE_2',
        'width' => '10%',
        'default' => true,
        'name' => 'due_date_2',
      ),
      'due_date_3' => 
      array (
        'type' => 'date',
        'label' => 'LBL_DUE_DATE_3',
        'width' => '10%',
        'default' => true,
        'name' => 'due_date_3',
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
