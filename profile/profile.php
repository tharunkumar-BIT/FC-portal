<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page if not authenticated
    header('Location: index.php');
    exit();
}

$name = $_SESSION['name'];
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Certificate Portal</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="../includes/cmmn.css">
</head>

<body>
    <header>
        <img src="../FC logo.png" class="fc-logo">
        <h3>Fitness Certificate Portal</h3>

        <!-- sidebar section -->
        <div class="menu-btn" onclick="toggleMenu()">
            <div class="btn-line"></div>
            <div class="btn-line"></div>
            <div class="btn-line"></div>
        </div>

        <nav class="sidebar-menu">
            <ul>
                <li><a href="../dashboard/dashboard.php">&#160; Eligible venue</a></li>
                <li><a href="../surveyresult/surveyresult.php">&#160; Survey results</a></li>
                <li><a href="./profile.php">&#160; Profile</a></li>
                <li id="logoutbox"><a href="../includes/logout.php">&#160; logout</a></li>
            </ul>
        </nav>
        <!-- end of sidebar section -->
    </header>

    <div class="profile">
        <h2>Profile</h2>
    </div>
    <div class="container">
        <p>Username : <?php echo htmlspecialchars($name); ?></p><br>
        <p>Email : <?php echo htmlspecialchars($email); ?></p><br>
        <P>You are allocated to : UNKNOWN</P><br>
        <p>Your next review will be on : DATE AND TIME</p>
    </div>

    <script src="profile.js"></script>
    <script src="../includes/cmmn.js"></script>
</body>

</html>
