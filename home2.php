<?php
include 'config.php';
$srch = '';
$srcherror ='';
session_start();
$UserID = $_SESSION['UserIDD'];

if (!isset($_SESSION['UserIDD'])) {
        header('Location: index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta charset="utf-8">
        <title>Home | User</title>
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
      <span class="badge badge-pill badge-success"><?php echo "[ Hey ".$UserID; ?> ]</span><span class="sr-only">(current)</span></div>
      <a class="nav-item nav-link text-cyan font-weight-bold" href="home2.php">Book Search</a>
      <a class="nav-item nav-link text-cyan font-weight-bold" href="user/order.php">Order</a>
      <a class="nav-item nav-link text-cyan font-weight-bold" href="user/myorder.php">My Order</a>
      <a class="nav-item nav-link text-danger font-weight-bold" href="logout.php">Logout</a>
    </div>
  </div>
</nav>    
   

<div class="container p-3 my-3 bg-primary text-white">
<form action="" method="post"> 
  <h1 class="text-center">Book Search</h1>
  <div class="input-group mb-3">
  <input type="text" name="Keyword" class="form-control" placeholder="Enter Keyword" required>
</div>
<select name="match" class="form-control form-select-lg mb-3" aria-label=".form-select-lg example" required>
  <option value="" disabled selected>Choose option</option>
  <option value="title">TITLE</option>
  <option value="publisher">PUBLISHER</option>
  <option value="author">AUTHOR</option>
  <option value="bookuid">BOOK UID</option>
  <option value="isbn">ISBN</option>
  <option value="subject">SUBJECT</option>
</select>
  <div class="d-flex justify-content-center">
    <input class="btn btn-outline-warning" type="submit" name="search" value="Search">
  </div>
 </form>  
</div>


<?php
include 'config.php';
$srch = '';
$srcherror ='';

if (isset($_POST['search'])) {
$Keyword = mysqli_real_escape_string($con,$_POST['Keyword']);
$match = mysqli_real_escape_string($con,$_POST['match']);

$sql = "SELECT * FROM books  WHERE ".$match." LIKE '%".$Keyword."%'";  
$retval=mysqli_query($con, $sql); 
$row=mysqli_fetch_all($retval,MYSQLI_ASSOC);
$count = mysqli_num_rows($retval);
if (!$count=='0') {
foreach ($row as $data) {
     
     echo '<table class="table table-dark table-hover">'.
          '<tbody>'.
          "<tr>".
          "<th>TITLE :</th><td>" . $data['title']. "<td><a href='user/placeorder.php?A=$data[title]&B=$data[isbn]&C=$data[bookuid]&D=$data[avalibility]' class='btn btn-outline-warning'>Place Order</a></td>
</td>". 
          "</tr>".
          "<tr>".
          "<th>PUBLISHER :</th><td>" . $data['publisher']. "</td>". 
          "</tr>".
          "<tr>".
          "<th>ISBN :</th><td>" . $data['isbn']. "</td>". 
          "</tr>".
          "<tr>".
          "<th>AUTHOR :</th><td>" . $data['author']. "</td>". 
          "</tr>".
          "<tr>".
          "<th>SUBJECT :</th><td>" . $data['subject']. "</td>". 
          "</tr>".
          "<tr>".
          "<th>TOTAL BOOKS :</th><td>" . $data['count']. "</td>". 
          "</tr>".
          "<tr>".
          "<th>AVAILABLE BOOKS :</th><td>" . $data['avalibility']. "</td>". 
          "</tr>".
          "<tr>".
          "<th>BOOK UID :</th><td>" . $data['bookuid']. "</td>". 
          "</tr>".
          '</tbody>'.
          '</table>';  
 
}
}else{
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

