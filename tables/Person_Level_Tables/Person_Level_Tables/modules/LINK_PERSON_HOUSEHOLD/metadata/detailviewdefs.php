<?php
$module_name = 'PLT_LINK_PERSON_HOUSEHOLD';
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
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        2 => 
        array (
          0 => 'description',
        ),
        3 => 
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
        4 => 
        array (
          0 => 
          array (
            'name' => 'person_id',
            'label' => 'LBL_PERSON_ID',
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
            'name' => 'hh_id',
            'label' => 'LBL_HH_ID',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'hh_rank_oth',
            'label' => 'LBL_HH_RANK_OTH',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'hh_rank',
            'studio' => 'visible',
            'label' => 'LBL_HH_RANK',
          ),
        ),
      ),
    ),
  ),
);
?>
