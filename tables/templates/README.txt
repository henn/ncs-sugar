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
-- Table structure for table `auto_eventinfo_setting`
--

CREATE TABLE IF NOT EXISTS `auto_eventinfo_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_type_code` varchar(50) NOT NULL,
  `event_name` varchar(120) NOT NULL,
  `event_cat` varchar(25) NOT NULL,
  `event_disposition_cat` varchar(25) NOT NULL,
  `visit_window_start_month` int(11) NOT NULL,
  `visit_window_end_month` int(11) NOT NULL,
  `spi_time_frame` smallint(6) NOT NULL,
  `bv_time_frame` smallint(6) NOT NULL,
  `ipi_time_frame` smallint(6) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `added_by` varchar(25) NOT NULL,
  `modified_by` varchar(25) NOT NULL,
  `active` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `auto_eventinfo_setting`
--

INSERT INTO `auto_eventinfo_setting` (`event_type_code`, `event_name`, `event_cat`, `event_disposition_cat`, `visit_window_start_month`, `visit_window_end_month`, `spi_time_frame`, `bv_time_frame`, `ipi_time_frame`, `date_created`, `date_modified`, `added_by`, `modified_by`, `active`) VALUES
('23', '3 Month Visit', 'postnatal', '5', 2, 4, 0, 0, 0, '2011-06-24 03:15:53', '2011-06-30 18:33:22', '', '', 1),
('24', '6 Month Visit', 'postnatal', '1', 5, 7, 0, 0, 0, '2011-06-24 03:15:53', '2011-06-30 18:38:06', '', '', 1),
('26', '9 Month Visit', 'postnatal', '1', 8, 10, 0, 0, 0, '2011-06-24 03:15:53', '2011-06-30 17:26:07', '', '', 1),
('27', '12 Month Visit', 'postnatal', '6', 11, 18, 0, 0, 0, '2011-06-24 03:15:53', '2011-06-30 19:50:02', '', '', 1),
('15', 'Pregnancy Visit 2/SPI', 'prenatal', '2', 0, 0, 60, 0, 0, '2011-06-24 03:15:53', '2011-06-30 18:38:08', '', '', 1),
('18', 'Birth Visit', 'prenatal', '1', 0, 0, 0, 45, 0, '2011-06-24 03:15:53', '2011-06-30 18:38:09', '', '', 1),
('13', 'Pregnancy Visit 1', 'prenatal', '1', 0, 0, 0, 0, 1, '2011-06-30 00:00:00', '2011-06-30 00:00:00', '', '', 1);
