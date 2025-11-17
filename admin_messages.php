<?php
session_start();
require_once "db.php";

// Simple admin authentication
if (!isset($_SESSION['admin_logged_in'])) {
    if (isset($_POST['admin_password']) && $_POST['admin_password'] == 'WSRTBD@2025') {
        $_SESSION['admin_logged_in'] = true;
    } else {
        header("Location: admin.php");
        exit();
    }
}

// Handle status updates
if (isset($_POST['update_message']) && isset($_POST['message_id'])) {
    $message_id = (int)$_POST['message_id'];
    $status = $_POST['status'];
    $assigned_rescuer = !empty($_POST['assigned_rescuer']) ? (int)$_POST['assigned_rescuer'] : NULL;
    $admin_notes = trim($_POST['admin_notes']);

    $stmt = $mysqli->prepare("UPDATE contact_messages SET status = ?, assigned_rescuer_id = ?, admin_notes = ? WHERE id = ?");
    $stmt->bind_param("sisi", $status, $assigned_rescuer, $admin_notes, $message_id);
    $stmt->execute();
    $stmt->close();

    header("Location: admin_messages.php");
    exit();
}

// Fetch statistics
$stats = $mysqli->query("SELECT 
    COUNT(*) as total,
    SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending,
    SUM(CASE WHEN status = 'assigned' THEN 1 ELSE 0 END) as assigned,
    SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as completed,
    SUM(CASE WHEN status = 'noted' THEN 1 ELSE 0 END) as noted
    FROM contact_messages")->fetch_assoc();

// Fetch messages with filter
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
$where = $filter != 'all' ? "WHERE status = '$filter'" : '';

$sql = "SELECT cm.*, r.full_name as rescuer_name 
        FROM contact_messages cm 
        LEFT JOIN rescuers r ON cm.assigned_rescuer_id = r.id 
        $where 
        ORDER BY cm.created_at DESC";
$messages = $mysqli->query($sql);

// Fetch verified rescuers for assignment
$rescuers = $mysqli->query("SELECT id, full_name, phone FROM rescuers WHERE verification_status = 'verified' ORDER BY full_name");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Messages - WSRTBD Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="icon" type="image/png" href="/wsrtbd.png">
    <style>
        body {
            padding-top: 66px;
            background-color: #f8f9fa;
        }

        .stat-card {
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            color: white;
        }

        .message-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .badge-status {
            padding: 6px 12px;
            border-radius: 20px;
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
                        <a class="nav-link active" href="admin_messages.php">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_rescue_requests.php">Rescue Requests</a>
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
        <h3 class="mb-4">Contact Messages Management</h3>

        <!-- Statistics -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stat-card" style="background: #007bff;">
                    <h3><?php echo $stats['total']; ?></h3>
                    <p class="mb-0">Total Messages</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card" style="background: #ffc107;">
                    <h3><?php echo $stats['pending']; ?></h3>
                    <p class="mb-0">Pending</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card" style="background: #17a2b8;">
                    <h3><?php echo $stats['assigned']; ?></h3>
                    <p class="mb-0">Assigned</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card" style="background: #28a745;">
                    <h3><?php echo $stats['completed']; ?></h3>
                    <p class="mb-0">Completed</p>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="btn-group mb-4">
            <a href="?filter=all" class="btn <?php echo $filter == 'all' ? 'btn-primary' : 'btn-outline-primary'; ?>">All</a>
            <a href="?filter=pending" class="btn <?php echo $filter == 'pending' ? 'btn-warning' : 'btn-outline-warning'; ?>">Pending</a>
            <a href="?filter=assigned" class="btn <?php echo $filter == 'assigned' ? 'btn-info' : 'btn-outline-info'; ?>">Assigned</a>
            <a href="?filter=completed" class="btn <?php echo $filter == 'completed' ? 'btn-success' : 'btn-outline-success'; ?>">Completed</a>
            <a href="?filter=noted" class="btn <?php echo $filter == 'noted' ? 'btn-secondary' : 'btn-outline-secondary'; ?>">Noted</a>
        </div>

        <!-- Messages List -->
        <?php while ($msg = $messages->fetch_assoc()): ?>
            <div class="message-card">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="mb-1"><?php echo htmlspecialchars($msg['full_name']); ?></h5>
                            <span class="badge-status 
                            <?php
                            echo $msg['status'] == 'pending' ? 'bg-warning' : ($msg['status'] == 'assigned' ? 'bg-info' : ($msg['status'] == 'completed' ? 'bg-success' : 'bg-secondary'));
                            ?>">
                                <?php echo ucfirst($msg['status']); ?>
                            </span>
                        </div>
                        <p class="mb-1"><i class="bi bi-telephone me-2"></i><?php echo htmlspecialchars($msg['phone']); ?></p>
                        <p class="mb-1"><i class="bi bi-envelope me-2"></i><?php echo htmlspecialchars($msg['email']); ?></p>
                        <p class="mb-2"><strong>Subject:</strong> <?php echo htmlspecialchars($msg['subject']); ?></p>
                        <p class="text-muted"><?php echo nl2br(htmlspecialchars($msg['message'])); ?></p>
                        <?php if ($msg['rescuer_name']): ?>
                            <p class="mb-1"><i class="bi bi-person-check me-2"></i><strong>Assigned to:</strong> <?php echo htmlspecialchars($msg['rescuer_name']); ?></p>
                        <?php endif; ?>
                        <?php if ($msg['admin_notes']): ?>
                            <p class="mb-0"><i class="bi bi-sticky me-2"></i><strong>Notes:</strong> <?php echo nl2br(htmlspecialchars($msg['admin_notes'])); ?></p>
                        <?php endif; ?>
                        <small class="text-muted">Received: <?php echo date('d M Y, h:i A', strtotime($msg['created_at'])); ?></small>
                    </div>
                    <div class="col-md-4">
                        <form method="POST">
                            <input type="hidden" name="message_id" value="<?php echo $msg['id']; ?>">
                            <div class="mb-2">
                                <label class="form-label small">Status</label>
                                <select name="status" class="form-select form-select-sm">
                                    <option value="pending" <?php echo $msg['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                    <option value="assigned" <?php echo $msg['status'] == 'assigned' ? 'selected' : ''; ?>>Assigned</option>
                                    <option value="completed" <?php echo $msg['status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
                                    <option value="noted" <?php echo $msg['status'] == 'noted' ? 'selected' : ''; ?>>Noted</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label small">Assign Rescuer</label>
                                <select name="assigned_rescuer" class="form-select form-select-sm">
                                    <option value="">-- None --</option>
                                    <?php
                                    $rescuers->data_seek(0);
                                    while ($r = $rescuers->fetch_assoc()):
                                    ?>
                                        <option value="<?php echo $r['id']; ?>" <?php echo $msg['assigned_rescuer_id'] == $r['id'] ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($r['full_name']); ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label small">Admin Notes</label>
                                <textarea name="admin_notes" class="form-control form-control-sm" rows="2"><?php echo htmlspecialchars($msg['admin_notes']); ?></textarea>
                            </div>
                            <button type="submit" name="update_message" class="btn btn-primary btn-sm w-100">
                                <i class="bi bi-check-circle me-1"></i>Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

        <?php if ($messages->num_rows == 0): ?>
            <div class="text-center py-5">
                <i class="bi bi-inbox" style="font-size: 3rem; color: #dee2e6;"></i>
                <p class="text-muted mt-3">No messages found</p>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php $mysqli->close(); ?>