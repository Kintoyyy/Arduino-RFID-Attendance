<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

$host = "localhost";
$dbname = "rfid_attendance";
$username = "root";
$password = "";

include "router.php";
?>