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
      'audited' => false,
      'reportable' => true,
      'size' => '20',
    ),
    'rvis_language' => 
    array (
      'required' => false,
      'name' => 'rvis_language',
      'vname' => 'LBL_RVIS_LANGUAGE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Language in which VIS was administered',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'LANGUAGE_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'rvis_language_oth' => 
    array (
      'required' => false,
      'name' => 'rvis_language_oth',
      'vname' => 'LBL_RVIS_LANGUAGE_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other language specified',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'rvis_person' => 
    array (
      'required' => false,
      'name' => 'rvis_person',
      'vname' => 'LBL_RVIS_PERSON',
      'type' => 'varchar',
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
    ),
    'rvis_who_consented' => 
    array (
      'required' => false,
      'name' => 'rvis_who_consented',
      'vname' => 'LBL_RVIS_WHO_CONSENTED',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '2',
      'comments' => '',
      'help' => 'Role of person who VIS was presented to',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'AGE_STATUS_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'rvis_translate' => 
    array (
      'required' => false,
      'name' => 'rvis_translate',
      'vname' => 'LBL_RVIS_TRANSLATE',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'TRANSLATION_METHOD_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'time_stamp_1' => 
    array (
      'required' => false,
      'name' => 'time_stamp_1',
      'vname' => 'LBL_TIME_STAMP_1',
      'type' => 'datetimecombo',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'size' => '20',
      'dbType' => 'datetime',
    ),
    'rvis_sections' => 
    array (
      'required' => false,
      'name' => 'rvis_sections',
      'vname' => 'LBL_RVIS_SECTIONS',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'If not all section were presented select No',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL21',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'rvis_during_interv' => 
    array (
      'required' => false,
      'name' => 'rvis_during_interv',
      'vname' => 'LBL_RVIS_DURING_INTERV',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL21',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'rvis_during_bio' => 
    array (
      'required' => false,
      'name' => 'rvis_during_bio',
      'vname' => 'LBL_RVIS_DURING_BIO',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL21',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'rvis_bio_cord' => 
    array (
      'required' => false,
      'name' => 'rvis_bio_cord',
      'vname' => 'LBL_RVIS_BIO_CORD',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_7',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL21',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'rvis_during_env' => 
    array (
      'required' => false,
      'name' => 'rvis_during_env',
      'vname' => 'LBL_RVIS_DURING_ENV',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL21',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'rvis_during_thanks' => 
    array (
      'required' => false,
      'name' => 'rvis_during_thanks',
      'vname' => 'LBL_RVIS_DURING_THANKS',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL21',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'rvis_after_saq' => 
    array (
      'required' => false,
      'name' => 'rvis_after_saq',
      'vname' => 'LBL_RVIS_AFTER_SAQ',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL21',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'rvis_reconsideration' => 
    array (
      'required' => false,
      'name' => 'rvis_reconsideration',
      'vname' => 'LBL_RVIS_RECONSIDERATION',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '_7',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL21',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'time_stamp_2' => 
    array (
      'required' => false,
      'name' => 'time_stamp_2',
      'vname' => 'LBL_TIME_STAMP_2',
      'type' => 'datetimecombo',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'size' => '20',
      'dbType' => 'datetime',
    ),
  ),
  'relationships' => 
  array (
  ),
);
?>
