<?php
    include('connection.php');
    include('function.php');

    $error = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $bookname = $_POST['Bookname'];
        $author = $_POST['Author'];
        $genre = $_POST['genre'];
        $year = $_POST['year'];
        $total = $_POST['total'];
        $available = $total;
        $issue=0;
        echo "<script>alert('$bookname,$author,$genre,$year,$total');</script>";
        
        if (empty($bookname) || empty($author) || empty($genre) || empty($year) || empty($total)) {
          $error = "All fields are required.";
        } 
        else {
            $BookExist = BookExists($bookname, $author);
            // Check if any rows were returned
            if ($BookExist && mysqli_num_rows($BookExist) == 0) {
              $query = "INSERT INTO books (title, author, genre, publication_year,total_copies,available_copies,issued_copies) VALUES ('$bookname', '$author', '$genre', '$year', '$total', '$available', '$issue')";
              $result = mysqli_query($con, $query);
              if ($result) {
                  echo "<script>alert('Book is sucessfully added!!');</script>";
              } else {
                  $error = "Error: " . mysqli_error($con);
              }
          } else {
              $error = "Book already exists.";
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
<body class="book">
    <div class="wrapper">
        <header class="book">
            <div class="logo">
                <img src="library.png">
                <h1>Library Management System</h1>
            </div>
            <nav class="book">
                <ul>
                    <li><a href="admin-dashboard.php">HOME</a></li>
                    <li><a href="books.php"><i class='bx bx-arrow-back'></i>Back-to-Menu</a></li>
                </ul>
            </nav>
        </header>
        <section class="book">
            <form action="" method="post" id="book-form">
                    <div class="book-page">
                        <div class="book-box">
                            <div class="book-header">
                                <span>Add Book</span>
                            </div>

                            <div class="input-box-book">
                                <input type="text" id="Bookname" name="Bookname" class="input-field-book" required />
                                <label for="Bookname" class="label-book">Book Title <i class="bx bx-pencil"></i></label>
                            </div>
                            
                            <div class="input-box-book">
                                <input type="text" id="Author" name="Author" class="input-field-book" required />
                                <label for="Author" class="label-book">Author <i class="bx bx-pencil"></i></label>
                            </div>

                            <div class="input-box-book">
                                <label class="label-book" for="genre">Genre</label>
                                <select class="select-field-book" id="genre" name="genre" height=5>
                                    <option value="Fiction" class="book-option">Fiction</option>
                                    <option value="Non-Fiction" class="book-option">Non-Fiction</option>
                                    <option value="Mystery" class="book-option">Mystery</option>
                                    <option value="Romance" class="book-option">Romance</option>
                                    <option value="Thriller" class="book-option">Thriller</option>
                                    <option value="Science Fiction" class="book-option">Science Fiction</option>
                                    <option value="Fantasy" class="book-option">Fantasy</option>
                                    <option value="Horror" class="book-option">Horror</option>
                                    <option value="Historical Fiction" class="book-option">Historical Fiction</option>
                                    <option value="Biography/Autobiography" class="book-option">Biography/Autobiography</option>
                                    <option value="Poetry" class="book-option">Poetry</option>
                                    <!-- <option value="Memoir" class="book-option">Memoir</option>
                                    <option value="Self-help" class="book-option">Self-help</option>
                                    <option value="Travel" class="book-option">Travel</option> -->
                                    <option value="Drama" class="book-option">Drama</option>
                                    <option value="Comedy" class="book-option">Comedy</option>
                                    <option value="Satire" class="book-option">Satire</option>
                                    <option value="Historical" class="book-option">Historical</option>
                                </select>
                            </div>

                            <div class="input-box-book">
                                <input type="number" id="year" name="year" class="input-field-book" required />
                                <label for="year" class="label-book"> Publish Year <i class='bx bx-user-circle'></i></label>
                            </div>
                            

                            <div class="input-box-book">
                                <input type="number" id="total" name="total" class="input-field-book" required />
                                <label for="total" class="label-book">Total copies available <i class='bx bx-user-circle'></i></label>
                            </div>

                            <div class="input_box">
                                <div align = "center" class="errortext-book"><?php echo $error; ?></div> <br>
                                <input type="submit" class="input-submit-book" value="Add" />
                            </div>
                        </div>
                    </div>
                </form>
                
        </section>
        <footer class="book">
            <p style="color: white;text-align:center;line-height: initial;font-weight: bold;"> Customer Care <br>+91-7808199999 <br>xyzzz@gmail.Customer</p>
        </footer>
    </div>

    </div>
</body>
</html>
