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
		8) Sample Collection Tables
 

	3) Install Custom_Resources
	4) Run a quick Repair and Rebuild
	5) Run "Rebuild Minified JS Files" to rebuild and compress javascript files which include the new Javascript files for DateTimeCombo field.
	You will need to clear the web browser's cache and re-login to sugarCRM system before you can see changes to the DateTimeCombo field.
	6) If you are upgrading NCSsugarCRM system from a previous version, please make sure to uninstall previous installed packages before installing the newer version of those packages. 
	** Please Note: make sure you select the option "Do Not Remove Tables" when unstalling a package. This way the data in your NCS sugar system will be kept intact.
	

USING MODULE BUILDER
-Be sure to unload the Custom_Resources module in Module Loader before deploying
anything. You can then re-load it after all of your deploys are done.
-If you redeploy any module besides the Specific Code Tables, you will need to
deploy every module after it in the deploy order.
#################################################################################

In order to use Event Generation Scheduler Run the following SQL script to create "auto_event_log" table and to add two scheduled tasks to the "schedulers" table. (Copy everything below this line and run the sql script below once, using MSSQL Admin tool).







-- --------------------------------------------------------
CREATE TABLE  auto_event_log (

  id int NOT NULL IDENTITY PRIMARY KEY,

  event_guid varchar(36) DEFAULT NULL,

  date_created datetime NOT NULL,

  participant_id varchar(36) NOT NULL,

);

  

 

CREATE TABLE auto_eventinfo_setting (

  id int NOT NULL IDENTITY PRIMARY KEY,

  event_type_code varchar(50) NOT NULL,

  event_name varchar(120) ,

  event_cat varchar(25),

  event_disposition_cat varchar(25) ,

  visit_window_start_month int,

  visit_window_end_month int,

  spi_time_frame smallint,

  bv_time_frame smallint,

  ipi_time_frame smallint,

  date_created datetime,

  date_modified datetime,

  added_by varchar(25),

  modified_by varchar(25),

  active smallint,

);

 
--
-- Dumping data for table `auto_eventinfo_setting`
--

INSERT INTO auto_eventinfo_setting (event_type_code, event_name, event_cat, event_disposition_cat, visit_window_start_month, visit_window_end_month, spi_time_frame, bv_time_frame, ipi_time_frame, date_created, date_modified, added_by, modified_by, active) VALUES
('23', '3 Month', 'postnatal', '5', 2, 4, 0, 0, 0, '2011-06-24 03:15:53', '2011-06-30 18:33:22', '', '', 1),
('24', '6 Month', 'postnatal', '3', 5, 7, 0, 0, 0, '2011-06-24 03:15:53', '2011-06-30 18:38:06', '', '', 1),
('26', '9 Month', 'postnatal', '5', 8, 10, 0, 0, 0, '2011-06-24 03:15:53', '2011-06-30 17:26:07', '', '', 1),
('27', '12 Month', 'postnatal', '3', 11, 15, 0, 0, 0, '2011-06-24 03:15:53', '2011-06-30 19:50:02', '', '', 1),
('15', 'Pregnancy Visit 2/SPI', 'prenatal', '3', 0, 0, 60, 0, 0, '2011-06-24 03:15:53', '2011-06-30 18:38:08', '', '', 1),
('18', 'Birth Visit', 'prenatal', '3', 0, 0, 0, 30, 0, '2011-06-24 03:15:53', '2011-06-30 18:38:09', '', '', 1),
('13', 'Pregnancy Visit 1', 'prenatal', '3', 0, 0, 0, 0, 1, '2011-06-30 00:00:00', '2011-06-30 00:00:00', '', '', 1);


-- --------------------------------------------------------
--
-- Dumping data for table `schedulers`  
-- Setting up scheduled tasks for event generation code.
--
INSERT INTO schedulers (id, deleted, date_entered, date_modified, created_by, modified_user_id, name, job, date_time_start, date_time_end, job_interval, time_from, time_to, last_run, status, catch_up) VALUES
('6a0d941a-9f73-a27b-9500-4ddfe92efd26', 0, GETDATE(), GETDATE(), '1', '1', 'Auto Generate Postnatal Event Info', 'function::autoGenerateEventInfo', '2005-01-01 07:00:00', NULL, '*/30::*::*::*::*', NULL, NULL, '2011-06-02 18:57:00', 'Active', 1),
('ddb9861c-2b7e-fed9-8747-4ddfe941e8c8', 0, GETDATE(), GETDATE(), '1', '1', 'Auto Generate Prenatal Event Info', 'function::autoGeneratePIEventInfo', '2005-01-01 07:00:00', NULL, '*/30::*::*::*::*', NULL, NULL, '2011-06-02 18:58:00', 'Active', 1);
