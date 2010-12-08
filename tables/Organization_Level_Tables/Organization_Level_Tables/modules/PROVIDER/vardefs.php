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
    'psu_id' => 
    array (
      'required' => false,
      'name' => 'psu_id',
      'vname' => 'LBL_PSU_ID',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '20000014',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'PSU_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'provider_id' => 
    array (
      'required' => false,
      'name' => 'provider_id',
      'vname' => 'LBL_PROVIDER_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '36',
      'size' => '20',
    ),
    'provider_type' => 
    array (
      'required' => false,
      'name' => 'provider_type',
      'vname' => 'LBL_PROVIDER_TYPE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'PROVIDER_TYPE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'provider_type_oth' => 
    array (
      'required' => false,
      'name' => 'provider_type_oth',
      'vname' => 'LBL_PROVIDER_TYPE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'provider_ncs_role' => 
    array (
      'required' => false,
      'name' => 'provider_ncs_role',
      'vname' => 'LBL_PROVIDER_NCS_ROLE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'PROVIDER_STUDY_ROLE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'provider_ncs_role_oth' => 
    array (
      'required' => false,
      'name' => 'provider_ncs_role_oth',
      'vname' => 'LBL_PROVIDER_NCS_ROLE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'practice_info' => 
    array (
      'required' => false,
      'name' => 'practice_info',
      'vname' => 'LBL_PRACTICE_INFO',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'PRACTICE_CHARACTERISTIC_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'practice_patient_load' => 
    array (
      'required' => false,
      'name' => 'practice_patient_load',
      'vname' => 'LBL_PRACTICE_PATIENT_LOAD',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Average number of patients seen at practice per month',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'PRACTICE_LOAD_RANGE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'practice_size' => 
    array (
      'required' => false,
      'name' => 'practice_size',
      'vname' => 'LBL_PRACTICE_SIZE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Number of physicians in provider&#039;s practice',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'PRACTICE_SIZE_RANGE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'public_practice' => 
    array (
      'required' => false,
      'name' => 'public_practice',
      'vname' => 'LBL_PUBLIC_PRACTICE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Publically funded practice (Community Health Clinic, etc)',
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
    'provider_info_source' => 
    array (
      'required' => false,
      'name' => 'provider_info_source',
      'vname' => 'LBL_PROVIDER_INFO_SOURCE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Source of information',
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
    'provider_info_source_oth' => 
    array (
      'required' => false,
      'name' => 'provider_info_source_oth',
      'vname' => 'LBL_PROVIDER_INFO_SOURCE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other source of information',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'provider_info_date' => 
    array (
      'required' => false,
      'name' => 'provider_info_date',
      'vname' => 'LBL_PROVIDER_INFO_DATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date of initial information',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'provider_comment' => 
    array (
      'required' => false,
      'name' => 'provider_comment',
      'vname' => 'LBL_PROVIDER_COMMENT',
      'type' => 'text',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
      'studio' => 'visible',
      'rows' => '4',
      'cols' => '20',
    ),
    'provider_info_update' => 
    array (
      'required' => false,
      'name' => 'provider_info_update',
      'vname' => 'LBL_PROVIDER_INFO_UPDATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => 'YYYY-MM-DD 9777-97-97 (Not Applicable)',
      'help' => 'Date of last update of information',
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
