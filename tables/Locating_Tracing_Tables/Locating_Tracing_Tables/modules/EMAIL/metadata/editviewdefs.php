<?php
$module_name = 'LTT_EMAIL';
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
            'name' => 'email',
            'label' => 'LBL_EMAIL',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'email_type',
            'studio' => 'visible',
            'label' => 'LBL_EMAIL_TYPE',
          ),
          1 => 
          array (
            'name' => 'email_type_oth',
            'label' => 'LBL_EMAIL_TYPE_OTH',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'email_share',
            'studio' => 'visible',
            'label' => 'LBL_EMAIL_SHARE',
          ),
          1 => 
          array (
            'name' => 'email_active',
            'studio' => 'visible',
            'label' => 'LBL_EMAIL_ACTIVE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'email_info_source',
            'studio' => 'visible',
            'label' => 'LBL_EMAIL_INFO_SOURCE',
          ),
          1 => 
          array (
            'name' => 'email_info_source_oth',
            'label' => 'LBL_EMAIL_INFO_SOURCE_OTH',
          ),
        ),
        6 => 
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
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'email_id',
            'label' => 'LBL_EMAIL_ID',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'email_comment',
            'studio' => 'visible',
            'label' => 'LBL_EMAIL_COMMENT',
          ),
          1 => '',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'email_info_date',
            'label' => 'LBL_EMAIL_INFO_DATE',
          ),
          1 => 
          array (
            'name' => 'email_info_update',
            'label' => 'LBL_EMAIL_INFO_UPDATE',
          ),
        ),
      ),
    ),
  ),
);
?>
