<?php

date_default_timezone_set('Asia/Kolkata');

include_once getcwd().'/Conn.php';

class EmpDel {

    public function delEmp($empName) {
        $conn = Conn::getConn();
        $sql = "delete from emp where id = $empName";
        $ret = pg_query($conn, $sql);
        if ($ret) {
            return 1;
        } else {
            return 0;
        }
    }

}

$empName = isset($_POST['empid']) ? $_POST['empid'] : "";

$res = array('code' => 1000, 'status' => 'failure', 'msg' => 'Somthing went wrong');
if ($empName != "") {

    $obj = new EmpDel();
    $result = $obj->delEmp($empName);

    if ($result == 1) {
        $res = array('code' => 200, 'status' => 'success', 'msg' => 'deleted');
    }
}

echo json_encode($res);
?>