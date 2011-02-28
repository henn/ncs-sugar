#!/bin/bash

# Unix script to deploy custom views for creation of IDs

# Where the 'IDCreation' directory is located which contains 'custom' and 'ncs_framework'.
MODULE_DIRS="GT_DwellingUnt GT_Household\
	GT_ListingUnt PLT_Participant PLT_Person\
	ST_StfLang"

# DESTDIR="output"

# FINAL_FILENAME="`date +'%F'`-ncs-modules-snapshot"


if [ "`basename $PWD`" != "IDCreation" ]; then
	echo "ERROR: Must be within tables directory to package modules"
	exit 1
fi

# rm -rf $DESTDIR
# mkdir $DESTDIR

mkdir /var/www/sugar/ncs_framework
cp ncs_framework/*.* /var/www/sugar/ncs_framework

for i in $MODULE_DIRS
do
	# mkdir /var/www/sugar/custom/modules/$i/views/
	# mkdir /var/www/sugar/custom/modules/$i/metadata/    
	# cp custom/modules/$i/views/view.edit.php /var/www/sugar/custom/modules/$i/views/
	# cp custom/modules/$i/metadata/editviewdefs.php /var/www/sugar/custom/modules/$i/metadata/
done

echo "Successfully moved IDCreation files"
