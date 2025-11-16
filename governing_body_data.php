<?php
header('Content-Type: application/json; charset=utf-8');
error_reporting(E_ALL);
ini_set('display_errors', 0);

try {
    include 'db.php';

    if ($mysqli->connect_error) {
        throw new Exception("Database connection failed: " . $mysqli->connect_error);
    }

    // Fetch all governing body members
    $sql = "SELECT id, name, designation, detail, photo, fblink, email FROM governing_body ORDER BY id ASC";
    $result = $mysqli->query($sql);

    if (!$result) {
        throw new Exception("Query failed: " . $mysqli->error);
    }

    $members = [];
    while ($row = $result->fetch_assoc()) {
        $members[] = $row;
    }

    $mysqli->close();

    echo json_encode([
        'success' => true,
        'members' => $members,
        'total' => count($members)
    ], JSON_UNESCAPED_UNICODE);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}
