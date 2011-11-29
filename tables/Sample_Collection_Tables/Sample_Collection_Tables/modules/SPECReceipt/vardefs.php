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
    'receipt_comment' => 
    array (
      'required' => true,
      'name' => 'receipt_comment',
      'vname' => 'LBL_RECEIPT_COMMENT',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_7',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'SPECIMEN_STATUS_CL3',
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
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'cooler_temp' => 
    array (
      'required' => false,
      'name' => 'cooler_temp',
      'vname' => 'LBL_COOLER_TEMP',
      'type' => 'decimal',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Transport cooler temperature at time of Receipt (in Celsius).',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '18',
      'size' => '20',
      'precision' => '8',
    ),
    'monitor_status' => 
    array (
      'required' => true,
      'name' => 'monitor_status',
      'vname' => 'LBL_MONITOR_STATUS',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_7',
      'comments' => '',
      'help' => 'Indication if threshold temperature monitor is triggered. If Not Applicable - skip Upper and Lower Threshold Monitors, otherwise record result for all.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'TRIGGER_STATUS_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'upper_trigger' => 
    array (
      'required' => true,
      'name' => 'upper_trigger',
      'vname' => 'LBL_UPPER_TRIGGER',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_7',
      'comments' => '',
      'help' => 'Upper Threshold Temperature Monitor, status if cold clamshell WarmMark is triggered or not.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'TRIGGER_STATUS_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'upper_trigger_lvl' => 
    array (
      'required' => true,
      'name' => 'upper_trigger_lvl',
      'vname' => 'LBL_UPPER_TRIGGER_LVL',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_7',
      'comments' => '',
      'help' => 'Upper Threshold Temperature Monitor. Highest circle triggered for cold clamshell WarmMark.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'TRIGGER_STATUS_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'lower_trigger_cold' => 
    array (
      'required' => true,
      'name' => 'lower_trigger_cold',
      'vname' => 'LBL_LOWER_TRIGGER_COLD',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_7',
      'comments' => '',
      'help' => 'Lower Threshold Temperature Monitor, status if cold clamshell ColdMark is triggered or not.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'TRIGGER_STATUS_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'lower_trigger_ambient' => 
    array (
      'required' => true,
      'name' => 'lower_trigger_ambient',
      'vname' => 'LBL_LOWER_TRIGGER_AMBIENT',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_7',
      'comments' => '',
      'help' => 'Lower Threshold Temperature Monitor, status if ambient chamber ColdMark is triggered or not.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'TRIGGER_STATUS_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'centrifuge_comment' => 
    array (
      'required' => true,
      'name' => 'centrifuge_comment',
      'vname' => 'LBL_CENTRIFUGE_COMMENT',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_7',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'SPECIMEN_STATUS_CL4',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'centrifuge_comment_oth' => 
    array (
      'required' => false,
      'name' => 'centrifuge_comment_oth',
      'vname' => 'LBL_CENTRIFUGE_COMMENT_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other Comments about Specimen Receipt or processing.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'centrifuge_st' => 
    array (
      'required' => false,
      'name' => 'centrifuge_st',
      'vname' => 'LBL_CENTRIFUGE_ST',
      'type' => 'datetimecombo',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Time specimen placed in centrifuge if applicable',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'dbType' => 'datetime',
      'display_default' => 'now&12:00am',
    ),
    'centrifuge_et' => 
    array (
      'required' => false,
      'name' => 'centrifuge_et',
      'vname' => 'LBL_CENTRIFUGE_ET',
      'type' => 'datetimecombo',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Time specimen removed from centrifuge if applicable',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'dbType' => 'datetime',
      'display_default' => 'now&12:00am',
    ),
    'centrifuge_staff_id' => 
    array (
      'required' => false,
      'name' => 'centrifuge_staff_id',
      'vname' => 'LBL_CENTRIFUGE_STAFF_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Staff ID of person performing centrifugation.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'receipt_dt' => 
    array (
      'required' => true,
      'name' => 'receipt_dt',
      'vname' => 'LBL_RECEIPT_DT',
      'type' => 'datetimecombo',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date and Time of specimen receipt',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'size' => '20',
      'dbType' => 'datetime',
    ),
    'centrifuge_temperature' => 
    array (
      'required' => false,
      'name' => 'centrifuge_temperature',
      'vname' => 'LBL_CENTRIFUGE_TEMPERATURE',
      'type' => 'decimal',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Centrifuge r temperature at time of Receipt (in Celsius). ',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '18',
      'size' => '20',
      'precision' => '8',
    ),
	
	//Relate field: Person Centrifuging ID
	'plt_person_id_c' => 
	array (
	'required' => false,
	'name' => 'plt_person_id_c',
	'vname' => '',
	'type' => 'id',
	'massupdate' => 0,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => 0,
	'audited' => false,
	'reportable' => true,
	'len' => 36,
	'size' => '20',
	),
	
	'person_centrifuging_id' => 
	array (
	'required' => false,
	'source' => 'non-db',
	'name' => 'person_centrifuging_id',
	'vname' => 'LBL_PERSON_CENTRIFUGING_ID',
	'type' => 'relate',
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
	'id_name' => 'plt_person_id_c',
	'ext2' => 'ST_StaffRstr',
	'module' => 'ST_StaffRstr',
	'rname' => 'name',
	'quicksearch' => 'enabled',
	'studio' => 'visible',
	),
		
  ),
  'relationships' => 
  array (
  ),
);
?>
