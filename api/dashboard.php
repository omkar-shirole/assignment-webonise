<?php

date_default_timezone_set('Asia/Kolkata');

include_once getcwd().'/Conn.php';

class Dashboard {

    public function getDashboardData() {
        $conn = Conn::getConn();

        $sql = "SELECT 
                    e.empid,
                    e.empname,
                    to_char(a.in_time, 'DD-Mon-YYYY HH:MI:SS') AS intime,
                    to_char(max(a.in_time), 'DD-Mon-YYYY') AS date,
                    CASE
                        WHEN SUBSTR(in_time::text,12,8) > '10:00:00' THEN 1
                        ELSE 0
                    END AS is_late
                FROM
                    emp_att a,
                    emp e
                WHERE
                    DATE(a.in_time) = '" . date("Y-m-d") . "'
                        AND e.id = a.emp_id
                GROUP BY DATE(a.in_time) , a.emp_id,e.empid, e.empname,a.in_time ORDER BY e.empname";
        
        $list = array();
        $data = array('total' => 0, 'late' => 0);
        $ret = pg_query($conn, $sql);
        if ($ret) {
            while ($row = pg_fetch_assoc($ret)) {
                $list[] = $row;
                $data['late'] += $row['is_late'];
                $data['total'] += 1;
            }
        }

        return array('data' => $data, 'list' => $list);
    }

}

$res = array('code' => 1000, 'status' => 'failure', 'msg' => 'Somthing went wrong');

$obj = new Dashboard();
$result = $obj->getDashboardData();

if (count($result['data'])) {
    $res = array('code' => 200, 'status' => 'success', 'msg' => 'saved', 'data' => $result['data'], 'list' => $result['list']);
}

echo json_encode($res);
?>