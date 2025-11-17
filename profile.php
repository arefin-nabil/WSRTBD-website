<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once "db.php";

// Check if user is logged in
if (!isset($_SESSION['rescuer_id'])) {
    header("Location: rescuers.php");
    exit();
}

// Fetch rescuer data
$rescuer_id = $_SESSION['rescuer_id'];
$sql = "SELECT * FROM rescuers WHERE id = ?";
$stmt = $mysqli->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $mysqli->error);
}
$stmt->bind_param("i", $rescuer_id);
$stmt->execute();
$result = $stmt->get_result();
$rescuer = $result->fetch_assoc();

if (!$rescuer) {
    session_destroy();
    header("Location: rescuers.php");
    exit();
}

// Pagination for rescue activities
$per_page = 10;
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;

// Count total rescue activities
$count_sql = "SELECT COUNT(*) as total FROM rescue_activities WHERE rescuer_id = ?";
$count_stmt = $mysqli->prepare($count_sql);
$count_stmt->bind_param("i", $rescuer_id);
$count_stmt->execute();
$total_result = $count_stmt->get_result();
$total_count = $total_result->fetch_assoc()['total'];
$total_pages = max(1, ceil($total_count / $per_page));

// Ensure current page is within bounds
if ($page > $total_pages) {
    $page = $total_pages;
}
$offset = ($page - 1) * $per_page;

// Fetch rescue activities with pagination
$rescue_sql = "SELECT * FROM rescue_activities WHERE rescuer_id = ? ORDER BY rescue_date DESC LIMIT ? OFFSET ?";
$rescue_stmt = $mysqli->prepare($rescue_sql);
if (!$rescue_stmt) {
    die("Prepare failed: " . $mysqli->error);
}
$rescue_stmt->bind_param("iii", $rescuer_id, $per_page, $offset);
$rescue_stmt->execute();
$rescue_result = $rescue_stmt->get_result();

// Calculate statistics (total counts, not paginated)
$stats_sql = "SELECT 
    COUNT(*) as total_rescues,
    SUM(CASE WHEN rescue_type = 'Snake Rescue' THEN 1 ELSE 0 END) as snake_rescues,
    SUM(CASE WHEN rescue_type = 'Bird Rescue' THEN 1 ELSE 0 END) as bird_rescues,
    SUM(CASE WHEN rescue_type NOT IN ('Snake Rescue', 'Bird Rescue') THEN 1 ELSE 0 END) as other_rescues
    FROM rescue_activities WHERE rescuer_id = ?";
