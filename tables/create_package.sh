#!/bin/bash

# Unix script to create a packaging for every module
# Depends on having a "zip" binary compatible with the InfoZIP variety
# on Linux

# Where the Sugar modules are located.
# Format should be: $DIRNAME/{manifest.php,$DIRNAME, ...}
MODULE_DIRS="Locating_Tracing_Tables Specific_Code_Tables\
	Data_Collection_Tables Organization_Level_Tables Staffing_Tables\
	Geographic_Tables Person_Level_Tables IDCreation"

DESTDIR="output"

FINAL_FILENAME="`date +'%F'`-ncs-modules-snapshot"


if [ "`basename $PWD`" != "tables" ]; then
	echo "ERROR: Must be within tables directory to package modules"
	exit 1
fi

rm -rf $DESTDIR
mkdir $DESTDIR

for i in $MODULE_DIRS
do
	cd $i
	zip -r9q ../$DESTDIR/${i}.zip *
	cd ..
done

echo "Created individual modules within $DESTDIR"

cd $DESTDIR

zip -9q ${FINAL_FILENAME}.zip *.zip

if [ $? -eq 0 ]; then
	echo "Successfully created ${FINAL_FILENAME}.zip. You can now release this file by running:"
	echo "   cp $DESTDIR/${FINAL_FILENAME}.zip \"/home/frs/project/n/nc/ncs-sugar/Pre-release modules/\"" 
else
	echo "Unable to create ${FINAL_FILENAME}.zip"
	exit 1
fi
