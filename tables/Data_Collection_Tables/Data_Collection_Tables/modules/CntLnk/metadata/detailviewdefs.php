<?php
$module_name = 'NCSDC_CntLnk';
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
          0 => '',
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'person_id',
            'label' => 'LBL_PERSON_ID',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'staff_id',
            'label' => 'LBL_STAFF_ID',
          ),
          1 => 
          array (
            'name' => 'provider_id',
            'label' => 'LBL_PROVIDER_ID',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'contact_id',
            'label' => 'LBL_CONTACT_ID',
          ),
          1 => 
          array (
            'name' => 'event_id',
            'label' => 'LBL_EVENT_ID',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'instrument_id',
            'label' => 'LBL_INSTRUMENT_ID',
          ),
          1 => 
          array (
            'name' => 'specimen_id',
            'label' => 'LBL_SPECIMEN_ID',
          ),
        ),
        6 => 
        array (
          0 => '',
          1 => '',
        ),
        7 => 
        array (
          0 => '',
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_cntlnk_st_staffrstr_name',
          ),
          1 => 
          array (
            'name' => 'ncsdc_cntlnk_ncsdc_cntctinfo_name',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_cntlnk_ncsdc_eventinfo_name',
          ),
          1 => 
          array (
            'name' => 'ncsdc_cntlnk_ncsdc_instrument_name',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_cntlnk_plt_person_name',
          ),
          1 => 
          array (
            'name' => 'ncsdc_cntlnk_olt_provider_name',
          ),
        ),
      ),
    ),
  ),
);
?>
