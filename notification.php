<?php
// Fetch unread notifications for the user
$sql = "SELECT * FROM notifications WHERE user_id = $user_id AND read_status = 0 ORDER BY timestamp DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>Notifications</h3>";
    while ($row = $result->fetch_assoc()) {
        echo "<p>".$row['notification_text']."</p>";
    }
} else {
    echo "<p>No new notifications.</p>";
}
?>
