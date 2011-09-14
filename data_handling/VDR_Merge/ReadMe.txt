1. Run CMD
2. Go to the folder where msxsl.exe is
3. Type:
	msxsl.exe SourceFileName.xml VDR_Sugar_Dcas_merge.xsl -o OutputFileName.xml

If you just run the msxsl.exe it will provide some help information.

The SourceFile does not matter what the name is. But the second file that needs to be merged has to be specified here:

6	<xsl:variable name="doc2" select="document('Dcas.xml')"/>

If the file is not in the same folder then the whole path should be specified.
For ease of use just put all the files in one folder. The output file will be generated in the same folder as msxsl.exe