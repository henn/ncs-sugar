<?php
$module_name = 'NCSDC_CntLnk';
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
            'label' => 'Name (CONTACT_LINK_ID):',
            'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
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
		  /*
          1 => 
          array (
            'name' => 'ncsdc_cntlncntctinfo_name',
            'label' => 'LBL_NCSDC_CNTLNK_NCSDC_CNTCTINFO_FROM_NCSDC_CNTCTINFO_TITLE',
          ),
		  */
        ),
        2 => 
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
        3 => 
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
        4 => 
        array (
          0 => 
          array (
            'name' => 'ncsdc_cntlnk_notes_name',
          ),
        ),
      ),
    ),
  ),
);
?>
