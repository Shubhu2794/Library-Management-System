<?php
    include("connection.php");
    include("function.php");
    include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="stuDash">
    <div class="wrapper">
        <div class="admin-dashboard-active">
        <header class="stuDash">
            <div class="logo">
                <img src="library.png" alt="Library Logo">
                <h1>Library Management System</h1>
            </div>    
            <nav class="stuDash">
                <ul>
                    <li><a href="student-dashboard.php">Home</a></li>
                    <li><a href="student-profile.php">Profile</a></li>
                    <li><a href="#">Notifications</a></li>
                    <li><a href="student-login.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <section class="stuDash">
                <div class="stuDash">
                    <div class="container">
                        <h1>Welcome, <?php echo getUserName(); ?>!</h1>
                        <div class="cards">
                            <!-- Student Dashboard Cards -->
                        </div>
                    </div>
                </div>

        </section>
        </div>
        <footer class="stuDash">
            <p>&copy; 2024 Student Dashboard. All rights reserved.</p>
        </footer>
        <script src="student_dashboard.js"></script>
    </div>
</body>
</html>
