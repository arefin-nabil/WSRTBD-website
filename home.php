<?php
session_start();
if (!isset($_SESSION['rescuer'])) {
    header("Location: login.php");
    exit;
}
?>
<h2>Welcome, <?php echo $_SESSION['rescuer']['full_name']; ?>!</h2>
<a href="logout.php" class="btn btn-danger">Logout</a>