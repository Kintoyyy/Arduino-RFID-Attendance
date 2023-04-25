<?php
session_start();
require __DIR__ . '/vendor/autoload.php';


$host = "10.15.0.5:3306";
$dbname = "rfid_attendance";
$username = "root";
$password = "Kent_Rato_092303";

// $host = "sql113.epizy.com";
// $dbname = "epiz_33692155_rfid_attendance";
// $username = "epiz_33692155";
// $password = "N7yIcl3LIC2s";

include "router.php";
?>