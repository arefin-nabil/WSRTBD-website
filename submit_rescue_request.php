<?php
header('Content-Type: application/json');
require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit();
}

// Collect and sanitize input
$requester_name = trim($_POST['requester_name'] ?? '');
$requester_phone = trim($_POST['requester_phone'] ?? '');
$requester_email = trim($_POST['requester_email'] ?? '');
$emergency_type = trim($_POST['emergency_type'] ?? '');
$animal_description = trim($_POST['animal_description'] ?? '');
$animal_size = trim($_POST['animal_size'] ?? '');
$animal_condition = trim($_POST['animal_condition'] ?? 'Unknown');
$division = trim($_POST['division'] ?? '');
$district = trim($_POST['district'] ?? '');
$detailed_address = trim($_POST['detailed_address'] ?? '');
$location_type = trim($_POST['location_type'] ?? 'Other');
$urgency_level = trim($_POST['urgency_level'] ?? 'Medium');
$additional_notes = trim($_POST['additional_notes'] ?? '');
$preferred_contact_time = trim($_POST['preferred_contact_time'] ?? '');

// Validation
if (
    empty($requester_name) || empty($requester_phone) || empty($emergency_type) ||
    empty($animal_description) || empty($division) || empty($detailed_address)
) {
    echo json_encode(['success' => false, 'message' => 'Please fill all required fields']);
    exit();
}

// Validate email if provided
if (!empty($requester_email) && !filter_var($requester_email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email address']);
    exit();
}

// Insert into database
$sql = "INSERT INTO rescue_requests 
        (requester_name, requester_phone, requester_email, emergency_type, animal_description, 
         animal_size, animal_condition, division, district, detailed_address, location_type, 
         urgency_level, additional_notes, preferred_contact_time) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $mysqli->error]);
    exit();
}

$stmt->bind_param(
    "ssssssssssssss",
    $requester_name,
    $requester_phone,
    $requester_email,
    $emergency_type,
    $animal_description,
    $animal_size,
    $animal_condition,
    $division,
    $district,
    $detailed_address,
    $location_type,
    $urgency_level,
    $additional_notes,
    $preferred_contact_time
);

if ($stmt->execute()) {
    $request_id = $stmt->insert_id;

    echo json_encode([
        'success' => true,
        'message' => 'Rescue request submitted successfully! We will contact you shortly. Request ID: #' . $request_id,
        'request_id' => $request_id
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Failed to submit request. Please try again or call us directly.'
    ]);
}

$stmt->close();
$mysqli->close();
