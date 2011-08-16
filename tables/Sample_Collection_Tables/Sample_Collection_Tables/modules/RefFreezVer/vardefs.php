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
    'verification_dt' => 
    array (
      'required' => true,
      'name' => 'verification_dt',
      'vname' => 'LBL_VERIFICATION_DT',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date that the verification occurred',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'display_default' => 'now',
    ),
    'rf_thermometer_equip_id' => 
    array (
      'required' => true,
      'name' => 'rf_thermometer_equip_id',
      'vname' => 'LBL_RF_THERMOMETER_EQUIP_ID',
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
    'correction_factor_temp' => 
    array (
      'required' => true,
      'name' => 'correction_factor_temp',
      'vname' => 'LBL_CORRECTION_FACTOR_TEMP',
      'type' => 'decimal',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Correction Factor (in Celsius) for the thermometer',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '18',
      'size' => '20',
      'precision' => '8',
    ),
    'current_temp' => 
    array (
      'required' => true,
      'name' => 'current_temp',
      'vname' => 'LBL_CURRENT_TEMP',
      'type' => 'decimal',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Current Temperature Reading as displayed in the top part of the digital thermometer',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '18',
      'size' => '20',
      'precision' => '8',
    ),
    'maximum_temp' => 
    array (
      'required' => true,
      'name' => 'maximum_temp',
      'vname' => 'LBL_MAXIMUM_TEMP',
      'type' => 'decimal',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Maximum temperature recorded since the last time the thermometer was reset.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '18',
      'size' => '20',
      'precision' => '8',
    ),
    'minimum_temp' => 
    array (
      'required' => true,
      'name' => 'minimum_temp',
      'vname' => 'LBL_MINIMUM_TEMP',
      'type' => 'decimal',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Minimum temperature recorded since the last time the thermometer was reset.',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '18',
      'size' => '20',
      'precision' => '8',
    ),
  ),
  'relationships' => 
  array (
  ),
);
?>
