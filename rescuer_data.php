<?php
header('Content-Type: application/json; charset=utf-8');
error_reporting(E_ALL);
ini_set('display_errors', 0); // Don't display errors in output

try {
    include 'db.php';

    // Check if connection is successful
    if ($mysqli->connect_error) {
        throw new Exception("Database connection failed: " . $mysqli->connect_error);
    }

    $page     = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $per_page = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 10;
    $q        = isset($_GET['q']) ? trim($_GET['q']) : '';

    if ($page < 1) $page = 1;
    $per_page = in_array($per_page, [5, 10, 25, 50]) ? $per_page : 10;
    $offset = ($page - 1) * $per_page;

    // Search filter
    $params = [];
    $where = '';
    if ($q !== '') {
        $qLike = "%$q%";
        $where = "WHERE full_name LIKE ? OR district LIKE ? OR phone LIKE ?";
        $params = [$qLike, $qLike, $qLike];
    }

    // Count total rows
    $countSql = "SELECT COUNT(*) AS cnt FROM rescuers_data $where";
    $stmt = $mysqli->prepare($countSql);

    if (!$stmt) {
        throw new Exception("Prepare failed: " . $mysqli->error);
    }

    if ($where) {
        $stmt->bind_param('sss', $params[0], $params[1], $params[2]);
    }

    if (!$stmt->execute()) {
        throw new Exception("Execute failed: " . $stmt->error);
    }

    $result = $stmt->get_result();
    $total = $result->fetch_assoc()['cnt'];
    $stmt->close();

    $total_pages = max(1, ceil($total / $per_page));

    // Fetch rows
    $dataSql = "SELECT id, full_name, district, phone, photo FROM rescuers_data $where ORDER BY id ASC LIMIT ? OFFSET ?";
    $stmt = $mysqli->prepare($dataSql);

    if (!$stmt) {
        throw new Exception("Prepare failed: " . $mysqli->error);
    }

    if ($where) {
        // bind search params + LIMIT/OFFSET
        $stmt->bind_param('sssii', $params[0], $params[1], $params[2], $per_page, $offset);
    } else {
        $stmt->bind_param('ii', $per_page, $offset);
    }

    if (!$stmt->execute()) {
        throw new Exception("Execute failed: " . $stmt->error);
    }

    $result = $stmt->get_result();

    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    $stmt->close();
    $mysqli->close();

    echo json_encode([
        'success' => true,
        'rows' => $rows,
        'page' => $page,
        'per_page' => $per_page,
        'total' => $total,
        'total_pages' => $total_pages
    ], JSON_UNESCAPED_UNICODE);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}
