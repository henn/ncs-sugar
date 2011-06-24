<?php
$module_name = 'SAMP_ENVEquipLog';
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
      'equipment_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EQUIPMENT_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'equipment_type',
      ),
      'problem_dt' => 
      array (
        'type' => 'date',
        'label' => 'LBL_PROBLEM_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'problem_dt',
      ),
      'equip_issue' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EQUIP_ISSUE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'equip_issue',
      ),
      'equip_action' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EQUIP_ACTION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'equip_action',
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
      'equipment_type' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EQUIPMENT_TYPE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'equipment_type',
      ),
      'problem_dt' => 
      array (
        'type' => 'date',
        'label' => 'LBL_PROBLEM_DT',
        'width' => '10%',
        'default' => true,
        'name' => 'problem_dt',
      ),
      'equip_issue' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EQUIP_ISSUE',
        'sortable' => false,
        'width' => '10%',
        'name' => 'equip_issue',
      ),
      'equip_action' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_EQUIP_ACTION',
        'sortable' => false,
        'width' => '10%',
        'name' => 'equip_action',
      ),
      'staff_id_reviewer' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_STAFF_ID_REVIEWER',
        'width' => '10%',
        'default' => true,
        'name' => 'staff_id_reviewer',
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
