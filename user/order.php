<?php
include 'config.php';
session_start();
$UserID = $_SESSION['UserIDD'];

if (!isset($_SESSION['UserIDD'])) {
        header('Location: index.php');
}
?>
<?php
include 'config.php';

$CNF = 
"<form action='' method='post'> 
<div class='container p-3 my-3 bg-primary text-white rounded-lg'>
  <h1 class='text-center'>Advance Issue Order</h1>
  <div class='input-group mb-3'>
  <input type='text' name='bookuid' class='form-control text-center' placeholder='Enter BOOK UID' required>
  </div>
    <div class='d-flex justify-content-center'>
    <input class='btn btn-outline-warning' type='submit' name='Search' value='Search'>
  </div>
</div>
</form>";

if (isset($_POST['Search'])) {
$Bookuid = filter_var($_POST['bookuid'], FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT title, publisher, isbn, author, count, avalibility, bookuid FROM books where bookuid='$Bookuid'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $title00 = $row["title"];
    $publisher00 = $row["publisher"];
    $isbn00 = $row["isbn"];
    $author00 = $row["author"];
    $count00 = $row["count"];
    $avalibility00 = $row["avalibility"];
    $bookuid00 = $row["bookuid"];

$CNF =  
"<form action='placeorder.php' method='post'> 
<div class='container p-3 my-3 bg-primary text-white rounded-lg'>
  <h1 class='text-center'>Confirm Details</h1>
  <div class='input-group mb-3'><h3 class='text-center'>TITLE &nbsp;</h3>
  <input type='text' name='title1' class='form-control text-light bg-dark text-center' value='$title00' disabled>
  </div>
  <div class='input-group mb-3'><h3 class='text-center'>PUBLISHER &nbsp;</h3>
  <input type='text' name='publisher1' class='form-control text-light bg-dark text-center' value='$publisher00' disabled>
  </div>
  <div class='input-group mb-3'><h3 class='text-center'>ISBN &nbsp;</h3>
  <input type='text' name='isbn1' class='form-control text-light bg-dark text-center' value='$isbn00' disabled>
  </div>
  <div class='input-group mb-3'><h3 class='text-center'>AUTHOR &nbsp;</h3>
  <input type='text' name='author1' class='form-control text-light bg-dark text-center' value='$author00' disabled>
  </div>
  <div class='input-group mb-3'><h3 class='text-center'>BOOK UID &nbsp;</h3>
  <input type='text' name='bookuid' class='form-control text-light bg-dark text-center' value='$bookuid00' disabled>
  </div>
  <div class='input-group mb-3'><h3 class='text-center'>Available &nbsp;</h3>
  <input type='text' name='avalibility1' class='form-control text-light bg-dark text-center' value='$avalibility00' disabled>
  </div>

    <div class='d-flex justify-content-center'>
    <a href='placeorder.php?A=$title00&B=$isbn00&C=$bookuid00&D=$avalibility00' class='btn btn-outline-warning'>Place Order</a>
  </div>
</div>
</form>";

  }
} else {
  echo '<table class="table table-dark table-hover">'.
          '<tbody>'.
          "<tr>".
          "<th class='text-center'>No Result Found</th>". 
          "</tr>".
          '</tbody>'.
          '</table>'; 
}    


}
?>
<!DOCTYPE html>
<html>
<head>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta charset="utf-8">
        <title>Order | User</title>
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
      <a class="nav-item nav-link text-cyan font-weight-bold" href="../home2.php">Book Search</a>
      <a class="nav-item nav-link text-cyan font-weight-bold" href="order.php">Order</a>
      <a class="nav-item nav-link text-cyan font-weight-bold" href="myorder.php">My Order</a>
      <a class="nav-item nav-link text-danger font-weight-bold" href="../logout.php">Logout</a>
    </div>
  </div>
</nav>    

<?php echo $CNF ?> 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>



