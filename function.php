<?php 
    include('connection.php');

    //Check if the user data that you have added is already present or not.
    function UserExists($roll, $username){
        global $con;

        // Use prepared statements to prevent SQL injection
        $check = "SELECT * FROM student WHERE roll = ? OR username = ?";
        $stmt = mysqli_prepare($con, $check);
        mysqli_stmt_bind_param($stmt, "is", $roll, $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        return $result;
    }

function getUserName(){
    global $con;
    
    // Check if the session variable is set
        $roll = $_SESSION['login-user'];
        $query = "select name from student where roll = $roll";
		$result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0) {
            // Fetch the row as an associative array
            $row = mysqli_fetch_assoc($result);
            // Return the name from the row
            return $row['name'];
        } else {
            // No name found or query execution failed, return an empty string or handle the error as needed
            return "Unknown";
        }
    }

function getUserRoll(){
    global $con;
    
    // Check if the session variable is set
    if(isset($_SESSION['login-user'])) {
        $roll = $_SESSION['login-user'];
        $query = "SELECT roll FROM student WHERE roll = '$roll'"; // Enclose $roll in single quotes
        $result = mysqli_query($con, $query);

        // Check if the query was successful
        if($result && mysqli_num_rows($result) > 0) {
            // Fetch the row as an associative array
            $row = mysqli_fetch_assoc($result);
            // Return the roll number from the row
            return $row['roll'];
        } else {
            // No roll number found or query execution failed, return an empty string or handle the error as needed
            return "Unknown";
        }
    } else {
        // Session variable not set, return an empty string or handle the case as needed
        return "Unknown h";
    }
}

function getUserNames(){
    global $con;
    
    // Check if the session variable is set
    if(isset($_SESSION['login-user'])) {
        $roll = $_SESSION['login-user'];
        $query = "SELECT username FROM student WHERE roll = $roll";
        $result = mysqli_query($con, $query);

        // Check if the query was successful
        if($result && mysqli_num_rows($result) > 0) {
            // Fetch the row as an associative array
            $row = mysqli_fetch_assoc($result);
            // Return the username from the row
            return $row['username'];
        } else {
            // No username found or query execution failed, return an empty string or handle the error as needed
            return "Unknown";
        }
    } else {
        // Session variable not set, return an empty string or handle the case as needed
        return "Unknown";
    }
}

function checkUserstudentExists($roll)
{
    //accessing the $con variable declared in the included file
    global $con;

    $query = "select * from student where roll = '$roll'";
	$result = mysqli_query($con, $query);
    
    return $result;
}

function checkUserAdminExists($Id)
{
    //accessing the $con variable declared in the included file
    global $con;

    $query = "select * from admins where Admin_Id = '$Id'";
	$result = mysqli_query($con, $query);
    
    return $result;
}



// Function to change student's name
function changeName($newName)
{
    global $con;
    if (isset($_SESSION['login-user'])) {
        $roll = $_SESSION['login-user'];
        $query = "UPDATE student SET name = '$newName' WHERE roll = $roll";
        $result = mysqli_query($con, $query);
        
        // Check if the query was successful
        if ($result && mysqli_affected_rows($con) > 0) {
            return true; // Return true on success
        } else {
            return false; // Return false on failure
        }
    }
}

// Function to change student's username
function changeUserName($newUserName)
{
    global $con;
    if (isset($_SESSION['login-user'])) {
        $roll = $_SESSION['login-user'];
        $query = "UPDATE student SET username = '$newUserName' WHERE roll = $roll ";
        $result = mysqli_query($con, $query);
        
        // Check if the query was successful
        if ($result && mysqli_affected_rows($con) > 0) {
            return true; // Return true on success
        } else {
            return false; // Return false on failure
        }
    }
}

// Function to change student's password
function changePassword($oldPassword, $newPassword)
{
    global $con;
    if (isset($_SESSION['login-user'])) {
        echo "<script>alert('in if');</script>";
        $roll = $_SESSION['login-user'];
        echo "<script>alert('$roll');</script>";
        $query = "UPDATE student SET password = '$newPassword' WHERE roll = $roll AND password = '$oldPassword'";
        echo "<script>alert('$query');</script>";
        $result = mysqli_query($con, $query);
        
        // Check if the query was successful
        if ($result && mysqli_affected_rows($con) > 0) {
            return true; // Return true on success
        } else {
            return false; // Return false on failure
        }
    }
}

function getAdminID(){
    global $con;
    
    // Check if the session variable is set
        $Id = $_SESSION['admin'];
        $query = "select Admin_Id from admins where Admin_Id = $Id";
		$result = mysqli_query($con, $query);

        if($result && mysqli_num_rows($result) > 0) {
            // Fetch the row as an associative array
            $row = mysqli_fetch_assoc($result);
            // Return the name from the row
            return $row['Admin_Id'];
        } else {
            // No name found or query execution failed, return an empty string or handle the error as needed
            return "Unknown";
        }
    }

function getAdminName(){
    global $con;
    
    // Check if the session variable is set
    if(isset($_SESSION['admin'])) {
        $Id = $_SESSION['admin'];
        $query = "SELECT name FROM admins WHERE Admin_Id = '$Id'"; // Enclose $roll in single quotes
        $result = mysqli_query($con, $query);

        // Check if the query was successful
        if($result && mysqli_num_rows($result) > 0) {
            // Fetch the row as an associative array
            $row = mysqli_fetch_assoc($result);
            // Return the roll number from the row
            return $row['name'];
        } else {
            // No roll number found or query execution failed, return an empty string or handle the error as needed
            return "Unknown";
        }
    } else {
        // Session variable not set, return an empty string or handle the case as needed
        return "Unknown h";
    }
}

function getStudentNames()
{
    global $con;
    $query = "select * from student ORDER BY roll";
    $Studentresult = mysqli_query($con, $query);
    
    return $Studentresult;
}
function getBookDetail()
{
    global $con;
    $query = "SELECT * FROM books";
    $BookDetails = mysqli_query($con, $query);
    
    // Check if the query was successful
    if (!$BookDetails) {
        // Query failed, handle the error
        die("Database query failed: " . mysqli_error($con));
    }
    
    return $BookDetails;
}


function BookExists($bookName, $Author){
    global $con;

    // Use prepared statements to prevent SQL injection
    $check = "SELECT * FROM books WHERE title = ? AND author = ?";
    $stmt = mysqli_prepare($con, $check);
    mysqli_stmt_bind_param($stmt, "ss", $bookName, $Author);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return $result;
}
?>