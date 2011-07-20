<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
 *
 * @param type $type The sugar bean we want to export
 */
function export($type)
{
    $GLOBALS['log']->error($type . ' --- export called: ' . memory_get_usage());
    global $beanList;
    global $beanFiles;
    global $current_user;
    global $app_strings;
    global $app_list_strings;
    global $timedate;
    $focus = 0;
    $content = '';
    $bean = $beanList[$type];
    require_once($beanFiles[$bean]);
    $focus = new $bean;
    $searchFields = array();
    $db = DBManagerFactory::getInstance();
    $where = '';
    $order_by = "";
    $beginWhere = substr(trim($where), 0, 5);
    if ($beginWhere == "where")
        $where = substr(trim($where), 5, strlen($where));
    $ret_array = create_export_query_relate_link_patch($type, $searchFields, $where); 
    $query = $focus->create_export_query($order_by,$ret_array['where']);
    $result = $db->query($query, true, $app_strings['ERR_EXPORT_TYPE'].$type.": <BR>.".$query);
    $result_list = array();
    while($val = $db->fetchByAssoc($result, -1, false)) {
        $result_list[] = $val;
    }
    unset($result);
    $GLOBALS['log']->error($type . ' --- export finished: ' . memory_get_usage());
    return $result_list;
}
?>
