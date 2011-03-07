#!/bin/bash

# Unix script to deploy custom views for creation of IDs

# Where the 'IDCreation' directory is located which contains 'custom' and 'ncs_framework'.
MODULE_DIRS="GT_DwellingUnt GT_DwlUntHsLnk GT_Household\
	GT_ListingUnt LTT_Address LTT_Email LTT_Telephone\
	NCSDC_CntctInfo NCSDC_CntctLnk NCSDC_EventInfo\
	NCSDC_Incident NCSDC_IncMedMultS NCSDC_IncUnatMltS\
	NCSDC_Instrument NCSDC_NIntRptVcnt NCSDC_NIRDUTpMltS\
	NCSDC_NIRNAccMltS NCSDC_NIRRfsMltS NCSDC_NonInterRpt\
	OLT_Institution OLT_Provider OLT_PrsnInstLnk\
	OLT_PrsnPrvdLnk PLT_LkPrsPrtcpt PLT_LnkPrsHshld\
	PLT_Participant PLT_Person PLT_PersonRace\
	PLT_PPGDetails PLT_PPGStsHstry PLT_PrtcptCnsnt\
	PLT_PrtcptVstC ST_OtrchEval ST_OtrchStaff\
	ST_StaffRstr ST_StfCrtTrn ST_StfExpDCTsk\
	ST_StfExpMgTsk ST_StfLang ST_StfVldtn\
	ST_StfWkExpns ST_WkOEAct"


if [ "`basename $PWD`" != "IDCreation" ]; then
	echo "ERROR: Must be within tables directory to package modules"
	exit 1
fi

mkdir /var/www/sugar/ncs_framework
cp ncs_framework/*.* /var/www/sugar/ncs_framework

for i in $MODULE_DIRS
do
	mkdir /var/www/sugar/custom/modules/$i/views/
	mkdir /var/www/sugar/custom/modules/$i/metadata/    
	cp custom/modules/$i/views/view.edit.php /var/www/sugar/custom/modules/$i/views/
	cp custom/modules/$i/metadata/editviewdefs.php /var/www/sugar/custom/modules/$i/metadata/
done

echo "Successfully moved IDCreation files"
