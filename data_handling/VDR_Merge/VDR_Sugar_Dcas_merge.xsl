<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
		<!-- Save the documents into variables for later parsing -->
		<xsl:variable name="doc1" select="/"></xsl:variable>
		<xsl:variable name="doc2" select="document('Dcas.xml')"/>
		
		<!-- Insert the transmission envelop Header -->
		<ns1:recruitment_substudy_transmission_envelope xmlns:ns1="http://www.nationalchildrensstudy.gov" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
		
			<!-- Copy the transmission header from Sugar document -->	
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_header"></xsl:copy-of>		
			
			
			<!-- Copy the transmission tables -->
			<ns1:transmission_tables>
			<!-- Operational Tables -->
			<!-- Study Center from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/study_center"></xsl:copy-of> 
			<!-- PSU from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/psu"></xsl:copy-of>
			<!-- SSU form Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/ssu"></xsl:copy-of>
			<!-- TSU from Sugar -->	
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tsu"></xsl:copy-of>
			<!-- Listing Unit from Sugar -->	
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/listing_unit"></xsl:copy-of>
			<!-- Dwelling Unit from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/dwelling_unit"></xsl:copy-of>
			<!-- Household Unit from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/household_unit"></xsl:copy-of>
			<!-- Link Household Dwelling Unit from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/link_household_dwelling"></xsl:copy-of>
			<!-- Staff from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/staff"></xsl:copy-of>
			<!-- Staff Language from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/staff_language"></xsl:copy-of>
			<!-- Staff Validation from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/staff_validation"></xsl:copy-of>
			<!-- Staff Weekly Expense from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/staff_weekly_expense"></xsl:copy-of>
			<!-- Staff Expense Management Tasks from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/staff_exp_mngmnt_tasks"></xsl:copy-of>
			<!-- Staff Expense Data collection Tasks from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/staff_exp_data_cllctn_tasks"></xsl:copy-of>
			<!-- Outreach from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/outreach"></xsl:copy-of>
			<!-- Outreach Race from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/outreach_race"></xsl:copy-of>
			<!-- Outreach Staff from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/outreach_staff"></xsl:copy-of>
			<!-- Outreach Evaluation from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/outreach_eval"></xsl:copy-of>
			<!-- Outreach Target from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/outreach_target"></xsl:copy-of>
			<!-- Outreach Language2 from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/outreach_lang2"></xsl:copy-of>
			<!-- Staff Trainings and Certifivations from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/staff_cert_training"></xsl:copy-of>
			<!-- Person from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/person"></xsl:copy-of>
			<!-- Person Race from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/person_race"></xsl:copy-of>
			<!-- Link Person Household from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/link_person_household"></xsl:copy-of>
			<!-- Participant from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/participant"></xsl:copy-of>
			<!-- Link Person Participant from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/link_person_participant"></xsl:copy-of>
			<!-- Participant Authorization Form from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/participant_auth"></xsl:copy-of>
			<!-- Participant Consent from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/participant_consent"></xsl:copy-of>
			<!-- PPG Details from both files -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/ppg_details"></xsl:copy-of>
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/ppg_details"></xsl:copy-of>
			<!-- PPG status history from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/ppg_status_history"></xsl:copy-of>
			<!-- Provider from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/provider"></xsl:copy-of>
			<!-- Provider Role from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/provider_role"></xsl:copy-of>
			<!-- Link Person Provider from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/link_person_provider"></xsl:copy-of>
			<!-- Institution from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/institution"></xsl:copy-of>
			<!-- Link Person Institution from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/link_person_institute"></xsl:copy-of>
			<!-- Address from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/address"></xsl:copy-of>
			<!-- Telephone from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/telephone"></xsl:copy-of>
			<!-- Email from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/email"></xsl:copy-of>
			<!-- Event from both files -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/event"></xsl:copy-of>
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/event"></xsl:copy-of>
			<!-- Instrument from both files -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/instrument"></xsl:copy-of>
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/instrument"></xsl:copy-of>
			<!-- Contact from both files -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/contact"></xsl:copy-of>
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/contact"></xsl:copy-of>
			<!-- Link Contact from both files -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/link_contact"></xsl:copy-of>
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/link_contact"></xsl:copy-of>
			<!-- Non Interview Report from both files -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/non_interview_rpt"></xsl:copy-of>
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/non_interview_rpt"></xsl:copy-of>
			<!-- Non Interview Report Vacant from both files -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/non_interview_rpt_vacant"></xsl:copy-of>
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/non_interview_rpt_vacant"></xsl:copy-of>
			<!-- Non Interview Report No Access from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/non_interview_rpt_noaccess"></xsl:copy-of>
			<!-- Non Interview Report Refusal from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/non_interview_rpt_refusal"></xsl:copy-of>
			<!-- Non Interview Report DU Type from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/non_interview_rpt_dutype"></xsl:copy-of>
			<!-- Incident from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/incident"></xsl:copy-of>
			<!-- Incident Media from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/incident_media"></xsl:copy-of>
			<!-- Incident Unanticipated from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/incident_unanticipated"></xsl:copy-of>
			<!-- SPEC Equipment Info from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/spec_equipment"></xsl:copy-of>
			<!-- Specimen Pickup Info from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/spec_pickup"></xsl:copy-of>
			<!-- Specimen Receipt Info from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/spec_receipt"></xsl:copy-of>
			<!-- Specimen Shipping Info from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/spec_shipping"></xsl:copy-of>
			<!-- Specimen Storage Info from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/spec_storage"></xsl:copy-of>
			<!-- SPSC Info from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/spec_spsc_info"></xsl:copy-of>
			<!-- Environmental Equipment Information from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/env_equipment"></xsl:copy-of>
			<!-- Environmental Equipment Problem Log from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/env_equipment_prob_log"></xsl:copy-of>
			<!-- Participant Consent Sample from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/participant_consent_sample"></xsl:copy-of>
			<!-- Participant Record of Visit from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/participant_rvis"></xsl:copy-of>
			<!-- Participant Visit Consent from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/participant_vis_consent"></xsl:copy-of>
			<!-- Precision Thermometer Certification from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/prec_therm_cert"></xsl:copy-of>
			<!-- Refrigerator and Freezer Verification from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/ref_freezer_verification"></xsl:copy-of>
			<!-- Sample Receipt and Storage from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/sample_receipt_storage"></xsl:copy-of>
			<!-- Sample Shipping from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/sample_shipping"></xsl:copy-of>
			<!-- SRSC info from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/srsc_info"></xsl:copy-of>
			<!-- Subsample Documentation from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/subsample_doc"></xsl:copy-of>
			<!-- T/RH Meter Calibration from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/trh_meter_calibration"></xsl:copy-of>
			<!-- Digital Refrigerator/Freezer Thermometer Verification from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/drf_therm_verification"></xsl:copy-of>
			<!-- Sample Receipt Confirmation from Sugar -->
				<xsl:copy-of select="$doc1/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/sample_receipt_confirm"></xsl:copy-of>
			
			<!-- Instrumental -->
			<!-- Birth Visit from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/birth_visit"></xsl:copy-of>
			<!-- Birth Visit Baby Name from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/birth_visit_baby_name"></xsl:copy-of>
			<!-- Birth Visit Decorate Room from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/birth_visit_decorate_room"></xsl:copy-of>
			<!-- Birth Visit Renovate Room from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/birth_visit_renovate_room"></xsl:copy-of>
			<!-- Birth Visit 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/birth_visit_2"></xsl:copy-of>
			<!-- Birth Visit Baby Name 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/birth_visit_baby_name_2"></xsl:copy-of>
			<!-- Birth Visit Decorate Room 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/birth_visit_decorate_room_2"></xsl:copy-of>
			<!-- Birth Visit Renovate Room 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/birth_visit_renovate_room_2"></xsl:copy-of>
			<!-- Birth Visit Low Intensity from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/birth_visit_li"></xsl:copy-of>
			<!-- Birth Visit LI Baby Name  from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/birth_visit_li_baby_name"></xsl:copy-of>
			<!-- Birth Visit LI Decorate Room from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/birth_visit_li_decorate_room"></xsl:copy-of>
			<!-- Birth Visit LI Renovate Room from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/birth_visit_li_renovate_room"></xsl:copy-of>
			<!-- 18 Month Child Detail from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/eighteen_mth_mother_detail"></xsl:copy-of>
			<!-- 18 Month Child Habits from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/eighteen_mth_mother_habits"></xsl:copy-of>
			<!-- 18 Month Mother Lice 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/eighteen_mth_mother_lice"></xsl:copy-of>
			<!-- 18 Month Mother Mold from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/eighteen_mth_mother_mold"></xsl:copy-of>
			<!-- 18 Month Mother Pet Type from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/eighteen_mth_mother_pet_type"></xsl:copy-of>
			<!-- 18 Month Mother Renovate Room from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/eighteen_mth_mother_renovate_room"></xsl:copy-of>
			<!-- 18 Month Mother Room Mold from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/eighteen_mth_mother_room_mold"></xsl:copy-of>
			<!-- 18 Month Mother Prescription from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/eighteen_mth_mother_prescr"></xsl:copy-of>
			<!-- 18 Month Mother OTC from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/eighteen_mth_mother_otc"></xsl:copy-of>
			<!-- 18 Month Mother Supplement from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/eighteen_mth_mother_suppl"></xsl:copy-of>
			<!-- 18 Month Mother SAQ from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/eighteen_mth_mother_saq"></xsl:copy-of>
			<!-- Father Preg Visit 1 Instrument from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/father_pv1"></xsl:copy-of>
			<!-- Father Preg Visit 1 Instrument Cancer from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/father_pv1_cancer"></xsl:copy-of>
			<!-- Father Preg Visit 1 Instrument Educ from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/father_pv1_educ"></xsl:copy-of>
			<!-- Father Preg Visit 1 Instrument Race from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/father_pv1_race"></xsl:copy-of>
			<!-- Household Enumeration from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/household_enumeration"></xsl:copy-of>
			<!-- Household Enumeration Age Eligible from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/household_enumeration_age_elig"></xsl:copy-of>
			<!-- Household Enumeration Hidden Dwelling Units from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/household_enumeration_hidden_du"></xsl:copy-of>
			<!-- Household Enumeration Pregnant from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/household_enumeration_pregnant"></xsl:copy-of>
			<!-- Household Inventory from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/household_inventory"></xsl:copy-of>
			<!-- Household Inventory from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/household_inventory_age"></xsl:copy-of>
			<!-- Household Inventory from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/household_inventory_age_elig"></xsl:copy-of>
			<!-- Participant Internet Usage Survey from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/internet_usage"></xsl:copy-of>
			<!-- Participant Internet Usage Survey Participate Multi Select from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/internet_usage_participate"></xsl:copy-of>
			<!-- Low to High Conversion Script Instrument from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/low_high_script"></xsl:copy-of>
			<!-- 9 Month Mother Phone from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/nine_mth_mother"></xsl:copy-of>
			<!-- 9 Month Mother Detail from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/nine_mth_mother_detail"></xsl:copy-of>
			<!-- Provider Based Recruitment from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/pb_recruitment"></xsl:copy-of>
			<!-- Provider Based Recruitment Information Source from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/pb_recruitment_info_source"></xsl:copy-of>
			<!-- Provider Based Recruitment Provider Source from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/pb_recruitment_prov_source"></xsl:copy-of>
			<!-- Provider Based Recruitment Provider SVC from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/pb_recruitment_prov_svc"></xsl:copy-of>
			<!-- Provider Based Recruitment Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/pb_recruitment_2"></xsl:copy-of>
			<!-- Provider Based Recruitment Information Source Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/pb_recruitment_info_source_2"></xsl:copy-of>
			<!-- Provider Based Recruitment Provider Source Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/pb_recruitment_prov_source_2"></xsl:copy-of>
			<!-- Provider Based Recruitment Provider SVC Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/pb_recruitment_prov_svc_2"></xsl:copy-of>
			<!-- PPG CATI from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/ppg_cati"></xsl:copy-of>
			<!-- PPG SAQ from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/ppg_saq"></xsl:copy-of>
			<!-- Pre Pregnancy Interview from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/pre_preg"></xsl:copy-of>
			<!-- Pre Pregnancy Interview Cool from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/pre_preg_cool"></xsl:copy-of>
			<!-- Pre Pregnancy Interview Heat2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/pre_preg_heat2"></xsl:copy-of>
			<!-- Pre Pregnancy Interview Pdecorate Room from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/pre_preg_pdecorate_room"></xsl:copy-of>
			<!-- Pre Pregnancy Interview Prenovate Room from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/pre_preg_prenovate_room"></xsl:copy-of>
			<!-- Pre Pregnancy Interview Room Mold from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/pre_preg_room_mold"></xsl:copy-of>
			<!-- Pre Pregnancy Interview SAQ from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/pre_preg_saq"></xsl:copy-of>
			<!-- Pre Pregnancy Interview Race from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/pre_preg_sp_race"></xsl:copy-of>
			<!-- Pregnancy Screener EH from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_eh"></xsl:copy-of>
			<!-- Pregnancy Screener EH How Know NCS from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_eh_know_ncs"></xsl:copy-of>
			<!-- Pregnancy Screener EH Race NCS from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_eh_race"></xsl:copy-of>
			<!-- Pregnancy Screener EH Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_eh_2"></xsl:copy-of>
			<!-- Pregnancy Screener EH How Know Phase 2 NCS from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_eh_know_ncs_2"></xsl:copy-of>
			<!-- Pregnancy Screener EH Race NCS Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_eh_race_2"></xsl:copy-of>
			<!-- Pregnancy Visit HI CATI from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_hi"></xsl:copy-of>
			<!-- Pregnancy Visit HI CATI Know NCS from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_hi_know_ncs"></xsl:copy-of>
			<!-- Pregnancy Visit HI CATI Race from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_hi_race"></xsl:copy-of>
			<!-- Pregnancy Visit HI CATI Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_hi_2"></xsl:copy-of>
			<!-- Pregnancy Visit HI CATI Know NCS Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_hi_know_ncs_2"></xsl:copy-of>
			<!-- Pregnancy Visit HI CATI Race Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_hi_race_2"></xsl:copy-of>
			<!-- Pregnancy Screener PB CATI from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_pb"></xsl:copy-of>
			<!-- Pregnancy Screener PB How Know NCS from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_pb_know_ncs"></xsl:copy-of>
			<!-- Pregnancy Screener PB Race from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_pb_race"></xsl:copy-of>
			<!-- Pregnancy Screener PB CATI Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_pb_2"></xsl:copy-of>
			<!-- Pregnancy Screener PB How Know NCS Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_pb_know_ncs_2"></xsl:copy-of>
			<!-- Pregnancy Screener PB Race Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_screen_pb_race_2"></xsl:copy-of>
			<!-- Pregnancy Visit 1 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Commute from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_commute"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Cool from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_cool"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Diagnose2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_diagnose_2"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Heat2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_heat2"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Local Travel from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_local_trav"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Pdecorate Room from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_pdecorate_room"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Pet Type from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_pet_type"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Pet Type 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_pet_type_2"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Prenovate Room from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_prenovate_room"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Prenovate2 Room from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_prenovate2_room"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Room Mold from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_room_mold"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Sp Race from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_sp_race"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_2"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Commute Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_commute_2"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Cool Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_cool_2"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Diagnose2 Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_diagnose_2_2"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Heat2 Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_heat2_2"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Local Travel Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_local_trav_2"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Non-English2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_nonenglish_2"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Pdecorate Room Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_pdecorate_room_2"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Prenovate Room Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_prenovate_room_2"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Room Mold Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_room_mold_2"></xsl:copy-of>
			<!-- Pregnancy Visit 1 Race Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_sp_race_2"></xsl:copy-of>
			<!-- Pregnancy Visit 1 SAQ from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_saq"></xsl:copy-of>
			<!-- Pregnancy Visit 1 SAQ Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_1_saq_2"></xsl:copy-of>
			<!-- Pregnancy Visit 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_2"></xsl:copy-of>
			<!-- Pregnancy Visit 2 Cool from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_2_cool"></xsl:copy-of>
			<!-- Pregnancy Visit 2 Diagnose 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_2_diagnose_2"></xsl:copy-of>
			<!-- Pregnancy Visit 2 Heat2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_2_heat2"></xsl:copy-of>
			<!-- Pregnancy Visit 2 Pdecorate Room from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_2_pdecorate2_room"></xsl:copy-of>
			<!-- Pregnancy Visit 2 Prenovate Room from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_2_prenovate_room"></xsl:copy-of>
			<!-- Pregnancy Visit 2 Room Mold from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_2_room_mold"></xsl:copy-of>
			<!-- Pregnancy Visit 2 Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_2_2"></xsl:copy-of>
			<!-- Pregnancy Visit 2 Cool Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_2_cool_2"></xsl:copy-of>
			<!-- Pregnancy Visit 2 Diagnose 2 Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_2_diagnose_2_2"></xsl:copy-of>
			<!-- Pregnancy Visit 2 Heat2 Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_2_heat2_2"></xsl:copy-of>
			<!-- Pregnancy Visit 2 Pdecorate Room Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_2_pdecorate2_room_2"></xsl:copy-of>
			<!-- Pregnancy Visit 2 Prenovate Room Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_2_prenovate_room_2"></xsl:copy-of>
			<!-- Pregnancy Visit 2 Room Mold Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_2_room_mold_2"></xsl:copy-of>
			<!-- Pregnancy Visit 2 SAQ from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_2_saq"></xsl:copy-of>
			<!-- Pregnancy Visit 2 SAQ Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_2_saq_2"></xsl:copy-of>
			<!-- Pregnancy Visit LI CATI from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_li"></xsl:copy-of>
			<!-- Pregnancy Visit LI CATI Cool from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_li_cool"></xsl:copy-of>
			<!-- Low-Intensity Interview (Non and Pregnant) Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_li_2"></xsl:copy-of>
			<!-- Low-Intensity Interview (Non and Pregnant) Cool Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/preg_visit_li_cool_2"></xsl:copy-of>
			<!-- 6 Month Mother from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/six_mth_mother"></xsl:copy-of>
			<!-- 6 Month Child Detail from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/six_mth_mother_detail"></xsl:copy-of>
			<!-- 6 Month Mother Pet from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/six_mth_mother_pet"></xsl:copy-of>
			<!-- 6 Month Infant Feeding from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/six_mth_saq"></xsl:copy-of>
			<!-- 6 Month Infant Feeding SAQ Formula Type from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/six_mth_saq_formula_type"></xsl:copy-of>
			<!-- 6 Month Infant Feeding SAQ Supplement from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/six_mth_saq_supp"></xsl:copy-of>
			<!-- 6 Month Infant Feeding SAQ Water from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/six_mth_saq_water"></xsl:copy-of>
			<!-- 6 Month Infant Feeding SAQ Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/six_mth_saq_2"></xsl:copy-of>
			<!-- 6 Month Infant Feeding SAQ Formula Type Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/six_mth_saq_formula_type_2"></xsl:copy-of>
			<!-- 6 Month Infant Feeding SAQ Supplement Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/six_mth_saq_supp_2"></xsl:copy-of>
			<!-- 6 Month Infant Feeding SAQ Water Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/six_mth_saq_water_2"></xsl:copy-of>
			<!-- Specimen Blood from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/spec_blood"></xsl:copy-of>
			<!-- Specimen Blood Prob from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/spec_blood_draw"></xsl:copy-of>
			<!-- Specimen Blood Hemolyze from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/spec_blood_hemolyze"></xsl:copy-of>
			<!-- Specimen Blood Tube Comments from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/spec_blood_tube_comments"></xsl:copy-of>
			<!-- Specimen Blood Tube from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/spec_blood_tube"></xsl:copy-of>
			<!-- Specimen Cord Blood from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/spec_cord_blood"></xsl:copy-of>
			<!-- Specimen Blood Specimen from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/spec_cord_blood_specimen"></xsl:copy-of>
			<!-- Specimen Urine from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/spec_urine"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pharmaceutical from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twf"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pharmaceutical Blank Not Collected from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twf_blank_collected"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pharmaceutical Duplicate Bottle Collected from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twf_dup_collected"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pharmaceutical Duplicate Bottle Filled from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twf_dup_filled"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pharmaceutical Not Collected from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twf_n_collected"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pharmaceutical Reason Filled from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twf_reason_filled"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pharmaceutical Reason Filled 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twf_reason_filled2"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pharmaceutical Sample from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twf_sample"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pharmaceutical Subsamples from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twf_subsamples"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pesticides from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twq"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pesticides Blank Not Collected from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twq_blank_collected"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pesticides Duplicate Bottle Collected from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twq_du_collected"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pesticides Duplicate Bottle Filled from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twq_du_filled"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pesticides Not Collected from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twq_n_collected"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pesticides Reason Filled from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twq_reason_filled"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pesticides Reason Filled 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twq_reason_filled2"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pesticides Sample from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twq_sample"></xsl:copy-of>
			<!-- Tech Collect Tap Water Pesticides Subsamples from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/tap_water_twq_subsamples"></xsl:copy-of>
			<!-- 3 Month Mother Phone from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/three_mth_mother"></xsl:copy-of>
			<!-- 3 Month Mother Child Detail from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/three_mth_mother_child_detail"></xsl:copy-of>
			<!-- 3 Month Mother Child Habits from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/three_mth_mother_child_habits"></xsl:copy-of>
			<!-- 3 Month Mother Race from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/three_mth_mother_race"></xsl:copy-of>
			<!-- 12 Month Mother from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twelve_mth_mother"></xsl:copy-of>
			<!-- 12 Month Child Detail from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twelve_mth_mother_detail"></xsl:copy-of>
			<!-- 12 Month Mother Lice 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twelve_mth_mother_lice"></xsl:copy-of>
			<!-- 12 Month Mother Renovate Room from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twelve_mth_mother_renovate_room"></xsl:copy-of>
			<!-- 12 Month Mother Room Mold from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twelve_mth_mother_room_mold"></xsl:copy-of>
			<!-- 12 Month Mother SAQ from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twelve_mth_saq"></xsl:copy-of>
			<!-- 12 Month Mother SAQ Formula Brand from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twelve_mth_saq_formula_brand"></xsl:copy-of>
			<!-- 12 Month Mother SAQ Formula Type from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twelve_mth_saq_formula_type"></xsl:copy-of>
			<!-- 12 Month Mother SAQ Supplement from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twelve_mth_saq_supplement"></xsl:copy-of>
			<!-- 12 Month Mother SAQ Water from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twelve_mth_saq_water"></xsl:copy-of>
			<!-- 12 Month Mother SAQ Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twelve_mth_saq_2"></xsl:copy-of>
			<!-- 12 Month Mother SAQ Formula Brand Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twelve_mth_saq_formula_brand_2"></xsl:copy-of>
			<!-- 12 Month Mother SAQ Formula Type Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twelve_mth_saq_formula_type_2"></xsl:copy-of>
			<!-- 12 Month Mother SAQ Supplement Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twelve_mth_saq_supplement_2"></xsl:copy-of>
			<!-- 12 Month Mother SAQ Water Phase 2 from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twelve_mth_saq_water_2"></xsl:copy-of>
			<!-- 24 Month Mother from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twenty_four_mth_mother"></xsl:copy-of>
			<!-- 24 Month Mother Condition from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twenty_four_mth_mother_cond"></xsl:copy-of>
			<!-- 24 Month Mother Detail from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twenty_four_mth_mother_detail"></xsl:copy-of>
			<!-- 24 Month Mother Habits from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twenty_four_mth_mother_habits"></xsl:copy-of>
			<!-- 24 Month Mother Mold Child from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twenty_four_mth_mother_mold"></xsl:copy-of>
			<!-- 24 Month Mother Pet Type from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twenty_four_mth_pet_type"></xsl:copy-of>
			<!-- 24 Month Mother Renovate Room from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twenty_four_mth_renovate_room"></xsl:copy-of>
			<!-- 24 Month Mother Room Mold from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twenty_four_mth_room_mold"></xsl:copy-of>
			<!-- 24 Month Mother Prescription from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twenty_four_mth_mother_prescr"></xsl:copy-of>
			<!-- 24 Month Mother OTC from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twenty_four_mth_mother_otc"></xsl:copy-of>
			<!-- 24 Month Mother Supplement from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twenty_four_mth_mother_suppl"></xsl:copy-of>
			<!-- 24 Month Infant Feeding SAQ from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/twenty_four_mth_saq"></xsl:copy-of>
			<!-- Vacuum Bag Dust Sample Collection from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/vacuum_bag"></xsl:copy-of>
			<!-- Vacuum Bag Dust Sample Collection Outside from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/vacuum_bag_outside"></xsl:copy-of>
			<!-- Validation Instrument from Dcas -->
				<xsl:copy-of select="$doc2/ns1:recruitment_substudy_transmission_envelope/ns1:transmission_tables/validation_ins"></xsl:copy-of>
			
			</ns1:transmission_tables>
		</ns1:recruitment_substudy_transmission_envelope>
		
	</xsl:template>
</xsl:stylesheet>