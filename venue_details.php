<?php
session_start();
include '../db_connect.php';

if (!isset($_SESSION['user'])) {
    // header("Location: ../index/index.php");
    header("Location: ../dashboard/dashboard.php");

    exit();
}

$venue_id = $_GET['venue_id'];
$user_id = $_SESSION['user']['id'];

// Check if the user is allowed to access this venue
$sql = "SELECT * FROM venues WHERE id = $venue_id AND allocated_user = $user_id";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    echo "You are not authorized to view this venue.";
    exit();
}

// Fetch questions for this venue
$sql = "SELECT * FROM questions WHERE venue_id = $venue_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Survey for Venue: ".$_GET['venue_name']."</h2>";
    echo "<form method='post' action='submit_survey.php'>";
    while($row = $result->fetch_assoc()) {
        echo "<label>".$row['question_text']."</label><br>";
        echo "<input type='radio' name='q".$row['id']."' value='YES'> Yes<br>";
        echo "<input type='radio' name='q".$row['id']."' value='NO'> No<br><br>";
    }
    echo "<input type='hidden' name='venue_id' value='$venue_id'>";
    echo "<input type='submit' value='Submit'>";
    echo "</form>";
} else {
    echo "No questions available for this venue.";
}
?>
