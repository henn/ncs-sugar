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


    $manifest = array (
         'acceptable_sugar_versions' => 
          array (
            '6.1.2'
          ),
          'acceptable_sugar_flavors' =>
          array(
            'CE', 'PRO','ENT'
          ),
          'readme'=>'',
          'key'=>'ID',
          'author' => 'Mike',
          'description' => '',
          'icon' => '',
          'is_uninstallable' => true,
          'name' => 'project_IDCreation',
          'published_date' => '2011-03-23 03:44:47',
          'type' => 'module',
          'version' => '1300851887',
          'remove_tables' => 'prompt',
          );
$installdefs = array (
  'id' => 'project_IDCreation',
  'copy' => 
  array (
    0 =>     
####Begin copy of ncs_framework to the root sugar directory####
    array (
      'from' => '<basepath>/ncs_framework',
      'to' => '/var/www/sugar/ncs_framework',
    ),
####End copy of ncs_framework
####################################
#                                  #
#	   ALL GT Geographic_Tables    #
#                                  #
####Begin copy of GT_DwellingUnt####
    array (
      'from' => '<basepath>/IDCreation_resources/modules/GT_DwellingUnt/views/view.edit.php',
      'to' => 'custom/modules/GT_DwellingUnt/views/view.edit.php',
    ),
####End copy of GT_DwellingUnt####
####Begin copy of GT_DwlUntHsLnk####
    array (
      'from' => '<basepath>/IDCreation_resources/modules/GT_DwlUntHsLnk/views/view.edit.php',
      'to' => 'custom/modules/GT_DwlUntHsLnk/views/view.edit.php',
    ),
####End copy of GT_DwellingUnt####
####Begin copy of GT_Household####
    array (
      'from' => '<basepath>/IDCreation_resources/modules/GT_Household/views/view.edit.php',
      'to' => 'custom/modules/GT_Household/views/view.edit.php',
    ),
####End copy of GT_Household####
####Begin copy of GT_ListingUnt####
    array (
      'from' => '<basepath>/IDCreation_resources/modules/GT_ListingUnt/views/view.edit.php',
      'to' => 'custom/modules/GT_ListingUnt/views/view.edit.php',
    ),
####End copy of GT_ListingUnt####
####################################
#                                  #
# ALL LTT Locating_Tracing_Tables  #
#                                  #
####Begin copy of LTT_Address   ####
    array (
      'from' => '<basepath>/IDCreation_resources/modules/LTT_Address/views/view.edit.php',
      'to' => 'custom/modules/LTT_Address/views/view.edit.php',
    ),
####Begin copy of LTT_Email####
    array (
      'from' => '<basepath>/IDCreation_resources/modules/LTT_Email/views/view.edit.php',
      'to' => 'custom/modules/LTT_Email/views/view.edit.php',
    ),
####Begin copy of LTT_Telephone####
    array (
      'from' => '<basepath>/IDCreation_resources/modules/LTT_Telephone/views/view.edit.php',
      'to' => 'custom/modules/LTT_Telephone/views/view.edit.php',
    ),
####################################
#                                  #
# ALL NCSDC Data_Collection_Tables #
#                                  #
####Begin copy of NCSDC_CntctInfo###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/NCSDC_CntctInfo/views/view.edit.php',
      'to' => 'custom/modules/NCSDC_CntctInfo/views/view.edit.php',
    ),
####Begin copy of NCSDC_CntctLnk###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/NCSDC_CntctLnk/views/view.edit.php',
      'to' => 'custom/modules/NCSDC_CntctLnk/views/view.edit.php',
    ),
####Begin copy of NCSDC_EventInfo###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/NCSDC_EventInfo/views/view.edit.php',
      'to' => 'custom/modules/NCSDC_EventInfo/views/view.edit.php',
    ),
####Begin copy of NCSDC_Incident###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/NCSDC_Incident/views/view.edit.php',
      'to' => 'custom/modules/NCSDC_Incident/views/view.edit.php',
    ),
