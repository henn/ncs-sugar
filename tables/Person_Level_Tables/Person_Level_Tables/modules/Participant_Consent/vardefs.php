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
    'participant_consent_id' => 
    array (
      'required' => false,
      'name' => 'participant_consent_id',
      'vname' => 'LBL_PARTICIPANT_CONSENT_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '36',
      'size' => '20',
    ),
    'consent_given' => 
    array (
      'required' => false,
      'name' => 'consent_given',
      'vname' => 'LBL_CONSENT_GIVEN',
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
      'options' => 'CONFIRM_TYPE_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'consent_date' => 
    array (
      'required' => false,
      'name' => 'consent_date',
      'vname' => 'LBL_CONSENT_DATE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'YYYY-MM-DD',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'consent_withdraw' => 
    array (
      'required' => false,
      'name' => 'consent_withdraw',
      'vname' => 'LBL_CONSENT_WITHDRAW',
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
      'options' => 'CONFIRM_TYPE_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'consent_withdraw_date' => 
    array (
      'required' => false,
      'name' => 'consent_withdraw_date',
      'vname' => 'LBL_CONSENT_WITHDRAW_DATE',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'YYYY-MM-DD For missing values use “9” prefix followed by:  6 (Unknown) 7 (Not Applicable), e.g. 2009-96-96 (Unknown Month and Day) 9777-97-97(Not Applicable) ',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '10',
      'size' => '20',
    ),
    'consent_language' => 
    array (
      'required' => false,
      'name' => 'consent_language',
      'vname' => 'LBL_CONSENT_LANGUAGE',
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
      'options' => 'LANGUAGE_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'consent_language_oth' => 
    array (
      'required' => false,
      'name' => 'consent_language_oth',
      'vname' => 'LBL_CONSENT_LANGUAGE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Any string of numbers and/or characters; &quot;-7&quot; (Not Applicable)',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'person_who_consented_id' => 
    array (
      'required' => false,
      'name' => 'person_who_consented_id',
      'vname' => 'LBL_PERSON_WHO_CONSENTED_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Any string of numbers and/or characters',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '36',
      'size' => '20',
    ),
    'who_consented' => 
    array (
      'required' => false,
      'name' => 'who_consented',
      'vname' => 'LBL_WHO_CONSENTED',
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
      'options' => 'AGE_STATUS_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'person_wthdrw_consent_id' => 
    array (
      'required' => false,
      'name' => 'person_wthdrw_consent_id',
      'vname' => 'LBL_PERSON_WTHDRW_CONSENT_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Any string of numbers and/or characters',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '36',
      'size' => '20',
    ),
    'who_wthdrw_consent' => 
    array (
      'required' => false,
      'name' => 'who_wthdrw_consent',
      'vname' => 'LBL_WHO_WTHDRW_CONSENT',
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
      'options' => 'AGE_STATUS_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'consent_translate' => 
    array (
      'required' => false,
      'name' => 'consent_translate',
      'vname' => 'LBL_CONSENT_TRANSLATE',
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
      'options' => 'TRANSLATION_METHOD_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'consent_comments' => 
    array (
      'required' => false,
      'name' => 'consent_comments',
      'vname' => 'LBL_CONSENT_COMMENTS',
      'type' => 'text',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'only the first 8000 characters will be uploaded',
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
    'consent_withdraw_type' => 
    array (
      'required' => false,
      'name' => 'consent_withdraw_type',
      'vname' => 'LBL_CONSENT_WITHDRAW_TYPE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Type of consent withdrawal',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'NCS_CONSENT_WITHDRAW_TYPE',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'consent_type' => 
    array (
      'required' => false,
      'name' => 'consent_type',
      'vname' => 'LBL_CONSENT_TYPE',
      'type' => 'multienum',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Type of consent',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
      'options' => 'CONSENT_TYPE_CL1',
      'studio' => 'visible',
      'isMultiSelect' => true,
    ),
  ),
  'relationships' => 
  array (
  ),
);
?>
