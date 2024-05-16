<?php
    include('connection.php');
    include('function.php');

    $error = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $roll = $_POST['number'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['create-password'];
        $password_again = $_POST['confirm-password'];

        if (strcmp($password, $password_again) != 0) {
          $error = "Password and confirm password must be the same.";
      } else if (empty($name) || empty($username) || empty($password)) {
          $error = "All fields are required.";
      } else {
          $userExist = UserExists($roll,$username);
  
          if ($userExist && mysqli_num_rows($userExist) == 0) {
              $query = "INSERT INTO student (name, roll, username, password) VALUES ('$name', '$roll', '$username', '$password')";
              $result = mysqli_query($con, $query);
              if ($result) {
                  echo "<script>alert('Registration Successful. Go to the Login-page And Login.');</script>";
              } else {
                  $error = "Error: " . mysqli_error($con);
              }
          } else {
              $error = "Roll number or username already exists. Please choose another roll number.";
          }
      }
  }
  if ($_SERVER['REQUEST_METHOD'] != "POST") {
    $error = "";
}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="login.html">Students-login</a></li>
                </ul>
            </nav>
        </header>
        <section>
            <div class="login-image">
                <form action="" method="post" id="signup-form">
                    <div class="login-page">
                        <div class="signup-box">
                            <div class="login-header">
                                <span>SignUp</span>
                            </div>

                            <div class="input-box-signup">
                                <input type="text" id="name" name="name" class="input-field-signup" required />
                                <label for="name" class="label-signup">Name <i class="bx bx-pencil"></i></label>
                            </div>

                            <div class="input-box-signup">
                                <input type="number" id="number" name="number" class="input-field-signup" required />
                                <label for="Roll" class="label-signup">Roll Number <i class='bx bx-user-circle'></i></label>
                            </div>

                            <div class="input-box-signup">
                                <input type="text" id="username" name="username" class="input-field-signup" required />
                                <label for="username" class="label-signup">Select a Username <i class="bx bx-user"></i></label>
                            </div>

                            <div class="input-box-signup">
                                <input type="password" id="create-password" name="create-password" class="input-field-signup" required />
                                <label for="create-password" class="label-signup">Create Password <i class="bx bxs-lock-alt"></i></label>
                            </div>

                            <div class="input-box-signup">
                                <input type="password" id="confirm-password" name="confirm-password" class="input-field-signup" required />
                                <label for="confirm-password" class="label-signup">Confirm Password <i class="bx bxs-lock-alt"></i></label>
                            </div>

                            <div class="remember-forget-signup">
                                <div class="remember-me">
                                    <input type="checkbox" id="not-a-robot" name="not-a-robot" />
                                    <label for="not-a-robot">I am not a robot</label>
                                </div>
                            </div>

                            <div class="input_box">
                                <div align = "center" class="errortext"><?php echo $error; ?></div> <br>
                                <input type="submit" class="input-submit-signup" value="Sign-up" />
                            </div>


                            <div class="register">
                                <span>Already have an account? <a href="student-login.php"> Login </a></span>
                            </div>
                        </div>
                    </div>
                </form>
        </section>
        <footer>
            <p style="color: white;text-align:center;line-height: initial;font-weight: bold;"> Customer Care <br>+91-7808199999 <br>xyzzz@gmail.Customer</p>
        </footer>
    </div>

    </div>
</body>
</html>
