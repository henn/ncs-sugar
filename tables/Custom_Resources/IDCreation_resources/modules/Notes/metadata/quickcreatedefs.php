<?php
$viewdefs ['Notes'] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'enctype' => 'multipart/form-data',
        'headerTpl' => 'modules/Notes/tpls/EditViewHeader.tpl',
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
      'javascript' => '<script type="text/javascript" src="include/javascript/dashlets.js?s={$SUGAR_VERSION}&c={$JS_CUSTOM_VERSION}"></script>
<script>
function deleteAttachmentCallBack(text) 
	{literal} { {/literal} 
	if(text == \'true\') {literal} { {/literal} 
		document.getElementById(\'new_attachment\').style.display = \'\';
		ajaxStatus.hideStatus();
		document.getElementById(\'old_attachment\').innerHTML = \'\'; 
	{literal} } {/literal} else {literal} { {/literal} 
		document.getElementById(\'new_attachment\').style.display = \'none\';
		ajaxStatus.flashStatus(SUGAR.language.get(\'Notes\', \'ERR_REMOVING_ATTACHMENT\'), 2000); 
	{literal} } {/literal}  
{literal} } {/literal} 
</script>
<script>toggle_portal_flag(); function toggle_portal_flag()  {literal} { {/literal} {$TOGGLE_JS} {literal} } {/literal} </script>',
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
            'label' => 'Note ID:',            
			'customCode' => '<strong>{$NAME}</strong><input type="hidden" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103">',
          ),
          1 => 'parent_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'notes_subject_c',
            'label' => 'LBL_NOTES_SUBJECT',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'filename',
            'customCode' => '<span id=\'new_attachment\' style=\'display:{if !empty($fields.filename.value)}none{/if}\'>
        									 <input name="uploadfile" tabindex="3" type="file" size="60"/>
        									 </span>
											 <span id=\'old_attachment\' style=\'display:{if empty($fields.filename.value)}none{/if}\'>
		 									 <input type=\'hidden\' name=\'deleteAttachment\' value=\'0\'>
		 									 {$fields.filename.value}<input type=\'hidden\' name=\'old_filename\' value=\'{$fields.filename.value}\'/><input type=\'hidden\' name=\'old_id\' value=\'{$fields.id.value}\'/>
											 <input type=\'button\' class=\'button\' value=\'{$APP.LBL_REMOVE}\' onclick=\'ajaxStatus.showStatus(SUGAR.language.get("Notes", "LBL_REMOVING_ATTACHMENT"));this.form.deleteAttachment.value=1;this.form.action.value="EditView";SUGAR.dashlets.postForm(this.form, deleteAttachmentCallBack);this.form.deleteAttachment.value=0;this.form.action.value="";\' >       
											 </span>',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'start_date_time_c',
            'label' => 'LBL_START_DATE_TIME',
          ),
          1 => 
          array (
            'name' => 'end_date_time_c',
            'label' => 'LBL_END_DATE_TIME',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'contact_type_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_TYPE',
          ),
          1 => 
          array (
            'name' => 'contact_type_other_c',
            'label' => 'LBL_CONTACT_TYPE_OTHER',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'contact_language_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_LANGUAGE',
          ),
          1 => 
          array (
            'name' => 'contact_lang_oth_c',
            'label' => 'LBL_CONTACT_LANG_OTH',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'contact_interpret_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_INTERPRET',
          ),
          1 => 
          array (
            'name' => 'contact_interpret_oth_c',
            'label' => 'LBL_CONTACT_INTERPRET_OTH',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'contact_location_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_LOCATION',
          ),
          1 => 
          array (
            'name' => 'contact_location_oth_c',
            'label' => 'LBL_CONTACT_LOCATION_OTH',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'contact_private_c',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_PRIVATE',
          ),
          1 => 
          array (
            'name' => 'contact_private_detail_c',
            'label' => 'LBL_CONTACT_PRIVATE_DETAIL',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'contact_distance_c',
            'label' => 'LBL_CONTACT_DISTANCE',
          ),
          1 => 
          array (
            'name' => 'who_contacted_c',
            'studio' => 'visible',
            'label' => 'LBL_WHO_CONTACTED',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'who_contact_oth_c',
            'label' => 'LBL_WHO_CONTACT_OTH',
          ),
          1 => 
          array (
            'name' => 'contact_disp_c',
            'label' => 'LBL_CONTACT_DISP',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_NOTE_STATUS',
            'displayParams' => 
            array (
              'rows' => 6,
              'cols' => 75,
            ),
          ),
        ),
      ),
    ),
  ),
);
?>
