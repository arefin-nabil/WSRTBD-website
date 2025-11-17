<?php include 'header.php';
require_once "db.php";

// Pagination settings
$per_page = 20;
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;

// --- Fetch all relevant data (necessary for date-based sorting across tables) ---

// Fetch completed contact messages (rescue requests)
$contact_activities = $mysqli->query("
    SELECT cm.*, r.full_name as rescuer_name, r.phone as rescuer_phone, 'contact_request' as activity_type
    FROM contact_messages cm 
    LEFT JOIN rescuers r ON cm.assigned_rescuer_id = r.id 
    WHERE cm.status IN ('completed', 'assigned')
    ORDER BY cm.updated_at DESC
");

// Fetch rescue requests
$rescue_requests = $mysqli->query("
    SELECT rr.*, r.full_name as rescuer_name, r.division as rescuer_division, 'rescue_request' as activity_type
    FROM rescue_requests rr
    LEFT JOIN rescuers r ON rr.assigned_rescuer_id = r.id
    WHERE rr.status IN ('completed', 'in_progress')
    ORDER BY rr.updated_at DESC
");

// Fetch rescue activities from rescuers
$rescue_activities = $mysqli->query("
    SELECT ra.*, r.full_name as rescuer_name, r.division as rescuer_division, r.phone as rescuer_phone, 'rescue_activity' as activity_type
    FROM rescue_activities ra
    INNER JOIN rescuers r ON ra.rescuer_id = r.id
    WHERE r.verification_status = 'verified'
    ORDER BY ra.rescue_date DESC
");

// Store counts before processing
$stats = [
    'total_rescues' => $rescue_activities->num_rows,
    'rescue_requests' => $rescue_requests->num_rows,
    'completed_messages' => $contact_activities->num_rows
];

// Combine all activities
$all_activities = [];

while ($activity = $contact_activities->fetch_assoc()) {
    $all_activities[] = [
        'type' => 'contact_request',
        'date' => $activity['updated_at'],
        'data' => $activity
    ];
}

while ($activity = $rescue_requests->fetch_assoc()) {
    $all_activities[] = [
        'type' => 'rescue_request',
        'date' => $activity['updated_at'],
        'data' => $activity
    ];
}

while ($activity = $rescue_activities->fetch_assoc()) {
    $all_activities[] = [
        'type' => 'rescue_activity',
        'date' => $activity['rescue_date'],
        'data' => $activity
    ];
}

// Sort by date descending
usort($all_activities, function ($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});

// Calculate pagination parameters AFTER merging & sorting
$total_items = count($all_activities);
$stats['total_activities'] = $total_items;
$total_pages = max(1, ceil($total_items / $per_page));

// Ensure current page is within bounds
if ($page > $total_pages) {
    $page = $total_pages;
}
$offset = ($page - 1) * $per_page;

// Apply pagination (safe slice)
$all_activities = array_slice($all_activities, $offset, $per_page);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Activities - WSRTBD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="/wsrtbd.png">
    <style>
        body {
            font-family: "SolaimanLipi", sans-serif;
            padding-top: 66px;
            background-color: #f8f9fa;
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

        .hero-contact {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url("https://files.binarybardbd.com/Snakesbd/imgs/venom/10-Spot-tailedPitViper2.jpg");
            background-size: cover;
            background-position: center;
            padding: 120px 0;
            color: white;
            text-align: center;
        }

        .page-header {
            background: linear-gradient(135deg, #167923 0%, #158a1b 100%);
            color: white;
            padding: 60px 0;
            margin-bottom: 40px;
        }

        .stat-box {
            background: white;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #167923;
        }

        .stat-label {
            color: #6c757d;
            font-size: 1rem;
        }

        .activity-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .activity-card:hover {
            transform: translateY(-5px);
        }

        .activity-type-badge {
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 10px;
        }

        .badge-rescue {
            background: #e7f5e9;
            color: #167923;
        }

        .badge-request {
            background: #fff3cd;
            color: #856404;
        }

        .activity-date {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .rescuer-info {
            background: #f8f9fa;
            padding: 10px 15px;
            border-radius: 5px;
            margin-top: 10px;
            font-size: 0.9rem;
        }

        footer {
            background: #1a1a2e;
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
    </style>
</head>

<body>
    <!-- HERO SECTION -->
    <section class="hero-contact">
        <div class="container">
            <h1 class="display-4 fw-bold">আমাদের কার্যক্রম</h1>
            <p class="lead">
                বাংলাদেশে বন্যপ্রাণী সুরক্ষায় নিরলস ভাবে চালানো আমাদের কার্যক্রমের একাংশ
            </p>
        </div>
    </section>

    <!-- STATISTICS -->
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-box">
                        <div class="stat-number"><?php echo $stats['total_activities']; ?></div>
                        <div class="stat-label">Total Activities</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-box">
                        <div class="stat-number"><?php echo $stats['rescue_requests']; ?></div>
                        <div class="stat-label">Emergency Requests</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-box">
                        <div class="stat-number"><?php echo $stats['total_rescues']; ?></div>
                        <div class="stat-label">Rescue Operations</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-box">
                        <div class="stat-number"><?php echo $stats['completed_messages']; ?></div>
                        <div class="stat-label">Inquiries Handled</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ACTIVITIES LIST -->
    <section class="py-4">
        <div class="container">
            <h3 class="mb-4">Recent Activities (Page <?php echo $page; ?> of <?php echo $total_pages; ?>)</h3>

            <?php if (count($all_activities) > 0): ?>
                <?php foreach ($all_activities as $activity): ?>
                    <?php if ($activity['type'] == 'rescue_request'):
                        $data = $activity['data'];
                    ?>
                        <!-- RESCUE REQUEST ACTIVITY -->
                        <div class="activity-card">
                            <span class="activity-type-badge" style="background: #fff3cd; color: #856404;">
                                <i class="bi bi-exclamation-triangle me-1"></i>Emergency Rescue Request
                            </span>
                            <h5 class="mb-2"><?php echo htmlspecialchars($data['emergency_type']); ?> Rescue - Request #<?php echo $data['id']; ?></h5>
                            <p class="activity-date mb-3">
                                <i class="bi bi-calendar3 me-2"></i><?php echo date('d M Y', strtotime($data['updated_at'])); ?>
                                <i class="bi bi-geo-alt ms-3 me-2"></i><?php echo htmlspecialchars($data['division']); ?>
                                <?php if ($data['district']): ?>, <?php echo htmlspecialchars($data['district']); ?><?php endif; ?>
                                <span class="badge bg-<?php echo $data['status'] == 'completed' ? 'success' : 'warning'; ?> ms-2">
                                    <?php echo ucfirst(str_replace('_', ' ', $data['status'])); ?>
                                </span>
                            </p>
                            <p class="mb-2"><strong>Description:</strong> <?php echo htmlspecialchars($data['animal_description']); ?></p>
                            <p class="mb-2"><strong>Location:</strong> <?php echo htmlspecialchars($data['detailed_address']); ?></p>
                            <div class="row mt-2">
                                <div class="col-md-3"><strong>Size:</strong> <?php echo htmlspecialchars($data['animal_size']); ?></div>
                                <div class="col-md-3"><strong>Condition:</strong> <?php echo htmlspecialchars($data['animal_condition']); ?></div>
                                <div class="col-md-3"><strong>Urgency:</strong> <?php echo htmlspecialchars($data['urgency_level']); ?></div>
                                <div class="col-md-3"><strong>Type:</strong> <?php echo htmlspecialchars($data['location_type']); ?></div>
                            </div>
                            <?php if ($data['rescuer_name']): ?>
                                <div class="rescuer-info">
                                    <i class="bi bi-person-check me-2"></i>
                                    <strong>Handled by:</strong> <?php echo htmlspecialchars($data['rescuer_name']); ?>
                                    (<?php echo htmlspecialchars($data['rescuer_division']); ?>)
                                    <?php if ($data['admin_notes']): ?>
                                        <br><i class="bi bi-sticky me-2"></i><?php echo htmlspecialchars($data['admin_notes']); ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    <?php elseif ($activity['type'] == 'rescue_activity'):
                        $data = $activity['data'];
                    ?>
                        <!-- RESCUE ACTIVITY -->
                        <div class="activity-card">
                            <span class="activity-type-badge badge-rescue">
                                <i class="bi bi-shield-check me-1"></i>Rescue Operation
                            </span>
                            <h5 class="mb-2"><?php echo htmlspecialchars($data['rescue_type']); ?> - <?php echo htmlspecialchars($data['species_name']); ?></h5>
                            <p class="activity-date mb-3">
                                <i class="bi bi-calendar3 me-2"></i><?php echo date('d M Y', strtotime($data['rescue_date'])); ?>
                                <i class="bi bi-geo-alt ms-3 me-2"></i><?php echo htmlspecialchars($data['location']); ?>
                            </p>
                            <p class="mb-2"><?php echo nl2br(htmlspecialchars($data['description'])); ?></p>
                            <div class="row mt-3">
                                <div class="col-md-3"><strong>Size:</strong> <?php echo htmlspecialchars($data['size']); ?></div>
                                <div class="col-md-3"><strong>Condition:</strong> <?php echo htmlspecialchars($data['condition']); ?></div>
                                <div class="col-md-6"><strong>Action:</strong> <?php echo htmlspecialchars($data['action']); ?></div>
                            </div>
                            <div class="rescuer-info">
                                <i class="bi bi-person-badge me-2"></i>
                                <strong>Rescued by:</strong> <?php echo htmlspecialchars($data['rescuer_name']); ?>
                                (<?php echo htmlspecialchars($data['rescuer_division']); ?>)
                            </div>
                        </div>

                    <?php else:
                        $data = $activity['data'];
                    ?>
                        <!-- CONTACT REQUEST ACTIVITY -->
                        <div class="activity-card">
                            <span class="activity-type-badge badge-request">
                                <i class="bi bi-envelope-check me-1"></i>Request Handled
                            </span>
                            <h5 class="mb-2"><?php echo htmlspecialchars($data['subject']); ?></h5>
                            <p class="activity-date mb-3">
                                <i class="bi bi-calendar3 me-2"></i><?php echo date('d M Y', strtotime($data['updated_at'])); ?>
                                <span class="badge bg-<?php echo $data['status'] == 'completed' ? 'success' : 'info'; ?> ms-2">
                                    <?php echo ucfirst($data['status']); ?>
                                </span>
                            </p>
                            <p class="mb-2"><strong>Request from:</strong> <?php echo htmlspecialchars($data['full_name']); ?></p>
                            <?php if ($data['rescuer_name']): ?>
                                <div class="rescuer-info">
                                    <i class="bi bi-person-check me-2"></i>
                                    <strong>Handled by:</strong> <?php echo htmlspecialchars($data['rescuer_name']); ?>
                                    <?php if ($data['admin_notes']): ?>
                                        <br><i class="bi bi-sticky me-2"></i><?php echo htmlspecialchars($data['admin_notes']); ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="bi bi-inbox" style="font-size: 4rem; color: #dee2e6;"></i>
                    <p class="text-muted mt-3">No activities to display yet</p>
                </div>
            <?php endif; ?>

            <!-- PAGINATION -->
            <?php if ($total_pages > 1): ?>
                <nav aria-label="Activities pagination" class="mt-5">
                    <ul class="pagination justify-content-center">
                        <!-- First -->
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=1">« First</a>
                            </li>
                        <?php endif; ?>

                        <!-- Previous -->
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
                            </li>
                        <?php endif; ?>

                        <!-- Page numbers with ellipsis -->
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

                        <!-- Last -->
                        <?php if ($page < $total_pages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $total_pages; ?>">Last »</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
    </section>

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
                    <p>
                        <a href="https://www.facebook.com/groups/www.wsrtbd.epizy.co" class="text-light" target="_blank">
                            <i class="bi bi-facebook"></i> Facebook Group
                        </a>
                    </p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Get Our App</h5>
                    <a href="https://play.google.com/store/apps/details?id=com.binarybardbd.snakesofbangladesh" class="btn btn-success mb-2" target="_blank">
                        Download App
                    </a>
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

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="loginModalLabel">Rescuer Login</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <p id="loginError" class="text-danger text-center mb-2" style="display: none;"></p>
                    <form id="loginForm">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="text" id="loginIdentifier" name="email" class="form-control" placeholder="Enter email or phone" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" id="loginPassword" name="password" class="form-control" placeholder="Enter password" required />
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" />
                                <label class="form-check-label small" for="remember">Remember me</label>
                            </div>
                            <a href="#" class="small text-decoration-none">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Login</button>
                        <p class="text-center mt-3 small">
                            Don't have an account?
                            <a href="signup.php" class="fw-semibold text-decoration-none">Register Now</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- AJAX LOGIN SCRIPT -->
    <script>
        document.getElementById("loginForm").addEventListener("submit", function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch("rescuer_login.php", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.text())
                .then(response => {
                    const errorBox = document.getElementById("loginError");
                    response = response.trim();
                    if (response === "success") {
                        window.location.href = "profile.php";
                    } else if (response === "invalid") {
                        errorBox.style.display = "block";
                        errorBox.textContent = "Wrong password!";
                    } else if (response === "not_found") {
                        errorBox.style.display = "block";
                        errorBox.textContent = "Email not found!";
                    } else {
                        errorBox.style.display = "block";
                        errorBox.textContent = "Unexpected error!";
                    }
                });
        });
    </script>
</body>

</html>
<?php $mysqli->close(); ?>