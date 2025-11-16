<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (!isset($_SESSION['rescuer_id'])) {
    die("You must be logged in to add rescue activities.");
}

include "db.php";

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if user is verified
$rescuer_id = $_SESSION['rescuer_id'];
$check_sql = "SELECT verification_status FROM rescuers WHERE id = ?";
$check_stmt = $mysqli->prepare($check_sql);
$check_stmt->bind_param("i", $rescuer_id);
$check_stmt->execute();
$result = $check_stmt->get_result();
$user = $result->fetch_assoc();
$check_stmt->close();

if (!$user || $user['verification_status'] != 'verified') {
    die("Your account must be verified before you can add rescue activities.");
}
$rescue_type = $_POST['rescue_type'];
$rescue_date = $_POST['rescue_date'];
$species_name = $_POST['species_name'] ?? '';
$size = $_POST['size'] ?? '';
$location = $_POST['location'];
$condition = $_POST['condition'];
$description = $_POST['description'];
$action = $_POST['action'];
$notes = $_POST['notes'] ?? '';

// Handle photo upload
$rescue_photo = '';
if (isset($_FILES['rescue_photo']) && $_FILES['rescue_photo']['error'] == 0) {
    // Create uploads directory if it doesn't exist
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    $filename = time() . '_' . basename($_FILES['rescue_photo']['name']);
    $target_file = $upload_dir . $filename;

    // Validate file type
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
    $file_type = mime_content_type($_FILES['rescue_photo']['tmp_name']);

    if (in_array($file_type, $allowed_types)) {
        if (move_uploaded_file($_FILES['rescue_photo']['tmp_name'], $target_file)) {
            $rescue_photo = $filename;
        } else {
            die("Error uploading file.");
        }
    } else {
        die("Invalid file type. Only JPG, PNG, and GIF are allowed.");
    }
}

// Insert into database
$stmt = $mysqli->prepare("INSERT INTO rescue_activities 
(rescuer_id, rescue_type, rescue_date, species_name, size, location, `condition`, description, action, notes, rescue_photo) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if (!$stmt) {
    die("Prepare failed: " . $mysqli->error);
}

$stmt->bind_param(
    "issssssssss",
    $rescuer_id,
    $rescue_type,
    $rescue_date,
    $species_name,
    $size,
    $location,
    $condition,
    $description,
    $action,
    $notes,
    $rescue_photo
);

if ($stmt->execute()) {
    $stmt->close();
    $mysqli->close();
    header("Location: profile.php?success=1");
    exit();
} else {
    die("Error: " . $stmt->error);
}
