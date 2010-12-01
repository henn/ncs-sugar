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
    'nir_id' => 
    array (
      'required' => false,
      'name' => 'nir_id',
      'vname' => 'LBL_NIR_ID',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Unique identifier: Linking of contact with instrument ',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '36',
      'size' => '20',
    ),
    'nir_vac_info' => 
    array (
      'required' => false,
      'name' => 'nir_vac_info',
      'vname' => 'LBL_NIR_VAC_INFO',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Source of Verified Vacancy Information',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL3',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'nir_vac_info_oth' => 
    array (
      'required' => false,
      'name' => 'nir_vac_info_oth',
      'vname' => 'LBL_NIR_VAC_INFO_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other Knowledge of Vacancy ',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'nir_noaccess' => 
    array (
      'required' => false,
      'name' => 'nir_noaccess',
      'vname' => 'LBL_NIR_NOACCESS',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Description of lack of building access',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL3',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'nir_noaccess_oth' => 
    array (
      'required' => false,
      'name' => 'nir_noaccess_oth',
      'vname' => 'LBL_NIR_NOACCESS_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other Description of Lack of Access ',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'nir_access_attempt' => 
    array (
      'required' => false,
      'name' => 'nir_access_attempt',
      'vname' => 'LBL_NIR_ACCESS_ATTEMPT',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'How access was attempted',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL3',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'nir_access_attempt_oth' => 
    array (
      'required' => false,
      'name' => 'nir_access_attempt_oth',
      'vname' => 'LBL_NIR_ACCESS_ATTEMPT_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other Description of Lack of Access ',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'nir_type_person' => 
    array (
      'required' => false,
      'name' => 'nir_type_person',
      'vname' => 'LBL_NIR_TYPE_PERSON',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Description of Non-Interview of Person',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL3',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'nir_type_person_oth' => 
    array (
      'required' => false,
      'name' => 'nir_type_person_oth',
      'vname' => 'LBL_NIR_TYPE_PERSON_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other Non-Interview Type',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'cog_inform_relation' => 
    array (
      'required' => false,
      'name' => 'cog_inform_relation',
      'vname' => 'LBL_COG_INFORM_RELATION',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Relationship of informant to participant',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'NIR_INFORM_RELATION_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'cog_inform_relation_oth' => 
    array (
      'required' => false,
      'name' => 'cog_inform_relation_oth',
      'vname' => 'LBL_COG_INFORM_RELATION_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other Relationship of informant to participant',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'perm_disability' => 
    array (
      'required' => false,
      'name' => 'perm_disability',
      'vname' => 'LBL_PERM_DISABILITY',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Is the disability permanent',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL10',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'deceased_inform_relation' => 
    array (
      'required' => false,
      'name' => 'deceased_inform_relation',
      'vname' => 'LBL_DECEASED_INFORM_RELATION',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Relationship of informant to participant',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'NIR_INFORM_RELATION_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'deceased_inform_oth' => 
    array (
      'required' => false,
      'name' => 'deceased_inform_oth',
      'vname' => 'LBL_DECEASED_INFORM_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other Relationship of informant to participant',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'yod' => 
    array (
      'required' => false,
      'name' => 'yod',
      'vname' => 'LBL_YOD',
      'type' => 'int',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Year of Death',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
      'disable_num_format' => '',
    ),
    'who_refused' => 
    array (
      'required' => false,
      'name' => 'who_refused',
      'vname' => 'LBL_WHO_REFUSED',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Relationship of informant to participant',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'NIR_INFORM_RELATION_CL2',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'who_refused_oth' => 
    array (
      'required' => false,
      'name' => 'who_refused_oth',
      'vname' => 'LBL_WHO_REFUSED_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other Relationship of informant to participant',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'refuser_strength' => 
    array (
      'required' => false,
      'name' => 'refuser_strength',
      'vname' => 'LBL_REFUSER_STRENGTH',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Strength/Intensity of Refusal',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'REFUSAL_INTENSITY_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'ref_action' => 
    array (
      'required' => false,
      'name' => 'ref_action',
      'vname' => 'LBL_REF_ACTION',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Recommended next steps for case',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'REFUSAL_ACTION_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'perm_ltr' => 
    array (
      'required' => false,
      'name' => 'perm_ltr',
      'vname' => 'LBL_PERM_LTR',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Will the participant ever be able to participate in the study',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'CONFIRM_TYPE_CL10',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'reason_unavail' => 
    array (
      'required' => false,
      'name' => 'reason_unavail',
      'vname' => 'LBL_REASON_UNAVAIL',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Reason the participant is unavailable (long term) to participate',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'UNAVAILABLE_REASON_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'reason_unavail_oth' => 
    array (
      'required' => false,
      'name' => 'reason_unavail_oth',
      'vname' => 'LBL_REASON_UNAVAIL_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other reason participant is unavailable',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'date_available' => 
    array (
      'required' => false,
      'name' => 'date_available',
      'vname' => 'LBL_DATE_AVAILABLE',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date participant will be available',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'date_moved' => 
    array (
      'required' => false,
      'name' => 'date_moved',
      'vname' => 'LBL_DATE_MOVED',
      'type' => 'date',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Date participant moved',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'size' => '20',
    ),
    'moved_length_time' => 
    array (
      'required' => false,
      'name' => 'moved_length_time',
      'vname' => 'LBL_MOVED_LENGTH_TIME',
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
    'moved_unit' => 
    array (
      'required' => false,
      'name' => 'moved_unit',
      'vname' => 'LBL_MOVED_UNIT',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Unit of time participant moved away',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'TIME_UNIT_PAST_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'moved_relation_oth' => 
    array (
      'required' => false,
      'name' => 'moved_relation_oth',
      'vname' => 'LBL_MOVED_RELATION_OTH',
      'type' => 'varchar',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other Relationship of informant to participant',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => '255',
      'size' => '20',
    ),
    'moved_inform_relation' => 
    array (
      'required' => false,
      'name' => 'moved_inform_relation',
      'vname' => 'LBL_MOVED_INFORM_RELATION',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'Relationship of informant to participant',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'MOVED_INFORM_RELATION_CL1',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'nir' => 
    array (
      'required' => false,
      'name' => 'nir',
      'vname' => 'LBL_NIR',
      'type' => 'text',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Text field describing outcome',
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
    'cog_dis_desc' => 
    array (
      'required' => false,
      'name' => 'cog_dis_desc',
      'vname' => 'LBL_COG_DIS_DESC',
      'type' => 'text',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Description of cognitive disability',
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
    'lt_illness_desc' => 
    array (
      'required' => false,
      'name' => 'lt_illness_desc',
      'vname' => 'LBL_LT_ILLNESS_DESC',
      'type' => 'text',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Description of long term illness',
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
    'nir_other' => 
    array (
      'required' => false,
      'name' => 'nir_other',
      'vname' => 'LBL_NIR_OTHER',
      'type' => 'text',
      'massupdate' => 0,
      'comments' => '',
      'help' => 'Other reason for NIR',
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
    'non_interview_rpt' => 
    array (
      'required' => false,
      'name' => 'non_interview_rpt',
      'vname' => 'LBL_NON_INTERVIEW_RPT',
      'type' => 'enum',
      'massupdate' => 0,
      'default' => '1',
      'comments' => '',
      'help' => 'State of Death',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 100,
      'size' => '20',
      'options' => 'STATE_CL3',
      'studio' => 'visible',
      'dependency' => false,
    ),
  ),
  'relationships' => 
  array (
  ),
);
?>
