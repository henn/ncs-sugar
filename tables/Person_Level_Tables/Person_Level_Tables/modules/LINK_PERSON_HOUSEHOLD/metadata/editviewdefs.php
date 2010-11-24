<?php
$module_name = 'PLT_LINK_PERSON_HOUSEHOLD';
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
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'is_active',
            'studio' => 'visible',
            'label' => 'LBL_IS_ACTIVE',
          ),
          1 => 
          array (
            'name' => 'psu_id',
            'studio' => 'visible',
            'label' => 'LBL_PSU_ID',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'person_id',
            'label' => 'LBL_PERSON_ID',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'hh_id',
            'label' => 'LBL_HH_ID',
          ),
          1 => 
          array (
            'name' => 'person_hh_id',
            'label' => 'LBL_PERSON_HH_ID',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'hh_rank',
            'studio' => 'visible',
            'label' => 'LBL_HH_RANK',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'hh_rank_oth',
            'label' => 'LBL_HH_RANK_OTH',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
