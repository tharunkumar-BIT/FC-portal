<?php
session_start();
include '../db_connect.php';

if (!isset($_SESSION['user'])) {
    // header("Location: ../index/index.php");
    header("Location: ../dashboard/dashboard.php");
    exit();
}

$user_id = $_SESSION['user']['id'];
$venue_id = $_POST['venue_id'];

// Fetch all questions for this venue
$sql = "SELECT id FROM questions WHERE venue_id = $venue_id";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $question_id = $row['id'];
    $answer = $_POST["q$question_id"];

    // Only store NO responses
    if ($answer == 'NO') {
        $sql = "INSERT INTO survey_results (user_id, venue_id, question_id, answer) VALUES ($user_id, $venue_id, $question_id, '$answer')";
        $conn->query($sql);
    }
}

header("Location: survey_results.php?venue_id=$venue_id");
?>
