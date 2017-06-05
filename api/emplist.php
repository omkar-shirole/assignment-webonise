<?php

date_default_timezone_set('Asia/Kolkata');

include_once getcwd().'/Conn.php';

class EmpList {

    public function getEmpListData() {
        $conn = Conn::getConn();

        $sql = "SELECT  e.id, e.empid, e.empname
                FROM
                    emp e
                ORDER BY e.empname";

        $list = array();
        $ret = pg_query($conn, $sql);
        if ($ret) {
            while ($row = pg_fetch_assoc($ret)) {
                $list[] = $row;
            }
        }

        return $list;
    }

}

$res = array('code' => 1000, 'status' => 'failure', 'msg' => 'Somthing went wrong');

$obj = new EmpList();
$result = $obj->getEmpListData();

if (count($result)) {
    $res = array('code' => 200, 'status' => 'success', 'msg' => 'saved', 'list' => $result);
}

echo json_encode($res);
?>