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
    'p_type' => 
    array (
      'required' => false,
      'name' => 'p_type',
      'vname' => 'LBL_P_TYPE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_4',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'PARTICIPANT_TYPE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'p_type_oth' => 
    array (
      'required' => false,
      'name' => 'p_type_oth',
      'vname' => 'LBL_P_TYPE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Note: Either P_TYPE or P_TYPE_OTH may be empty, but not both.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'status_info_source' => 
    array (
      'required' => false,
      'name' => 'status_info_source',
      'vname' => 'LBL_STATUS_INFO_SOURCE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_4',
      'comments' => '',
      'help' => 'Note: Either STATUS_INFO_SOURCE or STATUS_INFO_SOURCE_OTH may be empty, but not both.',
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
    'status_info_source_oth' => 
    array (
      'required' => false,
      'name' => 'status_info_source_oth',
      'vname' => 'LBL_STATUS_INFO_SOURCE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Note: Either STATUS_INFO_SOURCE or STATUS_INFO_SOURCE_OTH may be empty, but not both.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'status_info_mode' => 
    array (
      'required' => false,
      'name' => 'status_info_mode',
      'vname' => 'LBL_STATUS_INFO_MODE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_4',
      'comments' => '',
      'help' => 'How status information was obtained.  Note: Either STATUS_INFO_MODE or STATUS_INFO_MODE_OTH may be empty, but not both.',
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
    'status_info_mode_oth' => 
    array (
      'required' => false,
      'name' => 'status_info_mode_oth',
      'vname' => 'LBL_STATUS_INFO_MODE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Note: Either STATUS_INFO_MODE or STATUS_INFO_MODE_OTH may be empty, but not both.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'status_info_date' => 
    array (
      'required' => false,
      'name' => 'status_info_date',
      'vname' => 'LBL_STATUS_INFO_DATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date of status update',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'enroll_status' => 
    array (
      'required' => false,
      'name' => 'enroll_status',
      'vname' => 'LBL_ENROLL_STATUS',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_4',
      'comments' => '',
      'help' => 'Has participant agreed to enroll',
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
    'enroll_date' => 
    array (
      'required' => false,
      'name' => 'enroll_date',
      'vname' => 'LBL_ENROLL_DATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date Participant Enrolled in NCS',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'pid_entry' => 
    array (
      'required' => false,
      'name' => 'pid_entry',
      'vname' => 'LBL_PID_ENTRY',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_4',
      'comments' => '',
      'help' => 'How did participant enter into NCS/Referral Source? (Specify primary mechanism)',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'STUDY_ENTRY_METHOD_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'pid_entry_other' => 
    array (
      'required' => false,
      'name' => 'pid_entry_other',
      'vname' => 'LBL_PID_ENTRY_OTHER',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other mechanism for entry into NCS',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'pid_age_elig' => 
    array (
      'required' => false,
      'name' => 'pid_age_elig',
      'vname' => 'LBL_PID_AGE_ELIG',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_6',
      'comments' => '',
      'help' => 'Flag to indicate age-eligibility to participate in the NCS',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'AGE_ELIGIBLE_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'pid_comment' => 
    array (
      'required' => false,
      'name' => 'pid_comment',
      'vname' => 'LBL_PID_COMMENT',
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
    'person_info_c' => 
    array (
      'required' => false,
      'name' => 'person_info_c',
      'vname' => 'LBL_PERSON_INFO_C',
      'type' => 'html',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
      'studio' => 'visible',
      'dbType' => 'text',
    ),
  ),
  'relationships' => 
  array (
  ),
);
?>
