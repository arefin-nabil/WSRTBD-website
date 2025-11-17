<?php
session_start();
// Simple admin authentication - you should improve this with proper admin login
if (!isset($_SESSION['admin_logged_in'])) {
  // Simple password check - CHANGE THIS PASSWORD!
  if (isset($_POST['admin_password']) && $_POST['admin_password'] == 'WSRTBD@2025') {
    $_SESSION['admin_logged_in'] = true;
  } else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin Login - WSRTBD</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    </head>

    <body class="bg-dark">
      <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
          <div class="col-md-4">
            <div class="card shadow">
              <div class="card-body p-5">
                <h3 class="text-center mb-4">Admin Login</h3>
                <form method="POST">
                  <div class="mb-3">
                    <label class="form-label">Admin Password</label>
                    <input type="password" name="admin_password" class="form-control" required>
                  </div>
                  <button type="submit" class="btn btn-success w-100">Login</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>

    </html>
<?php
    exit();
  }
}

require_once "db.php";

// Handle verification actions
if (isset($_POST['action']) && isset($_POST['rescuer_id'])) {
  $rescuer_id = (int)$_POST['rescuer_id'];
  $action = $_POST['action'];

  if ($action == 'verify') {
    $stmt = $mysqli->prepare("UPDATE rescuers SET verification_status = 'verified', verified_at = NOW() WHERE id = ?");
  } elseif ($action == 'reject') {
    $stmt = $mysqli->prepare("UPDATE rescuers SET verification_status = 'rejected' WHERE id = ?");
  } elseif ($action == 'pending') {
    $stmt = $mysqli->prepare("UPDATE rescuers SET verification_status = 'pending', verified_at = NULL WHERE id = ?");
  }

  if (isset($stmt)) {
    $stmt->bind_param("i", $rescuer_id);
    $stmt->execute();
    $stmt->close();
  }
}

// Fetch all rescuers
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
$where = '';
if ($filter == 'pending') {
  $where = "WHERE verification_status = 'pending'";
} elseif ($filter == 'verified') {
  $where = "WHERE verification_status = 'verified'";
} elseif ($filter == 'rejected') {
  $where = "WHERE verification_status = 'rejected'";
}

$sql = "SELECT id, full_name, email, phone, division, experience, certificate_id, verification_status, created_at 
        FROM rescuers $where ORDER BY created_at DESC";
$result = $mysqli->query($sql);

