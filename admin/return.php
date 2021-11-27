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
        <title>Return | Admin</title>
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
   

<?php 
include 'config.php';
$ORDERID99=$_GET['id'];
$ORDERID = mysqli_real_escape_string($con,$ORDERID99);


$sql = "SELECT * FROM issue_book WHERE OrderID = '$ORDERID'";
$data = mysqli_query($con,$sql);
$total = mysqli_num_rows($data);
if ($total!=0) 
{
    while ($result=mysqli_fetch_assoc($data)) 
    {
           $Status= $result['Status'] ;
           $DOR = $result['DOR']; 
           $BUID = $result['bookuid']; 
 
          $date = date_default_timezone_set('Asia/Kolkata');
          $date1 = date("d-m-Y");
          $Status = "Book Returned";

          $query = "UPDATE issue_book SET Status='$Status',DOR='$date1' WHERE OrderID = '$ORDERID'";
          $dataa = mysqli_query($con,$query);
          if ($dataa) {

$sql2 = "SELECT * FROM books WHERE bookuid = '$BUID'";
$data2 = mysqli_query($con,$sql2);
$total2 = mysqli_num_rows($data2);
if ($total2!=0){
    while ($result2=mysqli_fetch_assoc($data2)){
        $avalibility= $result2['avalibility'] ;
        $sum = $avalibility + 1;
        $query2 = "UPDATE books SET avalibility='$sum' WHERE bookuid = '$BUID'";
        $dataa2 = mysqli_query($con,$query2);

    }
}

    echo '<script>alert("Book Return Successfully")</script>';
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT ="0; URL= https://samratsarkar.in/minor/main/admin/order">
    <?php
}else{
          echo '<table class="table table-dark table-hover">'.
          '<tbody>'.
          "<tr>".
          "<th class='text-center'>Error Unable to Return</th>". 
          "</tr>".
          '</tbody>'.
          '</table>'; 
}

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

