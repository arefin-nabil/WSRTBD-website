<?php
$mysqli = new mysqli("localhost", "root", "", "wsrtbd");
if ($mysqli->connect_error) {
    die("Database connection failed: " . $mysqli->connect_error);
}