####Begin copy of NCSDC_IncMedMultS###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/NCSDC_IncMedMultS/views/view.edit.php',
      'to' => 'custom/modules/NCSDC_IncMedMultS/views/view.edit.php',
    ),
####Begin copy of NCSDC_IncUnatMltS###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/NCSDC_IncUnatMltS/views/view.edit.php',
      'to' => 'custom/modules/NCSDC_IncUnatMltS/views/view.edit.php',
    ),
####Begin copy of NCSDC_Instrument###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/NCSDC_Instrument/views/view.edit.php',
      'to' => 'custom/modules/NCSDC_Instrument/views/view.edit.php',
    ),
####Begin copy of NCSDC_NIntRptVcnt###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/NCSDC_NIntRptVcnt/views/view.edit.php',
      'to' => 'custom/modules/NCSDC_NIntRptVcnt/views/view.edit.php',
    ),
####Begin copy of NCSDC_NIRDUTpMltS###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/NCSDC_NIRDUTpMltS/views/view.edit.php',
      'to' => 'custom/modules/NCSDC_NIRDUTpMltS/views/view.edit.php',
    ),
####Begin copy of NCSDC_NIRNAccMltS###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/NCSDC_NIRNAccMltS/views/view.edit.php',
      'to' => 'custom/modules/NCSDC_NIRNAccMltS/views/view.edit.php',
    ),
####Begin copy of NCSDC_NIRRfsMltS###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/NCSDC_NIRRfsMltS/views/view.edit.php',
      'to' => 'custom/modules/NCSDC_NIRRfsMltS/views/view.edit.php',
    ),
####Begin copy of NCSDC_NonInterRpt###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/NCSDC_NonInterRpt/views/view.edit.php',
      'to' => 'custom/modules/NCSDC_NonInterRpt/views/view.edit.php',
    ),
####################################
#                                  #
# ALL OLT_Organization_Level_Tables#
#                                  #
####Begin copy of OLT_Institution###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/OLT_Institution/views/view.edit.php',
      'to' => 'custom/modules/OLT_Institution/views/view.edit.php',
    ),
####Begin copy of OLT_Provider###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/OLT_Provider/views/view.edit.php',
      'to' => 'custom/modules/OLT_Provider/views/view.edit.php',
    ),
####Begin copy of OLT_PrsnInstLnk###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/OLT_PrsnInstLnk/views/view.edit.php',
      'to' => 'custom/modules/OLT_PrsnInstLnk/views/view.edit.php',
    ),
####Begin copy of OLT_PrsnPrvdLnk###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/OLT_PrsnPrvdLnk/views/view.edit.php',
      'to' => 'custom/modules/OLT_PrsnPrvdLnk/views/view.edit.php',
    ),
####################################
#                                  #
#   ALL PLT_Person_Level_Tables    #
#                                  #
####Begin copy of PLT_LkPrsPrtcpt###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/PLT_LkPrsPrtcpt/views/view.edit.php',
      'to' => 'custom/modules/PLT_LkPrsPrtcpt/views/view.edit.php',
    ),
####Begin copy of PLT_LnkPrsHshld###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/PLT_LnkPrsHshld/views/view.edit.php',
      'to' => 'custom/modules/PLT_LnkPrsHshld/views/view.edit.php',
    ),
####Begin copy of PLT_Participant###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/PLT_Participant/views/view.edit.php',
      'to' => 'custom/modules/PLT_Participant/views/view.edit.php',
    ),
####Begin copy of PLT_Person###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/PLT_Person/views/view.edit.php',
      'to' => 'custom/modules/PLT_Person/views/view.edit.php',
    ),
####Begin copy of PLT_PersonRace###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/PLT_PersonRace/views/view.edit.php',
      'to' => 'custom/modules/PLT_PersonRace/views/view.edit.php',
    ),
