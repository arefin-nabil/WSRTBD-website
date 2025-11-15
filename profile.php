<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['rescuer_id'])) {
    header("Location: rescuer_registration.php");
    exit();
}

// Database connection
$conn = new mysqli("localhost", "root", "", "wsrtbd");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch rescuer data
$rescuer_id = $_SESSION['rescuer_id'];
$sql = "SELECT * FROM rescuers WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $rescuer_id);
$stmt->execute();
$result = $stmt->get_result();
$rescuer = $result->fetch_assoc();

// Fetch rescue activities
$rescue_sql = "SELECT * FROM rescue_activities WHERE rescuer_id = ? ORDER BY rescue_date DESC";
$rescue_stmt = $conn->prepare($rescue_sql);
$rescue_stmt->bind_param("i", $rescuer_id);
$rescue_stmt->execute();
$rescue_result = $rescue_stmt->get_result();

// Calculate statistics
$stats_sql = "SELECT 
    COUNT(*) as total_rescues,
    SUM(CASE WHEN rescue_type = 'Snake Rescue' THEN 1 ELSE 0 END) as snake_rescues,
    SUM(CASE WHEN rescue_type = 'Bird Rescue' THEN 1 ELSE 0 END) as bird_rescues,
    SUM(CASE WHEN rescue_type NOT IN ('Snake Rescue', 'Bird Rescue') THEN 1 ELSE 0 END) as other_rescues
    FROM rescue_activities WHERE rescuer_id = ?";
