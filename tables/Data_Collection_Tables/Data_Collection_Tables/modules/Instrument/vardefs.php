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
    'instrument_type_oth' => 
    array (
      'required' => false,
      'name' => 'instrument_type_oth',
      'vname' => 'LBL_INSTRUMENT_TYPE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other instrument type',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'instrument_version' => 
    array (
      'required' => false,
      'name' => 'instrument_version',
      'vname' => 'LBL_INSTRUMENT_VERSION',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Instrument Version',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '36',
      'size' => '20',
    ),
        'instrument_start_date_time' => 
    array (
      'required' => true,
      'name' => 'instrument_start_date_time',
      'vname' => 'LBL_INSTRUMENT_START_DATE_TIME',
      'type' => 'datetimecombo',
      'massupdate' => '1',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'dbType' => 'datetime',
    ),
    'instrument_end_date_time' => 
    array (
      'required' => true,
      'name' => 'instrument_end_date_time',
      'vname' => 'LBL_INSTRUMENT_END_DATE_TIME',
      'type' => 'datetimecombo',
      'massupdate' => '1',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'dbType' => 'datetime',
    ),
    'ins_breakoff' => 
    array (
      'required' => false,
      'name' => 'ins_breakoff',
      'vname' => 'LBL_INS_BREAKOFF',
      'type' => 'enum',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Were there one or more break offs during the instrument?',
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
    'ins_status' => 
    array (
      'required' => false,
      'name' => 'ins_status',
      'vname' => 'LBL_INS_STATUS',
      'type' => 'enum',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Instrument status',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'INSTRUMENT_STATUS_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'ins_mode' => 
    array (
      'required' => false,
      'name' => 'ins_mode',
      'vname' => 'LBL_INS_MODE',
      'type' => 'enum',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Mode of Instrument Administration',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'INSTRUMENT_ADMIN_MODE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'ins_mode_oth' => 
    array (
      'required' => false,
      'name' => 'ins_mode_oth',
      'vname' => 'LBL_INS_MODE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other mode of instrument administration',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'ins_method' => 
    array (
      'required' => false,
      'name' => 'ins_method',
      'vname' => 'LBL_INS_METHOD',
      'type' => 'enum',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Method of Instrument Administration',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'INSTRUMENT_ADMIN_METHOD_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'sup_review' => 
    array (
      'required' => false,
      'name' => 'sup_review',
      'vname' => 'LBL_SUP_REVIEW',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Instrument requires supervisor review',
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
    'data_problem' => 
    array (
      'required' => false,
      'name' => 'data_problem',
      'vname' => 'LBL_DATA_PROBLEM',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Instrument requires review of data',
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
    'instru_comment' => 
    array (
      'required' => false,
      'name' => 'instru_comment',
      'vname' => 'LBL_INSTRU_COMMENT',
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
    'instrument_type' => 
    array (
      'required' => false,
      'name' => 'instrument_type',
      'vname' => 'LBL_INSTRUMENT_TYPE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Specific instrument associated with an Event',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'INSTRUMENT_TYPE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'instrument_repeat_key' => 
    array (
      'required' => false,
      'name' => 'instrument_repeat_key',
      'vname' => 'LBL_INSTRUMENT_REPEAT_KEY',
      'type' => 'int',
      'massupdate' => 0,
      'comments' => 'For multiple administrations of an instrument in an event',
      'help' => 'INSTRUMENT_REPEAT_KEY is sequential.  The first value of the sequence is 0 (which is also the value if there is no repetition).',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
      'disable_num_format' => '',
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
