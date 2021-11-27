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
        <title>Invoice | Admin</title>
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
   
<div class="container p-3 my-3 bg-primary text-white">

<div class='d-flex justify-content-center'>
<div class="navbar-brand text-warning font-weight-bolder">
    <div class="bg-dark text-white">
    <img src="https://ums.lpu.in/images/lpu_logo.png" width="35" height="35" class="d-inline-block align-top" alt="">Library Management System</div>
</div>
</div>

<?php 
include 'config.php';
$ORDERID=$_GET['ORDERID'];

$sql = "SELECT * FROM issue_book WHERE OrderID = '$ORDERID'";
$data = mysqli_query($con,$sql);
$total = mysqli_num_rows($data);
if ($total!=0) 
{
while ($result=mysqli_fetch_assoc($data)) 
{
$OrderID = $result['OrderID'];
$CNFCode = $result['CNFCode'];
$UserID= $result['UserID'];
$title= $result['title'];
$bookuid= $result['bookuid'];
$Status= $result['Status'];
$LateFees= "₹".$result['LateFees'];
$DOI = $result['DOI'];
$DOR = $result['DOR']; 

       $ck =$result['CNFCode'];

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
          "<th colspan='2'><div class='d-flex justify-content-center'>".
          "<button onclick='window.print()' class='btn btn-outline-light'>PRINT</button>".
          "</div></th>".
          "</tr>".
          "<tr>".
          "<th>ORDER ID :</th><td>$OrderID</td>".
          "</tr>".
          "<tr>".
          "<th>USER ID :</th><td>$UserID</td>".
          "</tr>".
          "<tr>".
          "<th>CONFIRMATION CODE :</th><td>$CNFCode</td>".
          "</tr>".
          "<tr>".
          "<th>BOOK TITLE :</th><td>$title</td>".
          "</tr>".
          "<tr>".
          "<th>BOOK UID :</th><td>$bookuid</td>".
          "</tr>".
          "<tr>".
          "<th>STATUS :</th><td>$Status</td>".
          "</tr>".
          "<tr>".
          "<th>DATE OF ISSUE :</th><td>$DOI</td>".
          "</tr>".
          "<tr>".
          "<th>DATE OF RETURN :</th><td>$DOR</td>".
          "</tr>".
          "<th>DAY :</th><td>$msg001</td>". 
          "</tr>".
          "<th>LATE FEES :</th><td>" ."₹". $cal02. "</td>". 
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


?>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

