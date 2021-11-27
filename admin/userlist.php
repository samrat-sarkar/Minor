<?php
include 'config.php';
session_start();
$UserID = $_SESSION['UserID'];

if (!isset($_SESSION['UserID'])) {
        header('Location: ../index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta charset="utf-8">
        <title>User List | Admin</title>
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
<h1 class="text-center">User List</h1>
<?php 
include 'config.php';
$sql = "SELECT * FROM user";  
$data = mysqli_query($con,$sql);
$total = mysqli_num_rows($data);
if ($total!=0) 
{
    while ($result=mysqli_fetch_assoc($data)) 
    {

    if ($result['verify']==1) {
        $msg1="<div class='bg-success text-white'>Verified</div>";
    }else{
        $msg1="<div class='bg-danger text-white'>Not Verified</div>";
    }

    if ($result['Alock']==0) {
        $msg2="<div class='bg-success text-white'>NO</div>";
    }else{
        $msg2="<div class='bg-danger text-white'>YES</div>";
    }

          echo '<table class="table table-dark table-hover">'.
          '<tbody>'.
          "<tr>".
          "<th>Name :</th><td>" . $result['Name']. "<td><a href='useraccount.php?id=$result[id]&A=$result[Name]&B=$result[UserID]&C=$result[verify]&D=$result[Alock]' class='btn btn-outline-info'>Edit</a></td></td>". 
          "</tr>".
          "<tr>".
          "<th>User ID :</th><td>" . $result['UserID']. "</td>". 
          "</tr>".
          "<tr>".
          "<th>Account Status :</th><td>" .$msg1. "</td>". 
          "</tr>".
          "<tr>".
          "<th>Blocked :</th><td>" .$msg2. "</td>". 
          "</tr>".
          '</tbody>'.
          '</table>'; 

    }
}
else{
          echo '<table class="table table-dark table-hover">'.
          '<tbody>'.
          "<tr>".
          "<th class='text-center'>No Result Found</th>". 
          "</tr>".
          '</tbody>'.
          '</table>'; 
}
?> 

</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

