<?php
$mysqli = new mysqli("localhost", "root", "", "wsrtbd");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$full_name     = $_POST['full_name'];
$dob           = $_POST['dob'];
$gender        = $_POST['gender'];
$national_id   = $_POST['national_id'];

$division      = $_POST['division'];
$full_address  = $_POST['full_address'];

$phone         = $_POST['phone'];
$email         = $_POST['email'];

$password      = $_POST['password'];
$confirm       = $_POST['confirm_password'];

$experience    = $_POST['experience'];
$certificate   = $_POST['certificate_id'];
$motivation    = $_POST['motivation'];

$newsletter    = isset($_POST['newsletter']) ? 1 : 0;

// CHECK PASSWORD MATCH
if ($password !== $confirm) {
    echo "Password mismatch";
    exit;
}

// HASH PASSWORD
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$stmt = $mysqli->prepare("
    INSERT INTO rescuers 
    (full_name, dob, gender, national_id, division, full_address, phone, email, password,
     experience, certificate_id, motivation, newsletter)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "ssssssssssssi",
    $full_name,
    $dob,
    $gender,
    $national_id,
    $division,
    $full_address,
    $phone,
    $email,
    $hashed_password,   // stored safely
    $experience,
    $certificate,
    $motivation,
    $newsletter
);

// EXECUTE
if ($stmt->execute()) {
    echo "success";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
