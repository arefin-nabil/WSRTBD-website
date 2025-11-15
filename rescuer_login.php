<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "wsrtbd");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$email    = $_POST['email'];
$password = $_POST['password'];

$stmt = $mysqli->prepare("SELECT id, full_name, password FROM rescuers WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {

        // LOGIN SUCCESS → CREATE SESSION
        $_SESSION['rescuer_id']   = $user['id'];
        $_SESSION['rescuer_name'] = $user['full_name'];
        $_SESSION['rescuer_email'] = $email;


        header("Location: profile.php");
        exit;
    } else {
        echo "invalid";
    }
} else {
    echo "not_found";
}

$stmt->close();
$mysqli->close();
