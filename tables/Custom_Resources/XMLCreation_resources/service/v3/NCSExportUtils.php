<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

function getObjectList($type)
{
    global $beanList;
    global $beanFiles;
    $bean = $beanList[$type];
    require_once($beanFiles[$bean]);
    $focus = new $bean;
    $tablename = $focus->getTableName();
    $query = 'select id from ' . $tablename . ' where deleted = 0';
    $db = DBManagerFactory::getInstance();
    $result = $db->query($query, true, 'Unable to get id list for '.$type. ':' .$query);
    while($val = $db->fetchByAssoc($result,-1,false))
    {
        $objectList[] = $val['id'];
    }
    unset($result);
    return $objectList;
}

/**
 *
 * @param db $db The database instance
 * @param type $type The sugar bean we want to export
 * @param array $chunk An array of record IDs to process
 */
function export(&$db, $type, $chunk)
{
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
    if ($chunk != null)
        $where = $focus->getTableName(). '.id in ("' . join('","', $chunk) . '")';
    else
        $where = '';
    $order_by = '';
    $beginWhere = substr(trim($where), 0, 5);
    if ($beginWhere == "where")
        $where = substr(trim($where), 5, strlen($where));
    $ret_array = create_export_query_relate_link_patch($type, $searchFields, $where); 
    $query = $focus->create_export_query($order_by,$ret_array['where']);
    $result = $db->query($query, true, $app_strings['ERR_EXPORT_TYPE'].$type.": <BR>.".$query);
    unset($focus);
    unset($query);
    return $result;
}

function getModuleNameByID($tablename, $id)
{
    $db = DBManagerFactory::getInstance();
    $query = 'select id, name from ' . $tablename . " where id='" . $id . "'";
    $result = $db->query($query, true, $app_strings['ERR_EXPORT_TYPE'].$type.": <BR>.".$query);
    unset($focus);
    unset($query);
    $val = $db->fetchByAssoc($result, -1, false);
    unset($result);
    return $val['name'];
}

/**
 *
 * @global type $dictionary
 * @param string $joinrelationship
 * @param integer $id
 * @return string Name of related record
 */
function getMultiRelatedNameByJoin($joinrelationship, $id)
{
    global $relationships;
    $db = DBManagerFactory::getInstance();
    $jointable = $relationships[$joinrelationship]['join_table'];
    $rhstable = $relationships[$joinrelationship]['rhs_table'];
    $joinrhskey = $relationships[$joinrelationship]['join_table'] . "." . $relationships[$joinrelationship]['join_key_rhs'];
    $joinlhskey = $relationships[$joinrelationship]['join_table'] . "." . $relationships[$joinrelationship]['join_key_lhs'];
    $query = "SELECT rhs.id, rhs.name FROM " . $jointable . 
            " Inner Join " . $rhstable . " rhs ON " . $joinrhskey . " = rhs.id " .
            " WHERE " . $joinlhskey . " =  '" . $id . "'";
    $result = $db->query($query, true, $app_strings['ERR_EXPORT_TYPE'].$type.": <BR>.".$query);
    unset($focus);
    unset($query);
    $val = $db->fetchByAssoc($result, -1, false);
    unset($result);
    return $val['name'];
}
?>
