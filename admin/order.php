<?php
include 'config.php';
session_start();
$UserID = $_SESSION['UserID'];

if (!isset($_SESSION['UserID'])) {
        header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta charset="utf-8">
        <title>Order| Admin</title>
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

<?php
include 'config.php';
$sql = "SELECT * FROM issue_book"; 
$data = mysqli_query($con,$sql);
$total = mysqli_num_rows($data);
if ($total!=0) 
{
    while ($result=mysqli_fetch_assoc($data)) 
    {   
       $ck =$result['CNFCode'];
       if ($ck=="NIL") {
       $cnfmsg = "<td><a href='issue.php?id=$result[OrderID]' class='btn btn-outline-warning'>Confirm Order</a></td>";
       }else{
        $cnfmsg = "<td><div class='btn btn-outline-success'>Confirmed</div></td>";
       }

       $invoice = "<td><a href='invoice.php?ORDERID=$result[OrderID]' class='btn btn-outline-warning'>Download Invoice</a></td>";

if ($ck!="NIL") {
$dateDifference = date_diff(date_create($result['DOI']."12:30:00"), date_create(date("d-m-Y")."12:30:00"));
$dcount = $dateDifference->format('%a');
if ($dcount<=28) {
    $msg001 = "<span class='badge badge-pill badge-success'>$dcount</span>";
}else{
    $msg001 = "<span class='badge badge-pill badge-danger'>$dcount</span>";
}

}

if ($dcount>28) {
     $cal01 = $dcount-28; 
     $cal02 = $cal01*10; 
 }else{
    $cal02 = "0";
 }

$sta = $result['Status'];
 if ($sta=="Taken") {
     $sta1 = "<td><a href='return.php?id=$result[OrderID]' class='btn btn-outline-info'>Return</a></td>";
 }elseif ($sta=="Book Returned") {
     $sta1 = "<td><div class='btn btn-outline-success'>Returned</div></td>";
 }else{
    $sta1 = "";
 }

          echo '<table class="table table-dark table-hover">'.
          '<tbody>'.
          "<tr>".
          "<th>USER ID :</th><td>" . $result['UserID']. " $cnfmsg</td>". 
          "</tr>".
          "<tr>".
          "<th>ORDER ID :</th><td>" . $result['OrderID']. " $invoice</td>". 
          "</tr>".
          "<tr>".
          "<th>CONFIRMATION CODE :</th><td>" . $result['CNFCode']. " $sta1</td>". 
          "</tr>".
          "<th>BOOK TITLE :</th><td>" . $result['title']. "</td>". 
          "</tr>".
          "<th>BOOK ISBN :</th><td>" . $result['isbn']. "</td>". 
          "</tr>".
          "<th>BOOK UID :</th><td>" . $result['bookuid']. "</td>". 
          "</tr>".
          "<th>STATUS :</th><td>" . $result['Status']. "</td>". 
          "</tr>".
          "<th>DATE OF ISSUE :</th><td>" . $result['DOI']. "</td>". 
          "</tr>".
          "<th>DATE OF RETURN :</th><td>" . $result['DOR']. "</td>". 
          "</tr>".
          "<th>DAY :</th><td>$msg001</td>". 
          "</tr>".
          "<th>LATE FEES :</th><td>" ."₹". $cal02. "</td>". 
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>



