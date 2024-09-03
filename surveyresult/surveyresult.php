<?php
session_start();
include '../includes/dbh.inc.php';

// if (!isset($_SESSION['user'])) {
//     // header("Location: ../index/index.php");
//     header("Location: ../dashboard/dashboard.php");
//     exit();
// }

//$user_id = $_SESSION['user']['id'];
//$venue_id = $_GET['venue_id'];

// Fetch NO responses for the user and venue
$sql = "SELECT q.question_text, sr.timestamp FROM survey_results sr
        JOIN questions q ON sr.question_id = q.id
        WHERE sr.user_id = $user_id AND sr.venue_id = $venue_id AND sr.answer = 'NO'
        ORDER BY sr.timestamp DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Survey Results</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row['question_text'] . " - " . $row['timestamp'] . "</p>";
    }
} else {
    echo "No NO responses recorded.";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Certificate Portal</title>
    <link rel="stylesheet" href="surveyresult.css">
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
                <li><a href="./surveyresult.php">&#160; Survey results</a></li>
                <li><a href="../profile/profile.php">&#160; Profile</a></li>
                <li id="logoutbox"><a href="../includes/logout.php">&#160; logout</a></li>
            </ul>
        </nav>
        <!-- end of sidebar section -->
    </header>

    <div class="boxheading1">
        <h2>NO's given to : </h2>
    </div>
    <div class="nocont">
        <p>&bull; NO1</p><br>
        <P>&bull; NO2</P><br>
        <p>&bull; NO3</p><br>
    </div>
    <div class="boxheading2">
        <h2>Three consecutive NO's given to : </h2>
    </div>
    <div class="nocont">
        (NONE)
    </div>

    <script src="surveyresult.js"></script>
    <script src="../includes/cmmn.js"></script>
</body>

</html>