$stats_stmt = $mysqli->prepare($stats_sql);
if (!$stats_stmt) {
    die("Prepare failed: " . $mysqli->error);
}
$stats_stmt->bind_param("i", $rescuer_id);
$stats_stmt->execute();
$stats = $stats_stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rescuer Profile - WSRTBD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="/wsrtbd.png">

    <style>
        body {
            font-family: "SolaimanLipi", sans-serif;
            padding-top: 66px;
            background-color: #fffdf3;
            min-height: 100vh;
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

        .profile-header {
            background: linear-gradient(135deg, #167923 0%, #158a1b 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid white;
            object-fit: cover;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: #167923;
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #167923;
        }

        .stat-card .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .info-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .info-card h5 {
            color: #167923;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e9ecef;
        }

        .info-row {
            display: flex;
            padding: 12px 0;
            border-bottom: 1px solid #f8f9fa;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: #495057;
            width: 180px;
            flex-shrink: 0;
        }

        .info-value {
            color: #6c757d;
            flex-grow: 1;
        }

        .rescue-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #167923;
        }

        .rescue-card .rescue-date {
            color: #6c757d;
            font-size: 0.85rem;
        }

        .rescue-card .rescue-type {
            background: #e7f5e9;
            color: #167923;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .btn-add-rescue {
            background: linear-gradient(135deg, #005600 0%, #46c446 100%);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            transition: transform 0.3s;
        }

        .btn-add-rescue:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 234, 131, 0.4);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0e640e;
            box-shadow: 0 0 0 0.2rem rgba(42, 82, 152, 0.25);
        }

        .badge-status {
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
        }

        .badge-approved {
            background: #d4edda;
            color: #155724;
        }

        .badge-pending {
            background: #fff3cd;
            color: #856404;
        }

        footer {
            background: #1a1a2e;
            margin-top: 50px;
        }

        footer h5 {
            color: #fff;
            font-weight: bold;
            margin-bottom: 20px;
        }

        footer a {
            color: #adb5bd;
            text-decoration: none;
            transition: color 0.3s;
        }

        footer a:hover {
            color: #fff;
        }

        .modal-content {
            border-radius: 15px;
        }

        .empty-state {
            text-align: center;
            padding: 50px 20px;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
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
                        <a class="nav-link active" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- PROFILE HEADER -->
    <section class="profile-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <div class="profile-avatar mx-auto">
                        <i class="bi bi-person-circle"></i>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="d-flex align-items-center mb-2">
                        <h2 class="fw-bold mb-0 me-3"><?php echo htmlspecialchars($rescuer['full_name']); ?></h2>
                        <?php if ($rescuer['verification_status'] == 'verified'): ?>
                            <span class="badge-status badge-approved">
                                <i class="bi bi-check-circle-fill me-1"></i>Verified
                            </span>
                        <?php elseif ($rescuer['verification_status'] == 'rejected'): ?>
                            <span class="badge-status" style="background: #f8d7da; color: #721c24;">
                                <i class="bi bi-x-circle-fill me-1"></i>Rejected
                            </span>
                        <?php else: ?>
                            <span class="badge-status badge-pending">
                                <i class="bi bi-clock-fill me-1"></i>Pending Verification
                            </span>
                        <?php endif; ?>
                    </div>
                    <p class="mb-1"><i class="bi bi-envelope me-2"></i><?php echo htmlspecialchars($rescuer['email']); ?></p>
                    <p class="mb-1"><i class="bi bi-telephone me-2"></i><?php echo htmlspecialchars($rescuer['phone']); ?></p>
                    <p class="mb-0"><i class="bi bi-geo-alt me-2"></i><?php echo htmlspecialchars($rescuer['division']); ?></p>
                </div>
            </div>
        </div>
    </section>

    <?php if ($rescuer['verification_status'] == 'pending'): ?>
        <!-- PENDING VERIFICATION ALERT -->
        <div class="container mt-4">
            <div class="alert alert-warning" role="alert">
                <h5 class="alert-heading"><i class="bi bi-exclamation-triangle-fill me-2"></i>Account Pending Verification</h5>
                <p class="mb-0">Your account is currently under review. You'll be able to add rescue activities once your account is verified by our admin team. This usually takes 1-3 business days.</p>
            </div>
        </div>
    <?php elseif ($rescuer['verification_status'] == 'rejected'): ?>
        <!-- REJECTED ALERT -->
        <div class="container mt-4">
            <div class="alert alert-danger" role="alert">
                <h5 class="alert-heading"><i class="bi bi-x-circle-fill me-2"></i>Account Verification Rejected</h5>
                <p class="mb-0">Unfortunately, your account verification was not approved. Please contact our support team at wsrtbd@gmail.com for more information.</p>
            </div>
        </div>
    <?php endif; ?>

    <!-- STATISTICS -->
    <section class="py-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number"><?php echo $stats['total_rescues']; ?></div>
                        <div class="stat-label">Total Rescues</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number"><?php echo $stats['snake_rescues']; ?></div>
                        <div class="stat-label">Snake Rescues</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number"><?php echo $stats['bird_rescues']; ?></div>
                        <div class="stat-label">Bird Rescues</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number"><?php echo $stats['other_rescues']; ?></div>
                        <div class="stat-label">Other Rescues</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PROFILE INFO & RESCUE ACTIVITIES -->
    <section class="py-4">
        <div class="container">
            <div class="row">
                <!-- Personal Information -->
                <div class="col-lg-5 mb-4">
                    <div class="info-card">
                        <h5><i class="bi bi-person-lines-fill me-2"></i>Personal Information</h5>
                        <div class="info-row">
                            <div class="info-label">Full Name</div>
                            <div class="info-value"><?php echo htmlspecialchars($rescuer['full_name']); ?></div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Date of Birth</div>
                            <div class="info-value"><?php echo htmlspecialchars($rescuer['dob']); ?></div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Gender</div>
                            <div class="info-value"><?php echo htmlspecialchars($rescuer['gender']); ?></div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">National ID</div>
                            <div class="info-value"><?php echo htmlspecialchars($rescuer['national_id']); ?></div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Division</div>
                            <div class="info-value"><?php echo htmlspecialchars($rescuer['division']); ?></div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Full Address</div>
                            <div class="info-value"><?php echo htmlspecialchars($rescuer['full_address']); ?></div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Phone</div>
                            <div class="info-value"><?php echo htmlspecialchars($rescuer['phone']); ?></div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Email</div>
                            <div class="info-value"><?php echo htmlspecialchars($rescuer['email']); ?></div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Experience</div>
                            <div class="info-value"><?php echo htmlspecialchars($rescuer['experience']); ?></div>
                        </div>
                        <div class="info-row">
                            <div class="info-label">Certificate ID</div>
                            <div class="info-value"><?php echo htmlspecialchars($rescuer['certificate_id']); ?></div>
                        </div>
                    </div>
                </div>

                <!-- Rescue Activities -->
                <div class="col-lg-7">
                    <div class="info-card">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0"><i class="bi bi-clipboard-data me-2"></i>Rescue Activities</h5>
                            <button class="btn btn-success btn-sm btn-add-rescue" data-bs-toggle="modal" data-bs-target="#addRescueModal">
                                <i class="bi bi-plus-circle me-1"></i> Add Rescue
                            </button>
                        </div>

                        <?php if ($rescue_result->num_rows > 0): ?>
                            <?php while ($rescue = $rescue_result->fetch_assoc()): ?>
                                <div class="rescue-card">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <span class="rescue-type"><?php echo htmlspecialchars($rescue['rescue_type']); ?></span>
                                            <h6 class="mt-2 mb-1"><?php echo htmlspecialchars($rescue['species_name']); ?></h6>
                                        </div>
                                        <span class="rescue-date">
                                            <i class="bi bi-calendar3 me-1"></i>
                                            <?php echo date('d M Y', strtotime($rescue['rescue_date'])); ?>
                                        </span>
                                    </div>
                                    <p class="mb-2 small"><i class="bi bi-geo-alt me-1"></i><?php echo htmlspecialchars($rescue['location']); ?></p>
                                    <p class="mb-2 small text-muted"><?php echo htmlspecialchars($rescue['description']); ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="small"><strong>Size:</strong> <?php echo htmlspecialchars($rescue['size']); ?></span>
                                        <span class="small"><strong>Condition:</strong> <?php echo htmlspecialchars($rescue['condition']); ?></span>
                                        <span class="small"><strong>Action:</strong> <?php echo htmlspecialchars($rescue['action']); ?></span>
                                    </div>
                                </div>
                            <?php endwhile; ?>

                            <!-- PAGINATION -->
                            <?php if ($total_pages > 1): ?>
                                <nav aria-label="Rescue activities pagination" class="mt-4">
                                    <ul class="pagination justify-content-center">
                                        <!-- Previous -->
                                        <?php if ($page > 1): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
                                            </li>
                                        <?php endif; ?>

                                        <!-- Page numbers -->
                                        <?php
                                        $start = max(1, $page - 2);
                                        $end = min($total_pages, $page + 2);

                                        if ($start > 1): ?>
                                            <li class="page-item disabled"><span class="page-link">...</span></li>
                                        <?php endif;

                                        for ($i = $start; $i <= $end; $i++): ?>
                                            <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                            </li>
                                        <?php endfor;

                                        if ($end < $total_pages): ?>
                                            <li class="page-item disabled"><span class="page-link">...</span></li>
                                        <?php endif; ?>

                                        <!-- Next -->
                                        <?php if ($page < $total_pages): ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="empty-state">
                                <i class="bi bi-inbox"></i>
                                <p>No rescue activities recorded yet.</p>
                                <button class="btn btn-success btn-add-rescue" data-bs-toggle="modal" data-bs-target="#addRescueModal">
                                    Add Your First Rescue
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Add Rescue Modal -->
    <div class="modal fade" id="addRescueModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Add New Rescue Activity</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addRescueForm" method="POST" action="add_rescue.php" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Rescue Type *</label>
                                <select class="form-select" name="rescue_type" required>
                                    <option value="">Select Type</option>
                                    <option value="Snake Rescue">Snake Rescue</option>
                                    <option value="Bird Rescue">Bird Rescue</option>
                                    <option value="Mammal Rescue">Mammal Rescue</option>
                                    <option value="Reptile Rescue">Reptile Rescue</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Rescue Date *</label>
                                <input type="date" class="form-control" name="rescue_date" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Species Name *</label>
                                <input type="text" class="form-control" name="species_name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Size</label>
                                <input type="text" class="form-control" name="size" placeholder="e.g., 3 feet">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Location *</label>
                                <input type="text" class="form-control" name="location" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Condition *</label>
                                <select class="form-select" name="condition" required>
                                    <option value="">Select Condition</option>
                                    <option value="Healthy">Healthy</option>
                                    <option value="Injured">Injured</option>
                                    <option value="Dead">Dead</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Action Taken *</label>
                                <select class="form-select" name="action" required>
                                    <option value="">Select Action</option>
                                    <option value="Released">Released</option>
                                    <option value="Treated & Released">Treated & Released</option>
                                    <option value="Handed to Authorities">Handed to Authorities</option>
                                    <option value="Under Treatment">Under Treatment</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description *</label>
                                <textarea class="form-control" name="description" rows="3" required></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Notes (Optional)</label>
                                <textarea class="form-control" name="notes" rows="2"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Rescue Photo</label>
                                <input type="file" class="form-control" name="rescue_photo" accept="image/*">
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-success btn-add-rescue w-100">Submit Rescue Activity</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-dark text-light pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>Contact Us</h5>
                    <p><i class="bi bi-telephone"></i> Phone: +880 1722 938276</p>
                    <p><i class="bi bi-envelope"></i> Email: wsrtbd@gmail.com</p>
                    <p><i class="bi bi-geo-alt"></i> Address: Dhaka, Bangladesh</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Follow Us</h5>
                    <p>
                        <a href="https://www.facebook.com/wsrtbd" class="text-light me-3" target="_blank">
                            <i class="bi bi-facebook"></i> Facebook Page
                        </a>
                    </p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Get Our App</h5>
                    <a href="https://play.google.com/store/apps/details?id=com.binarybardbd.snakesofbangladesh" class="btn btn-success mb-2" target="_blank">
                        Download App
                    </a>
                </div>
            </div>
            <hr class="bg-light" />
            <div class="text-center small">
                &copy; 2025 Wildlife and Snake Rescue Team in Bangladesh (WSRTBD). All rights reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$mysqli->close();
?>