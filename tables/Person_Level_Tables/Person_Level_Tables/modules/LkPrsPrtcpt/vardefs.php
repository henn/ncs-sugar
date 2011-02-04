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
    'psu_id' => 
    array (
      'required' => false,
      'name' => 'psu_id',
      'vname' => 'LBL_PSU_ID',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '20000014',
      'comments' => '',
      'help' => 'External table identifier',
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
    'person_pid_id' => 
    array (
      'required' => false,
      'name' => 'person_pid_id',
      'vname' => 'LBL_PERSON_PID_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Unique within table. Any string of numbers and/or characters',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '36',
      'size' => '20',
    ),
    'p_id' => 
    array (
      'required' => false,
      'name' => 'p_id',
      'vname' => 'LBL_P_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'External table identifier',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '36',
      'size' => '20',
    ),
    'person_id' => 
    array (
      'required' => false,
      'name' => 'person_id',
      'vname' => 'LBL_PERSON_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'External table identifier',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '36',
      'size' => '20',
    ),
    'relation' => 
    array (
      'required' => false,
      'name' => 'relation',
      'vname' => 'LBL_RELATION',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Person\'s PERSON_PARTCPNT_RELTNS HP to Study Participant (P_ID)',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'PERSON_PARTCPNT_RELTNSHP_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'relation_oth' => 
    array (
      'required' => false,
      'name' => 'relation_oth',
      'vname' => 'LBL_RELATION_OTH',
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
    'is_active' => 
    array (
      'required' => false,
      'name' => 'is_active',
      'vname' => 'LBL_IS_ACTIVE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Is PERSON_PARTICIPANT link active',
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
  ),
  'relationships' => 
  array (
  ),
);
?>
