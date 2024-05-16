<?php
session_start();
include('function.php');

$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $roll = $_POST['roll'];
    $password = $_POST['password'];

    if(!empty($roll) && !empty($password)) {
        $checkUser = checkUserstudentExists($roll); // Assuming the function checks only the roll
       
        if ($checkUser && mysqli_num_rows($checkUser) > 0) {
            $student_data = mysqli_fetch_assoc($checkUser);
            $value=strcmp($student_data['password'], md5($password));
           
            if (strcmp($student_data['password'], md5($password)) ===-1) {
                $_SESSION['login-user'] =  $roll;
                header("Location: student-dashboard.php");
                exit; 
            } else {
                $error .= 'Password is incorrect';
            }
        } else {
            $error = "Invalid Login Credentials. Enter again.";
        }
    } else {
        $error = "Invalid Login Credentials. Enter again.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - Student Login</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="login">
    <div class="wrapper">
        <header>
            <div class="logo">
                <img src="library.png" alt="Library Logo">
                <h1>Library Management System</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="student-login.php">Login</a></li>
                </ul>
            </nav>
        </header>

        <section class="login">
            <div class="login-image">
                <div class="login-page">
                    <div class="login-box">
                        <div class="login-header">
                            <span>Login</span>
                        </div>
                        <form method="post" action="">
                            <div class="input-box">
                                <input type="number" name="roll" id="user" class="input-field" required />
                                <label for="user" class="label">Roll <i class="bx bx-user"></i></label>
                            </div>
                            <div class="input-box">
                                <input type="password" name="password" id="pass" class="input-field" required />
                                <label for="pass" class="label">Password <i class="bx bx-lock-alt"></i></label>
                            </div>
                            <div class="remember-forget">
                                <div class="remember-me">
                                    <input type="checkbox" id="remember" />
                                    <label for="remember">Remember me &nbsp &nbsp &nbsp</label>
                                </div>
                                <div class="forget">
                                    <a href="#"> Forgot Password? </a>
                                </div>
                            </div>
                            <div class="input_box">
                                <input type="submit" class="input-submit" value="Login" id="login-btn" />
                            </div>
                        </form>
                        <div class="register">
                            <span>Don't have an account? <a href="student-signup.php">Register</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <p style="color: white;text-align:center;line-height: initial;font-weight: bold; padding: 0.2em;"> Customer Care <br>+91-7808199999 <br>xyzzz@gmail.Customer</p>
        </footer>
    </div>
</body>
</html>
