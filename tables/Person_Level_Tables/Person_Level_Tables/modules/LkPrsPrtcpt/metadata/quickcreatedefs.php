<?php
$module_name = 'PLT_LkPrsPrtcpt';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
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
          0 => 'assigned_user_name',
        ),
        1 => 
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
