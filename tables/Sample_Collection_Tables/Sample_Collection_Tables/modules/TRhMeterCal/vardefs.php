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
    'calibration_expire_dt' => 
    array (
      'required' => false,
      'name' => 'calibration_expire_dt',
      'vname' => 'LBL_CALIBRATION_EXPIRE_DT',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'verification_dt' => 
    array (
      'required' => false,
      'name' => 'verification_dt',
      'vname' => 'LBL_VERIFICATION_DT',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'thr_equip_id' => 
    array (
      'required' => false,
      'name' => 'thr_equip_id',
      'vname' => 'LBL_THR_EQUIP_ID',
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
    'precision_term_temp' => 
    array (
      'required' => false,
      'name' => 'precision_term_temp',
      'vname' => 'LBL_PRECISION_TERM_TEMP',
      'type' => 'decimal',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '18',
      'size' => '20',
      'precision' => '8',
    ),
    'trh_temp' => 
    array (
      'required' => false,
      'name' => 'trh_temp',
      'vname' => 'LBL_TRH_TEMP',
      'type' => 'decimal',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '18',
      'size' => '20',
      'precision' => '8',
    ),
    'salts_moist' => 
    array (
      'required' => false,
      'name' => 'salts_moist',
      'vname' => 'LBL_SALTS_MOIST',
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
      'options' => 'CONFIRM_TYPE_CL21',
      'studio' => 'visible',
      'dependency' => false,
    ),
    's_33rh_reading' => 
    array (
      'required' => false,
      'name' => 's_33rh_reading',
      'vname' => 'LBL_S_33RH_READING',
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
    's_75rh_reading' => 
    array (
      'required' => false,
      'name' => 's_75rh_reading',
      'vname' => 'LBL_S_75RH_READING',
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
    's_33_rh_need_calib' => 
    array (
      'required' => false,
      'name' => 's_33_rh_need_calib',
      'vname' => 'LBL_S_33_RH_NEED_CALIB',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '2',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL21',
      'studio' => 'visible',
      'dependency' => false,
    ),
    's_75_rh_need_calib' => 
    array (
      'required' => false,
      'name' => 's_75_rh_need_calib',
      'vname' => 'LBL_S_75_RH_NEED_CALIB',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '2',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL21',
      'studio' => 'visible',
      'dependency' => false,
    ),
    's_33rh_reading_calib' => 
    array (
      'required' => false,
      'name' => 's_33rh_reading_calib',
      'vname' => 'LBL_S_33RH_READING_CALIB ',
      'type' => 'decimal',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '18',
      'size' => '20',
      'precision' => '8',
    ),
    's_75rh_reading_calib' => 
    array (
      'required' => false,
      'name' => 's_75rh_reading_calib',
      'vname' => 'LBL_S_75RH_READING_CALIB',
      'type' => 'decimal',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '18',
      'size' => '20',
      'precision' => '8',
    ),
    'trh_calib_fail_rsn' => 
    array (
      'required' => false,
      'name' => 'trh_calib_fail_rsn',
      'vname' => 'LBL_TRH_CALIB_FAIL_RSN',
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
      'options' => 'CALIB_ERROR_REASON_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'trh_calib_fail_reas_other' => 
    array (
      'required' => false,
      'name' => 'trh_calib_fail_reas_other',
      'vname' => 'LBL_TRH_CALIB_FAIL_REAS_OTHER',
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
    'trh_calib_status' => 
    array (
      'required' => false,
      'name' => 'trh_calib_status',
      'vname' => 'LBL_TRH_CALIB_STATUS',
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
      'options' => 'VALIDATION_STATUS_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
  ),
  'relationships' => 
  array (
  ),
);
?>
