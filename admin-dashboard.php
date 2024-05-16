<?php
    include("connection.php");
    include("function.php");
    include('session.php');
    $StudentResult= getStudentNames();
    $BookDetail= getBookDetail();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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

        <section class="stuDash">
            <div class="container">
                <h1>Welcome, Admin <?php echo getAdminName(); ?>!</h1>
                <div class="student-list-block">
                    <h2>Click to View Student Data</h2>
                    <table class="student-table" style="display: none;">
                        <tr>
                            <th>Sno.</th>
                            <th>Roll</th>
                            <th>Name</th>
                            <th>Username</th>
                        </tr>
                        <?php 
                        $sno = 1;
                        while($row = $StudentResult->fetch_assoc()){ ?>    
                            <tr>
                                <td><?php echo $sno++; ?></td>
                                <td><?php echo $row['roll']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="book-list-block">
                    <h2>Click to View Books Data</h2>
                    <div class="search-container">
                        <input type="text" id="search-input" placeholder="Search books...">
                        <button id="search-button">Search</button>
                    </div>
                    <table class="Book-table" style="display: none;">
                        <tr>
                            <th>Sno.</th>
                            <th>Book Name</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Published Year</th>
                            <th>Total Copies</th>
                            <th>Available Copies</th>
                            <th>Issued Copies</th>
                        </tr>
                        <?php 
                        $seno = 1;
                        while($rows = $BookDetail->fetch_assoc()){ ?>    
                            <tr>
                                <td><?php echo $seno++; ?></td>
                                <td><?php echo $rows['title']; ?></td>
                                <td><?php echo $rows['author']; ?></td>
                                <td><?php echo $rows['genre']; ?></td>
                                <td><?php echo $rows['publication_year']; ?></td>
                                <td><?php echo $rows['total_copies']; ?></td>
                                <td><?php echo $rows['available_copies']; ?></td>
                                <td><?php echo $rows['issued_copies']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </section>

        </div>
        <footer class="stuDash">
            <p>&copy; 2024 Admin Dashboard. All rights reserved.</p>
        </footer>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const studentBlock = document.querySelector('.student-list-block');
                studentBlock.addEventListener('click', function () {
                    const studentTable = studentBlock.querySelector('.student-table');
                    studentTable.style.display = studentTable.style.display === 'none' ? 'table' : 'none';
                });

                const bookBlock = document.querySelector('.book-list-block'); // Fixed the variable name
                bookBlock.addEventListener('click', function () { // Changed 'block' to 'bookBlock'
                    const bookTable = bookBlock.querySelector('.Book-table'); // Changed 'book-table' to 'Book-table'
                    bookTable.style.display = bookTable.style.display === 'none' ? 'table' : 'none'; // Changed 'book-table' to 'Book-table'
                });
            });
            document.getElementById('search-button').addEventListener('click', function() {
                var searchTerm = document.getElementById('search-input').value;
                searchBooks(searchTerm);
            });
            function searchBooks(searchTerm) {
                // Placeholder function for searching books
                // In a real application, this function would make an AJAX request to the backend
                // to search for books based on the searchTerm
                // For demonstration purposes, let's just display the search term in the search-results div
                var searchResultsContainer = document.getElementById('search-results');
                searchResultsContainer.innerHTML = "<p>Search results for: " + searchTerm + "</p>";
            }
        </script>


        <script src="student_dashboard.js"></script>
    </div>
</body>
</html>
