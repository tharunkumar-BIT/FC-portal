<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Certificate Portal</title>
    <link rel="stylesheet" href="dashboard.css" />
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
                <li><a href="./dashboard.php">Eligible venue</a></li>
                <li><a href="../surveyresult/surveyresult.php">Survey results</a></li>
                <li><a href="../profile/profile.php">Profile</a></li>
                <li id="logoutbox"><a href="../includes/logout.php">Logout</a></li>
            </ul>
        </nav>
        <!-- end of sidebar section -->


    </header>
    <div class="welcome">
        <h2>Welcome back user!</h2>
    </div>
    <div class="box">
        <img src="card_img.jpg" alt="Card Image"
            onclick="window.location.href='../display_questions/display_questions.php'">
        <div class="insidebox">
            <p>Main Auditorium</p>
        </div>
    </div>
    <script src="../includes/cmmn.js"></script>
    <script src="dashboard.js"></script>
</body>

</html>