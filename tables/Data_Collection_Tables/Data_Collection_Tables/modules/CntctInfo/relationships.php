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
  'ncsdc_cntctinfo_plt_partauthfrm' => 
  array (
    'rhs_label' => 'Participant Authorization Form',
    'lhs_label' => 'Contact Information',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'NCSDC_CntctInfo',
    'rhs_module' => 'PLT_PartAuthFrm',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'ncsdc_cntctinfo_plt_partauthfrm',
  ),
);
?>
