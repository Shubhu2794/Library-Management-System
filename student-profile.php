<?php
session_start();
include("connection.php");
include("function.php");

// Check if the user is logged in
if (!isset($_SESSION['login-user'])) {
    header("location:student-profile.php");
    exit(); // Ensure script stops execution after redirection
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
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
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Notifications</a></li>
                    <li><a href="student-login.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <section>
            <div class="container">
                <h1>Student Profile</h1>
                <!-- Display student information -->
                <div class="profile" align="center">
                    <div>
                        <p style="margin: 20px;">Roll Number: <?php echo getUserRoll(); ?></p>
                    </div>
                    <div>
                        <p style="margin: 20px;">Name:      <?php echo getUserName(); ?></p>
                    </div>
                    <div>
                        <p style="margin: 20px;">Username: <?php echo getUserNames(); ?></p>
                    </div>
                    <div>
                        <a style="color:red;margin:10px;padding:10px;" href="edit.php">Update Profile</a>
                    </div>
                </div>
            </div>
        </section>

        <footer class="stuDash">
            <p>&copy; 2024 Student Dashboard. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