$stats_stmt = $conn->prepare($stats_sql);
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
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">


            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="wsrtbd.png" alt="WSRTBD Logo" />
                <span class="ms-2">WSRTBD</span>
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

    <!-- Profile Header -->
    <div class="profile-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <div class="profile-avatar mx-auto">
                        <i class="bi bi-person-circle"></i>
                    </div>
                </div>
                <div class="col-md-9 text-center text-md-start mt-3 mt-md-0">
                    <h2><?php echo htmlspecialchars($rescuer['full_name']); ?></h2>
                    <p class="mb-2"><i class="bi bi-envelope me-2"></i><?php echo htmlspecialchars($rescuer['email']); ?></p>
                    <p class="mb-2"><i class="bi bi-telephone me-2"></i><?php echo htmlspecialchars($rescuer['phone']); ?></p>
                    <p class="mb-0"><i class="bi bi-geo-alt me-2"></i><?php echo htmlspecialchars($rescuer['division']); ?></p>
                    <span class="badge badge-status badge-approved mt-2">
                        <i class="bi bi-check-circle me-1"></i>Approved Rescuer
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="container mb-5">
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $stats['total_rescues'] ?? 0; ?></div>
                    <div class="stat-label">Total Rescues</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $stats['snake_rescues'] ?? 0; ?></div>
                    <div class="stat-label">Snake Rescues</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $stats['bird_rescues'] ?? 0; ?></div>
                    <div class="stat-label">Bird Rescues</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $stats['other_rescues'] ?? 0; ?></div>
                    <div class="stat-label">Other Rescues</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Left Column - Personal Info -->
            <div class="col-lg-4 mb-4">
                <div class="info-card">
                    <h5><i class="bi bi-person-circle me-2"></i>Personal Information</h5>
                    <div class="info-row">
                        <div class="info-label">Full Name:</div>
                        <div class="info-value"><?php echo htmlspecialchars($rescuer['full_name']); ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Date of Birth:</div>
                        <div class="info-value"><?php echo date('F d, Y', strtotime($rescuer['dob'])); ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Gender:</div>
                        <div class="info-value"><?php echo htmlspecialchars($rescuer['gender']); ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">National ID:</div>
                        <div class="info-value"><?php echo htmlspecialchars($rescuer['national_id']); ?></div>
                    </div>
                </div>

                <div class="info-card">
                    <h5><i class="bi bi-geo-alt-fill me-2"></i>Location Details</h5>
                    <div class="info-row">
                        <div class="info-label">Division:</div>
                        <div class="info-value"><?php echo htmlspecialchars($rescuer['division']); ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Full Address:</div>
                        <div class="info-value"><?php echo htmlspecialchars($rescuer['full_address']); ?></div>
                    </div>
                </div>

                <div class="info-card">
                    <h5><i class="bi bi-award-fill me-2"></i>Experience</h5>
                    <div class="info-row">
                        <div class="info-label">Experience:</div>
                        <div class="info-value"><?php echo htmlspecialchars($rescuer['experience']); ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Certificate ID:</div>
                        <div class="info-value"><?php echo htmlspecialchars($rescuer['certificate_id'] ?: 'N/A'); ?></div>
                    </div>
                    <div class="info-row">
                        <div class="info-label">Joined Date:</div>
                        <div class="info-value"><?php echo date('F d, Y', strtotime($rescuer['created_at'])); ?></div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Rescue Activities -->
            <div class="col-lg-8">
                <div class="info-card">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0"><i class="bi bi-clipboard-check me-2"></i>Rescue Activities</h5>
                        <button class="btn btn-primary btn-add-rescue" data-bs-toggle="modal" data-bs-target="#addRescueModal">
                            <i class="bi bi-plus-circle me-2"></i>Add Rescue Info
                        </button>
                    </div>

                    <!-- Rescue List -->
                    <div id="rescueList">
                        <?php if ($rescue_result->num_rows > 0): ?>
                            <?php while ($rescue = $rescue_result->fetch_assoc()): ?>
                                <?php
                                // Determine type color
                                $typeStyle = 'background: #e7f5e9; color: #167923;';
                                if (strpos($rescue['rescue_type'], 'Bird') !== false) {
                                    $typeStyle = 'background: #fff3cd; color: #856404;';
                                } elseif (strpos($rescue['rescue_type'], 'Mammal') !== false) {
                                    $typeStyle = 'background: #d1ecf1; color: #0c5460;';
                                }
                                ?>
                                <div class="rescue-card">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <span class="rescue-type" style="<?php echo $typeStyle; ?>">
                                                <?php echo htmlspecialchars($rescue['rescue_type']); ?>
                                            </span>
                                            <h6 class="mt-2 mb-1"><?php echo htmlspecialchars(substr($rescue['description'], 0, 50)); ?>...</h6>
                                        </div>
                                        <small class="rescue-date"><?php echo date('M d, Y', strtotime($rescue['rescue_date'])); ?></small>
                                    </div>
                                    <p class="mb-2 small">
                                        <i class="bi bi-geo-alt me-1"></i><?php echo htmlspecialchars($rescue['location']); ?>
                                    </p>
                                    <?php if (!empty($rescue['species_name'])): ?>
                                        <p class="mb-2 small">
                                            <strong>Species:</strong> <?php echo htmlspecialchars($rescue['species_name']); ?>
                                            <?php if (!empty($rescue['size'])): ?>
                                                (<?php echo htmlspecialchars($rescue['size']); ?>)
                                            <?php endif; ?>
                                        </p>
                                    <?php endif; ?>
                                    <p class="mb-0 text-muted small"><?php echo htmlspecialchars($rescue['description']); ?></p>
                                    <?php if (!empty($rescue['notes'])): ?>
                                        <p class="mb-0 text-muted small mt-2"><em><?php echo htmlspecialchars($rescue['notes']); ?></em></p>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <!-- Empty State -->
                            <div class="empty-state">
                                <i class="bi bi-inbox"></i>
                                <h5>No Rescue Activities Yet</h5>
                                <p>Start adding your rescue activities by clicking the button above.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Rescue Modal -->
    <div class="modal fade" id="addRescueModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title"><i class="bi bi-plus-circle me-2"></i>Add Rescue Information</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="addRescueForm" method="POST" action="add_rescue.php" enctype="multipart/form-data">

                        <!-- Rescue Type -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Rescue Type *</label>
                                <select class="form-select" name="rescue_type" required>
                                    <option selected disabled>Select rescue type</option>
                                    <option value="Snake Rescue">Snake Rescue</option>
                                    <option value="Bird Rescue">Bird Rescue</option>
                                    <option value="Mammal Rescue">Mammal Rescue</option>
                                    <option value="Reptile Rescue">Reptile Rescue</option>
                                    <option value="Other Wildlife">Other Wildlife</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Date of Rescue *</label>
                                <input type="date" class="form-control" name="rescue_date" max="<?php echo date('Y-m-d'); ?>" required />
                            </div>
                        </div>

                        <!-- Species Details -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Species Name</label>
                                <input type="text" class="form-control" name="species_name" placeholder="e.g., Cobra, Sparrow" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Estimated Size/Age</label>
                                <input type="text" class="form-control" name="size" placeholder="e.g., 4 feet, 2 months old" />
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Rescue Location *</label>
                            <input type="text" class="form-control" name="location" placeholder="Area, District" required />
                        </div>

                        <!-- Condition -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Animal Condition *</label>
                            <select class="form-select" name="condition" required>
                                <option selected disabled>Select condition</option>
                                <option value="Healthy">Healthy</option>
                                <option value="Injured">Injured</option>
                                <option value="Sick">Sick</option>
                                <option value="Distressed">Distressed</option>
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Rescue Description *</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Describe the rescue situation, actions taken, and outcome..." required></textarea>
                        </div>

                        <!-- Action Taken -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Action Taken *</label>
                            <select class="form-select" name="action" required>
                                <option selected disabled>Select action</option>
                                <option value="Released to Natural Habitat">Released to Natural Habitat</option>
                                <option value="Transferred to Wildlife Center">Transferred to Wildlife Center</option>
                                <option value="Provided First Aid & Released">Provided First Aid & Released</option>
                                <option value="Under Medical Care">Under Medical Care</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- Photo Upload (Optional) -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Upload Photo (Optional)</label>
                            <input type="file" class="form-control" name="rescue_photo" accept="image/*" />
                            <small class="text-muted">Max file size: 5MB</small>
                        </div>

                        <!-- Additional Notes -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Additional Notes</label>
                            <textarea class="form-control" name="notes" rows="2" placeholder="Any additional information..."></textarea>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success flex-grow-1">
                                <i class="bi bi-check-circle me-2"></i>Submit Rescue Info
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-body text-center">
                    <div class="text-success mb-3">
                        <i class="bi bi-check-circle" style="font-size: 4rem;"></i>
                    </div>
                    <h4 class="text-success mb-2">Rescue Info Added!</h4>
                    <p>Your rescue activity has been successfully recorded.</p>
                    <button class="btn btn-success mt-3" onclick="window.location.href='profile.php'">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
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
                    <p><a href="https://www.facebook.com/wsrtbd" class="text-light me-3" target="_blank"><i class="bi bi-facebook"></i> Facebook Page</a></p>
                    <p><a href="https://www.facebook.com/groups/www.wsrtbd.epizy.co" class="text-light" target="_blank"><i class="bi bi-facebook"></i> Facebook Group</a></p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Get Our App</h5>
                    <a href="https://play.google.com/store/apps/details?id=com.binarybardbd.snakesofbangladesh" class="btn btn-primary mb-2" target="_blank">Download App</a>
                    <p class="small mt-2">Available on Android now.</p>
                </div>
            </div>
            <hr class="bg-light" />
            <div class="text-center small">
                &copy; 2025 Wildlife and Snake Rescue Team in Bangladesh (WSRTBD). All rights reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Show success modal if rescue was added
        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            const successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        <?php endif; ?>
    </script>
</body>

</html>

<?php
$conn->close();
?>