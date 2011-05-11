<?php
$module_name = 'LTT_Email';
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
      'maxColumns' => '3',
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
          2 => 
          array (
            'name' => 'email_type',
            'studio' => 'visible',
            'label' => 'LBL_EMAIL_TYPE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'email_type_oth',
            'label' => 'LBL_EMAIL_TYPE_OTH',
          ),
          1 => 
          array (
            'name' => 'email',
            'label' => 'LBL_EMAIL',
          ),
          2 => 
          array (
            'name' => 'email_share',
            'studio' => 'visible',
            'label' => 'LBL_EMAIL_SHARE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'email_active',
            'studio' => 'visible',
            'label' => 'LBL_EMAIL_ACTIVE',
          ),
          1 => 
          array (
            'name' => 'email_info_source',
            'studio' => 'visible',
            'label' => 'LBL_EMAIL_INFO_SOURCE',
          ),
          2 => 
          array (
            'name' => 'email_info_source_oth',
            'label' => 'LBL_EMAIL_INFO_SOURCE_OTH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'email_rank',
            'studio' => 'visible',
            'label' => 'LBL_EMAIL_RANK',
          ),
          1 => 
          array (
            'name' => 'email_rank_oth',
            'label' => 'LBL_EMAIL_RANK_OTH',
          ),
          2 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'email_info_update',
            'label' => 'LBL_EMAIL_INFO_UPDATE',
          ),
          1 => '',
          2 => 
          array (
            'name' => 'email_info_date',
            'label' => 'LBL_EMAIL_INFO_DATE',
          ),
        ),
        5 => 
        array (
          0 => '',
          1 => '',
          2 => 
          array (
            'name' => 'email_comment',
            'studio' => 'visible',
            'label' => 'LBL_EMAIL_COMMENT',
          ),
        ),
        6 => 
        array (
          0 => '',
        ),
      ),
    ),
  ),
);
?>
