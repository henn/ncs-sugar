<?php
$module_name = 'PLT_PersonRace';
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
            'name' => 'race',
            'studio' => 'visible',
            'label' => 'LBL_RACE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'person_race_id',
            'label' => 'LBL_PERSON_RACE_ID',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'race_oth',
            'label' => 'LBL_RACE_OTH',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'plt_person_plt_person_race_name',
          ),
          1 => 
          array (
            'name' => 'plt_person_plt_personrace_name',
          ),
        ),
      ),
    ),
  ),
);
?>
