<?php
include 'config.php';
session_start();
$UserID = $_SESSION['UserID'];

if (!isset($_SESSION['UserID'])) {
        header('Location: ../index.php');
}

$IIDD99=$_GET['id'];
$title99=$_GET['A'];
$publisher99=$_GET['B'];
$isbn99=$_GET['C'];
$author99=$_GET['D'];
$subject99=$_GET['E'];
$count99=$_GET['F'];
$avalibility99=$_GET['G'];
$bookuid99=$_GET['H'];

?>
<!DOCTYPE html>
<html>
<head>
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta charset="utf-8">
        <title>Edit | Admin</title>
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
      <div class="nav-item nav-link active font-weight-bolder text-dark"><span class="badge badge-pill badge-warning"><?php echo "[ Hey ".$UserID; ?> ]</span><span class="sr-only">(current)</span>
      </div>
    </div>
  </div>
</nav>   
   

<div class="container p-3 my-3 bg-primary text-white">
<h1 class="text-center">Edit Book</h1>

          <form action="" method="post"> 
          <table class="table table-dark table-hover">
          <tbody>
          <tr>
          <th>TITLE :</th><td><input type='text' name='title' class='form-control' value='<?php echo "$title99"?>'></td>
          </tr>
          <tr>
          <th>PUBLISHER :</th><td><input type='text' name='publisher' class='form-control' value='<?php echo "$publisher99"?>'></td>
          </tr>
          <tr>
          <th>ISBN :</th><td><input type='text' name='isbn' class='form-control' value='<?php echo "$isbn99"?>'></td>
          </tr>
          <tr>
          <th>AUTHOR :</th><td><input type='text' name='author' class='form-control' value='<?php echo "$author99"?>'></td>
          </tr>
          <tr>
          <th>SUBJECT :</th><td><input type='text' name='subject' class='form-control' value='<?php echo "$subject99"?>'></td>
          </tr>
          <tr>
          <th>TOTAL BOOKS :</th><td><input type='text' name='count' class='form-control' value='<?php echo "$count99"?>'></td>
          </tr>
          <tr>
          <th>AVAILABLE BOOKS :</th><td><input type='text' name='avalibility' class='form-control' value='<?php echo "$avalibility99"?>'></td>
          </tr>
          <tr>
          <th>BOOK UID :</th><td><input type='text' name='bookuid' class='form-control' value='<?php echo "$bookuid99"?>'></td>
          </tr>
          <tr>
          <th colspan="2"><div class="d-flex justify-content-center">
          <input class="btn btn-outline-warning" type="submit" name="Save" value="SAVE">
          </div></th>
          </tr>
          </tbody>
          </table>
          </form>

<?php 
$IIDD99=$_GET['id'];
if (isset($_POST['Save'])) {
$title = mysqli_real_escape_string($con,$_POST['title']);
$publisher = mysqli_real_escape_string($con,$_POST['publisher']);
$isbn = mysqli_real_escape_string($con,$_POST['isbn']);
$author = mysqli_real_escape_string($con,$_POST['author']);
$subject = mysqli_real_escape_string($con,$_POST['subject']);
$count = mysqli_real_escape_string($con,$_POST['count']);
$avalibility = mysqli_real_escape_string($con,$_POST['avalibility']);
$bookuid = mysqli_real_escape_string($con,$_POST['bookuid']);

$query = "UPDATE books SET title='$title',publisher='$publisher',isbn='$isbn',author='$author',subject='$subject',count='$count',avalibility='$avalibility',bookuid='$bookuid' WHERE ID='$IIDD99'";
$data = mysqli_query($con,$query);
if ($data) {
    echo '<script>alert("Record Updated Successfully")</script>';
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT ="0; URL= https://samratsarkar.in/minor/main/admin/view">
    <?php
}else{
          echo '<table class="table table-dark table-hover">'.
          '<tbody>'.
          "<tr>".
          "<th class='text-center'>Error Unable to Edit</th>". 
          "</tr>".
          '</tbody>'.
          '</table>'; 
}

}
?>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

