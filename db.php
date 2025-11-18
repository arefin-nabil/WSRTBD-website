<?php
$host = "localhost";        // most hosting servers use localhost
$user = "binaryba_wsrtbd_admin";       // your DB username
$pass = "@refin256wsrtbd";         // your DB password
$dbname = "binaryba_wsrtbd";    // your DB name

$mysqli = new mysqli($host, $user, $pass, $dbname);

if ($mysqli->connect_errno) {
    die("Database Connection Failed: " . $mysqli->connect_error);
}

$mysqli->set_charset("utf8mb4"); // important for Bangla text