<?php
session_start();
if (!isset($_SESSION['rescuer_id'])) {
    die("You must be logged in to add rescue activities.");
}

$conn = new mysqli("localhost", "root", "", "wsrtbd");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$rescuer_id = $_SESSION['rescuer_id'];
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
    $filename = time() . '_' . basename($_FILES['rescue_photo']['name']);
    move_uploaded_file($_FILES['rescue_photo']['tmp_name'], 'uploads/' . $filename);
    $rescue_photo = $filename;
}

// Insert into database
$stmt = $conn->prepare("INSERT INTO rescue_activities 
(rescuer_id,rescue_type,rescue_date,species_name,size,location,`condition`,description,action,notes,rescue_photo) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
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
    header("Location: profile.php?success=1");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
