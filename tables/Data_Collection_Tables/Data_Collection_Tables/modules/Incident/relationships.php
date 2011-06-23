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
  'ncsdc_incident_ncsdc_incunatmlts' => 
  array (
    'rhs_label' => 'Incident Unanticipated Multi-Select',
    'lhs_label' => 'Incident',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_Incident',
    'rhs_module' => 'NCSDC_IncUnatMltS',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_incident_ncsdc_incunatmlts',
  ),
  'ncsdc_incident_ncsdc_incmedmults' => 
  array (
    'rhs_label' => 'Incident Media Multi-Select',
    'lhs_label' => 'Incident',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_Incident',
    'rhs_module' => 'NCSDC_IncMedMultS',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_incident_ncsdc_incmedmults',
  ),
  'ncsdc_incident_st_staffrstr' => 
  array (
    'rhs_label' => 'Staff Roster',
    'lhs_label' => 'Incident',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_Incident',
    'rhs_module' => 'ST_StaffRstr',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_incident_st_staffrstr',
  ),
  'ncsdc_incident_plt_participant' => 
  array (
    'rhs_label' => 'Participant',
    'lhs_label' => 'Incident',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_Incident',
    'rhs_module' => 'PLT_Participant',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_incident_plt_participant',
  ),
  'ncsdc_incident_gt_dwellingunt' => 
  array (
    'rhs_label' => 'Dwelling Unit (DU)',
    'lhs_label' => 'Incident',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_Incident',
    'rhs_module' => 'GT_DwellingUnt',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_incident_gt_dwellingunt',
  ),
  'ncsdc_incident_plt_person' => 
  array (
    'rhs_label' => 'Person',
    'lhs_label' => 'Incident',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_Incident',
    'rhs_module' => 'PLT_Person',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_incident_plt_person',
  ),
);
?>
