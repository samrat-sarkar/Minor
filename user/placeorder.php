<?php 
include 'config.php';
session_start();
$UserID = $_SESSION['UserIDD'];

if (!isset($_SESSION['UserIDD'])) {
        header('Location: index.php');
}

$UserID = $_SESSION['UserIDD'];
$title00=$_GET['A'];
$isbn00=$_GET['B'];
$bookuid00=$_GET['C'];
$avalibility00=$_GET['D'];



if ($UserID) {
if ($bookuid00) {

$OrderID = rand(00000000,99999999);
$Status = "Order Placed Successfully";
$LateFees = "0";

if ($avalibility00 > 0) {

$sub = $avalibility00 - 1;
$date1 = "Not Assigned";
$date2 = "Not Assigned";

$query1 = "INSERT INTO `issue_book`( `OrderID`, `UserID`, `title`, `isbn`, `bookuid`, `Status`, `DOI`, `DOR`, `LateFees`) 
VALUES ('$OrderID','$UserID','$title00','$isbn00','$bookuid00','$Status','$date1','$date2','$LateFees')";  

$query2 = "UPDATE books SET avalibility='$sub' WHERE bookuid='$bookuid00'";

$data1 = mysqli_query($con,$query1);

$data2 = mysqli_query($con,$query2);

}else{

     echo '<table class="table table-dark table-hover">'.
          '<tbody>'.
          "<tr>".
          "<th class='text-center'>Sorry Book is not Available!</th>". 
          "</tr>".
          '</tbody>'.
          '</table>';
}


if ($data1) {
  echo '<script>alert("Order Placed Successfully")</script>';
  ?>
    <META HTTP-EQUIV="Refresh" CONTENT ="0; URL= https://samratsarkar.in/minor/main/user/myorder">
  <?php
}else{
        echo '<table class="table table-dark table-hover">'.
          '<tbody>'.
          "<tr>".
          "<th class='text-center'>Error Unable to Place Order!!</th>". 
          "</tr>".
          '</tbody>'.
          '</table>'; 
}  


}else{
        echo '<table class="table table-dark table-hover">'.
          '<tbody>'.
          "<tr>".
          "<th class='text-center'>Unauthorized Request!!!</th>". 
          "</tr>".
          '</tbody>'.
          '</table>';
}
}else{
        echo '<table class="table table-dark table-hover">'.
          '<tbody>'.
          "<tr>".
          "<th class='text-center'>Unauthorized Request!!!!</th>". 
          "</tr>".
          '</tbody>'.
          '</table>';
}



?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style type="text/css">
            body{
                  background: #fc4a1a;
                  background: -webkit-linear-gradient(to right, #f7b733, #fc4a1a);
                  background: linear-gradient(to right, #f7b733, #fc4a1a);
            }
        </style>