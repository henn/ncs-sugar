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
      'audited' => false,
      'reportable' => true,
      'size' => '20',
    ),
    'sample_condition' => 
    array (
      'required' => false,
      'name' => 'sample_condition',
      'vname' => 'LBL_SAMPLE_CONDITION',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Receipt comment.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'SPECIMEN_STATUS_CL7',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'receipt_comment_oth' => 
    array (
      'required' => false,
      'name' => 'receipt_comment_oth',
      'vname' => 'LBL_RECEIPT_COMMENT_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Description of Other type of Receipt.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'receipt_dt' => 
    array (
      'required' => false,
      'name' => 'receipt_dt',
      'vname' => 'LBL_RECEIPT_DT',
      'type' => 'datetimecombo',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date and time of Receipt.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'size' => '20',
      'dbType' => 'datetime',
      'display_default' => 'now&12:00am',
    ),
    'cooler_temp_cond' => 
    array (
      'required' => false,
      'name' => 'cooler_temp_cond',
      'vname' => 'LBL_COOLER_TEMP_COND',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'COOLER_TEMP_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'placed_in_storage_dt' => 
    array (
      'required' => false,
      'name' => 'placed_in_storage_dt',
      'vname' => 'LBL_PLACED_IN_STORAGE_DT',
      'type' => 'datetimecombo',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date/Time Container Placed in Storage Unit',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'size' => '20',
      'dbType' => 'datetime',
      'display_default' => 'now&12:00am',
    ),
    'storage_compartment_area' => 
    array (
      'required' => false,
      'name' => 'storage_compartment_area',
      'vname' => 'LBL_STORAGE_COMPARTMENT_AREA',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Compartment in Freezer where the sample is stored',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'STORAGE_AREA_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'storage_comment_oth' => 
    array (
      'required' => false,
      'name' => 'storage_comment_oth',
      'vname' => 'LBL_STORAGE_COMMENT_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
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
      'help' => 'Date/Time Container Removed from Storage Unit for Shipment',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'size' => '20',
      'dbType' => 'datetime',
    ),
    'temp_event_occurred' => 
    array (
      'required' => false,
      'name' => 'temp_event_occurred',
      'vname' => 'LBL_TEMP_EVENT_OCCURRED',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_3',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL20',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'temp_event_action' => 
    array (
      'required' => false,
      'name' => 'temp_event_action',
      'vname' => 'LBL_TEMP_EVENT_ACTION',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_5',
      'comments' => '',
      'help' => 'Action taken, samples shipped, or moved to temporary storage, etc.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'SPECIMEN_STATUS_CL6',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'temp_event_action_oth' => 
    array (
      'required' => false,
      'name' => 'temp_event_action_oth',
      'vname' => 'LBL_TEMP_EVENT_ACTION_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other action taken, samples shipped, or moved to temporary storage, etc.',
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
