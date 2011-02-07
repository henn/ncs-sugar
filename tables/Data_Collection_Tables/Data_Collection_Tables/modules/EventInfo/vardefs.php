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
    'event_id' => 
    array (
      'required' => false,
      'name' => 'event_id',
      'vname' => 'LBL_EVENT_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Unique Identifier: Event ID',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '36',
      'size' => '20',
    ),
    'event_type_oth' => 
    array (
      'required' => false,
      'name' => 'event_type_oth',
      'vname' => 'LBL_EVENT_TYPE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other event type',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'event_disp_cat' => 
    array (
      'required' => false,
      'name' => 'event_disp_cat',
      'vname' => 'LBL_EVENT_DISP_CAT',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Event Disposition Category',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'EVENT_DSPSTN_CAT_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'event_start_date' => 
    array (
      'required' => false,
      'name' => 'event_start_date',
      'vname' => 'LBL_EVENT_START_DATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Event Start Date',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'event_start_time' => 
    array (
      'required' => false,
      'name' => 'event_start_time',
      'vname' => 'LBL_EVENT_START_TIME',
      'type' => 'datetimecombo',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Event Start Time',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'dbType' => 'datetime',
    ),
    'event_end_date' => 
    array (
      'required' => false,
      'name' => 'event_end_date',
      'vname' => 'LBL_EVENT_END_DATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Event End Date',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'event_end_time' => 
    array (
      'required' => false,
      'name' => 'event_end_time',
      'vname' => 'LBL_EVENT_END_TIME',
      'type' => 'datetimecombo',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Event End Time',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'dbType' => 'datetime',
    ),
    'event_breakoff' => 
    array (
      'required' => false,
      'name' => 'event_breakoff',
      'vname' => 'LBL_EVENT_BREAKOFF',
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
      'options' => 'CONFIRM_TYPE_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'event_incentive_type' => 
    array (
      'required' => false,
      'name' => 'event_incentive_type',
      'vname' => 'LBL_EVENT_INCENTIVE_TYPE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Type of incentive provided for event',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'INCENTIVE_TYPE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'event_incent_cash' => 
    array (
      'required' => false,
      'name' => 'event_incent_cash',
      'vname' => 'LBL_EVENT_INCENT_CASH',
      'type' => 'decimal',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Dollar Amount; Value of cash incentive provided to participant Either EVENT_INCENT_CASH or EVENT_INCENT_CASH_OTH may be empty, but not both.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '10',
      'size' => '20',
      'precision' => '2',
    ),
    'event_comment' => 
    array (
      'required' => false,
      'name' => 'event_comment',
      'vname' => 'LBL_EVENT_COMMENT',
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
    'event_type' => 
    array (
      'required' => false,
      'name' => 'event_type',
      'vname' => 'LBL_EVENT_TYPE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Protocol Event Name',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'EVENT_TYPE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'event_repeat_key' => 
    array (
      'required' => false,
      'name' => 'event_repeat_key',
      'vname' => 'LBL_EVENT_REPEAT_KEY',
      'type' => 'int',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Some protocol events repeat like the PPG status calls',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
      'disable_num_format' => '',
    ),
    'event_disp' => 
    array (
      'required' => false,
      'name' => 'event_disp',
      'vname' => 'LBL_EVENT_DISP',
      'type' => 'int',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Value from Disposition Codes on Event Disp Codes worksheet of this document.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
      'disable_num_format' => '',
    ),
    'event_incent_noncash' => 
    array (
      'required' => false,
      'name' => 'event_incent_noncash',
      'vname' => 'LBL_EVENT_INCENT_NONCASH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other non-cash incentive provided to participant',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
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
