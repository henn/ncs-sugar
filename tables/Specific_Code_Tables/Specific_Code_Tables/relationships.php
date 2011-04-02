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

$relationships = 
//GT_ListUnt
array (
  'gt_listingunt_gt_dwellingunt' => 
  array (
    'lhs_module' => 'GT_ListingUnt',
    'rhs_module' => 'GT_DwellingUnt',
    'relationship_type' => 'one-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'gt_listingunt_gt_dwellingunt',
  ),
//GT_DwlUntHsLnk
array (
  'gt_dwlunthslnk_gt_dwellingunt' => 
  array (
    'lhs_label' => 'Dwelling Unit Household Linkage',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'GT_DwlUntHsLnk',
    'rhs_module' => 'GT_DwellingUnt',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'gt_dwlunthslnk_gt_dwellingunt',
  ),
  'gt_dwlunthslnk_gt_household' => 
  array (
    'lhs_label' => 'Dwelling Unit Household Linkage',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'GT_DwlUntHsLnk',
    'rhs_module' => 'GT_Household',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'gt_dwlunthslnk_gt_household',
  ),
//ST_StaffRstr
array (
  'st_staffrstr_st_stflang' => 
  array (
    'rhs_label' => 'Staff Language',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'ST_StaffRstr',
    'rhs_module' => 'ST_StfLang',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'st_staffrstr_st_stflang',
  ),
  'st_staffrstr_st_stfvldtn' => 
  array (
    'rhs_label' => 'Staff Validation',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'ST_StaffRstr',
    'rhs_module' => 'ST_StfVldtn',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'st_staffrstr_st_stfvldtn',
  ),
  'st_staffrstr_st_stfwkexpns' => 
  array (
    'rhs_label' => 'Weekly Staff Expenses',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'ST_StaffRstr',
    'rhs_module' => 'ST_StfWkExpns',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'st_staffrstr_st_stfwkexpns',
  ),
  'st_staffrstr_st_stfcrttrn' => 
  array (
    'rhs_label' => 'Staff Trainings and Certifications',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'ST_StaffRstr',
    'rhs_module' => 'ST_StfCrtTrn',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'st_staffrstr_st_stfcrttrn',
  ),
  'st_staffrstr_st_wkoeact' => 
  array (
    'rhs_label' => 'Weekly Outreach & Engagement Activities',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'ST_StaffRstr',
    'rhs_module' => 'ST_WkOEAct',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'st_staffrstr_st_wkoeact',
  ),
//PT_LnkPrsHshld
array (
  'plt_lnkprshshld_plt_person' => 
  array (
    'lhs_label' => 'Household-Person Linkage',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'PLT_LnkPrsHshld',
    'rhs_module' => 'PLT_Person',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'plt_lnkprshshld_plt_person',
  ),
  'plt_lnkprshshld_gt_household' => 
  array (
    'lhs_label' => 'Household-Person Linkage',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'PLT_LnkPrsHshld',
    'rhs_module' => 'GT_Household',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'plt_lnkprshshld_gt_household',
  ),
//PT_LkPrsPrtcpt
array (
  'plt_lkprsprtcpt_plt_person' => 
  array (
    'lhs_label' => 'Person-Participant Linkage',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'PLT_LkPrsPrtcpt',
    'rhs_module' => 'PLT_Person',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'plt_lkprsprtcpt_plt_person',
  ),
  'plt_lkprsprtcpt_plt_participant' => 
  array (
    'lhs_label' => 'Person-Participant Linkage',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'PLT_LkPrsPrtcpt',
    'rhs_module' => 'PLT_Participant',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'plt_lkprsprtcpt_plt_participant',
  ),
//ST_StfWkExpns
array (
  'st_stfwkexpns_st_stfexpmgtsk' => 
  array (
    'rhs_label' => 'Weekly Staff Expense Management Tasks',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'ST_StfWkExpns',
    'rhs_module' => 'ST_StfExpMgTsk',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'st_stfwkexpns_st_stfexpmgtsk',
  ),
  'st_stfwkexpns_st_stfexpdctsk' => 
  array (
    'rhs_label' => 'Weekly Staff Expense Data Collection Tasks',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'ST_StfWkExpns',
    'rhs_module' => 'ST_StfExpDCTsk',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'st_stfwkexpns_st_stfexpdctsk',
  ),
//GT_TerSampUnt
array (
  'gt_tersampunt_gt_listingunt' => 
  array (
    'rhs_label' => 'Listing Unit',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'GT_TerSampUnt',
    'rhs_module' => 'GT_ListingUnt',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'gt_tersampunt_gt_listingunt',
  ),
//GT_SecSampUnt
array (
  'gt_secsampunt_gt_listingunt' => 
  array (
    'rhs_label' => 'Listing Unit',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'GT_SecSampUnt',
    'rhs_module' => 'GT_ListingUnt',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'gt_secsampunt_gt_listingunt',
  ),
  'gt_secsampunt_gt_tersampunt' => 
  array (
    'rhs_label' => 'Tertiary Sampling Unit (TSU)',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'GT_SecSampUnt',
    'rhs_module' => 'GT_TerSampUnt',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'gt_secsampunt_gt_tersampunt',
  ),
//GT_PrmSampUnt
array (
  'gt_prmsampunt_gt_secsampunt' => 
  array (
    'rhs_label' => 'Secondary Sampling Unit (SSU)',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'GT_PrmSampUnt',
    'rhs_module' => 'GT_SecSampUnt',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'gt_prmsampunt_gt_secsampunt',
  ),
//GT_DwellingUnt
array (
  'gt_dwellingunt_ltt_address' => 
  array (
    'lhs_module' => 'GT_DwellingUnt',
    'rhs_module' => 'LTT_Address',
    'relationship_type' => 'one-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'gt_dwellingunt_ltt_address',
  ),
  'gt_dwellingunt_ncsdc_noninterrpt' => 
  array (
    'rhs_label' => 'Non Interview Report',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'GT_DwellingUnt',
    'rhs_module' => 'NCSDC_NonInterRpt',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'gt_dwellingunt_ncsdc_noninterrpt',
  ),
//NCSDC_EventInfo
array (
  'ncsdc_eventinfo_ncsdc_instrument' => 
  array (
    'rhs_label' => 'Instrument Information',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_EventInfo',
    'rhs_module' => 'NCSDC_Instrument',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_eventinfo_ncsdc_instrument',
  ),
  'ncsdc_eventinfo_plt_participant' => 
  array (
    'lhs_module' => 'NCSDC_EventInfo',
    'rhs_module' => 'PLT_Participant',
    'relationship_type' => 'one-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_eventinfo_plt_participant',
  ),
  'ncsdc_eventinfo_activities' => 
  array (
    'rhs_label' => 'Activities',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'NCSDC_EventInfo',
    'rhs_module' => 'Activities',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_eventinfo_activities',
  ),
  'ncsdc_eventinfo_st_stfvldtn' => 
  array (
    'rhs_label' => 'Staff Validation',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_EventInfo',
    'rhs_module' => 'ST_StfVldtn',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_eventinfo_st_stfvldtn',
  ),
//NCSDC_CntctLnk
array (
  'ncsdc_cntctlnk_st_staffrstr' => 
  array (
    'lhs_label' => 'Contact Linking',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_CntctLnk',
    'rhs_module' => 'ST_StaffRstr',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_cntctlnk_st_staffrstr',
  ),
  'ncsdc_cntctlnk_ncsdc_cntctinfo' => 
  array (
    'lhs_label' => 'Contact Linking',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_CntctLnk',
    'rhs_module' => 'NCSDC_CntctInfo',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_cntctlnk_ncsdc_cntctinfo',
  ),
  'ncsdc_cntctlnk_ncsdc_eventinfo' => 
  array (
    'lhs_label' => 'Contact Linking',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_CntctLnk',
    'rhs_module' => 'NCSDC_EventInfo',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_cntctlnk_ncsdc_eventinfo',
  ),
  'ncsdc_cntctlnk_ncsdc_instrument' => 
  array (
    'lhs_label' => 'Contact Linking',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_CntctLnk',
    'rhs_module' => 'NCSDC_Instrument',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_cntctlnk_ncsdc_instrument',
  ),
  'ncsdc_cntctlnk_plt_person' => 
  array (
    'lhs_label' => 'Contact Linking',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_CntctLnk',
    'rhs_module' => 'PLT_Person',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_cntctlnk_plt_person',
  ),
  'ncsdc_cntctlnk_olt_provider' => 
  array (
    'lhs_label' => 'Contact Linking',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_CntctLnk',
    'rhs_module' => 'OLT_Provider',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_cntctlnk_olt_provider',
  ),
//NCSDC_CntctInfo
array (
  'ncsdc_cntctinfo_ncsdc_eventinfo' => 
  array (
    'rhs_label' => 'Event Information',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_CntctInfo',
    'rhs_module' => 'NCSDC_EventInfo',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_cntctinfo_ncsdc_eventinfo',
  ),
  'ncsdc_cntctinfo_plt_prtcptcnsnt' => 
  array (
    'rhs_label' => 'Participant Consent',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_CntctInfo',
    'rhs_module' => 'PLT_PrtcptCnsnt',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_cntctinfo_plt_prtcptcnsnt',
  ),
  'ncsdc_cntctinfo_plt_prtcptvstc' => 
  array (
    'rhs_label' => 'Participant Visit Consent',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_CntctInfo',
    'rhs_module' => 'PLT_PrtcptVstC',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_cntctinfo_plt_prtcptvstc',
  ),
  'ncsdc_cntctinfo_ncsdc_noninterrpt' => 
  array (
    'rhs_label' => 'Non Interview Report',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_CntctInfo',
    'rhs_module' => 'NCSDC_NonInterRpt',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_cntctinfo_ncsdc_noninterrpt',
  ),
  'ncsdc_cntctinfo_ncsdc_incident' => 
  array (
    'rhs_label' => 'Incident',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_CntctInfo',
    'rhs_module' => 'NCSDC_Incident',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_cntctinfo_ncsdc_incident',
  ),
//PT_Person
array (
  'plt_person_plt_personrace' => 
  array (
    'rhs_label' => 'Person Race',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'PLT_Person',
    'rhs_module' => 'PLT_PersonRace',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'plt_person_plt_personrace',
  ),
  'plt_person_ltt_address' => 
  array (
    'rhs_label' => 'LTT_Address',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'PLT_Person',
    'rhs_module' => 'LTT_Address',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'plt_person_ltt_address',
  ),
  'plt_person_ltt_telephone' => 
  array (
    'rhs_label' => 'Telephone',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'PLT_Person',
    'rhs_module' => 'LTT_Telephone',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'plt_person_ltt_telephone',
  ),
  'plt_person_ltt_email' => 
  array (
    'rhs_label' => 'Email',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'PLT_Person',
    'rhs_module' => 'LTT_Email',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'plt_person_ltt_email',
  ),
  'plt_person_ncsdc_noninterrpt' => 
  array (
    'rhs_label' => 'Non Interview Report',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'PLT_Person',
    'rhs_module' => 'NCSDC_NonInterRpt',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'plt_person_ncsdc_noninterrpt',
  ),
//PT_Participant
array (
  'plt_participant_activities' => 
  array (
    'rhs_label' => 'Activities',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'PLT_Participant',
    'rhs_module' => 'Activities',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'plt_participant_activities',
  ),
  'plt_participant_plt_prtcptcnsnt' => 
  array (
    'rhs_label' => 'Participant Consent',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'PLT_Participant',
    'rhs_module' => 'PLT_PrtcptCnsnt',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'plt_participant_plt_prtcptcnsnt',
  ),
  'plt_participant_plt_prtcptvstc' => 
  array (
    'rhs_label' => 'Participant Visit Consent',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'PLT_Participant',
    'rhs_module' => 'PLT_PrtcptVstC',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'plt_participant_plt_prtcptvstc',
  ),
  'plt_participant_plt_ppgstshstry' => 
  array (
    'rhs_label' => 'PPG Status History',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'PLT_Participant',
    'rhs_module' => 'PLT_PPGStsHstry',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'plt_participant_plt_ppgstshstry',
  ),
  'plt_participant_plt_ppgdetails' => 
  array (
    'rhs_label' => 'PPG Details',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'PLT_Participant',
    'rhs_module' => 'PLT_PPGDetails',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'plt_participant_plt_ppgdetails',
  ),
  'plt_participant_ncsdc_eventinfo' => 
  array (
    'rhs_label' => 'Event Information',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'PLT_Participant',
    'rhs_module' => 'NCSDC_EventInfo',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'plt_participant_ncsdc_eventinfo',
  ),
//OLT_PrsnPrvdLnk
array (
  'olt_prsnprvdlnk_plt_person' => 
  array (
    'lhs_label' => 'Person-Provider Linkage',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'OLT_PrsnPrvdLnk',
    'rhs_module' => 'PLT_Person',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'olt_prsnprvdlnk_plt_person',
  ),
  'olt_prsnprvdlnk_olt_provider' => 
  array (
    'lhs_label' => 'Person-Provider Linkage',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'OLT_PrsnPrvdLnk',
    'rhs_module' => 'OLT_Provider',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'olt_prsnprvdlnk_olt_provider',
  ),
//OLT_PrsnInstLnk
array (
  'olt_prsninstlnk_plt_person' => 
  array (
    'lhs_label' => 'Person-Institute Linkage',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'OLT_PrsnInstLnk',
    'rhs_module' => 'PLT_Person',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'olt_prsninstlnk_plt_person',
  ),
  'olt_prsninstlnk_olt_institution' => 
  array (
    'lhs_label' => 'Person-Institute Linkage',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'OLT_PrsnInstLnk',
    'rhs_module' => 'OLT_Institution',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'olt_prsninstlnk_olt_institution',
  ),
//OLT_Provider
array (
  'olt_provider_ltt_address' => 
  array (
    'rhs_label' => 'Address',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'OLT_Provider',
    'rhs_module' => 'LTT_Address',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'olt_provider_ltt_address',
  ),
  'olt_provider_ltt_email' => 
  array (
    'rhs_label' => 'Email',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'OLT_Provider',
    'rhs_module' => 'LTT_Email',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'olt_provider_ltt_email',
  ),
  'olt_provider_ltt_telephone' => 
  array (
    'rhs_label' => 'Telephone',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'OLT_Provider',
    'rhs_module' => 'LTT_Telephone',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'olt_provider_ltt_telephone',
  ),
//OLT_Institution
array (
  'olt_institution_ltt_address' => 
  array (
    'rhs_label' => 'Address',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'OLT_Institution',
    'rhs_module' => 'LTT_Address',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'olt_institution_ltt_address',
  ),
  'olt_institution_ltt_email' => 
  array (
    'rhs_label' => 'Email',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'OLT_Institution',
    'rhs_module' => 'LTT_Email',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'olt_institution_ltt_email',
  ),
  'olt_institution_ltt_telephone' => 
  array (
    'rhs_label' => 'Telephone',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'OLT_Institution',
    'rhs_module' => 'LTT_Telephone',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'olt_institution_ltt_telephone',
  ),
//GT_StudyCntr
array (
  'gt_studycntr_gt_prmsampunt' => 
  array (
    'rhs_label' => 'Primary Sampling Unit (PSU)',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'GT_StudyCntr',
    'rhs_module' => 'GT_PrmSampUnt',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'gt_studycntr_gt_prmsampunt',
  ),
  'gt_studycntr_st_staffrstr' => 
  array (
    'rhs_label' => 'ST_StaffRstr',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'GT_StudyCntr',
    'rhs_module' => 'ST_StaffRstr',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'gt_studycntr_st_staffrstr',
  ),
);
?>
