<?php
// created: 2011-12-09 15:37:21
$dictionary["meetings_olt_provider"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'meetings_olt_provider' => 
    array (
      'lhs_module' => 'Meetings',
      'lhs_table' => 'meetings',
      'lhs_key' => 'id',
      'rhs_module' => 'OLT_Provider',
      'rhs_table' => 'olt_provider',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'meetings_olt_provider_c',
      'join_key_lhs' => 'meetings_ob6feeetings_ida',
      'join_key_rhs' => 'meetings_ob1dfrovider_idb',
    ),
  ),
  'table' => 'meetings_olt_provider_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'meetings_ob6feeetings_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'meetings_ob1dfrovider_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'meetings_olt_providerspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'meetings_olt_provider_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'meetings_ob6feeetings_ida',
        1 => 'meetings_ob1dfrovider_idb',
      ),
    ),
  ),
);
?>
