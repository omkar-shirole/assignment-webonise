<?php
date_default_timezone_set('Asia/Kolkata');

include_once getcwd().'/Conn.php';

class TrackTime {

    public function saveTime($empName) {
        $conn = Conn::getConn();
        $sql = "insert into emp_att (emp_id,in_time) 
                select (SELECT id FROM emp where lower(empname) = '$empName'),'" . date("Y-m-d H:i:s") . "'";

        $ret = pg_query($conn, $sql);
        if ($ret) {
            return 1;
        } else {
            return 0;
        }
    }

}

$empName = isset($_POST['empname']) ? $_POST['empname'] : "";

$res = array('code' => 1000, 'status' => 'failure', 'msg' => 'Somthing went wrong');
if ($empName != "") {

    $empName = strtolower($empName);

    $obj = new TrackTime();
    $result = $obj->saveTime($empName);

    if ($result == 1) {
        if (date("H:i:s") <= "10:00:00") {
            $res = array('code' => 200, 'status' => 'success', 'msg' => 'ontime');
        } else {
            $res = array('code' => 200, 'status' => 'success', 'msg' => 'late');
        }
    }
}

echo json_encode($res);
?>