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
          0 => 
          array (
            'name' => 'ncsdc_cntlnstaffrstr_name',
            'label' => 'LBL_NCSDC_CNTLNK_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
          ),
          1 => 
          array (
            'name' => 'ncsdc_cntlncntctinfo_name',
            'label' => 'LBL_NCSDC_CNTLNK_NCSDC_CNTCTINFO_FROM_NCSDC_CNTCTINFO_TITLE',
          ),
        ),
        2 => 
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
        3 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_cntlneventinfo_name',
            'label' => 'LBL_NCSDC_CNTLNK_NCSDC_EVENTINFO_FROM_NCSDC_EVENTINFO_TITLE',
          ),
          1 => 
          array (
            'name' => 'ncsdc_cntlnnstrument_name',
            'label' => 'LBL_NCSDC_CNTLNK_NCSDC_INSTRUMENT_FROM_NCSDC_INSTRUMENT_TITLE',
          ),
        ),
        4 => 
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
        5 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_cntlnlt_person_name',
            'label' => 'LBL_NCSDC_CNTLNK_PLT_PERSON_FROM_PLT_PERSON_TITLE',
          ),
          1 => 
          array (
            'name' => 'ncsdc_cntln_provider_name',
            'label' => 'LBL_NCSDC_CNTLNK_OLT_PROVIDER_FROM_OLT_PROVIDER_TITLE',
          ),
        ),
        6 => 
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
