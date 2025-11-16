<?php
header('Content-Type: application/json; charset=utf-8');
error_reporting(E_ALL);
ini_set('display_errors', 0);

try {
    include 'db.php';

    if ($mysqli->connect_error) {
        throw new Exception("Database connection failed: " . $mysqli->connect_error);
    }

    // Get total rescuers from rescuers_data table
    $rescuersResult = $mysqli->query("SELECT COUNT(*) AS total FROM rescuers_data");
    $totalRescuers = $rescuersResult ? $rescuersResult->fetch_assoc()['total'] : 0;

    // Get total rescues from rescue_activities table
    $rescuesResult = $mysqli->query("SELECT COUNT(*) AS total FROM rescue_activities");
    $totalRescues = $rescuesResult ? $rescuesResult->fetch_assoc()['total'] : 0;

    // Get unique districts covered from rescuers_data table
    $districtsResult = $mysqli->query("SELECT COUNT(DISTINCT district) AS total FROM rescuers_data WHERE district IS NOT NULL AND district != ''");
    $totalDistricts = $districtsResult ? $districtsResult->fetch_assoc()['total'] : 0;

    $mysqli->close();

    echo json_encode([
        'success' => true,
        'total_rescuers' => $totalRescuers,
        'total_rescues' => $totalRescues,
        'total_districts' => $totalDistricts
    ], JSON_UNESCAPED_UNICODE);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}
