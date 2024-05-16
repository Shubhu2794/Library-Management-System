<?php
session_start();
include("connection.php");
include("function.php");
$error="";

// Check if the user is logged in
if (!isset($_SESSION['login-user'])) {
    header("location:student-dashboard.php");
    exit(); // Ensure script stops execution after redirection
}

// Handle form submission for updating student information
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Update student name if provided
    if (isset($_POST['newName']) && !empty($_POST['newName'])) {
        $newName = $_POST['newName'];
        if (changeName($newName)) {
            // Name changed successfully
            $error= "Name changed : successfully.";
        } else {
            // Failed to change name
            $error= "Failed to change name.";
        }
    }

    // Update student username if provided
    if (isset($_POST['newUsername']) && !empty($_POST['newUsername'])) {
        $newUsername = $_POST['newUsername'];
        if (changeUserName($newUsername)) {
            // Username changed successfully
            $error= "Username changed successfully.";
        } else {
            // Failed to change username
            $error= "Failed to change username.";
        }
    }

    // Update student password if provided
    if (isset($_POST['newPassword']) && !empty($_POST['newPassword'])) {
        $oldPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
    
        if (changePassword($oldPassword, $newPassword)) {
            // Password changed successfully
            $error= "Password changed successfully.";
        } else {
            // Failed to change password
            $error= "Failed to change password.";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Add your CSS styles here */
        .hidden {
            display: none;
        }
    </style>
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
                        <li><a href="admin-dashboard.php">HOME</a></li>
                        <li><a href="books.php"><i class='bx bx-arrow-back'></i>Back-to-Menu</a></li>
                    </ul>
                </nav>
            </header>

            <section>
                <div class="edit-container">
                    <h1 style="margin-bottom: 10px;">Update Profile</h1>
                    <!-- Form for selecting what to change -->
                    <form class="edit" method="post" action="" id="selectForm">
                        <div class="edit-option">
                            <label for="updateOption">Select what you want to change:</label>
                            <select id="updateOption" name= "updateOption">
                                <option value="BookName">Book Name</option>
                                <option value="Author">Author</option>
                                <option value="genre">Genre</option>
                                <option value="year">Publication year</option>
                                <option value="total">Total Available copies</option>
                            </select>
                        </div>
                        <div id="" class="hidden">
                            <label for="newName">New Name:</label>
                            <input type="text" id="newName" name="newName" placeholder="Enter new name">
                        </div>
                        <div id="usernameFields" class="hidden">
                            <label for="newUsername">New Username:</label>
                            <input type="text" id="newUsername" name="newUsername" placeholder="Enter new username">
                        </div>
                        <div id="passwordFields" class="hidden">
                            <label for="currentPassword">Current Password:</label>
                            <input type="password" id="currentPassword" name="currentPassword" placeholder="Enter current password">
                            <label for="newPassword">New Password:</label>
                            <input type="password" id="newPassword" name="newPassword" placeholder="Enter new password">
                        </div>
                        <div>
                            <div align = "center" class="errortext"><?php echo $error; ?></div> <br>
                            <button type="button" onclick="showFields()">Next</button><br>
                            <input type="submit" class="edit-submit" value="Submit" />
                        </div>
                    </form>
                </div>
            </section>

            <footer class="stuDash">
                <p>&copy; 2024 Student Dashboard. All rights reserved.</p>
            </footer>
        </div>
    </div>

    <script>
    function showFields() {
        var selectedOption = document.getElementById('updateOption').value;
        var allFields = document.querySelectorAll('.edit-container div[id$="Fields"]');
        allFields.forEach(function(field) {
            field.classList.add('hidden');
        });
        document.getElementById(selectedOption + 'Fields').classList.remove('hidden');
    }
</script>

    
</body>
</html>
