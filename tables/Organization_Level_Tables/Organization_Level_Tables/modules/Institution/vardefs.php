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
    'psu_id' => 
    array (
      'required' => false,
      'name' => 'psu_id',
      'vname' => 'LBL_PSU_ID',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '20000014',
      'comments' => '',
      'help' => 'External table identifier: PSU ID',
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
    'institute_type' => 
    array (
      'required' => false,
      'name' => 'institute_type',
      'vname' => 'LBL_INSTITUTE_TYPE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Institution type',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'ORGANIZATION_TYPE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'institute_type_oth' => 
    array (
      'required' => false,
      'name' => 'institute_type_oth',
      'vname' => 'LBL_INSTITUTE_TYPE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other institution type',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'institute_relation' => 
    array (
      'required' => false,
      'name' => 'institute_relation',
      'vname' => 'LBL_INSTITUTE_RELATION',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Relationship of Institution to Person ID',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'PERSON_ORGNZTN_FUNCTION_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'institute_relation_oth' => 
    array (
      'required' => false,
      'name' => 'institute_relation_oth',
      'vname' => 'LBL_INSTITUTE_RELATION_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other PERSON_PARTCPNT_RELTNSHP',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'institute_owner' => 
    array (
      'required' => false,
      'name' => 'institute_owner',
      'vname' => 'LBL_INSTITUTE_OWNER',
      'type' => 'enum',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Who owns institution',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'ORGANIZATION_OWNERSHIP_CL1',
      'studio' => 'visible',
      'dependency' => false,
      'default' => '1',
    ),
    'institute_owner_oth' => 
    array (
      'required' => false,
      'name' => 'institute_owner_oth',
      'vname' => 'LBL_INSTITUTE_OWNER_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other ownership type',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'institute_size' => 
    array (
      'required' => false,
      'name' => 'institute_size',
      'vname' => 'LBL_INSTITUTE_SIZE',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Number of …',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'institute_unit' => 
    array (
      'required' => false,
      'name' => 'institute_unit',
      'vname' => 'LBL_INSTITUTE_UNIT',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Unit for institute size',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'ORGANIZATION_SIZE_UNIT_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'institute_unit_oth' => 
    array (
      'required' => false,
      'name' => 'institute_unit_oth',
      'vname' => 'LBL_INSTITUTE_UNIT_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other unit related to institute size',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'institute_info_source' => 
    array (
      'required' => false,
      'name' => 'institute_info_source',
      'vname' => 'LBL_INSTITUTE_INFO_SOURCE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Source of information ',
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
    'institute_info_source_oth' => 
    array (
      'required' => false,
      'name' => 'institute_info_source_oth',
      'vname' => 'LBL_INSTITUTE_INFO_SOURCE_OTH',
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
    'institute_info_date' => 
    array (
      'required' => false,
      'name' => 'institute_info_date',
      'vname' => 'LBL_INSTITUTE_INFO_DATE',
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
    'institute_info_update' => 
    array (
      'required' => false,
      'name' => 'institute_info_update',
      'vname' => 'LBL_INSTITUTE_INFO_UPDATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date of last update of information',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'institute_comment' => 
    array (
      'required' => false,
      'name' => 'institute_comment',
      'vname' => 'LBL_INSTITUTE_COMMENT',
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
    'institute_name' => 
    array (
      'required' => false,
      'name' => 'institute_name',
      'vname' => 'LBL_INSTITUTE_NAME',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Name of the Institution',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
  ),
  'relationships' => 
  array (
  ),
);
?>
