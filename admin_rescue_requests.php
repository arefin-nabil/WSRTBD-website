<?php
session_start();
require_once "db.php";

// Simple admin authentication
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin.php");
    exit();
}

// Handle status updates
if (isset($_POST['update_request']) && isset($_POST['request_id'])) {
    $request_id = (int)$_POST['request_id'];
    $status = $_POST['status'];
    $assigned_rescuer = !empty($_POST['assigned_rescuer']) ? (int)$_POST['assigned_rescuer'] : NULL;
    $admin_notes = trim($_POST['admin_notes']);

    $completed_at = ($status == 'completed') ? 'NOW()' : 'NULL';

    $stmt = $mysqli->prepare("UPDATE rescue_requests SET status = ?, assigned_rescuer_id = ?, admin_notes = ?, completed_at = IF(? = 'completed', NOW(), NULL) WHERE id = ?");
    $stmt->bind_param("sissi", $status, $assigned_rescuer, $admin_notes, $status, $request_id);
    $stmt->execute();
    $stmt->close();

    header("Location: admin_rescue_requests.php?filter=" . $_GET['filter'] ?? 'all');
    exit();
}

// Fetch statistics
$stats = $mysqli->query("SELECT 
    COUNT(*) as total,
    SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending,
    SUM(CASE WHEN status = 'assigned' THEN 1 ELSE 0 END) as assigned,
    SUM(CASE WHEN status = 'in_progress' THEN 1 ELSE 0 END) as in_progress,
    SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as completed,
    SUM(CASE WHEN urgency_level = 'Critical' THEN 1 ELSE 0 END) as critical
    FROM rescue_requests")->fetch_assoc();

// Fetch requests with filter
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'pending';
$where = $filter != 'all' ? "WHERE rr.status = '$filter'" : '';

$sql = "SELECT rr.*, r.full_name as rescuer_name 
        FROM rescue_requests rr 
        LEFT JOIN rescuers r ON rr.assigned_rescuer_id = r.id 
        $where 
        ORDER BY 
            FIELD(rr.urgency_level, 'Critical', 'High', 'Medium', 'Low'),
            rr.created_at DESC";
$requests = $mysqli->query($sql);

// Fetch verified rescuers for assignment
$rescuers = $mysqli->query("SELECT id, full_name, phone, division FROM rescuers WHERE verification_status = 'verified' ORDER BY full_name");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rescue Requests - WSRTBD Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="icon" type="image/png" href="/wsrtbd.png">
    <style>
        body {
            padding-top: 66px;
            background-color: #f8f9fa;
        }

        .navbar-custom {
            background: linear-gradient(135deg, #006400 0%, #005600 100%);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: white !important;
        }

        .stat-card {
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            color: white;
        }

        .request-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #6c757d;
        }

        .request-card.critical {
            border-left-color: #dc3545;
        }

        .request-card.high {
            border-left-color: #fd7e14;
        }

        .request-card.medium {
            border-left-color: #ffc107;
        }

        .badge-urgency {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin: 15px 0;
        }

        .info-item {
            font-size: 0.9rem;
        }

        .info-item strong {
            color: #495057;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="wsrtbd.png" alt="WSRTBD Logo" />
                WSRTBD
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Rescuer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_messages.php">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="admin_rescue_requests.php">Rescue Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <h2 class="mb-4" style="padding-top: 66px; text-align: center; ">Admin Panel</h2>
        <h3 class="mb-4">Rescue Requests Management</h3>

            <!-- Statistics -->
            <div class="row mb-4">
                <div class="col-md-2">
                    <div class="stat-card" style="background: #007bff;">
                        <h3><?php echo $stats['total']; ?></h3>
                        <p class="mb-0 small">Total</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="stat-card" style="background: #dc3545;">
                        <h3><?php echo $stats['critical']; ?></h3>
                        <p class="mb-0 small">Critical</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="stat-card" style="background: #ffc107; color: #000;">
                        <h3><?php echo $stats['pending']; ?></h3>
                        <p class="mb-0 small">Pending</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="stat-card" style="background: #17a2b8;">
                        <h3><?php echo $stats['assigned']; ?></h3>
                        <p class="mb-0 small">Assigned</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="stat-card" style="background: #fd7e14;">
                        <h3><?php echo $stats['in_progress']; ?></h3>
                        <p class="mb-0 small">In Progress</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="stat-card" style="background: #28a745;">
                        <h3><?php echo $stats['completed']; ?></h3>
                        <p class="mb-0 small">Completed</p>
                    </div>
                </div>
            </div>

            <!-- Filters -->
            <div class="btn-group mb-4">
                <a href="?filter=all" class="btn <?php echo $filter == 'all' ? 'btn-primary' : 'btn-outline-primary'; ?>">All</a>
                <a href="?filter=pending" class="btn <?php echo $filter == 'pending' ? 'btn-warning' : 'btn-outline-warning'; ?>">Pending</a>
                <a href="?filter=assigned" class="btn <?php echo $filter == 'assigned' ? 'btn-info' : 'btn-outline-info'; ?>">Assigned</a>
                <a href="?filter=in_progress" class="btn <?php echo $filter == 'in_progress' ? 'btn-secondary' : 'btn-outline-secondary'; ?>">In Progress</a>
                <a href="?filter=completed" class="btn <?php echo $filter == 'completed' ? 'btn-success' : 'btn-outline-success'; ?>">Completed</a>
            </div>

            <!-- Requests List -->
            <?php while ($req = $requests->fetch_assoc()):
                $urgency_class = strtolower($req['urgency_level']);
            ?>
                <div class="request-card <?php echo $urgency_class; ?>">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <h5 class="mb-1">
                                        <?php echo htmlspecialchars($req['emergency_type']); ?> Rescue Request #<?php echo $req['id']; ?>
                                    </h5>
                                    <span class="badge-urgency bg-<?php
                                                                    echo $req['urgency_level'] == 'Critical' ? 'danger' : ($req['urgency_level'] == 'High' ? 'warning' : ($req['urgency_level'] == 'Medium' ? 'info' : 'secondary'));
                                                                    ?>">
                                        <i class="bi bi-exclamation-circle me-1"></i><?php echo $req['urgency_level']; ?> Urgency
                                    </span>
                                    <span class="badge bg-<?php
                                                            echo $req['status'] == 'pending' ? 'warning' : ($req['status'] == 'assigned' ? 'info' : ($req['status'] == 'in_progress' ? 'primary' : 'success'));
                                                            ?> ms-2">
                                        <?php echo ucfirst(str_replace('_', ' ', $req['status'])); ?>
                                    </span>
                                </div>
                            </div>

                            <div class="info-grid">
                                <div class="info-item">
                                    <i class="bi bi-person me-1"></i><strong>Requester:</strong>
                                    <?php echo htmlspecialchars($req['requester_name']); ?>
                                </div>
                                <div class="info-item">
                                    <i class="bi bi-telephone me-1"></i><strong>Phone:</strong>
                                    <?php echo htmlspecialchars($req['requester_phone']); ?>
                                </div>
                                <div class="info-item">
                                    <i class="bi bi-geo-alt me-1"></i><strong>Division:</strong>
                                    <?php echo htmlspecialchars($req['division']); ?>
                                    <?php if ($req['district']): ?>, <?php echo htmlspecialchars($req['district']); ?><?php endif; ?>
                                </div>
                                <div class="info-item">
                                    <i class="bi bi-house me-1"></i><strong>Location Type:</strong>
                                    <?php echo htmlspecialchars($req['location_type']); ?>
                                </div>
                            </div>

                            <p class="mb-2"><strong>Address:</strong> <?php echo htmlspecialchars($req['detailed_address']); ?></p>
                            <p class="mb-2"><strong>Description:</strong> <?php echo htmlspecialchars($req['animal_description']); ?></p>

                            <div class="info-grid">
                                <div class="info-item"><strong>Size:</strong> <?php echo htmlspecialchars($req['animal_size']); ?></div>
                                <div class="info-item"><strong>Condition:</strong> <?php echo htmlspecialchars($req['animal_condition']); ?></div>
                            </div>

                            <?php if ($req['additional_notes']): ?>
                                <p class="mb-2 text-muted"><strong>Notes:</strong> <?php echo htmlspecialchars($req['additional_notes']); ?></p>
                            <?php endif; ?>

                            <?php if ($req['rescuer_name']): ?>
                                <p class="mb-1"><i class="bi bi-person-check me-2"></i><strong>Assigned to:</strong> <?php echo htmlspecialchars($req['rescuer_name']); ?></p>
                            <?php endif; ?>

                            <?php if ($req['admin_notes']): ?>
                                <p class="mb-0"><i class="bi bi-sticky me-2"></i><strong>Admin Notes:</strong> <?php echo nl2br(htmlspecialchars($req['admin_notes'])); ?></p>
                            <?php endif; ?>

                            <small class="text-muted">
                                Submitted: <?php echo date('d M Y, h:i A', strtotime($req['created_at'])); ?>
                                <?php if ($req['preferred_contact_time']): ?>
                                    | Best time: <?php echo htmlspecialchars($req['preferred_contact_time']); ?>
                                <?php endif; ?>
                            </small>
                        </div>

                        <div class="col-md-4">
                            <form method="POST">
                                <input type="hidden" name="request_id" value="<?php echo $req['id']; ?>">
                                <div class="mb-2">
                                    <label class="form-label small fw-bold">Status</label>
                                    <select name="status" class="form-select form-select-sm">
                                        <option value="pending" <?php echo $req['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                        <option value="assigned" <?php echo $req['status'] == 'assigned' ? 'selected' : ''; ?>>Assigned</option>
                                        <option value="in_progress" <?php echo $req['status'] == 'in_progress' ? 'selected' : ''; ?>>In Progress</option>
                                        <option value="completed" <?php echo $req['status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
                                        <option value="cancelled" <?php echo $req['status'] == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small fw-bold">Assign Rescuer</label>
                                    <select name="assigned_rescuer" class="form-select form-select-sm">
                                        <option value="">-- Select Rescuer --</option>
                                        <?php
                                        $rescuers->data_seek(0);
                                        while ($r = $rescuers->fetch_assoc()):
                                        ?>
                                            <option value="<?php echo $r['id']; ?>" <?php echo $req['assigned_rescuer_id'] == $r['id'] ? 'selected' : ''; ?>>
                                                <?php echo htmlspecialchars($r['full_name']); ?> (<?php echo $r['division']; ?>)
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small fw-bold">Admin Notes</label>
                                    <textarea name="admin_notes" class="form-control form-control-sm" rows="3"><?php echo htmlspecialchars($req['admin_notes']); ?></textarea>
                                </div>
                                <button type="submit" name="update_request" class="btn btn-primary btn-sm w-100">
                                    <i class="bi bi-check-circle me-1"></i>Update Request
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

            <?php if ($requests->num_rows == 0): ?>
                <div class="text-center py-5">
                    <i class="bi bi-inbox" style="font-size: 3rem; color: #dee2e6;"></i>
                    <p class="text-muted mt-3">No rescue requests found</p>
                </div>
            <?php endif; ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php $mysqli->close(); ?>