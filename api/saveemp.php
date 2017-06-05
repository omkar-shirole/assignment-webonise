<?php

date_default_timezone_set('Asia/Kolkata');

include_once getcwd().'/Conn.php';

class Emp {

    public function saveEmp($empName, $empId, $empDesg) {
        $conn = Conn::getConn();
        $sql = "insert into emp (empname,empid,designation) values ('$empName','$empId','$empDesg')";
        $ret = pg_query($conn, $sql);
        if ($ret) {
            return 1;
        } else {
            return 0;
        }
    }

}

$empName = isset($_POST['empname']) ? $_POST['empname'] : "";
$empId = isset($_POST['empid']) ? $_POST['empid'] : "";
$empDesg = isset($_POST['designation']) ? $_POST['designation'] : "";

$res = array('code' => 1000, 'status' => 'failure', 'msg' => 'Somthing went wrong');
if ($empName != "" && $empId != "") {

    $empName = ucwords($empName);
    $empId = strtoupper($empId);
    $empDesg = strtoupper($empDesg);

    $obj = new Emp();
    $result = $obj->saveEmp($empName, $empId, $empDesg);

    if ($result == 1) {
        $res = array('code' => 200, 'status' => 'success', 'msg' => 'saved');
    }
}

echo json_encode($res);
?>