####Begin copy of PLT_PPGDetails###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/PLT_PPGDetails/views/view.edit.php',
      'to' => 'custom/modules/PLT_PPGDetails/views/view.edit.php',
    ),
####Begin copy of PLT_PPGStsHstry###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/PLT_PPGStsHstry/views/view.edit.php',
      'to' => 'custom/modules/PLT_PPGStsHstry/views/view.edit.php',
    ),
####Begin copy of PLT_PrtcptCnsnt###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/PLT_PrtcptCnsnt/views/view.edit.php',
      'to' => 'custom/modules/PLT_PrtcptCnsnt/views/view.edit.php',
    ),
####Begin copy of PLT_PrtcptVstC###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/PLT_PrtcptVstC/views/view.edit.php',
      'to' => 'custom/modules/PLT_PrtcptVstC/views/view.edit.php',
    ),
####################################
#                                  #
#      ALL ST_Staffing_Tables      #
#                                  #
####Begin copy of ST_OtrchEval######
    array (
      'from' => '<basepath>/IDCreation_resources/modules/ST_OtrchEval/views/view.edit.php',
      'to' => 'custom/modules/ST_OtrchEval/views/view.edit.php',
    ),
####Begin copy of ST_OtrchStaff######
    array (
      'from' => '<basepath>/IDCreation_resources/modules/ST_OtrchStaff/views/view.edit.php',
      'to' => 'custom/modules/ST_OtrchStaff/views/view.edit.php',
    ),
####Begin copy of ST_StaffRstr######
    array (
      'from' => '<basepath>/IDCreation_resources/modules/ST_StaffRstr/views/view.edit.php',
      'to' => 'custom/modules/ST_StaffRstr/views/view.edit.php',
    ),
####Begin copy of ST_StfCrtTrn######
    array (
      'from' => '<basepath>/IDCreation_resources/modules/ST_StfCrtTrn/views/view.edit.php',
      'to' => 'custom/modules/ST_StfCrtTrn/views/view.edit.php',
    ),
####Begin copy of ST_StfExpDCTsk######
    array (
      'from' => '<basepath>/IDCreation_resources/modules/ST_StfExpDCTsk/views/view.edit.php',
      'to' => 'custom/modules/ST_StfExpDCTsk/views/view.edit.php',
    ),
####Begin copy of ST_StfExpMgTsk######
    array (
      'from' => '<basepath>/IDCreation_resources/modules/ST_StfExpMgTsk/views/view.edit.php',
      'to' => 'custom/modules/ST_StfExpMgTsk/views/view.edit.php',
    ),
####Begin copy of ST_StfExpDCTsk######
    array (
      'from' => '<basepath>/IDCreation_resources/modules/ST_StfExpDCTsk/views/view.edit.php',
      'to' => 'custom/modules/ST_StfExpDCTsk/views/view.edit.php',
    ),
####Begin copy of ST_StfLang######
    array (
      'from' => '<basepath>/IDCreation_resources/modules/ST_StfLang/views/view.edit.php',
      'to' => 'custom/modules/ST_StfLang/views/view.edit.php',
    ),
####Begin copy of ST_StfVldtn######
    array (
      'from' => '<basepath>/IDCreation_resources/modules/ST_StfVldtn/views/view.edit.php',
      'to' => 'custom/modules/ST_StfVldtn/views/view.edit.php',
    ),
####Begin copy of ST_StfWkExpns######
    array (
      'from' => '<basepath>/IDCreation_resources/modules/ST_StfWkExpns/views/view.edit.php',
      'to' => 'custom/modules/ST_StfWkExpns/views/view.edit.php',
    ),
####Begin copy of ST_WkOEAct######
    array (
      'from' => '<basepath>/IDCreation_resources/modules/ST_WkOEAct/views/view.edit.php',
      'to' => 'custom/modules/ST_WkOEAct/views/view.edit.php',
    ),
  ),
);