// Count statistics
$stats = $mysqli->query("SELECT 
    COUNT(*) as total,
    SUM(CASE WHEN verification_status = 'pending' THEN 1 ELSE 0 END) as pending,
    SUM(CASE WHEN verification_status = 'verified' THEN 1 ELSE 0 END) as verified,
    SUM(CASE WHEN verification_status = 'rejected' THEN 1 ELSE 0 END) as rejected
    FROM rescuers")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - WSRTBD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <link rel="icon" type="image/png" href="/wsrtbd.png">

  <style>
    body {
      background-color: #f8f9fa;
    }

    .stat-card {
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
    }

    .badge-custom {
      padding: 8px 15px;
      border-radius: 20px;
      font-weight: 600;
    }

    .action-btn {
      padding: 5px 15px;
      font-size: 0.85rem;
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
  <!-- <nav class="navbar navbar-dark bg-success">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">WSRTBD - Admin Panel</span>
      <a href="?logout=1" class="btn btn-light btn-sm">Logout</a>
    </div>
  </nav> -->

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
            <a class="nav-link active" href="profile.php">Admin</a>
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
    <h3 class="mb-4">Rescuer Verification Management</h3>

    <!-- Statistics Cards -->
    <div class="row mb-4">
      <div class="col-md-3">
        <div class="stat-card bg-primary text-white">
          <h3><?php echo $stats['total']; ?></h3>
          <p class="mb-0">Total Rescuers</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="stat-card bg-warning text-dark">
          <h3><?php echo $stats['pending']; ?></h3>
          <p class="mb-0">Pending</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="stat-card bg-success text-white">
          <h3><?php echo $stats['verified']; ?></h3>
          <p class="mb-0">Verified</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="stat-card bg-danger text-white">
          <h3><?php echo $stats['rejected']; ?></h3>
          <p class="mb-0">Rejected</p>
        </div>
      </div>
    </div>

    <!-- Filter Buttons -->
    <div class="btn-group mb-4" role="group">
      <a href="?filter=all" class="btn <?php echo $filter == 'all' ? 'btn-primary' : 'btn-outline-primary'; ?>">
        All (<?php echo $stats['total']; ?>)
      </a>
      <a href="?filter=pending" class="btn <?php echo $filter == 'pending' ? 'btn-warning' : 'btn-outline-warning'; ?>">
        Pending (<?php echo $stats['pending']; ?>)
      </a>
      <a href="?filter=verified" class="btn <?php echo $filter == 'verified' ? 'btn-success' : 'btn-outline-success'; ?>">
        Verified (<?php echo $stats['verified']; ?>)
      </a>
      <a href="?filter=rejected" class="btn <?php echo $filter == 'rejected' ? 'btn-danger' : 'btn-outline-danger'; ?>">
        Rejected (<?php echo $stats['rejected']; ?>)
      </a>
    </div>

    <!-- Rescuers Table -->
    <div class="card shadow">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead class="table-light">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Division</th>
                <th>Experience</th>
                <th>Certificate ID</th>
                <th>Status</th>
                <th>Registered</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($result->num_rows > 0): ?>
                <?php while ($rescuer = $result->fetch_assoc()): ?>
                  <tr>
                    <td><?php echo $rescuer['id']; ?></td>
                    <td><strong><?php echo htmlspecialchars($rescuer['full_name']); ?></strong></td>
                    <td><?php echo htmlspecialchars($rescuer['email']); ?></td>
                    <td><?php echo htmlspecialchars($rescuer['phone']); ?></td>
                    <td><?php echo htmlspecialchars($rescuer['division']); ?></td>
                    <td><?php echo htmlspecialchars($rescuer['experience']); ?></td>
                    <td><?php echo htmlspecialchars($rescuer['certificate_id']); ?></td>
                    <td>
                      <?php if ($rescuer['verification_status'] == 'verified'): ?>
                        <span class="badge bg-success badge-custom">
                          <i class="bi bi-check-circle-fill"></i> Verified
                        </span>
                      <?php elseif ($rescuer['verification_status'] == 'rejected'): ?>
                        <span class="badge bg-danger badge-custom">
                          <i class="bi bi-x-circle-fill"></i> Rejected
                        </span>
                      <?php else: ?>
                        <span class="badge bg-warning badge-custom">
                          <i class="bi bi-clock-fill"></i> Pending
                        </span>
                      <?php endif; ?>
                    </td>
                    <td><?php echo date('d M Y', strtotime($rescuer['created_at'])); ?></td>
                    <td>
                      <form method="POST" style="display: inline;">
                        <input type="hidden" name="rescuer_id" value="<?php echo $rescuer['id']; ?>">
                        <?php if ($rescuer['verification_status'] != 'verified'): ?>
                          <button type="submit" name="action" value="verify" class="btn btn-success btn-sm action-btn" onclick="return confirm('Verify this rescuer?')">
                            <i class="bi bi-check-lg"></i> Verify
                          </button>
                        <?php endif; ?>
                        <?php if ($rescuer['verification_status'] != 'rejected'): ?>
                          <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm action-btn" onclick="return confirm('Reject this rescuer?')">
                            <i class="bi bi-x-lg"></i> Reject
                          </button>
                        <?php endif; ?>
                        <?php if ($rescuer['verification_status'] != 'pending'): ?>
                          <button type="submit" name="action" value="pending" class="btn btn-secondary btn-sm action-btn" onclick="return confirm('Set to pending?')">
                            <i class="bi bi-arrow-clockwise"></i> Pending
                          </button>
                        <?php endif; ?>
                      </form>
                    </td>
                  </tr>
                <?php endwhile; ?>
              <?php else: ?>
                <tr>
                  <td colspan="10" class="text-center text-muted py-4">
                    No rescuers found
                  </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$mysqli->close();

// Handle logout
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: admin_verify_rescuers.php");
  exit();
}
?>