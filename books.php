<?php
session_start();
include("connection.php");
include("function.php");

// Check if the user is logged in
if (!isset($_SESSION['admin'])) {
    header("location:books.php");
    exit(); // Ensure script stops execution after redirection
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
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
                    <li><a href="admin-dashboard.php">Home</a></li>
                    <li><a href="admin-profile.php">Profile</a></li>
                    <li><a href="books.php">Books</a></li>
                    <li><a href="#">Notifications</a></li>
                    <li><a href="admin-login.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <section>
            <div class="container">
                <h1 style="margin-bottom: 66px;">Books</h1>
                <div class="books">
                    <a href="add-book.php" class="button">Add Book</a>
                    <a href="modify-book.php" class="button">Modify Book</a>
                    <a href="#" class="button">Issue Book</a>
                    <a href="#" class="button">Issued Student Details</a>
                </div>
            </div>
        </section>

        <footer class="stuDash">
            <p>&copy; 2024 Student Dashboard. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
