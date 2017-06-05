<?php

include_once 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: $basePath/login");
    exit();
}

$page = './view/user/dashboard.php';
include_once getcwd().'/view/template/default.php';
?>