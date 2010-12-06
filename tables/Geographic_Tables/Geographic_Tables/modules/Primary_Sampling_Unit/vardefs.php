<?php
/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2010 SugarCRM Inc.
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
    'sc_id' => 
    array (
      'required' => false,
      'name' => 'sc_id',
      'vname' => 'LBL_SC_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'External table identifier: Study Center ID',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '36',
      'size' => '20',
    ),
    'psu_id' => 
    array (
      'required' => false,
      'name' => 'psu_id',
      'vname' => 'LBL_PSU_ID',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '20000014',
      'comments' => '',
      'help' => 'Unique Identifier: Primary Sampling Unit Identifier',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'PSU_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'psu_name' => 
    array (
      'required' => false,
      'name' => 'psu_name',
      'vname' => 'LBL_PSU_NAME',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Name of PSU',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '100',
      'size' => '20',
    ),
    'recruit_type' => 
    array (
      'required' => false,
      'name' => 'recruit_type',
      'vname' => 'LBL_RECRUIT_TYPE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Recruitment Strategy',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'RECRUIT_TYPE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
  ),
  'relationships' => 
  array (
  ),
);
?>
