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
      'options' => 'SHIPPER_DESTINATION_CL1',
      'studio' => 'visible',
      'dependency' => false,
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
      'display_default' => 'now',
    ),
    'shipment_coolant' => 
    array (
      'required' => true,
      'name' => 'shipment_coolant',
      'vname' => 'LBL_SHIPMENT_COOLANT',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_4',
      'comments' => '',
      'help' => 'Coolant material used for the shipment',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'SHIPMENT_TEMPERATURE_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'shipment_tracking_no' => 
    array (
      'required' => true,
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
    'staff_id_track' => 
    array (
      'required' => false,
      'name' => 'staff_id_track',
      'vname' => 'LBL_STAFF_ID_TRACK',
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
    'sample_shipped_by' => 
    array (
      'required' => true,
      'name' => 'sample_shipped_by',
      'vname' => 'LBL_SAMPLE_SHIPPED_BY',
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
      'options' => 'SAMPLES_SHIPPED_BY_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
  ),
  'relationships' => 
  array (
  ),
);
?>
