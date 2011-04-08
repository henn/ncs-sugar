#!/bin/bash

# Unix script to create a packaging for every module
# Depends on having a "zip" binary compatible with the InfoZIP variety
# on Linux
# Pass "-c" to create a single SugarCRM module containing all
# of the NCS modules (useful for developers)

# TODO: Add a "-d" (for deploy) option to, rather than sending the modules to
# the module builder, deploy them directly without editability

# Where the Sugar modules are located.
# Format should be: $DIRNAME/{manifest.php,$DIRNAME, ...}
MODULE_DIRS="Locating_Tracing_Tables Specific_Code_Tables\
	Data_Collection_Tables Organization_Level_Tables Staffing_Tables\
	Geographic_Tables Person_Level_Tables IDCreation"

DESTDIR="output"
HELPER_DIR="templates"

FINAL_FILENAME="`date +'%F'`-ncs-modules-snapshot"


if [ "`basename $PWD`" != "tables" ]; then
	echo "ERROR: Must be within tables directory to package modules"
	exit 1
fi

rm -rf $DESTDIR
mkdir $DESTDIR

####### Separate packaging

# Create the individual sets of modules
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

####### Combined packaging

# Only do this if requested via the "-c" arg for combined
if [ $# -lt 1 -o "$1" != '-c' ]; then
	exit 0
fi

# Remove IDCreation for now
MODULE_DIRS="`echo $MODULE_DIRS | sed 's/IDCreation//'`"

# Create the super-module, which can be installed instead of the indivual ones
ZIP_ARGS=''
COUNT=0

# Directory where things are combined
COMBINED="combined"
mkdir $COMBINED

#Assuming we are already in $DESTDIR
cd $COMBINED

#TODO: Update version and published dates in the manifest(s)
cp ../../$HELPER_DIR/combined_manifest1.php manifest.php

for i in $MODULE_DIRS
do
	echo "$COUNT => array ('from'=>'<basepath>/$i','to'=>'custom/modulebuilder/packages/$i')," >> manifest.php
	pushd  ../../$i >> /dev/null
	zip -r9q ../$DESTDIR/$COMBINED.zip $i
	popd >> /dev/null
	COUNT=`expr $COUNT + 1`
done

# Need to append the last few lines onto the manifest
cat ../../$HELPER_DIR/combined_manifest2.php >> manifest.php
zip -r9qj ../$COMBINED.zip manifest.php

cd ..

# Copy other files
zip -r9qj $COMBINED.zip ../$HELPER_DIR/{README,LICENSE}.txt


echo "Created combined package (minus IDCreation...to come later) as: output/$COMBINED.zip"

