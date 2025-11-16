<?php
include "db.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="wsrtbd.png" alt="WSRTBD Logo" />
            <span class="ms-2">WSRTBD</span>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'index.php') ? 'active' : '' ?>"
                        href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'about.php') ? 'active' : '' ?>"
                        href="about.php">About Us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'rescuers.php') ? 'active' : '' ?>"
                        href="rescuers.php">Rescuers</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'board.php') ? 'active' : '' ?>"
                        href="board.php">Board</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                        href="https://binarybardbd.com/category/snakes-nature/"
                        target="_blank" rel="noopener noreferrer">Blog</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($current_page == 'contact.php') ? 'active' : '' ?>"
                        href="contact.php">Contact</a>
                </li>

                <!-- App Download -->
                <li class="nav-item ms-lg-3">
                    <a href="https://play.google.com/store/apps/details?id=com.binarybardbd.snakesofbangladesh"
                        target="_blank" rel="noopener noreferrer"
                        class="btn btn-primary btn-sm">Download App</a>
                </li>

                <!-- ACCOUNT SECTION -->
                <li class="nav-item dropdown ms-lg-3">
                    <a class="nav-link dropdown-toggle <?= ($current_page == 'profile.php') ? 'active' : '' ?>"
                        data-bs-toggle="dropdown" href="#" role="button">Account</a>

                    <ul class="dropdown-menu">

                        <?php if (!isset($_SESSION['rescuer_id'])): ?>
                            <!-- NOT LOGGED IN -->
                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal" href="#">
                                    <i class="bi bi-box-arrow-in-right me-1"></i> Rescuer Login
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item" href="signup.php">
                                    <i class="bi bi-person-plus me-1"></i> Rescuer Registration
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item" href="admin.php">
                                    <i class="bi bi-person-badge me-1"></i> Admin Login
                                </a>
                            </li>

                        <?php else: ?>
                            <!-- LOGGED IN -->
                            <li>
                                <a class="dropdown-item" href="profile.php">
                                    <i class="bi bi-person-circle me-1"></i>
                                    <?= htmlspecialchars($_SESSION['rescuer_name']); ?>
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item text-danger" href="logout.php">
                                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                                </a>
                            </li>

                        <?php endif; ?>

                    </ul>
                </li>

            </ul>
        </div>

    </div>
</nav>