<?php
include 'config.php';
session_start();
$UserID = $_SESSION['UserID'];

if (!isset($_SESSION['UserID'])) {
        header('Location: ../index.php');
}

if (isset($_POST['add'])) {
$title = mysqli_real_escape_string($con,$_POST['title']);
$publisher = mysqli_real_escape_string($con,$_POST['publisher']);
$isbn = mysqli_real_escape_string($con,$_POST['isbn']);
$author = mysqli_real_escape_string($con,$_POST['author']);
$subject = mysqli_real_escape_string($con,$_POST['subject']);
$count = mysqli_real_escape_string($con,$_POST['count']);
$location = mysqli_real_escape_string($con,$_POST['location']);
$random = rand(0000000001,9999999999);  

$sql_u = "SELECT * FROM books WHERE isbn='$isbn'";
    $res_u = mysqli_query($con, $sql_u);
    if (mysqli_num_rows($res_u) > 0) {
      echo '<script>alert("Alert : Book is Already Listed")</script>';
    }else{
      
$sql = "INSERT INTO `books`( `title`, `publisher`, `isbn`, `author`, `subject`, `count`, `avalibility`, `bookuid`, `location`) 
VALUES ('$title','$publisher','$isbn','$author','$subject','$count','$count','$random','$location')";  

if (mysqli_query($con, $sql)) {
  echo '<script>alert("New record created successfully")</script>';
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

}

}
?>
<!DOCTYPE html>
<html>
<head>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta charset="utf-8">
        <title>Add Book | Admin</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style type="text/css">
            body{
                  background: #fc4a1a;
                  background: -webkit-linear-gradient(to right, #f7b733, #fc4a1a);
                  background: linear-gradient(to right, #f7b733, #fc4a1a);
            }
        </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #007bff;">
      <div class="navbar-brand text-warning font-weight-bolder">
    <img src="https://ums.lpu.in/images/lpu_logo.png" width="35" height="35" class="d-inline-block align-top" alt="">Library Management System
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <div class="nav-item nav-link active font-weight-bolder text-dark">
      <span class="badge badge-pill badge-warning"><?php echo "[ Hey ".$UserID; ?> ]</span><span class="sr-only">(current)</span></div>
      <a class="nav-item nav-link text-cyan font-weight-bold" href="../home.php">Book Search</a>
      <a class="nav-item nav-link text-cyan font-weight-bold" href="addbooks.php">Add Book</a>
      <a class="nav-item nav-link text-cyan font-weight-bold" href="view.php">View Book</a>
      <a class="nav-item nav-link text-cyan font-weight-bold" href="order.php">Order</a>
      <a class="nav-item nav-link text-cyan font-weight-bold" href="issue.php">Issue Book</a>
      <a class="nav-item nav-link text-cyan font-weight-bold" href="userlist.php">User List</a>
      <a class="nav-item nav-link text-danger font-weight-bold" href="../adminlogout.php">Logout</a>
    </div>
  </div>
</nav>  

<div class="container p-3 my-3 bg-primary text-white">
<form action="" method="post"> 
  <h1 class="text-center">Add Book</h1>
<div class="input-group mb-3">
  <input type="text" name="title" class="form-control" placeholder="Enter TITLE" required>
</div>
<div class="input-group mb-3">
  <input type="text" name="publisher" class="form-control" placeholder="Enter PUBLISHER" required>
</div>
<div class="input-group mb-3">
  <input type="number" name="isbn" class="form-control" placeholder="Enter ISBN" required>
</div>
<div class="input-group mb-3">
  <input type="text" name="author" class="form-control" placeholder="Enter AUTHOR" required>
</div>
<div class="input-group mb-3">
  <input type="text" name="subject" class="form-control" placeholder="Enter SUBJECT" required>
</div>
<div class="input-group mb-3">
  <input type="number" name="count" class="form-control" placeholder="Enter TOTAL BOOKS" required>
</div>
<div class="input-group mb-3">
  <input type="text" name="location" class="form-control" placeholder="Enter LOCATION" required>
</div>

  <div class="d-flex justify-content-center">
    <input class="btn btn-outline-warning" type="submit" name="add" value="ADD">
  </div>
 </form>  
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

