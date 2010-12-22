<?php
/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2010 SugarCRM Inc.
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
    'person_id' => 
    array (
      'required' => false,
      'name' => 'person_id',
      'vname' => 'LBL_PERSON_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Unique table identifier: PERSON_ID (of Informant)',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '36',
      'size' => '20',
    ),
    'prefix' => 
    array (
      'required' => false,
      'name' => 'prefix',
      'vname' => 'LBL_PREFIX',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Person&#039;s name prefix',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'prefix_list',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'first_name' => 
    array (
      'required' => false,
      'name' => 'first_name',
      'vname' => 'LBL_FIRST_NAME',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'First Name',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '30',
      'size' => '20',
    ),
    'middle_name' => 
    array (
      'required' => false,
      'name' => 'middle_name',
      'vname' => 'LBL_MIDDLE_NAME',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Middle Name',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '30',
      'size' => '20',
    ),
    'last_name' => 
    array (
      'required' => false,
      'name' => 'last_name',
      'vname' => 'LBL_LAST_NAME',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Last Name',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '30',
      'size' => '20',
    ),
    'maiden_name' => 
    array (
      'required' => false,
      'name' => 'maiden_name',
      'vname' => 'LBL_MAIDEN_NAME',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Maiden Name',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '30',
      'size' => '20',
    ),
    'suffix' => 
    array (
      'required' => false,
      'name' => 'suffix',
      'vname' => 'LBL_SUFFIX',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Suffix',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'suffix_list',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'title' => 
    array (
      'required' => false,
      'name' => 'title',
      'vname' => 'LBL_TITLE',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Person&#039;s Title',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '5',
      'size' => '20',
    ),
    'sex' => 
    array (
      'required' => false,
      'name' => 'sex',
      'vname' => 'LBL_SEX',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Person&#039;s Sex',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'GENDER_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'person_dob' => 
    array (
      'required' => false,
      'name' => 'person_dob',
      'vname' => 'LBL_PERSON_DOB',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date Of Birth YYYY-MM-DD',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'person_dob_list',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'deceased' => 
    array (
      'required' => false,
      'name' => 'deceased',
      'vname' => 'LBL_DECEASED',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Person is deceased',
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
    'ethnic_group' => 
    array (
      'required' => false,
      'name' => 'ethnic_group',
      'vname' => 'LBL_ETHNIC_GROUP',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Person&#039;s ethnicity',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'ETHNICITY_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'person_lang' => 
    array (
      'required' => false,
      'name' => 'person_lang',
      'vname' => 'LBL_PERSON_LANG',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Person&#039;s Primary Language',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'LANGUAGE_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'person_lang_other' => 
    array (
      'required' => false,
      'name' => 'person_lang_other',
      'vname' => 'LBL_PERSON_LANG_OTHER',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other Language Text Field',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'maristat' => 
    array (
      'required' => false,
      'name' => 'maristat',
      'vname' => 'LBL_MARISTAT',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Person&#039;s Marital Status',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'AGE_ELIGIBLE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'maristat_oth' => 
    array (
      'required' => false,
      'name' => 'maristat_oth',
      'vname' => 'LBL_MARISTAT_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other Marital Status',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'pref_contact' => 
    array (
      'required' => false,
      'name' => 'pref_contact',
      'vname' => 'LBL_PREF_CONTACT',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Preferred Contact Method',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONTACT_TYPE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'pref_contact_oth' => 
    array (
      'required' => false,
      'name' => 'pref_contact_oth',
      'vname' => 'LBL_PREF_CONTACT_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other preferred contact method',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'plan_move' => 
    array (
      'required' => false,
      'name' => 'plan_move',
      'vname' => 'LBL_PLAN_MOVE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Is Participant planning on moving?',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'move_info' => 
    array (
      'required' => false,
      'name' => 'move_info',
      'vname' => 'LBL_MOVE_INFO',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Information on new address provided?',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'MOVING_PLAN_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'new_address_id' => 
    array (
      'required' => false,
      'name' => 'new_address_id',
      'vname' => 'LBL_NEW_ADDRESS_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'New Address ID',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '36',
      'size' => '20',
    ),
    'when_move' => 
    array (
      'required' => false,
      'name' => 'when_move',
      'vname' => 'LBL_WHEN_MOVE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Does Participant know when she will be moving?',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL4',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'date_move' => 
    array (
      'required' => false,
      'name' => 'date_move',
      'vname' => 'LBL_DATE_MOVE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date of planned move YYYY_MM',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'p_tracing' => 
    array (
      'required' => false,
      'name' => 'p_tracing',
      'vname' => 'LBL_P_TRACING',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Locating/tracing information needed ',
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
    'p_info_source' => 
    array (
      'required' => false,
      'name' => 'p_info_source',
      'vname' => 'LBL_P_INFO_SOURCE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Source of information on person',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'INFORMATION_SOURCE_CL4',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'p_info_source_oth' => 
    array (
      'required' => false,
      'name' => 'p_info_source_oth',
      'vname' => 'LBL_P_INFO_SOURCE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other source of information   ',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'p_info_date' => 
    array (
      'required' => false,
      'name' => 'p_info_date',
      'vname' => 'LBL_P_INFO_DATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date of Person Info YYYY-MM-DD',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'p_info_update' => 
    array (
      'required' => false,
      'name' => 'p_info_update',
      'vname' => 'LBL_P_INFO_UPDATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date of last update of person information YYYY-MM-DD',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'person_comment' => 
    array (
      'required' => false,
      'name' => 'person_comment',
      'vname' => 'LBL_PERSON_COMMENT',
      'type' => 'text',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'only the first 8000 characters will be uploaded',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'studio' => 'visible',
      'rows' => '4',
      'cols' => '20',
    ),
    'age' => 
    array (
      'required' => false,
      'name' => 'age',
      'vname' => 'LBL_AGE',
      'type' => 'int',
      'massupdate' => 0,
      'comments' => '',
      'help' => '&quot;Any positive number;  -1 (Refused) -6 (Unknown)&quot;',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '3',
      'size' => '20',
      'disable_num_format' => '',
    ),
    'age_range' => 
    array (
      'required' => false,
      'name' => 'age_range',
      'vname' => 'LBL_AGE_RANGE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Person&#039;s age range ',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'AGE_RANGE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
  ),
  'relationships' => 
  array (
  ),
);
?>
