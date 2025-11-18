<?php
header('Content-Type: application/json; charset=utf-8');  
require_once "db.php";

$mysqli->set_charset("utf8mb4");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method'], JSON_UNESCAPED_UNICODE);
    exit();
}

$full_name = trim($_POST['full_name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validation
if (empty($full_name) || empty($phone) || empty($email) || empty($subject) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'দয়া করে সকল তথ্য পূরণ করুন'], JSON_UNESCAPED_UNICODE);
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'ইমেইল ঠিকানা সঠিক নয়'], JSON_UNESCAPED_UNICODE);
    exit();
}

// Insert into database
$sql = "INSERT INTO contact_messages (full_name, phone, email, subject, message) 
        VALUES (?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'ডাটাবেস ত্রুটি: ' . $mysqli->error], JSON_UNESCAPED_UNICODE);
    exit();
}

$stmt->bind_param("sssss", $full_name, $phone, $email, $subject, $message);

if ($stmt->execute()) {
    echo json_encode([
        'success' => true,
        'message' => 'আপনার বার্তা সফলভাবে পাঠানো হয়েছে! আমরা শীঘ্রই উত্তর দেব।'
    ], JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'বার্তা পাঠাতে ব্যর্থ। অনুগ্রহ করে আবার চেষ্টা করুন।'
    ], JSON_UNESCAPED_UNICODE);
}

$stmt->close();
$mysqli->close();
