<?php
session_start();
include '../includes/dbh.inc.php';

// Ensure user is logged in
// if (!isset($_SESSION['user'])) {
//     // header("Location: ../index/index.php");
//     header("Location: ../dashboard/dashboard.php");
//     exit();
// }

$user_id = $_SESSION['user']['id'];

// Fetch the venues assigned to the user
$sql = "SELECT * FROM venues WHERE allocated_user = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Your Eligible Venues</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "<a href='venue_details.php?venue_id=" . $row['id'] . "'>" . $row['venue_name'] . "</a><br>";
    }
} else {
    echo "You are not eligible for any venue.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Certificate Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="display_questions.css" />
    <link rel="stylesheet" href="../includes/cmmn.css" />

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
                <li><a href="../profile/profile.php">&#160; Profile</a></li>
                <li id="logoutbox"><a href="../includes/logout.php">&#160; logout</a></li>
            </ul>
        </nav>
        <!-- end of sidebar section -->

    </header>
    <script src="display_questions.js"></script>
    <script src="../includes/cmmn.js"></script>
</body>

</html>