The steps to deploy this instance are:

	1) Install combined.zip within Sugar's Module Loader
	2) Deploy the modules in Module Builder in the following order:

		1) Specific Code Tables (no relationships to other mods)
		2) Locating Tracing Tables
		3) Staffing Tables
		4) Geographic Tables
		5) Person Level Tables
		6) Organization Level Tables
		7) Data Collection Tables
 

	3) Install IDCreation


USING MODULE BUILDER

-Be sure to unload the IDCreation module in Module Loader before deploying
anything. You can then re-load it after all of your deploys are done.

-If you redeploy any module besides the Specific Code Tables, you will need to
deploy every module after it in the deploy order.
