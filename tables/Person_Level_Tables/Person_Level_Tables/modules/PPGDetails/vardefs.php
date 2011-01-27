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
    'ppg_details_id' => 
    array (
      'required' => false,
      'name' => 'ppg_details_id',
      'vname' => 'LBL_PPG_DETAILS_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Unique identifier',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '36',
      'size' => '20',
    ),
    'ppg_pid_status' => 
    array (
      'required' => false,
      'name' => 'ppg_pid_status',
      'vname' => 'LBL_PPG_PID_STATUS',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'PPG/Participant Status',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'PARTICIPANT_STATUS_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'ppg_first' => 
    array (
      'required' => false,
      'name' => 'ppg_first',
      'vname' => 'LBL_PPG_FIRST',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Initial PPG Status of Age-Eligible Women',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'PPG_STATUS_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'orig_due_date' => 
    array (
      'required' => false,
      'name' => 'orig_due_date',
      'vname' => 'LBL_ORIG_DUE_DATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'First known gestational due date; &quot;YYYY-MM-DD  For missing values use &quot;&quot;9&quot;&quot; prefix followed by:  -1 (Refused), -6 (Unknown), e.g., 9111-96-96 (Refused Year, Unknown Month and Day), 2009-91-91 (Refused Month and Day)&quot;',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'due_date_2' => 
    array (
      'required' => false,
      'name' => 'due_date_2',
      'vname' => 'LBL_DUE_DATE_2',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Second updated due date; &quot;YYYY-MM-DD  For missing values use &quot;&quot;9&quot;&quot; prefix followed by:  -6 (Unknown), e.g., 2009-96-96 (Unknown Month and Day)&quot;',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'due_date_3' => 
    array (
      'required' => false,
      'name' => 'due_date_3',
      'vname' => 'LBL_DUE_DATE_3',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Third updated due date; &quot;YYYY-MM-DD  For missing values use &quot;&quot;9&quot;&quot; prefix followed by:  -6 (Unknown), e.g., 2009-96-96 (Unknown Month and Day)&quot; ',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
  ),
  'relationships' => 
  array (
  ),
);
?>
