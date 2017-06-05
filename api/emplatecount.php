<?php

date_default_timezone_set('Asia/Kolkata');

include_once getcwd().'/Conn.php';

class EmpList {

    public function getEmpListData($id) {
        $conn = Conn::getConn();

        $sql = "select empid,empname,case when sum(is_late) is not null then sum(is_late) else 0 end as latecnt,
                case when TO_CHAR((avg(tm)::int || ' second')::interval, 'HH24:MI:SS') is not null then TO_CHAR((avg(tm)::int || ' second')::interval, 'HH24:MI:SS') 
                else '-' end as avgtime from( SELECT e.empid, e.empname, date(in_time), CASE WHEN SUBSTR(min(a.in_time)::text,12,8) > '10:00:00' THEN 1 ELSE 0 END AS is_late,
                 min(EXTRACT(hours FROM in_time)*60*60 + EXTRACT(minutes FROM in_time)*60 + EXTRACT(seconds FROM in_time)) AS tm FROM emp e 
                 left join emp_att a on e.id = a.emp_id WHERE e.id = $id GROUP BY e.empid, e.empname,date(in_time)) tb group by empid,empname";

        $ret = pg_query($conn, $sql);
        if ($ret) {
            $row = pg_fetch_assoc($ret);
            return $row;
        }

        return array();
    }

}

$res = array('code' => 1000, 'status' => 'failure', 'msg' => 'Somthing went wrong');

$id = isset($_POST['id']) ? $_POST['id'] : "";

if ($id != "") {
    $obj = new EmpList();
    $result = $obj->getEmpListData($id);

    if (count($result)) {
        $res = array('code' => 200, 'status' => 'success', 'msg' => 'saved', 'data' => $result);
    }
}
echo json_encode($res);
?>