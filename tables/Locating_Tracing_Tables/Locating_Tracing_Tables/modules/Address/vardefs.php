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
    'address_rank' => 
    array (
      'required' => false,
      'name' => 'address_rank',
      'vname' => 'LBL_ADDRESS_RANK',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Address order in the list of addresses from the same subject',
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
    'address_rank_oth' => 
    array (
      'required' => false,
      'name' => 'address_rank_oth',
      'vname' => 'LBL_ADDRESS_RANK_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Address order in the list of addresses from the same subject',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'address_info_source' => 
    array (
      'required' => false,
      'name' => 'address_info_source',
      'vname' => 'LBL_ADDRESS_INFO_SOURCE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Source of address information ',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'INFORMATION_SOURCE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'address_info_source_oth' => 
    array (
      'required' => false,
      'name' => 'address_info_source_oth',
      'vname' => 'LBL_ADDRESS_INFO_SOURCE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other source of address information',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'address_info_mode' => 
    array (
      'required' => false,
      'name' => 'address_info_mode',
      'vname' => 'LBL_ADDRESS_INFO_MODE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'How address information was obtained',
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
    'address_info_mode_oth' => 
    array (
      'required' => false,
      'name' => 'address_info_mode_oth',
      'vname' => 'LBL_ADDRESS_INFO_MODE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other mode of address information',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'address_type' => 
    array (
      'required' => false,
      'name' => 'address_type',
      'vname' => 'LBL_ADDRESS_TYPE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Type of Address',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'ADDRESS_CATEGORY_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'address_description' => 
    array (
      'required' => false,
      'name' => 'address_description',
      'vname' => 'LBL_ADDRESS_DESCRIPTION',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Type of residence at the address',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'RESIDENCE_TYPE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'address_description_oth' => 
    array (
      'required' => false,
      'name' => 'address_description_oth',
      'vname' => 'LBL_ADDRESS_DESCRIPTION_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other description of address',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'city' => 
    array (
      'required' => false,
      'name' => 'city',
      'vname' => 'LBL_CITY',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'City',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '50',
      'size' => '20',
    ),
    'zip' => 
    array (
      'required' => false,
      'name' => 'zip',
      'vname' => 'LBL_ZIP',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Zip Code; Five digit delivery area code',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '5',
      'size' => '20',
    ),
    'zip4' => 
    array (
      'required' => false,
      'name' => 'zip4',
      'vname' => 'LBL_ZIP4',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Zip Code + 4; Four digit geographic segment code',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '4',
      'size' => '20',
    ),
    'address_comment' => 
    array (
      'required' => false,
      'name' => 'address_comment',
      'vname' => 'LBL_ADDRESS_COMMENT',
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
      'cols' => '20',
    ),
    'address_info_update' => 
    array (
      'required' => false,
      'name' => 'address_info_update',
      'vname' => 'LBL_ADDRESS_INFO_UPDATE',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'YYYY-MM-DD',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '10',
      'size' => '20',
    ),
    'address_type_oth' => 
    array (
      'required' => false,
      'name' => 'address_type_oth',
      'vname' => 'LBL_ADDRESS_TYPE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Any string of numbers and/or characters; -7 (Not Applicable)',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'address_1' => 
    array (
      'required' => false,
      'name' => 'address_1',
      'vname' => 'LBL_ADDRESS_1',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Any string of numbers and/or characters -1 (Refused) -2 (Don’t Know) -3 (Legitimate Skip)',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '100',
      'size' => '20',
    ),
    'address_2' => 
    array (
      'required' => false,
      'name' => 'address_2',
      'vname' => 'LBL_ADDRESS_2',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Any string of numbers and/or characters -1 (Refused) -2 (Don’t Know) -3 (Legitimate Skip)',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '100',
      'size' => '20',
    ),
    'unit' => 
    array (
      'required' => false,
      'name' => 'unit',
      'vname' => 'LBL_UNIT',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Unit/Apt/Floor/Lot Number; Any string of numbers and/or characters -1 (Refused) -6 (Unknown) -7 (Not Applicable)',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '10',
      'size' => '20',
    ),
    'state' => 
    array (
      'required' => false,
      'name' => 'state',
      'vname' => 'LBL_STATE',
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
      'options' => 'STATE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'address_start_date' => 
    array (
      'required' => false,
      'name' => 'address_start_date',
      'vname' => 'LBL_ADDRESS_START_DATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date when address became effective for Person, Institute, or Provider',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'address_end_date' => 
    array (
      'required' => false,
      'name' => 'address_end_date',
      'vname' => 'LBL_ADDRESS_END_DATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Last date at which the address is effective',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'address_info_date' => 
    array (
      'required' => false,
      'name' => 'address_info_date',
      'vname' => 'LBL_ADDRESS_INFO_DATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date of initial address information',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
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
  ),
  'relationships' => 
  array (
  ),
);
?>
