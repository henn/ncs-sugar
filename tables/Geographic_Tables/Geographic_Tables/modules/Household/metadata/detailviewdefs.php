<?php
$module_name = 'GT_Household';
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
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'hh_id',
            'label' => 'LBL_HH_ID',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'hh_status',
            'studio' => 'visible',
            'label' => 'LBL_HH_STATUS',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'hh_elig',
            'studio' => 'visible',
            'label' => 'LBL_HH_ELIG',
          ),
          1 => '',
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'hh_structure',
            'studio' => 'visible',
            'label' => 'LBL_HH_STRUCTURE',
          ),
          1 => 
          array (
            'name' => 'hh_structure_oth',
            'label' => 'LBL_HH_STRUCTURE_OTH',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'num_age_elig',
            'label' => 'LBL_NUM_AGE_ELIG',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'num_preg',
            'label' => 'LBL_NUM_PREG',
          ),
          1 => '',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'num_preg_adult',
            'label' => 'LBL_NUM_PREG_ADULT',
          ),
          1 => '',
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'num_preg_minor',
            'label' => 'LBL_NUM_PREG_MINOR',
          ),
          1 => '',
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'hh_comment',
            'studio' => 'visible',
            'label' => 'LBL_HH_COMMENT',
          ),
          1 => '',
        ),
      ),
    ),
  ),
);
?>
