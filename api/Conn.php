<?php

include_once '../config.php';

class Conn {

    private static $con = null;

    private function __construct() {
        
    }

    public static function getConn() {

        if (Conn::$con !== NULL) {
            return Conn::$con;
        }

        $host = "host = ".DBHOST;
        $port = "port = ".DBPORT;
        $dbname = "dbname = ".DBNAME;
        $credentials = "user = ".DBUSER." password =".DBPWD;

        Conn::$con = pg_connect("$host $port $dbname $credentials");

        return Conn::$con;
    }

}

?>