<?php

date_default_timezone_set('Asia/Kolkata');

include_once getcwd().'/Conn.php';

class Login {

    public function doLogin($loginuser, $loginpassword) {
        $conn = Conn::getConn();

        $sql = "SELECT 
                    username
                FROM
                    app_user
                WHERE
                    username = '$loginuser'
                        AND password = MD5(CONCAT(MD5('$loginuser'),
                                    '$loginpassword'))";
        $ret = pg_query($conn, $sql);
        if (!$ret) {
            return 0;
        } else {
            $row = pg_fetch_assoc($ret);
            $_SESSION['username'] = $row['username'];

            return 1;
        }
    }

}

$loginuser = isset($_POST['loginuser']) ? $_POST['loginuser'] : "";
$loginpassword = isset($_POST['loginpassword']) ? $_POST['loginpassword'] : "";

$res = array('code' => 1000, 'status' => 'failure', 'msg' => 'Somthing went wrong');
if ($loginuser != "" && $loginpassword != "") {

    $obj = new Login();
    $result = $obj->doLogin($loginuser, $loginpassword);

    if ($result == 1) {
        $res = array('code' => 200, 'status' => 'success'.$_SESSION['username'], 'msg' => 'saved');
    }
}
echo json_encode($res);
exit;
?>