<?php
/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2011 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

$module_name = 'SAMP_SPECReceipt';
$viewdefs[$module_name]['QuickCreate'] = array(
    'templateMeta' => array('maxColumns' => '2', 
	
						  'includes'=> array(
								array(
									'file'=>'custom/modules/SAMP_SPECReceipt/specimen_ID_validation.js',						
								),
								
								array(
									'file'=>'ncs_framework/jquery/jquery.js',
								),			
						  ),	
	
                            'widths' => array(
                                            array('label' => '10', 'field' => '30'), 
                                            array('label' => '10', 'field' => '30')
                                            ),                                                                                                                                    
      'useTabs' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'samp_specrestaffrstr_name',
            'label' => 'LBL_SAMP_SPECRECEIPT_ST_STAFFRSTR_FROM_ST_STAFFRSTR_TITLE',
          ),
          1 => 'assigned_user_name',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'cooler_temp',
            'label' => 'LBL_COOLER_TEMP',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'Specimen ID:',
			'customCode' => '<input type="text" name="name" id="name" size="30" maxlength="36" value="{$NAME}" title="Unique table identifier: NAME" tabindex="103" onchange=\'validateID(this.value)\' >',
          ),		  		  		 
		  
          1 => 
          array (
            'name' => 'cbr_barcode_id',
            'label' => 'LBL_CBR_BARCODE_ID',
          ),		  
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'receipt_comment',
            'studio' => 'visible',
            'label' => 'LBL_RECEIPT_COMMENT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'receipt_comment_oth',
            'label' => 'LBL_RECEIPT_COMMENT_OTH',
          ),
        ),
      ),
      'lbl_quickcreate_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'samp_specrespecequip_name',
            'label' => 'LBL_SAMP_SPECRECEIPT_SAMP_SPECEQUIP_FROM_SAMP_SPECEQUIP_TITLE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'samp_specreecstorage_name',
            'label' => 'LBL_SAMP_SPECRECEIPT_SAMP_SPECSTORAGE_FROM_SAMP_SPECSTORAGE_TITLE',
          ),
        ),
      ),
      'lbl_quickcreate_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'monitor_status',
            'studio' => 'visible',
            'label' => 'LBL_MONITOR_STATUS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'upper_trigger',
            'studio' => 'visible',
            'label' => 'LBL_UPPER_TRIGGER',
          ),
          1 => 
          array (
            'name' => 'upper_trigger_lvl',
            'studio' => 'visible',
            'label' => 'LBL_UPPER_TRIGGER_LVL',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'lower_trigger_cold',
            'studio' => 'visible',
            'label' => 'LBL_LOWER_TRIGGER_COLD',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'lower_trigger_ambient',
            'studio' => 'visible',
            'label' => 'LBL_LOWER_TRIGGER_AMBIENT',
          ),
        ),
      ),
      'lbl_quickcreate_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'centrifuge_staff_id',
            'label' => 'LBL_CENTRIFUGE_STAFF_ID',
          ),
        ),
		
        1 => 
        array (
          0 => 
          array (
            'name' => 'person_centrifuging_id',
            'studio' => 'visible',
            'label' => 'LBL_PERSON_CENTRIFUGING_ID',
          ),
          1 => '',
        ),
		
        2 => 
        array (
          0 => 
          array (
            'name' => 'centrifuge_st',
            'label' => 'LBL_CENTRIFUGE_ST',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'centrifuge_et',
            'label' => 'LBL_CENTRIFUGE_ET',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'centrifuge_comment',
            'studio' => 'visible',
            'label' => 'LBL_CENTRIFUGE_COMMENT',
          ),
          1 => 
          array (
            'name' => 'centrifuge_comment_oth',
            'label' => 'LBL_CENTRIFUGE_COMMENT_OTH',
          ),
        ),
      ),
    ),
);
?>
