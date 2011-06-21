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
 

	3) Install Custom_Resources
	4) Run a quick Repair and Rebuild

USING MODULE BUILDER
-Be sure to unload the Custom_Resources module in Module Loader before deploying
anything. You can then re-load it after all of your deploys are done.
-If you redeploy any module besides the Specific Code Tables, you will need to
deploy every module after it in the deploy order.
#################################################################################

In order to use Event Generation Scheduler Run the following SQL script to create "auto_event_log" table and to add two scheduled tasks to the "schedulers" table. (Copy everything below this line and run the sql script below once, using phpmyadmin or other mysql admin tool)




-- --------------------------------------------------------
--
-- Table structure for table `auto_event_log`
--

CREATE TABLE IF NOT EXISTS `auto_event_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_guid` varchar(36) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `participant_id` varchar(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='This table is used to log auto-generated events';


-- --------------------------------------------------------
--
-- Dumping data for table `schedulers`  
-- Setting up scheduled tasks for event generation code.
--

INSERT INTO `schedulers` (`id`, `deleted`, `date_entered`, `date_modified`, `created_by`, `modified_user_id`, `name`, `job`, `date_time_start`, `date_time_end`, `job_interval`, `time_from`, `time_to`, `last_run`, `status`, `catch_up`) VALUES
('6a0d941a-9f73-a27b-9500-4ddfe92efd26', 0, now(), now(), '1', '1', 'Auto Generate Postnatal Event Info', 'function::autoGenerateEventInfo', '2005-01-01 07:00:00', NULL, '*/30::*::*::*::*', NULL, NULL, '2011-06-02 18:57:00', 'Active', 1),
('ddb9861c-2b7e-fed9-8747-4ddfe941e8c8', 0, now(), now(), '1', '1', 'Auto Generate Prenatal Event Info', 'function::autoGeneratePIEventInfo', '2005-01-01 07:00:00', NULL, '*/30::*::*::*::*', NULL, NULL, '2011-06-02 18:58:00', 'Active', 1);
