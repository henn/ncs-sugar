<?php
$module_name = 'PLT_LkPrsPrtcpt';
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
            'name' => 'relation',
            'studio' => 'visible',
            'label' => 'LBL_RELATION',
          ),
          1 => 
          array (
            'name' => 'relation_oth',
            'label' => 'LBL_RELATION_OTH',
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
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'plt_lkprsprtcpt_plt_person_name',
          ),
          1 => 
          array (
            'name' => 'plt_lkprsprtcpt_plt_participant_name',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'plt_lkprsprlt_person_name',
            'label' => 'LBL_PLT_LKPRSPRTCPT_PLT_PERSON_FROM_PLT_PERSON_TITLE',
          ),
          1 => 
          array (
            'name' => 'plt_lkprsprrticipant_name',
            'label' => 'LBL_PLT_LKPRSPRTCPT_PLT_PARTICIPANT_FROM_PLT_PARTICIPANT_TITLE',
          ),
        ),
      ),
    ),
  ),
);
?>
