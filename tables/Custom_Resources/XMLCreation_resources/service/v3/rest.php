<?php
/**
 * This is a rest entry point for rest version 3.0 NCS Extensions
 */
if(!defined('sugarEntry')) define('sugarEntry', true);
chdir('../../..');


require_once('NCSSugarWebServiceImpl.php');
$webservice_class = 'NCSSugarRestService';
$webservice_path = 'custom/service/core/NCSSugarRestService.php';
$webservice_impl_class = 'NCSSugarWebServiceImpl';
$registry_class = 'registry_ncs';
$location = '/custom/service/v3/rest.php';
$registry_path = 'custom/service/v3/registry.php';
require_once('service/core/webservice.php');
?>
