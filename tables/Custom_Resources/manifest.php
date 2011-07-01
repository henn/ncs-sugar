<?php
	
/********* new manifest 2B VERSION *************/
	
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
          'name' => 'project_Custom_Resources',
		  'published_date' => '2011-06-30 18:00:00',
		  'type' => 'module',
          'version' => '2.00',
          'remove_tables' => 'prompt',
          );
$installdefs = array (
  'id' => 'project_Custom_Resources',
  'copy' => 
  array (
    0 =>     
####Begin copy of ncs_framework to the root sugar directory####
    array (
      'from' => '<basepath>/ncs_framework',
	  'to' => 'ncs_framework',
    ),
####End copy of ncs_framework
####Begin copy of Schedulers to the directory 'custom/modules/Schedulers####
    array (
      'from' => '<basepath>/Schedulers',
	  'to' => 'custom/modules/Schedulers',
    ),
####End copy of Schedulers
####Begin copy of Sch_Ext_Lang to the directory 'custom/Extension/modules/Schedulers/Ext/Language####
    array (
      'from' => '<basepath>/Sch_Ext_Lang',
	  'to' => 'custom/Extension/modules/Schedulers/Ext/Language',
    ),
####End copy of Sch_Ext_Lang
####Begin copy of XMLCreation_resources to the directory 'custom/service####
	array (
	'from' => '<basepath>/XMLCreation_resources/service',
	'to' => 'custom/service',	
	),
####End copy of XMLCreation_resources####
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
# Event Type Drop down List (JL)   # 
#                                  #
####Begin copy of NCSDC_CntctInfo###
    array (
      'from' => '<basepath>/include',
      'to' => 'custom/include',
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
####Begin copy of NCSDC_CntLnk###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/NCSDC_CntLnk/views/view.edit.php',
      'to' => 'custom/modules/NCSDC_CntLnk/views/view.edit.php',
    ),
####Begin copy of NCSDC_EventInfo###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/NCSDC_EventInfo/views/view.edit.php',
      'to' => 'custom/modules/NCSDC_EventInfo/views/view.edit.php',
    ),
/********** updated stuff ***********/	
    array (
      'from' => '<basepath>/IDCreation_resources/modules/NCSDC_EventInfo/NCSDC_EventInfo.php',
      'to' => 'modules/NCSDC_EventInfo/NCSDC_EventInfo.php',
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
      'from' => '<basepath>/IDCreation_resources/modules/PLT_Participant',
      'to' => 'custom/modules/PLT_Participant',
    ),	
    /*
    array (
      'from' => '<basepath>/IDCreation_resources/modules/PLT_Participant/views/view.edit.php',
      'to' => 'custom/modules/PLT_Participant/views/view.edit.php',
    ),
    */
####Begin copy of PLT_Person###
    array (
      'from' => '<basepath>/IDCreation_resources/modules/PLT_Person',
      'to' => 'custom/modules/PLT_Person',
    ),
	/*	
    array (
      'from' => '<basepath>/IDCreation_resources/modules/PLT_Person/views/view.edit.php',
      'to' => 'custom/modules/PLT_Person/views/view.edit.php',
    ),
	*/
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
############### BEGIN COPY OF ACTIVITIES ###############
#
#########################################################
    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Meetings/metadata/detailviewdefs.php',
      'to' => 'custom/modules/Meetings/metadata/detailviewdefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Meetings/metadata/detailviewdefs.php',
      'to' => 'custom/working/modules/Meetings/metadata/detailviewdefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Meetings/metadata/editviewdefs.php',
      'to' => 'custom/modules/Meetings/metadata/editviewdefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Meetings/metadata/editviewdefs.php',
      'to' => 'custom/working/modules/Meetings/metadata/editviewdefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Meetings/metadata/listviewdefs.php',
      'to' => 'custom/modules/Meetings/metadata/listviewdefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Meetings/metadata/popupdefs.php',
      'to' => 'custom/modules/Meetings/metadata/popupdefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Meetings/metadata/popupdefs.php',
      'to' => 'custom/working/modules/Meetings/metadata/popupdefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Meetings/metadata/quickcreatedefs.php',
      'to' => 'custom/modules/Meetings/metadata/quickcreatedefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Meetings/metadata/quickcreatedefs.php',
      'to' => 'custom/working/modules/Meetings/metadata/quickcreatedefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Notes/metadata/dashletviewdefs.php',
      'to' => 'custom/modules/Notes/metadata/dashletviewdefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Notes/metadata/dashletviewdefs.php',
      'to' => 'custom/working/modules/Notes/metadata/dashletviewdefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Notes/metadata/detailviewdefs.php',
      'to' => 'custom/modules/Notes/metadata/detailviewdefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Notes/metadata/detailviewdefs.php',
      'to' => 'custom/working/modules/Notes/metadata/detailviewdefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Notes/metadata/editviewdefs.php',
      'to' => 'custom/modules/Notes/metadata/editviewdefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Notes/metadata/editviewdefs.php',
      'to' => 'custom/working/modules/Notes/metadata/editviewdefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Notes/metadata/listviewdefs.php',
      'to' => 'custom/modules/Notes/metadata/listviewdefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Notes/metadata/popupdefs.php',
      'to' => 'custom/modules/Notes/metadata/popupdefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Notes/metadata/popupdefs.php',
      'to' => 'custom/working/modules/Notes/metadata/popupdefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Notes/metadata/quickcreatedefs.php',
      'to' => 'custom/modules/Notes/metadata/quickcreatedefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Notes/metadata/quickcreatedefs.php',
      'to' => 'custom/working/modules/Notes/metadata/quickcreatedefs.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Language/en_us.Data_Collection_Tables.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Language/en_us.Data_Collection_Tables.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Language/en_us.Person_Level_Tables.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Language/en_us.Person_Level_Tables.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Language/en_us.custommeetings_olt_provider.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Language/en_us.custommeetings_olt_provider.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Layoutdefs/meetings_olt_provider_Meetings.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Layoutdefs/meetings_olt_provider_Meetings.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/meetings_olt_provider_Meetings.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/meetings_olt_provider_Meetings.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/ncsdc_eventinfo_activities_meetings_Meetings.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/ncsdc_eventinfo_activities_meetings_Meetings.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/ncsdc_eventinfo_meetings_Meetings.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/ncsdc_eventinfo_meetings_Meetings.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/plt_participant_activities_meetings_Meetings.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/plt_participant_activities_meetings_Meetings.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/plt_participant_meetings_Meetings.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/plt_participant_meetings_Meetings.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_comment_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_comment_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_disp_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_disp_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_distance_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_distance_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_interpret_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_interpret_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_interpret_oth_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_interpret_oth_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_lang_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_lang_c.php',
    ),
 
    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_lang_oth_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_lang_oth_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_location_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_location_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_location_oth_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_location_oth_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_private_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_private_c.php',
    ),
 
    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_private_detail_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_private_detail_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_type_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_type_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_type_oth_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_contact_type_oth_c.php',
    ),
 
    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_date_end.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_date_end.php',
    ),
 
    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_end_time_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_end_time_c.php',
    ),
 
    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_name.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_name.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_parent_type.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_parent_type.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_start_date_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_start_date_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_transaction_type_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_transaction_type_c.php',
    ),
 
    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_who_contact_oth_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_who_contact_oth_c.php',
    ),
 
    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Meetings/Ext/Vardefs/sugarfield_who_contacted_c.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/sugarfield_who_contacted_c.php',
    ),
 
    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Language/en_us.Data_Collection_Tables.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Language/en_us.Data_Collection_Tables.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/ncsdc_eventinfo_activities_notes_Notes.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/ncsdc_eventinfo_activities_notes_Notes.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/ncsdc_eventinfo_notes_Notes.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/ncsdc_eventinfo_notes_Notes.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/plt_participant_activities_notes_Notes.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/plt_participant_activities_notes_Notes.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_disp_c.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_disp_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_distance_c.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_distance_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_interpret_c.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_interpret_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_interpret_oth_c.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_interpret_oth_c.php',
    ),
 
    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_lang_oth_c.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_lang_oth_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_language_c.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_language_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_location_c.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_location_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_location_oth_c.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_location_oth_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_private_c.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_private_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_private_detail_c.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_private_detail_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_type_c.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_type_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_type_other_c.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_contact_type_other_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_description.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_description.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_end_date_time_c.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_end_date_time_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_start_date_time_c.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_start_date_time_c.php',
    ),

    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_who_contact_oth_c.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_who_contact_oth_c.php',
    ),
 
    array (
      'from' => '<basepath>/Activities_resources/Extension/modules/Notes/Ext/Vardefs/sugarfield_who_contacted_c.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/sugarfield_who_contacted_c.php',
    ),
	//*************** end of Activities stuff ********************************
	
  ),  //end of copy
  


  //******************************** BEGIN CUSTOM FIELDS ***************************************
  'custom_fields' => 
  array (
    'Meetingscontact_type_c' => 
    array (
      'id' => 'Meetingscontact_type_c',
      'name' => 'contact_type_c',
      'label' => 'LBL_CONTACT_TYPE',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'enum',
      'max_size' => '100',
      'require_option' => '0',
      'default_value' => '1',
      'date_modified' => '2011-05-31 18:17:20',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => 'CONTACT_TYPE_CL1',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Meetingscontact_type_oth_c' => 
    array (
      'id' => 'Meetingscontact_type_oth_c',
      'name' => 'contact_type_oth_c',
      'label' => 'LBL_CONTACT_TYPE_OTH',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-06 21:59:06',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Meetingscontact_lang_c' => 
    array (
      'id' => 'Meetingscontact_lang_c',
      'name' => 'contact_lang_c',
      'label' => 'LBL_CONTACT_LANG',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'enum',
      'max_size' => '100',
      'require_option' => '0',
      'default_value' => '1',
      'date_modified' => '2011-06-06 22:06:57',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => 'LANGUAGE_CL2',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Meetingscontact_lang_oth_c' => 
    array (
      'id' => 'Meetingscontact_lang_oth_c',
      'name' => 'contact_lang_oth_c',
      'label' => 'LBL_CONTACT_LANG_OTH',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-06 22:23:57',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Meetingscontact_interpret_c' => 
    array (
      'id' => 'Meetingscontact_interpret_c',
      'name' => 'contact_interpret_c',
      'label' => 'LBL_CONTACT_INTERPRET',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'enum',
      'max_size' => '100',
      'require_option' => '0',
      'default_value' => '1',
      'date_modified' => '2011-06-06 22:27:08',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => 'TRANSLATION_METHOD_CL3',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Meetingscontact_interpret_oth_c' => 
    array (
      'id' => 'Meetingscontact_interpret_oth_c',
      'name' => 'contact_interpret_oth_c',
      'label' => 'LBL_CONTACT_INTERPRET_OTH',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-07 05:29:55',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Meetingscontact_location_c' => 
    array (
      'id' => 'Meetingscontact_location_c',
      'name' => 'contact_location_c',
      'label' => 'LBL_CONTACT_LOCATION',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'enum',
      'max_size' => '100',
      'require_option' => '0',
      'default_value' => '1',
      'date_modified' => '2011-06-07 05:32:45',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => 'CONTACT_LOCATION_CL1',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Meetingscontact_location_oth_c' => 
    array (
      'id' => 'Meetingscontact_location_oth_c',
      'name' => 'contact_location_oth_c',
      'label' => 'LBL_CONTACT_LOCATION_OTH',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-07 05:34:47',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Meetingscontact_private_c' => 
    array (
      'id' => 'Meetingscontact_private_c',
      'name' => 'contact_private_c',
      'label' => 'LBL_CONTACT_PRIVATE',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'enum',
      'max_size' => '100',
      'require_option' => '0',
      'default_value' => '1',
      'date_modified' => '2011-06-07 05:37:06',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => 'CONFIRM_TYPE_CL2',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Meetingscontact_private_detail_c' => 
    array (
      'id' => 'Meetingscontact_private_detail_c',
      'name' => 'contact_private_detail_c',
      'label' => 'LBL_CONTACT_PRIVATE_DETAIL',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-07 05:39:39',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Meetingscontact_distance_c' => 
    array (
      'id' => 'Meetingscontact_distance_c',
      'name' => 'contact_distance_c',
      'label' => 'LBL_CONTACT_DISTANCE',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'decimal',
      'max_size' => '4',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-07 05:44:41',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => '4',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Meetingswho_contacted_c' => 
    array (
      'id' => 'Meetingswho_contacted_c',
      'name' => 'who_contacted_c',
      'label' => 'LBL_WHO_CONTACTED',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'enum',
      'max_size' => '100',
      'require_option' => '0',
      'default_value' => '1',
      'date_modified' => '2011-06-07 05:55:44',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => 'CONTACTED_PERSON_CL1',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Meetingswho_contact_oth_c' => 
    array (
      'id' => 'Meetingswho_contact_oth_c',
      'name' => 'who_contact_oth_c',
      'label' => 'LBL_WHO_CONTACT_OTH',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-07 05:56:37',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Meetingscontact_comment_c' => 
    array (
      'id' => 'Meetingscontact_comment_c',
      'name' => 'contact_comment_c',
      'label' => 'LBL_CONTACT_COMMENT',
      'comments' => NULL,
      'help' => '8000 characters max',
      'module' => 'Meetings',
      'type' => 'text',
      'max_size' => NULL,
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-07 05:59:50',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => '10',
      'ext3' => '20',
      'ext4' => NULL,
    ),
    'Meetingstransaction_type_c' => 
    array (
      'id' => 'Meetingstransaction_type_c',
      'name' => 'transaction_type_c',
      'label' => 'LBL_TRANSACTION_TYPE',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'varchar',
      'max_size' => '36',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-07 06:01:06',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Meetingscontact_disp_c' => 
    array (
      'id' => 'Meetingscontact_disp_c',
      'name' => 'contact_disp_c',
      'label' => 'LBL_CONTACT_DISP',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-07 06:02:50',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Meetingsstart_date_c' => 
    array (
      'id' => 'Meetingsstart_date_c',
      'name' => 'start_date_c',
      'label' => 'LBL_START_DATE',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'datetimecombo',
      'max_size' => NULL,
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-15 17:46:53',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Meetingsend_time_c' => 
    array (
      'id' => 'Meetingsend_time_c',
      'name' => 'end_time_c',
      'label' => 'LBL_END_TIME',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Meetings',
      'type' => 'datetimecombo',
      'max_size' => NULL,
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-15 17:47:46',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Notesstart_date_time_c' => 
    array (
      'id' => 'Notesstart_date_time_c',
      'name' => 'start_date_time_c',
      'label' => 'LBL_START_DATE_TIME',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Notes',
      'type' => 'datetimecombo',
      'max_size' => NULL,
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-14 21:17:06',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Notesend_date_time_c' => 
    array (
      'id' => 'Notesend_date_time_c',
      'name' => 'end_date_time_c',
      'label' => 'LBL_END_DATE_TIME',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Notes',
      'type' => 'datetimecombo',
      'max_size' => NULL,
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-14 21:17:42',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Notescontact_type_c' => 
    array (
      'id' => 'Notescontact_type_c',
      'name' => 'contact_type_c',
      'label' => 'LBL_CONTACT_TYPE',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Notes',
      'type' => 'enum',
      'max_size' => '100',
      'require_option' => '0',
      'default_value' => '1',
      'date_modified' => '2011-06-14 21:20:22',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => 'CONTACT_TYPE_CL1',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Notescontact_type_other_c' => 
    array (
      'id' => 'Notescontact_type_other_c',
      'name' => 'contact_type_other_c',
      'label' => 'LBL_CONTACT_TYPE_OTHER',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Notes',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-14 21:21:38',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Notescontact_language_c' => 
    array (
      'id' => 'Notescontact_language_c',
      'name' => 'contact_language_c',
      'label' => 'LBL_CONTACT_LANGUAGE',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Notes',
      'type' => 'enum',
      'max_size' => '100',
      'require_option' => '0',
      'default_value' => '1',
      'date_modified' => '2011-06-14 21:26:09',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => 'LANGUAGE_CL2',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Notescontact_lang_oth_c' => 
    array (
      'id' => 'Notescontact_lang_oth_c',
      'name' => 'contact_lang_oth_c',
      'label' => 'LBL_CONTACT_LANG_OTH',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Notes',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-14 21:26:56',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Notescontact_interpret_c' => 
    array (
      'id' => 'Notescontact_interpret_c',
      'name' => 'contact_interpret_c',
      'label' => 'LBL_CONTACT_INTERPRET',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Notes',
      'type' => 'enum',
      'max_size' => '100',
      'require_option' => '0',
      'default_value' => '1',
      'date_modified' => '2011-06-14 21:28:22',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => 'TRANSLATION_METHOD_CL3',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Notescontact_interpret_oth_c' => 
    array (
      'id' => 'Notescontact_interpret_oth_c',
      'name' => 'contact_interpret_oth_c',
      'label' => 'LBL_CONTACT_INTERPRET_OTH',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Notes',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-14 21:28:52',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Notescontact_location_c' => 
    array (
      'id' => 'Notescontact_location_c',
      'name' => 'contact_location_c',
      'label' => 'LBL_CONTACT_LOCATION',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Notes',
      'type' => 'enum',
      'max_size' => '100',
      'require_option' => '0',
      'default_value' => '1',
      'date_modified' => '2011-06-14 21:29:37',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => 'CONTACT_LOCATION_CL1',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Notescontact_location_oth_c' => 
    array (
      'id' => 'Notescontact_location_oth_c',
      'name' => 'contact_location_oth_c',
      'label' => 'LBL_CONTACT_LOCATION_OTH',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Notes',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-14 21:31:32',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Notescontact_private_c' => 
    array (
      'id' => 'Notescontact_private_c',
      'name' => 'contact_private_c',
      'label' => 'LBL_CONTACT_PRIVATE',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Notes',
      'type' => 'enum',
      'max_size' => '100',
      'require_option' => '0',
      'default_value' => '1',
      'date_modified' => '2011-06-14 21:32:19',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => 'CONFIRM_TYPE_CL2',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Notescontact_private_detail_c' => 
    array (
      'id' => 'Notescontact_private_detail_c',
      'name' => 'contact_private_detail_c',
      'label' => 'LBL_CONTACT_PRIVATE_DETAIL',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Notes',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-14 21:33:17',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Notescontact_distance_c' => 
    array (
      'id' => 'Notescontact_distance_c',
      'name' => 'contact_distance_c',
      'label' => 'LBL_CONTACT_DISTANCE',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Notes',
      'type' => 'decimal',
      'max_size' => '10',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-14 21:33:58',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => '2',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Noteswho_contacted_c' => 
    array (
      'id' => 'Noteswho_contacted_c',
      'name' => 'who_contacted_c',
      'label' => 'LBL_WHO_CONTACTED',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Notes',
      'type' => 'enum',
      'max_size' => '100',
      'require_option' => '0',
      'default_value' => '1',
      'date_modified' => '2011-06-14 21:34:58',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => 'CONTACTED_PERSON_CL1',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Noteswho_contact_oth_c' => 
    array (
      'id' => 'Noteswho_contact_oth_c',
      'name' => 'who_contact_oth_c',
      'label' => 'LBL_WHO_CONTACT_OTH',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Notes',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-14 21:35:27',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Notescontact_disp_c' => 
    array (
      'id' => 'Notescontact_disp_c',
      'name' => 'contact_disp_c',
      'label' => 'LBL_CONTACT_DISP',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Notes',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2011-06-14 21:37:02',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '0',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
  ),
  
  //****************************** END CUSTOM_FIELDS ****************************

  //*************** BEGIN LANGUAGE FILES FOR ACTIVITIES *************

  'language' => 
  array (
    0 => 
    array (
      'from' => '<basepath>/Activities_resources/SugarModules/include/language/en_us.Activities Prototype.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),
    1 => 
    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Meetings/language/en_us.lang.php',
      'to_module' => 'Meetings',
      'language' => 'en_us',
    ),
    2 => 
    array (
      'from' => '<basepath>/Activities_resources/SugarModules/modules/Notes/language/en_us.lang.php',
      'to_module' => 'Notes',
      'language' => 'en_us',
    ),
  ),   

  //*************** END LANGUAGE FILES FOR ACTIVITIES **************
  
  
);  //end of installdefs

