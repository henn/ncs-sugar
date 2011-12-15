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

$relationships = array (
  'ncsdc_noninterrpt_plt_person' => 
  array (
    'rhs_label' => 'PLT_Person',
    'lhs_label' => 'Non Interview Report',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_NonInterRpt',
    'rhs_module' => 'PLT_Person',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_noninterrpt_plt_person',
  ),
  'ncsdc_noninterrpt_gt_dwellingunt' => 
  array (
    'rhs_label' => 'Dwelling Unit (DU)',
    'lhs_label' => 'Non Interview Report',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_NonInterRpt',
    'rhs_module' => 'GT_DwellingUnt',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_noninterrpt_gt_dwellingunt',
  ),
  'ncsdc_noninterrpt_ncsdc_nirdutpmlts' => 
  array (
    'rhs_label' => 'NIR DU Type Multi Select',
    'lhs_label' => 'Non Interview Report',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_NonInterRpt',
    'rhs_module' => 'NCSDC_NIRDUTpMltS',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_noninterrpt_ncsdc_nirdutpmlts',
  ),
  'ncsdc_noninterrpt_ncsdc_nirrfsmlts' => 
  array (
    'rhs_label' => 'NIR Refusal Multi-Select',
    'lhs_label' => 'Non Interview Report',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_NonInterRpt',
    'rhs_module' => 'NCSDC_NIRRfsMltS',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_noninterrpt_ncsdc_nirrfsmlts',
  ),
  'ncsdc_noninterrpt_ncsdc_nirnaccmlts' => 
  array (
    'rhs_label' => 'NIR No Access Multi-Select',
    'lhs_label' => 'Non Interview Report',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_NonInterRpt',
    'rhs_module' => 'NCSDC_NIRNAccMltS',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_noninterrpt_ncsdc_nirnaccmlts',
  ),
  'ncsdc_noninterrpt_ncsdc_nintrptvcnt' => 
  array (
    'rhs_label' => 'NIR Vacant Multi-Select',
    'lhs_label' => 'Non Interview Report',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_NonInterRpt',
    'rhs_module' => 'NCSDC_NIntRptVcnt',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_noninterrpt_ncsdc_nintrptvcnt',
  ),
  'ncsdc_noninterrpt_notes' => 
  array (
    'lhs_module' => 'NCSDC_NonInterRpt',
    'rhs_module' => 'Notes',
    'relationship_type' => 'one-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_noninterrpt_notes',
  ),
);
?>
