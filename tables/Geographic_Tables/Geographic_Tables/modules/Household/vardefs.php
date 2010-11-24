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
    'hh_id' => 
    array (
      'required' => false,
      'name' => 'hh_id',
      'vname' => 'LBL_HH_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Unique Identifier: Household Identifier',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '36',
      'size' => '20',
    ),
    'num_age_elig' => 
    array (
      'required' => false,
      'name' => 'num_age_elig',
      'vname' => 'LBL_NUM_AGE_ELIG',
      'type' => 'int',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Number of Age-Eligible women in Household',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'disable_num_format' => '',
      'validation' => 
      array (
        'type' => 'range',
        'min' => '14',
        'max' => '49',
      ),
      'len' => '255',
    ),
    'num_preg' => 
    array (
      'required' => false,
      'name' => 'num_preg',
      'vname' => 'LBL_NUM_PREG',
      'type' => 'int',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Number of Pregnant Women in Household',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'disable_num_format' => '',
      'validation' => 
      array (
        'type' => 'range',
        'min' => 0,
        'max' => '10',
      ),
      'len' => '255',
    ),
    'num_preg_minor' => 
    array (
      'required' => false,
      'name' => 'num_preg_minor',
      'vname' => 'LBL_NUM_PREG_MINOR',
      'type' => 'int',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Number of minor Females in Household who are currently pregnant',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'disable_num_format' => '',
      'validation' => 
      array (
        'type' => 'range',
        'min' => '14',
        'max' => '17',
      ),
      'len' => '255',
    ),
    'num_preg_adult' => 
    array (
      'required' => false,
      'name' => 'num_preg_adult',
      'vname' => 'LBL_NUM_PREG_ADULT',
      'type' => 'int',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Number of adult Females in Household who are currently pregnant',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'disable_num_format' => '',
      'validation' => 
      array (
        'type' => 'range',
        'min' => 0,
        'max' => '10',
      ),
      'len' => '255',
    ),
    'hh_structure_oth' => 
    array (
      'required' => false,
      'name' => 'hh_structure_oth',
      'vname' => 'LBL_HH_STRUCTURE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other structure type specified',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'hh_status' => 
    array (
      'required' => false,
      'name' => 'hh_status',
      'vname' => 'LBL_HH_STATUS',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Do HH members live at DU Address?  ',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'LISTING_SOURCE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'hh_elig' => 
    array (
      'required' => false,
      'name' => 'hh_elig',
      'vname' => 'LBL_HH_ELIG',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Initial Eligibility Status of Household from Enumeration Questionnaire',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'LISTING_SOURCE_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'hh_comment' => 
    array (
      'required' => false,
      'name' => 'hh_comment',
      'vname' => 'LBL_HH_COMMENT',
      'type' => 'text',
      'massupdate' => 0,
      'default' => '8000',
      'comments' => '',
      'help' => 'Text field for qualitative information',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'studio' => 'visible',
      'rows' => '4',
      'cols' => '20',
    ),
  ),
  'relationships' => 
  array (
  ),
);
?>
