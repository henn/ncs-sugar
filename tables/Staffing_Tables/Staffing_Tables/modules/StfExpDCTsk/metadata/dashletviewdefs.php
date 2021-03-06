<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2010 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/



global $current_user;

$dashletData['ST_StfExpDCTskDashlet']['searchFields'] = array('date_entered'     => array('default' => ''),
                                                          'date_modified'    => array('default' => ''),
                                                          'assigned_user_id' => array('type'    => 'assigned_user_name', 
                                                                                      'default' => $current_user->name));
$dashletData['ST_StfExpDCTskDashlet']['columns'] =  array(   'name' => array('width'   => '40', 
                                                                      'label'   => 'LBL_LIST_NAME',
                                                                      'link'    => true,
                                                                      'default' => true), 
    'name' => 'name',
  ),
  'data_coll_task_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_DATA_COLL_TASK_TYPE',
    'sortable' => false,
    'width' => '10%',
    'name' => 'data_coll_task_type',
  ),
  'data_coll_tasks_hrs' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_DATA_COLL_TASKS_HRS',
    'width' => '10%',
    'default' => true,
    'name' => 'data_coll_tasks_hrs',
  ),
  'data_coll_task_cases' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DATA_COLL_TASK_CASES',
    'width' => '10%',
    'default' => true,
    'name' => 'data_coll_task_cases',
  ),
  'data_coll_transmit' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DATA_COLL_TRANSMIT',
    'width' => '10%',
    'default' => true,
    'name' => 'data_coll_transmit',
  ),
  'st_stfwkexpfexpdctsk_name' => 
  array (
    'type' => 'relate',
    'link' => 'st_stfwkexpst_stfexpdctsk',
    'label' => 'LBL_ST_STFWKEXPNS_ST_STFEXPDCTSK_FROM_ST_STFWKEXPNS_TITLE',
    'width' => '10%',
    'default' => true,
    'name' => 'st_stfwkexpfexpdctsk_name',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
    'name' => 'date_entered',
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
);