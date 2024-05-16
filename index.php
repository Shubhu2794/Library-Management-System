<?php
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    
        function displayTime() {
            var currentTime = new Date();
            
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();
            
            minutes = (minutes < 10 ? "0" : "") + minutes;
            seconds = (seconds < 10 ? "0" : "") + seconds;
            
            document.getElementById("time").textContent = hours + ":" + minutes + ":" + seconds;
            
            setTimeout(displayTime, 1000);
        }
        
        document.addEventListener("DOMContentLoaded", function () {
            displayTime();
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <header>
            <div class="logo">
                <img src="library.png">
                <h1 style="color: rgb(147, 99, 21)">Library Management System</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login</a>
                        <ul class="dropdown-menu">
                            <li><a href="student-login.php">Student</a></li>
                            <li><a href="admin-login.php">Admin</a></li>
                        </ul>
                    </li>
                    <li><a href="about-us.php">About-Us</a></li>
                </ul>
            </nav>
        </header>
        <section>
            <div class="sec_image">
                <br><br><br><br><br><br><br>
                <div class="box">
                    <h1>Welcome to the library!</h1>
                    <h1 style="padding-right: 10px;">Opens at: 09:00</h1>
                    <h1 style="padding-right: 5px;">Closes at: 16:00</h1>
                    <h1 id="time" style="font-size: 24px;"></h1>
                </div>
            </div>
        </section>
        <footer>
            <p style="color: white;text-align:center;line-height: initial;font-weight: bold;"> Customer Care <br>+91-7808199999 <br>xyzzz@gmail.Customer</p>
        </footer>
    </div>
</body>
</html>


