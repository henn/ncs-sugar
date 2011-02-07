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
  'ncsdc_eventinfo_ncsdc_incident' => 
  array (
    'rhs_label' => 'Incident',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_EventInfo',
    'rhs_module' => 'NCSDC_INCIDENT',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_event_ncsdc_incident',
  ),
  'ncsdc_eventinfo_ncsdc_instrument' => 
  array (
    'rhs_label' => 'Instrument Information',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_EventInfo',
    'rhs_module' => 'NCSDC_INSTRUMENT',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_event_ncsdc_instrument',
  ),
  'ncsdc_eventinfo_ncsdc_incmedmults' => 
  array (
    'rhs_label' => 'Incident Media Multi-Select',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_EventInfo',
    'rhs_module' => 'NCSDC_IncMedMultS',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_eventinfo_ncsdc_incmedmults',
  ),
  'ncsdc_eventinfo_ncsdc_incunatmlts' => 
  array (
    'rhs_label' => 'Incident Unanticipated Multi-Select',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_EventInfo',
    'rhs_module' => 'NCSDC_IncUnatMltS',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_eventinfo_ncsdc_incunatmlts',
  ),
  'ncsdc_eventinfo_ncsdc_noninterrpt' => 
  array (
    'rhs_label' => 'Non Interview Report',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_EventInfo',
    'rhs_module' => 'NCSDC_NonInterRpt',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_eventinfo_ncsdc_noninterrpt',
  ),
  'ncsdc_eventinfo_ncsdc_nirnaccmlts' => 
  array (
    'rhs_label' => 'NIR No Access Multi-Select',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_EventInfo',
    'rhs_module' => 'NCSDC_NIRNAccMltS',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_eventinfo_ncsdc_nirnaccmlts',
  ),
  'ncsdc_eventinfo_ncsdc_nirdutpmlts' => 
  array (
    'rhs_label' => 'NIR DU Type Multi Select',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_EventInfo',
    'rhs_module' => 'NCSDC_NIRDUTpMltS',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_eventinfo_ncsdc_nirdutpmlts',
  ),
  'ncsdc_eventinfo_ncsdc_nintrptvcnt' => 
  array (
    'rhs_label' => 'NIR Vacant Multi-Select',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_EventInfo',
    'rhs_module' => 'NCSDC_NIntRptVcnt',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_eventinfo_ncsdc_nintrptvcnt',
  ),
  'ncsdc_eventinfo_ncsdc_nirrfsmlts' => 
  array (
    'rhs_label' => 'NIR Refusal Multi-Select',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_EventInfo',
    'rhs_module' => 'NCSDC_NIRRfsMltS',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_eventinfo_ncsdc_nirrfsmlts',
  ),
  'ncsdc_eventinfo_ncsdc_nirdutpmlts_1' => 
  array (
    'rhs_label' => 'NIR DU Type Multi Select',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_EventInfo',
    'rhs_module' => 'NCSDC_NIRDUTpMltS',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_eventinfo_ncsdc_nirdutpmlts_1',
  ),
);
?>
