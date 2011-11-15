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
    'shipper_destination' => 
    array (
      'required' => true,
      'name' => 'shipper_destination',
      'vname' => 'LBL_SHIPPER_DESTINATION',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Contract Lab or Repository ID (Enter &quot;001&quot; for the NCS Repository for Biospecimens)',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '3',
      'size' => '20',
    ),
    'shipment_date' => 
    array (
      'required' => true,
      'name' => 'shipment_date',
      'vname' => 'LBL_SHIPMENT_DATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date of shipment.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'shipment_temperature' => 
    array (
      'required' => true,
      'name' => 'shipment_temperature',
      'vname' => 'LBL_SHIPMENT_TEMPERATURE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_4',
      'comments' => '',
      'help' => 'Shipment Temperature Condition',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'SHIPMENT_TEMPERATURE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'shipment_tracking_no' => 
    array (
      'required' => false,
      'name' => 'shipment_tracking_no',
      'vname' => 'LBL_SHIPMENT_TRACKING_NO',
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
    'shipment_receipt_confirmed' => 
    array (
      'required' => true,
      'name' => 'shipment_receipt_confirmed',
      'vname' => 'LBL_SHIPMENT_RECEIPT_CONFIRMED',
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
      'options' => 'CONFIRM_TYPE_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'shipment_receipt_dt' => 
    array (
      'required' => false,
      'name' => 'shipment_receipt_dt',
      'vname' => 'LBL_SHIPMENT_RECEIPT_DT',
      'type' => 'datetimecombo',
      'massupdate' => 0,
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
    'shipment_issues' => 
    array (
      'required' => true,
      'name' => 'shipment_issues',
      'vname' => 'LBL_SHIPMENT_ISSUES',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_7',
      'comments' => '',
      'help' => 'Shipment Issues Noted',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'SHIPMENT_ISSUES_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'shipment_issues_oth' => 
    array (
      'required' => false,
      'name' => 'shipment_issues_oth',
      'vname' => 'LBL_SHIPMENT_ISSUES_OTH',
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
  ),
  'relationships' => 
  array (
  ),
);
?>
