#!/bin/bash

# Unix script to deploy custom views for creation of IDs

# Where the 'Custom_Resources' directory is located which contains 'custom' and 'ncs_framework'.
MODULE_GT="DwellingUnt DwlUntHsLnk Household\
	ListingUnt"
	
MODULE_LTT="Address Email Telephone"

MODULE_NCSDC="CntctInfo CntLnk EventInfo\
	Incident IncMedMultS IncUnatMltS\
	Instrument NIntRptVcnt NIRDUTpMltS\
	NIRNAccMltS NIRRfsMltS NonInterRpt"

MODULE_OLT="Institution Provider PrsnInstLnk\
	PrsnPrvdLnk"
	
MODULE_PLT="LkPrsPrtcpt LnkPrsHshld\
	Participant Person PersonRace\
	PPGDetails PPGStsHstry PrtcptCnsnt\
	PrtcptVstC"
	
MODULE_ST="OtrchEval OtrchStaff\
	StaffRstr StfCrtTrn StfExpDCTsk\
	StfExpMgTsk StfLang StfVldtn\
	StfWkExpns WkOEAct"

SOURCE_DIRS="\
    Data_Collection_Tables/Data_Collection_Tables/modules/\
	Person_Level_Tables/Person_Level_Tables/modules/\
	Staffing_Tables/Staffing_Tables/modules/\
	Organization_Level_Tables/Organization_Level_Tables/modules/\
	Location_Tracing_Tables/Location_Tracing_Tables/modules/"

if [ "`basename $PWD`" != "tables" ]; then
	echo "ERROR: Must be within tables directory to package modules"
	exit 1
fi

for i in $MODULE_GT
do
	cd Geographic_Tables/Geographic_Tables/modules/$i/metadata/
	cp editviewdefs.php ../../../../../../Custom_Resources/custom/modules/GT_$i/metadata/
	cd ../../../../../
	#pwd
done

for i in $MODULE_LTT
do
	cd Locating_Tracing_Tables/Locating_Tracing_Tables/modules/$i/metadata/
	#cd Location_Tracing_Tables/Location_Tracing_Tables/modules/$i/metadata/
	cp editviewdefs.php ../../../../../../Custom_Resources/custom/modules/LTT_$i/metadata/
	cd ../../../../../
	#pwd
done

for i in $MODULE_NCSDC
do
	cd Data_Collection_Tables/Data_Collection_Tables/modules/$i/metadata/
	cp editviewdefs.php ../../../../../../Custom_Resources/custom/modules/NCSDC_$i/metadata/
	cd ../../../../../
	#pwd
done

for i in $MODULE_OLT
do
	cd Organization_Level_Tables/Organization_Level_Tables/modules/$i/metadata/
	cp editviewdefs.php ../../../../../../Custom_Resources/custom/modules/OLT_$i/metadata/
	cd ../../../../../
	#pwd
done

for i in $MODULE_PLT
do
	cd Person_Level_Tables/Person_Level_Tables/modules/$i/metadata/
	cp editviewdefs.php ../../../../../../Custom_Resources/custom/modules/PLT_$i/metadata/
	cd ../../../../../
	#pwd
done

for i in $MODULE_ST
do
	cd Staffing_Tables/Staffing_Tables/modules/$i/metadata/
	cp editviewdefs.php ../../../../../../Custom_Resources/custom/modules/ST_$i/metadata/
	cd ../../../../../
	#pwd
done

echo "Successfully moved Custom_Resources files"
