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

$vardefs = array (
  'fields' => 
  array (
    'phone_info_source' => 
    array (
      'required' => false,
      'name' => 'phone_info_source',
      'vname' => 'LBL_PHONE_INFO_SOURCE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Source of phone information',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'INFORMATION_SOURCE_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'phone_info_source_oth' => 
    array (
      'required' => false,
      'name' => 'phone_info_source_oth',
      'vname' => 'LBL_PHONE_INFO_SOURCE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other source of telephone information',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'phone_ext' => 
    array (
      'required' => false,
      'name' => 'phone_ext',
      'vname' => 'LBL_PHONE_EXT',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Telephone extension',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '5',
      'size' => '20',
    ),
    'phone_type' => 
    array (
      'required' => false,
      'name' => 'phone_type',
      'vname' => 'LBL_PHONE_TYPE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Type of phone number',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'PHONE_TYPE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'phone_type_oth' => 
    array (
      'required' => false,
      'name' => 'phone_type_oth',
      'vname' => 'LBL_PHONE_TYPE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other type of phone number',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'phone_rank' => 
    array (
      'required' => false,
      'name' => 'phone_rank',
      'vname' => 'LBL_PHONE_RANK',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Preferred phone contact',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'COMMUNICATION_RANK_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'phone_rank_oth' => 
    array (
      'required' => false,
      'name' => 'phone_rank_oth',
      'vname' => 'LBL_PHONE_RANK_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other rank specified',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'phone_landline' => 
    array (
      'required' => false,
      'name' => 'phone_landline',
      'vname' => 'LBL_PHONE_LANDLINE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Is this phone number a landline?',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'phone_share' => 
    array (
      'required' => false,
      'name' => 'phone_share',
      'vname' => 'LBL_PHONE_SHARE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Is this phone number shared with others?',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'cell_permission' => 
    array (
      'required' => false,
      'name' => 'cell_permission',
      'vname' => 'LBL_CELL_PERMISSION',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'OK to use Person\'s personal cell phone to make future study appointments or for appointment reminders?',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'text_permission' => 
    array (
      'required' => false,
      'name' => 'text_permission',
      'vname' => 'LBL_TEXT_PERMISSION',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'OK to send text messages to make future study appointments or for appointment reminders?',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'phone_comment' => 
    array (
      'required' => false,
      'name' => 'phone_comment',
      'vname' => 'LBL_PHONE_COMMENT',
      'type' => 'text',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Text field for qualitative information',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'studio' => 'visible',
      'rows' => '4',
      'cols' => '30',
    ),
    'phone_nbr' => 
    array (
      'required' => false,
      'name' => 'phone_nbr',
      'vname' => 'LBL_PHONE_NBR',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => 'Best phone number to reach participant?',
      'help' => 'Any string of numbers and/or characters -8 Respondent has no phone -1 (Refused) -2 (Don\'t Know)',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '10',
      'size' => '20',
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'dbType' => 'varchar',
      'len' => '36',
      'unified_search' => true,
      'required' => true,
      'importable' => 'required',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'phone_start_date' => 
    array (
      'required' => false,
      'name' => 'phone_start_date',
      'vname' => 'LBL_PHONE_START_DATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date when phone number became effective',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'phone_end_date' => 
    array (
      'required' => false,
      'name' => 'phone_end_date',
      'vname' => 'LBL_PHONE_END_DATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Last date at which the phone number is effective',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
  ),
  'relationships' => 
  array (
  ),
);
?>
