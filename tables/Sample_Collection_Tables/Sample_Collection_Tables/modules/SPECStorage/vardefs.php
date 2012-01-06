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
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'dbType' => 'varchar',
      'len' => '255',
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
    'placed_in_storage_dt' => 
    array (
      'required' => true,
      'name' => 'placed_in_storage_dt',
      'vname' => 'LBL_PLACED_IN_STORAGE_DT',
      'type' => 'datetimecombo',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date/Time Container placed in Master Storage Unit (monitored refrigerator, freezer, ambient room).',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'dbType' => 'datetime',
      'display_default' => 'now&12:00am',
    ),
    'master_storage_unit' => 
    array (
      'required' => true,
      'name' => 'master_storage_unit',
      'vname' => 'LBL_MASTER_STORAGE_UNIT',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_4',
      'comments' => '',
      'help' => 'Specific  Area  where Container is placed for short term storage.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'STORAGE_AREA_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'storage_comment' => 
    array (
      'required' => false,
      'name' => 'storage_comment',
      'vname' => 'LBL_STORAGE_COMMENT',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Comment to indicate a temperature event occurred in biospecimen storage.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'storage_comment_oth' => 
    array (
      'required' => false,
      'name' => 'storage_comment_oth',
      'vname' => 'LBL_STORAGE_COMMENT_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other Storage Comments',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'removed_from_storage_dt' => 
    array (
      'required' => false,
      'name' => 'removed_from_storage_dt',
      'vname' => 'LBL_REMOVED_FROM_STORAGE_DT',
      'type' => 'datetimecombo',
      'massupdate' => 0,
      'comments' => '',
      'help' => '&quot;Required field if REMOVED_FROM_STORAGE = 1  YYYY-MM-DDTHH:MM  9333-93-93T93:93 &quot;',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'dbType' => 'datetime',
    ),
    'temp_event_st' => 
    array (
      'required' => false,
      'name' => 'temp_event_st',
      'vname' => 'LBL_TEMP_EVENT_ST',
      'type' => 'datetimecombo',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Time when sensaphone first recorded an out of range value for the refrigerator or freezer.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'dbType' => 'datetime',
    ),
    'temp_event_low_temp' => 
    array (
      'required' => false,
      'name' => 'temp_event_low_temp',
      'vname' => 'LBL_TEMP_EVENT_LOW_TEMP',
      'type' => 'decimal',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Lowest out of range temperature recorded during temperature event (Celsius).',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '18',
      'size' => '20',
      'precision' => '1',
    ),
    'temp_event_high_temp' => 
    array (
      'required' => false,
      'name' => 'temp_event_high_temp',
      'vname' => 'LBL_TEMP_EVENT_HIGH_TEMP',
      'type' => 'decimal',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Highest out of range temperature recorded during the temperature event (Celsius).',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '18',
      'size' => '20',
      'precision' => '1',
    ),
    'temp_event_et' => 
    array (
      'required' => false,
      'name' => 'temp_event_et',
      'vname' => 'LBL_TEMP_EVENT_ET',
      'type' => 'datetimecombo',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Time when sensaphone recorded temperature back in range.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'dbType' => 'datetime',
    ),
    'storage_fill' => 
    array (
      'required' => true,
      'name' => 'storage_fill',
      'vname' => 'LBL_STORAGE_FILL',
      'type' => 'enum',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'STORAGE_UNIT_FILL',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'removed_from_storage' => 
    array (
      'required' => false,
      'name' => 'removed_from_storage',
      'vname' => 'LBL_REMOVED_FROM_STORAGE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_2',
      'comments' => '',
      'help' => 'Was specimen removed from Storage?',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL8',
      'studio' => 'visible',
      'dependency' => false,
    ),
  ),
  'relationships' => 
  array (
  ),
);
?>
