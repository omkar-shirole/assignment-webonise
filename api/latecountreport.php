<?php

date_default_timezone_set('Asia/Kolkata');

include_once getcwd().'/Conn.php';

class EmpList {

    public function getEmpListData() {
        $conn = Conn::getConn();

        $sql = "SELECT 
                e.empid,
                e.empname,
                IFNULL(SUBSTR(SEC_TO_TIME(AVG(TIME_TO_SEC(TIME(a.in_time)))),1,8),'') avgtime,
                IFNULL(SUM(CASE WHEN TIME(in_time) > '10:00:00' THEN 1 ELSE 0 END), 0) AS latecount
            FROM
                emp e
                    LEFT JOIN
                emp_att a ON e.id = a.emp_id
            GROUP BY e.id
            ORDER BY e.empname , latecount DESC , avgtime DESC";

        $sql = "select empid,empname,case when sum(is_late) is not null then sum(is_late) else 0 end as latecount,
                case when TO_CHAR((avg(tm)::int || ' second')::interval, 'HH24:MI:SS') is not null then TO_CHAR((avg(tm)::int || ' second')::interval, 'HH24:MI:SS') 
                else '' end as avgtime from( SELECT e.empid, e.empname, date(in_time), CASE WHEN SUBSTR(min(a.in_time)::text,12,8) > '10:00:00' THEN 1 ELSE 0 END AS is_late, 
                min(EXTRACT(hours FROM in_time)*60*60 + EXTRACT(minutes FROM in_time)*60 + EXTRACT(seconds FROM in_time)) AS tm FROM emp e left join emp_att a on e.id = a.emp_id 
                GROUP BY e.empid, e.empname,date(in_time)) tb group by empid,empname ORDER BY empname , latecount DESC , avgtime DESC";

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