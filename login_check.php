<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "wsrtbd");

$identifier = $_POST['identifier'];
$password   = $_POST['password'];

$stmt = $mysqli->prepare("
    SELECT id, full_name, email, phone, password 
    FROM rescuers 
    WHERE (email = ? OR phone = ?)
      AND password = ?
    LIMIT 1
");
$stmt->bind_param("sss", $identifier, $identifier, $password);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    $_SESSION['rescuer'] = $user;
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid login"]);
}
?>